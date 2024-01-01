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
            echo $this->view("customer/profile");
        }


        // handle order
        function placeorder(){
            echo $this->view("customer/placeorder");
        }

        function submitorder(){
            session_start();
            $_SESSION["date"] = $_POST['orderdate'];
            $_SESSION["adress"] = $_POST['deliver_address'];
            $_SESSION["deliverstatus"] = $_POST['deliverystatus'];
            $_SESSION['picker'] = $_POST['pickername'];

            $unique_id = uniqid();
            $_SESSION['unique_id'] = $unique_id;

            $this->redirect(BASE_URL."CustomerControls/showcategories");
        }

        function showcategories(){
            session_start();
            $productitem = new ProductItem();
            $categories = $productitem->getDistinct("category");
            
            $unique_id = $_SESSION['unique_id'];

            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
            $cartItems = $_SESSION['cart'];
            
            echo $this->view("customer/showcategories",[ "categories" => $categories,  "unique_id" => $unique_id, "cartItems" => $cartItems]);
        }

        // need to use after above
        function addtocart($category){
            session_start();
            echo $category;
            
            $productitem = new ProductItem();
            $items = $productitem->where("category", $category);
            echo $this->view("customer/addtocart", [ "items" => $items, "unique_id" => $_SESSION['unique_id']]);
        }

        function storeinsession(){
 
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                
                session_start();

                $unique_id = $_POST['unique_id'];
                $items = $_POST['items'];
                if (isset($_SESSION['cart'] )) {
                    foreach ($items as $newItem) {
                        $found = false;
                
                        // Check if the item with the same ID exists in the cart
                        foreach ($_SESSION['cart'] as &$cartItem) {
                            if ($newItem['id'] === $cartItem['id']) {
                                // Update the quantity
                                $cartItem['quantity'] += $newItem['quantity'];
                                $found = true;
                                break;
                            }
                        }
                
                        // If the item is not found in the cart, add it
                        if (!$found) {
                            $_SESSION['cart'][] = $newItem;
                        }
                    }
                } else {
                    $_SESSION['cart'] = $items;
                }
                
                $_SESSION['unique_id'] = $unique_id;
                $this->redirect(BASE_URL."CustomerControls/showcategories");

            } else {
                echo "Form not submitted!";
            }
        }

        function checkout(){
            
            session_start();

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
                $arr["price" ]= $productitemfound[0]->retailprice;
                $arr["totalprice"] = $productitemfound[0]->retailprice * $item['quantity'];
                $arr["unit"] = $productitemfound[0]->unit;

                $productorderline->insert($arr);

                $total += $arr["totalprice"];
                
                unset($_SESSION['cart']); // destroy cart
                
            }

            $arr2["orderdate"] = $_SESSION["date"];
            $arr2["deliver_address"] = $_SESSION["adress"];
            $arr2["deliverystatus"] = $_SESSION["deliverstatus"];
            $arr2["unique_id"] = $unique_id;
            $arr2["placeby"] = $_SESSION["USER"]->UserName;
            $arr2["orderstatus"] = "pending";
            $arr2["paymentstatus"] = "pending";
            $arr2["pickername"] = $_SESSION["picker"];
            $arr2["total"] = $total;

            $productorder->insert($arr2);

            unset($_SESSION['unique_id']); // destroy unique_id

            $this->redirect(BASE_URL."CustomerControls/purchasehistory");
                
        }

        // Cart
        function viewcart(){
            session_start();
            $cartItems = $_SESSION['cart'];
            $unique_id = $_SESSION['unique_id'];

            echo $this->view("customer/Cart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
        }

        function updatecart(){
            session_start();
            $cartItems = $_SESSION['cart'];
            $unique_id = $_SESSION['unique_id'];

            echo $this->view("customer/updatecart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
        }

        function deletecartitem($id){
            session_start();
            $cartItems = $_SESSION['cart'];
            
            foreach ($cartItems as $key => $item) {
                if ($item['id'] === $id) {
                    unset($cartItems[$key]);
                    break;
                }
            }

            $_SESSION['cart'] = $cartItems;

            $this->redirect(BASE_URL."CustomerControls/updatecart");
        }

        function editcartitem($id, $quantity){
            session_start();
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
            session_start();
            unset($_SESSION['cart']); // destroy cart
            $this->redirect(BASE_URL."CustomerControls/showcategories");
        }

        function purchasehistory(){
            session_start();
            $productorder = new ProductOrder();
            $orders = $productorder->where("placeby", $_SESSION["USER"]->UserName);
            echo $this->view("customer/purchasehistory",[ "orders" => $orders]);
        }

        function makeinquiry(){
            echo $this->view("customer/makeinquiry");
        }

        function customerdash(){
            echo $this->view("customer/customerdash");
        }

        function editprofiledetails(){
            echo $this->view("customer/editprofiledetails");
        }

        function changepassword(){
            echo $this->view("customer/changepassword");        
        }

        function editprofile(){
            echo $this->view("customer/editprofile");        
        }

        function logout(){
            echo $this->view("customer/logout");        
        }
    }


?>