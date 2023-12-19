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

        function placeorder(){
            echo $this->view("customer/placeorder");
        }
        
        function addtocart(){
            $productitem = new ProductItem();
            $items = $productitem->findall();
            echo $this->view("customer/addtocart", [ "items" => $items]);
        }

        function storeinsession(){
 
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                
                $items = $_POST['items'];
                $_SESSION['cart'] = $items;
                echo $this->view("customer/Cart");

            } else {
                echo "Form not submitted!";
            }
        }


        function purchasehistory(){
            echo $this->view("customer/purchasehistory");
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