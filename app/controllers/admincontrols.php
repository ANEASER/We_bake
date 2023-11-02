<?php
    class AdminControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            $data = $systemuser->where("UserName", $_SESSION["USER"]->UserName);

            echo $this->view("admin/admindash",[ "data" => $data]);
        }

        // CRUDS
        function addproductitem(){

            $productitem = new ProductItem();

            $arr["itemname"] = $_POST["itemname"];
            $arr["retailprice"] = $_POST["retailprice"];
            $arr["stockprice"] = $_POST["stockprice"];
            $arr["itemdescription"] = $_POST["itemdescription"];

            $productitem->insert($arr);

            $this->redirect("http://localhost/we_bake/public/AdminControls/loadItemsView");

        }

        function loadItemsView(){
            $productitem = new ProductItem();
            $items = $productitem->findall();
            echo $this->view("admin/items", [ "items" => $items]);
        }

        function editproduct(){
            
            $productitem = new ProductItem();
            $id = $_POST['id'];
            if (!empty($_POST['itemname'])){
                $data['itemname'] = $_POST['itemname'];
            } 
            if (!empty($_POST['retailprice'])){
                $data['retailprice'] = $_POST['retailprice'];
            }
            if (!empty($_POST['stockprice'])){
                $data['stockprice'] = $_POST['stockprice'];
            }
            if (!empty($_POST['itemdescription'])){
                $data['itemdescription'] = $_POST['itemdescription'];
            }
            echo $productitem->update($id,"itemid",$data);
            $this->redirect("http://localhost/we_bake/public/AdminControls/loadItemsView");
        }

        function deleteproduct($id){
            $productitem = new ProductItem();
            $productitem->delete($id,"itemid");
            $this->redirect("http://localhost/we_bake/public/AdminControls/loadItemsView");
        }


        // System User

        function addsystemuser(){
            $systemuser = new Systemuser();

            $arr["Name"] = $_POST["Name"];
            $arr["NIC"] = $_POST["NIC"];
            $arr["DOB"] = $_POST["DOB"];
            $arr["Email"] = $_POST["Email"];
            $arr["contactNo"] = $_POST["contactNo"];
            $arr["Address"] = $_POST["Address"];
            $arr["Role"] = $_POST["Role"];
            $arr["UserName"] = $_POST["UserName"];
            $arr["Password"] = $_POST["Password1"];

            $systemuser->insert($arr);

            $this->redirect("http://localhost/we_bake/public/AdminControls/loadUsersView");
        }

        function loadUsersView(){
            $systemuser = new Systemuser();
            $users = $systemuser->findall();
            echo $this->view("admin/systemusers", [ "users" => $users]);
        }
     
        function deletesystemuser($id){
            $systemuser = new Systemuser();
            $systemuser->delete($id,"UserID");
            $this->redirect("http://localhost/we_bake/public/AdminControls/loadUsersView");
        }

        function editsystemuser(){
            
            $systemuser = new Systemuser();
            $id = $_POST['id'];
            if (!empty($_POST['Name'])){
                $data['Name'] = $_POST['Name'];
            } 
            if (!empty($_POST['NIC'])){
                $data['NIC'] = $_POST['NIC'];
            }
            if (!empty($_POST['DOB'])){
                $data['DOB'] = $_POST['DOB'];
            }
            if (!empty($_POST['Email'])){
                $data['Email'] = $_POST['Email'];
            }
            if (!empty($_POST['contactNo'])){
                $data['contactNo'] = $_POST['contactNo'];
            }
            if (!empty($_POST['Address'])){
                $data['Address'] = $_POST['Address'];
            }
            if (!empty($_POST['Role'])){
                $data['Role'] = $_POST['Role'];
            }
            if (!empty($_POST['UserName'])){
                $data['UserName'] = $_POST['UserName'];
            }
            echo $systemuser->update($id,"UserID",$data);
            $this->redirect("http://localhost/we_bake/public/AdminControls/loadUsersView");
        }



        
        //view table unctions
        function loadOutletsView(){
            echo $this->view("admin/outlets");
        }

        function loadStocksView(){
            echo $this->view("admin/stocks");
        }


        //view add functions
        function AddItem(){
            echo $this->view("admin/additem");
        }

        function AddOutlet(){
            echo $this->view("admin/addoutlet");
        }

        function AddStock(){
            echo $this->view("admin/addstock");
        }

        function AddUser(){
            echo $this->view("admin/addsystemuser");
        }

        function AddAdvertiesment(){
            echo $this->view("admin/createadvertiesment");
        }

        //view edit functions
        function EditItem($id){
            echo $this->view("admin/edititem", ["id" => $id]);
        }

        function EditOutlet(){
            echo $this->view("admin/editoutlet");
        }

        function EditStock(){
            echo $this->view("admin/editstockalertlevels");
        }

        function EditUser($id){
            echo $this->view("admin/editsystemuser", ["id" => $id]);
        }

    }
?>