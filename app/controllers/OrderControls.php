<?php
    class OrderControls extends Controller{

        function placeorder(){
            if(!Auth::loggedIn()){
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
                $foundorders = $ordersbyRef;
            }
            else if(count($ordersbyPlaceby) > 0){
                $foundorders = $ordersbyPlaceby;
            }
            else{
                $foundorders = [];
            }

            if($_SESSION["USER"]->Role == "billingclerk"){
                $productorders = $productorder->findall();
                echo $this->view("billingclerk/billingdash",["productorders" => $productorders,"foundorders"=>$foundorders]);
            }
            
        }

        function submitorder(){
            session_start();
            $_SESSION["date"] = $_POST['orderdate'];
            $_SESSION["adress"] = $_POST['deliver_address'];
            $_SESSION["deliverstatus"] = $_POST['deliverystatus'];
            $_SESSION['picker'] = $_POST['pickername'];

            if (isset($_SESSION['unique_id'])) {
               unset($_SESSION['unique_id']);
               unset($_SESSION['cart']);
            }

            $unique_id = uniqid();

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

        function checkout(){

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

            $arr2["orderdate"] = $_SESSION["date"];
            $arr2["deliver_address"] = $_SESSION["adress"];
            $arr2["deliverystatus"] = $_SESSION["deliverstatus"];
            $arr2["unique_id"] = $unique_id;
            $arr2["placeby"] = $_SESSION["USER"]->UserName;
            $arr2["orderstatus"] = "pending";
            $arr2["paymentstatus"] = "pending";
            $arr2["pickername"] = $_SESSION["picker"];
            $arr2["total"] = $total;

            if($arr2["deliverystatus"] == "delivery"){
                $orderref = "D".$max_orderid;
            }
            else{
                $orderref  = "P".$max_orderid;
            }

            $orderref = "C".$orderref;
            $arr2["orderref"] = $orderref;

            $productorder->insert($arr2);

            unset($_SESSION['unique_id']); 

            $this->redirect(BASE_URL."OrderControls/placeorder");
                
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

            $order = $productorder->where("unique_id",$unique_id);
            $productorderlines = $productorderline->where("unique_id",$unique_id);
            
            

            echo $this->view("order/moredetailsorder",["productorderlines"=>$productorderlines,"order"=>$order]);
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
            $this->redirect(BASE_URL."OrderControls/showcategories");
        }


        

    }

       

        

?>