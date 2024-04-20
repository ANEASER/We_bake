<?php
    class OrderControls extends Controller{

        function placeorder(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if (isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            } 

            echo $this->view("order/placeorder");
        }

        function searchOrders(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            $searchQuery = $_GET['search'];
            $productorder = new ProductOrder();

            $ordersbyRef = $productorder->where("orderref", $searchQuery);
            $ordersbyPlaceby = $productorder->where("placeby", $searchQuery);

            if(count($ordersbyRef) > 0){
                $productorders = $ordersbyRef;
            }
            else if(count($ordersbyPlaceby) > 0){
                $productorders = $ordersbyPlaceby;
            }
            else{
                $productorders = [];
            }

            if($_SESSION["USER"]->Role == "billingclerk"){
                echo $this->view("billingclerk/billingdash",["productorders" => $productorders]);
            } elseif ($_SESSION["USER"]->Role == "productionmanager") {
                echo $this->view("productionmanager/pmdash",["productorders" => $productorders]);
            } else {
                echo $this->view("admin/admindash",["productorders" => $productorders]);
            }


            
        }

        function submitorder(){
            session_start();
            $_SESSION["date"] = $_POST['orderdate'];
            $_SESSION["deliverstatus"] = $_POST['deliverystatus'];
            $_SESSION['picker'] = $_POST['pickername'];
            
            

            if (isset($_SESSION['unique_id'])) {
               unset($_SESSION['unique_id']);
               unset($_SESSION['cart']);
            }

            $unique_id = uniqid();

            if(isset($_POST['deliver_address'])) {
                $_SESSION["adress"] = $_POST['deliver_address'];
            }

            if(isset($_POST['deliver_city'])) {
                $deliver_city = $_POST['deliver_city'];
                $deliver_charges = new DeliveryCharges();
                $charges = $deliver_charges->where("city", $deliver_city);
                $_SESSION['charges'] = $charges[0];
            }

            $_SESSION['unique_id'] = $unique_id;

            $this->redirect(BASE_URL."OrderControls/showcategories");
        }

        function showcategories(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if (!isset($_SESSION['unique_id'])) {
                $this->redirect(BASE_URL."OrderControls/placeorder");
             }

            $productitem = new ProductItem();
            $categories = $productitem->getDistinct("category");

            if(!isset($_SESSION['unique_id'])){
                $this->redirect(BASE_URL."OrderControls/placeorder");
            }
            
            $unique_id = $_SESSION['unique_id'];

            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
            $cartItems = $_SESSION['cart'];
            
            echo $this->view("order/showcategories",[ "categories" => $categories,  "unique_id" => $unique_id, "cartItems" => $cartItems]);
        }

        // need to use after above
        function addtocart($category){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!isset($_SESSION['unique_id'])){
                $this->redirect(BASE_URL."OrderControls/placeorder");
            }
            
            
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
            $cartItems = $_SESSION['cart'];
            
            $productitem = new ProductItem();
            $items = $productitem->where("category", $category);
            echo $this->view("order/addtocart", [ "items" => $items, "unique_id" => $_SESSION['unique_id'],"cartItems" => $cartItems]);
        }

        function storeinsession(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!isset($_SESSION['unique_id'])){
                $this->redirect(BASE_URL."OrderControls/placeorder");
            }
 
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                session_start();
            
                $unique_id = $_POST['unique_id'];
                $items = $_POST['items'];
            
                if (isset($_SESSION['cart'])) {
                    foreach ($items as $item) {
                        $found = false;
            
                        // Check if the item has valid 'id' and 'quantity' keys
                        if (isset($item['id'], $item['quantity'],$item['name']) && $item['quantity'] !== '') {
                            foreach ($_SESSION['cart'] as &$cartItem) {
                                if (isset($cartItem['id']) && $item['id'] === $cartItem['id']) {
                                    // Update the quantity
                                    if ((int)$item['quantity'] !== 0) {
                                        $cartItem['quantity'] += (int)$item['quantity'];
                                    }else{
                                        $this->redirect(BASE_URL."OrderControls/deletecartitem/".$item['id']."");
                                    }
                                    $found = true;
                                    break;
                                }
                            }
            
                            // If the item is not found in the cart, add it
                            if (!$found && (int)$item['quantity'] !== 0) {
                                $_SESSION['cart'][] = $item;
                            }
                        }
                    }
                } else {
                    // Filter out items without a valid quantity
                    $validItems = array_filter($items, function ($item) {
                        return isset($item['id'], $item['quantity']) && $item['quantity'] !== '';
                    });
            
                    $_SESSION['cart'] = $validItems;
                }
            
                $_SESSION['unique_id'] = $unique_id;
                $this->redirect(BASE_URL."OrderControls/showcategories"); // link to the same page
            } else {
                echo "Form not submitted!";
            }
            
        }

        function checkout($paymenttype=null,$payedamount=null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."OrderControls/loadLoginView");
            }

            if(!isset($_SESSION['unique_id'])){
                $this->redirect(BASE_URL."OrderControls/placeorder");
            }

            $cartItems = $_SESSION['cart'];
            $unique_id = $_SESSION['unique_id'];

            $productorderline = new ProductOrderLine();
            $productitem = new ProductItem();
            $productorder = new ProductOrder();

            $total = 0;

            foreach ($cartItems as $item) {

                $productitemfound = $productitem->where("itemid", $item['id']);
                
                $arr["itemid"] = $item['id'];
                $arr["quantity"] = $item['quantity'];
                $arr["unique_id"] = $unique_id;
                $arr["Itemcode"] = $productitemfound[0]->Itemcode;
                $arr["price" ]= $productitemfound[0]->retailprice;
                $arr["totalprice"] = $productitemfound[0]->retailprice * $item['quantity'];
                $arr["unit"] = $productitemfound[0]->unit;

                $productorderline->insert($arr);

                $total += $arr["totalprice"];
                
                unset($_SESSION['cart']); // destroy cart
                
            }

            $max_orderid = $productorder->getMinMax("orderid","max");
            $max_orderid = $max_orderid[0]->{"max(orderid)"};
            $max_orderid += 1;
            $max_orderid = str_pad($max_orderid, 7, '0', STR_PAD_LEFT);

            $deliveryChargeString = $_SESSION["delivery_charge"];
            $deliveryChargeInt = intval($deliveryChargeString);

            $arr2["orderdate"] = $_SESSION["date"];
            $arr2["deliver_address"] = $_SESSION["adress"];
            $arr2["deliverystatus"] = $_SESSION["deliverstatus"];
            $arr2["unique_id"] = $unique_id;

            $arr2["orderstatus"] = "pending";
            $arr2["pickername"] = $_SESSION["picker"];
            $arr2["total"] = $total + $deliveryChargeInt;

            if($arr2["deliverystatus"] == "delivery"){
                $orderref = "D".$max_orderid;
            }
            else{
                $orderref  = "P".$max_orderid;
            }

            if(isset($_SESSION['USER']->Role)){
                if($_SESSION['USER']->Role == "outletmanager"){
                    $orderref = "O".$orderref;
                    $arr2["placeby"] = $_SESSION["USER"]->EmployeeNo;
                    $arr2["paymentstatus"] = "paid";
                }
                else if($_SESSION['USER']->Role == "receptionist"){
                    $arr2["placeby"] = $_SESSION["customername"];
                    $arr2["paymentstatus"] = "paid";
                    $orderref = "R".$orderref;
                }
            }
            else{
                $orderref = "C".$orderref;
                $arr2["placeby"] = $_SESSION["USER"]->UserName;
                $arr2["paymentstatus"] = $paymenttype;
            }

            if($payedamount != null){
                $arr2["paid_amount"] = $payedamount;
            }else{
                $arr2["paid_amount"] = 0;
            }
        
            $arr2["orderref"] = $orderref;

            $productorder->insert($arr2);

            unset($_SESSION['unique_id']); 

            if($_SESSION['USER']->Role == "outletmanager"){
                $this->redirect(BASE_URL."OutletControls/index");
            }else{
                $this->redirect(BASE_URL."OrderControls/placeorder");
            }
                
        }

        function paymentgateway(){
                
                if(!Auth::loggedIn()){
                    $this->redirect(BASE_URL."CommonControls/loadLoginView");
                }
    
                if(!isset($_SESSION['unique_id'])){
                    $this->redirect(BASE_URL."OrderControls/placeorder");
                }

                $cartItems = $_SESSION['cart'];
                $unique_id = $_SESSION['unique_id'];

                if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
                    $this->redirect(BASE_URL."OrderControls/showcategories");
                }
    
                echo $this->view("order/paymentmethod",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
        }

        function onlinepayment(){
            
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!isset($_SESSION['unique_id'])){
                $this->redirect(BASE_URL."OrderControls/placeorder");
            }

            $total = $_SESSION['total'];

            echo $this->view("order/onlinepayment",[ "total" => $total]);
        }


        // Cart
        function viewcart(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."OrderControls/loadLoginView");
            }

            if (!isset($_SESSION['unique_id'])) {
                $this->redirect(BASE_URL."OrderControls/placeorder");
             }

            $cartItems = $_SESSION['cart'];
            $unique_id = $_SESSION['unique_id'];

            if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
                $this->redirect(BASE_URL."OrderControls/showcategories");
            }

            echo $this->view("order/Cart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
        }

        function updatecart(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            if (!isset($_SESSION['unique_id'])) {
                $this->redirect(BASE_URL."OrderControls/placeorder");
             }

            $cartItems = $_SESSION['cart'];
            $unique_id = $_SESSION['unique_id'];

            echo $this->view("order/updatecart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
        }

        function moredetails($unique_id){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorderline = new ProductOrderLine();
            $productorder = new ProductOrder();
            $payment = new PaymentProof();

            $order = $productorder->where("unique_id",$unique_id);
            $proofs = $payment->where("orderid",$order[0]->orderid);
            $productorderlines = $productorderline->where("unique_id",$unique_id);
            
            echo $this->view("order/moredetailsorder",["productorderlines"=>$productorderlines,"order"=>$order,"proofs"=>$proofs]);
        }

        function deletecartitem($id){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $cartItems = $_SESSION['cart'];
            
            foreach ($cartItems as $key => $item) {
                if ($item['id'] === $id) {
                    unset($cartItems[$key]);
                    break;
                }
            }

            $_SESSION['cart'] = $cartItems;

            $this->redirect(BASE_URL."OrderControls/updatecart");
        }

        function editcartitem($id, $quantity){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $cartItems = $_SESSION['cart'];
            
            foreach ($cartItems as $key => $item) {
                if ($item['id'] === $id) {
                    $cartItems[$key]['quantity'] = $quantity;
                    break;
                }
            }

            $_SESSION['cart'] = $cartItems;

            $this->redirect(BASE_URL."OrderControls/updatecart");
        }

        function deletecart(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            session_start();
            unset($_SESSION['cart']); // destroy cart
            unset($_SESSION['delivery_charge']); // destroy unique_id
            unset($_SESSION["containercount"]);

            $this->redirect(BASE_URL."OrderControls/showcategories");
        }


        

    }

       

        

?>