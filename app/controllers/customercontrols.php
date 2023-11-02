<?php

    class CustomerControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            $customer = new Customer();
            $data = $customer->where("UserName", $_SESSION["USER"]->UserName);
            echo $this->view("customer/customerdash",[ "data" => $data]);
        }
        function viewmenu(){
            echo $this->view("customer/viewmenu");
        }
        function profile(){
            echo $this->view("customer/profile");
        }
        function placeorder(){
            echo $this->view("customer/placeorder");
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
        function viewprofile(){
            echo $this->view("customer/viewprofile");
        }
        function editprofile(){
            echo $this->view("customer/editprofile");        
        }
    }


?>