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

        function addtocart(){

            session_start();
            $_SESSION["date"] = $_POST['orderdate'];
            $_SESSION["adress"] = $_POST['deliver_address'];
            $_SESSION["deliverstatus"] = $_POST['deliverystatus'];

            $unique_id = uniqid();
            
            $productitem = new ProductItem();
            $items = $productitem->findall();
            echo $this->view("customer/addtocart", [ "items" => $items, "unique_id" => $unique_id]);
        }

        function storeinsession(){
 
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                
                session_start();

                $unique_id = $_POST['unique_id'];
                $items = $_POST['items'];
                $_SESSION['cart'] = $items;
                $_SESSION['unique_id'] = $unique_id;
                echo $this->view("customer/Cart");

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
            $arr2["total"] = $total;

            $productorder->insert($arr2);

            unset($_SESSION['unique_id']); // destroy unique_id

            $this->redirect(BASE_URL."CustomerControls/purchasehistory");
                
        }

        function deletecart(){
            session_start();
            unset($_SESSION['cart']); // destroy cart
            $this->redirect(BASE_URL."CustomerControls/purchasehistory");
        }

        function purchasehistory(){
            echo $this->view("customer/purchasehistory",);
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

        function viewcart(){
            echo $this->view("customer/Cart");        
        }

        function logout(){
            echo $this->view("customer/logout");        
        }
    }


?>