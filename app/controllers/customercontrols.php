<?php

    class CustomerControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $customer = new Customer();
            $data = $customer->where("UserName", $_SESSION["USER"]->UserName);
            echo $this->view("customer/customerdash",[ "data" => $data]);
        }

        function profile(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $customer = new Customer();
            $data = $customer->where("UserName", $_SESSION["USER"]->UserName);

            $productorder = new ProductOrder();
            $orders = $productorder->where("placeby", $_SESSION["USER"]->UserName);

            $unique_ids = array();
            foreach($orders as $order){
                array_push($unique_ids,$order->unique_id);
            }


            $productorderline = new ProductOrderLine();
            $productorderlines = array();

            foreach ($unique_ids as $unique_id) {
                $orderLines = $productorderline->where("unique_id", $unique_id);
                foreach ($orderLines as $orderLine) {
                    $productorderlines[] = $orderLine;
                }
            }

            $itemQuantities = [];

            foreach ($productorderlines as $item) {
                $itemCode = $item->Itemcode;
                $quantity = $item->quantity;

                // Using the null coalescing operator to simplify the condition
                $itemQuantities[$itemCode] = ($itemQuantities[$itemCode] ?? 0) + $quantity;
            }

            arsort($itemQuantities);

            $mostPurchasedItems = [];

            if (!empty($itemQuantities)) {
                // Get the top 3 products or fewer if there are less than 3
                $topProducts = array_slice($itemQuantities, 0, 3, true);

                $produictitem = new ProductItem();

                foreach ($topProducts as $itemCode => $quantity) {
                    $productInfo = $produictitem->where("Itemcode", $itemCode); // Assuming the first matching item is enough

                    if ($productInfo) {
                        $mostPurchasedItem = (object) [
                            "Name" => $productInfo[0]->itemname,
                            "ItemCode" => $productInfo[0]->Itemcode,
                            "Quantity" => $quantity,
                            "Link" => $productInfo[0]->imagelink,
                            // Add other properties you want to include
                        ];

                        $mostPurchasedItems[] = $mostPurchasedItem;
                    }
                }
            } else {
                $mostPurchasedItems = "No data available.";
            }

            echo $this->view("customer/profile",[ "data" => $data, "orders" => $orders, "productorderlines" => $productorderlines, "mostPurchasedItems" => $mostPurchasedItems,"itemQuantities"=>$itemQuantities]);
        }


        // handle order
        function placeorder(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            echo $this->view("customer/placeorder");
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

            $this->redirect(BASE_URL."CustomerControls/showcategories");
        }

        function showcategories(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if (!isset($_SESSION['unique_id'])) {
                $this->redirect(BASE_URL."CustomerControls/placeorder");
             }

            $productitem = new ProductItem();
            $categories = $productitem->getDistinct("category");

            if(!isset($_SESSION['unique_id'])){
                $this->redirect(BASE_URL."CustomerControls/placeorder");
            }
            
            $unique_id = $_SESSION['unique_id'];

            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
            $cartItems = $_SESSION['cart'];
            
            echo $this->view("customer/showcategories",[ "categories" => $categories,  "unique_id" => $unique_id, "cartItems" => $cartItems]);
        }

        // need to use after above
        function addtocart($category){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!isset($_SESSION['unique_id'])){
                $this->redirect(BASE_URL."CustomerControls/placeorder");
            }
            
            
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
            $cartItems = $_SESSION['cart'];
            
            $productitem = new ProductItem();
            $items = $productitem->where("category", $category);
            echo $this->view("customer/addtocart", [ "items" => $items, "unique_id" => $_SESSION['unique_id'],"cartItems" => $cartItems]);
        }

        function storeinsession(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!isset($_SESSION['unique_id'])){
                $this->redirect(BASE_URL."CustomerControls/placeorder");
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
                                        $this->redirect(BASE_URL."CustomerControls/deletecartitem/".$item['id']."");
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
                $this->redirect(BASE_URL."CustomerControls/showcategories");
            } else {
                echo "Form not submitted!";
            }
            
        }

        function checkout(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!isset($_SESSION['unique_id'])){
                $this->redirect(BASE_URL."CustomerControls/placeorder");
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

            if($arr2["deliverystatus"] == "Delivery"){
                $orderref = "D".$max_orderid;
            }
            else{
                $orderref  = "P".$max_orderid;
            }

            $orderref = "C".$orderref;
            $arr2["orderref"] = $orderref;

            $productorder->insert($arr2);

            unset($_SESSION['unique_id']); // destroy unique_id

            $this->redirect(BASE_URL."CustomerControls/purchasehistory");
                
        }

        // Cart
        function viewcart(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if (!isset($_SESSION['unique_id'])) {
                $this->redirect(BASE_URL."CustomerControls/placeorder");
             }

            $cartItems = $_SESSION['cart'];
            $unique_id = $_SESSION['unique_id'];

            if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
                $this->redirect(BASE_URL."CustomerControls/showcategories");
            }

            echo $this->view("customer/Cart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
        }

        function updatecart(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            if (!isset($_SESSION['unique_id'])) {
                $this->redirect(BASE_URL."CustomerControls/placeorder");
             }

            $cartItems = $_SESSION['cart'];
            $unique_id = $_SESSION['unique_id'];

            echo $this->view("customer/updatecart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
        }

        function moredetails($unique_id){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorderline = new ProductOrderLine();
            $productorder = new ProductOrder();

            $order = $productorder->where("unique_id",$unique_id);
            $productorderlines = $productorderline->where("unique_id",$unique_id);
            
            

            echo $this->view("customer/moredetailsorder",["productorderlines"=>$productorderlines,"order"=>$order]);
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

            $this->redirect(BASE_URL."CustomerControls/showcategories");
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

            $this->redirect(BASE_URL."CustomerControls/updatecart");
        }

        function deletecart(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            session_start();
            unset($_SESSION['cart']); // destroy cart
            $this->redirect(BASE_URL."CustomerControls/showcategories");
        }



        // Views
        function purchasehistory(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorder = new ProductOrder();
            $orders = $productorder->where("placeby", $_SESSION["USER"]->UserName);
            echo $this->view("customer/purchasehistory",[ "orders" => $orders]);
        }

        function makeinquiry(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("customer/makeinquiry");
        }

        function customerdash(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("customer/customerdash");
        }

        // edit profile details
        function editprofiledetailsview(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("customer/editprofiledetails");
        }

        function editprofile(){
                
                if(!Auth::loggedIn()){
                    $this->redirect(BASE_URL."CommonControls/loadLoginView");
                }
    
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $customer = new Customer();

                    if(!empty($_POST["username"])){
                        $arr["UserName"] = $_POST["username"];
                    }
                    if(!empty($_POST["dob"])){
                        $arr["DOB"] = $_POST["dob"];
                    }
                    if(!empty($_POST["name"])){
                        $arr["Name"] = $_POST["name"];
                    }
                    if(!empty($_POST["address"])){
                        $arr["Address"] = $_POST["address"];
                    }
                    if(!empty($_POST["contactNo"])){
                        $arr["contactNo"] = $_POST["contactNo"];
                    }
                    if(!empty($_POST["email"])){
                        $arr["Email"] = $_POST["email"];
                    }

                    $verifiedpassword = password_verify($_POST["password"],$_SESSION["USER"]->Password);
                    
                    if($verifiedpassword){
                        echo $customer->update($_SESSION["USER"]->UserName,"UserName",$arr);

                        $productorder = new ProductOrder();
                        $productorder->update($_SESSION["USER"]->UserName,"placeby",["placeby"=>$arr["UserName"]]);
                        
                        $_SESSION["USER"] = $customer->where("UserName", $arr["UserName"])[0];
                        $this->redirect(BASE_URL."CustomerControls/profile");
                    }

                    else{
                        echo "Current password is incorrect";
                    }

                }
                else{
                    echo "Form not submitted!";
                }
        }


        // Change password
        function changepasswordview(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("customer/changepassword");        
        }

        function changepassword(){
                
                if(!Auth::loggedIn()){
                    $this->redirect(BASE_URL."CommonControls/loadLoginView");
                }
    
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $currentpassword = $_POST['currentpassword'];
                    $newpassword = $_POST['newpassword'];
                    $confirmpassword = $_POST['confirmpassword'];
                    
                    $customer = new Customer();
                    $customerfound = $customer->where("UserName",$_SESSION["USER"]->UserName);
                    
                    $arr["UserName"] = $customerfound[0]->UserName;
                    $arr["Password"] = $newpassword;
                    $arr["Email"] = $customerfound[0]->Email;

                    $_SESSION["arr"] = $arr;
                    $_SESSION["redirect"] = "CustomerControls/updatepassword";

                    $verifiedpassword = password_verify($currentpassword,$customerfound[0]->Password);

                    if($verifiedpassword){
                        if($newpassword == $confirmpassword){
                            $this->redirect(BASE_URL."CommonControls/otpvalidation");
                        }
                        else{
                            echo "New password and confirm password does not match";
                        }
                    }
                    else{
                        echo "Current password is incorrect";
                    }
                }
                else{
                    echo "Form not submitted!";
                }
        }

        function updatepassword(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $arr = $_SESSION['arr'];
            
            $customer = new Customer();
            $newpassword = password_hash($arr["Password"], PASSWORD_DEFAULT);
            $customer->update($arr["UserName"],"UserName",["Password"=>$newpassword]);
            
            unset($_SESSION['arr']);
            unset($_SESSION['redirect']);

            $this->redirect(BASE_URL."CustomerControls/profile");   
        }


        // Logout
        function logout(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            echo $this->view("customer/logout");        
        }
        
    }


?>