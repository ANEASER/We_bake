<?php

use function PHPSTORM_META\type;

    class AdminControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            $producorder = new ProductOrder();
            $productorderline = new ProductOrderLine();
            $productitem = new ProductItem();

            $data = $systemuser->where("UserName", $_SESSION["USER"]->UserName);
            $producorderdata = $producorder->findall();
            $productorderlinedata = $productorderline->findall();
            $productitemdata = $productitem->findall();

            echo $this->view("admin/admindash",[ "data" => $data, "producorderdata" => $producorderdata, "productorderlinedata" => $productorderlinedata, "productitemdata" => $productitemdata]);
        }

        // CRUDS
        function addproductitem(){

            if(isset($_FILES["image"])){

                $productitem = new ProductItem();

                $arr["itemname"] = $_POST["itemname"];
                $arr["retailprice"] = $_POST["retailprice"];
                $arr["stockprice"] = $_POST["stockprice"];
                $arr["itemdescription"] = $_POST["itemdescription"];
                $arr["category"] = $_POST["category"];

                if($arr["category"] == "Bread"){
                    $C = "BR";
                }
                if($arr["category"] == "Pastries"){
                    $C = "PA";
                }
                if($arr["category"] == "Cakes"){
                    $C = "CK";
                }
                if($arr["category"] == "Cookies"){
                    $C = "CO";
                }
                if($arr["category"] == "Muffins"){
                    $C = "MU";
                }
                if($arr["category"] == "Doughnuts"){
                    $C = "DN";
                }
                if($arr["category"] == "Pies"){
                    $C = "PI";
                }
                if($arr["category"] == "Buns"){
                    $C = "BN";
                }
                if($arr["category"] == "Rolls"){
                    $C = "RL";
                }
                if($arr["category"] == "Sandwiches"){
                    $C = "SW";
                }
                if($arr["category"] == "Pizza"){
                    $C = "PZ";
                }
                if($arr["category"] == "Others"){
                    $C = "OT";
                }


                $max_itemm_id = $productitem->getMinMax("itemid", "max");
                $max_itemm_id = $max_itemm_id[0]->{"max(itemid)"};
                $max_itemm_id = $max_itemm_id + 1;
                $max_itemm_id = str_pad($max_itemm_id, 5, '0', STR_PAD_LEFT);

                $arr["Itemcode"] = $C.$max_itemm_id;

                $target_dir = "../public/media/uploads/Product/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                $newfilename = $arr["Itemcode"] . "." . $imageFileType;
                $target_file = $target_dir . $newfilename;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["image"]["tmp_name"]);

                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;

                    return;
                }
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                    return;
                }
                if ($_FILES["image"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                    return;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
                    $uploadOk = 0;
                    return;
                }
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    return;
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $arr["imagelink"] = $newfilename;
                        $productitem->insert($arr);
                        $this->redirect(BASE_URL."CommonControls/loadProductsView");
                    }
                }


               
            }
            else{
                echo "Sorry, there was an error uploading your file.";
                $this->redirect(BASE_URL."AdminControls/index");
            }

        }

        function loadItemsView(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

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
            if (!empty($_POST['category'])){
                $data['category'] = $_POST['category'];
            }
            echo $productitem->update($id,"itemid",$data);
            $this->redirect(BASE_URL."CommonControls/loadProductsView");
        }

        function deleteproduct($id){
            $productitem = new ProductItem();
            $productitem->update($id,"itemid",["availability" => "0"]);
            $this->redirect(BASE_URL."CommonControls/loadProductsView");
        }

        function undoproduct($id){
            $productitem = new ProductItem();
            $productitem->update($id,"itemid",["availability" => "1"]);
            $this->redirect(BASE_URL."CommonControls/loadProductsView");
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

            if($arr["Role"] == "admin"){
                $C = "AD";
            }
            if($arr["Role"] == "billingclerk"){
                $C = "BC";
            }
            if($arr["Role"] == "outletmanager"){
                $C = "OM";
            }
            if($arr["Role"] == "productionmanager"){
                $C = "PM";
            }
            if($arr["Role"] == "receptionist"){
                $C = "RC";
            }
            if($arr["Role"] == "storemanager"){
                $C = "SM";
            }

            $max_user_id = $systemuser->getMinMax("UserID", "max");
            $max_user_id = $max_user_id[0]->{"max(UserID)"};
            $max_user_id = $max_user_id + 1;
            $max_user_id = str_pad($max_user_id, 5, '0', STR_PAD_LEFT);

            $arr["EmployeeNo"] = $C.$max_user_id;

            $systemuser->insert($arr);

            $this->redirect(BASE_URL."AdminControls/loadUsersView");
        }

        function loadUsersView(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            $users = $systemuser->findall();
            echo $this->view("admin/systemusers", [ "users" => $users]);
        }
     
        function deletesystemuser($id){
            $systemuser = new Systemuser();
            $systemuser->delete($id,"UserID");
            $this->redirect(BASE_URL."AdminControls/loadUsersView");
        }

        function editsystemuser(){
            session_start();

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
                if($data["Role"] == "admin"){
                    $C = "AD";
                }
                if($data["Role"] == "billingclerk"){
                    $C = "BC";
                }
                if($data["Role"] == "outletmanager"){
                    $C = "OM";
                }
                if($data["Role"] == "productionmanager"){
                    $C = "PM";
                }
                if($data["Role"] == "receptionist"){
                    $C = "RC";
                }
                if($data["Role"] == "storemanager"){
                    $C = "SM";
                }
    
                $max_user_id = $systemuser->getMinMax("UserID", "max");
                $max_user_id = $max_user_id[0]->{"max(UserID)"};
                $max_user_id = $max_user_id + 1;
                $max_user_id = str_pad($max_user_id, 5, '0', STR_PAD_LEFT);
    
                $data["EmployeeNo"] = $C.$max_user_id;
            }
            if (!empty($_POST['UserName'])){
                $data['UserName'] = $_POST['UserName'];
            }

            if ($_POST['Password'] == $_SESSION["USER"]->Password){
                $outlets = new Outlet();
                
                echo $outlets->update($id,"OutletId",[ "Manager" => $data["EmployeeNo"]]);

                echo $systemuser->update($id,"UserID",$data);
                $this->redirect(BASE_URL."AdminControls/loadUsersView");
            }else
            {
                $systemuser = new Systemuser();
                $data = $systemuser->where("UserID", $id);
                echo $this->view("admin/editsystemuser", ["data" => $data, "error" => "Password is incorrect"]);
            }
            
            
           
        }

        public function searchUsers() {
            $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

            $systemuser = new Systemuser();
            $usersbyNIC = $systemuser->where("NIC", $searchQuery);
            $usersbyName = $systemuser->where("UserName", $searchQuery);
            $usersbyRole = $systemuser->where("Role", $searchQuery);

            if (count($usersbyNIC) > 0) {
                $users = $usersbyNIC;
            } else if (count($usersbyName) > 0) {
                $users = $usersbyName;
            }else if (count($usersbyRole) > 0) {
                $users = $usersbyRole;
            }
            else {
                $users = [];
            }
            echo $this->view("admin/systemusers", [ "users" => $users]);
        }
        
        //view table functions

        function loadStocksView(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("admin/stocks");
        }


        //view add functions
        function AddItem(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("admin/additem");
        }

        function AddStock(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("admin/addstock");
        }

        function AddUser(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("admin/addsystemuser");
        }

        

        // outlet functions
        function loadOutletsView(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $outlets = new Outlet();
            $outlets = $outlets->findall();

            echo $this->view("admin/outlets", ["outlets" => $outlets]);
        }

        function deleteoutlet($id){
            $outlets = new Outlet();
            $outlets->delete($id,"OutletID");
            $this->redirect(BASE_URL."AdminControls/loadOutletsView");
        }

        function AddOutlet(){
            $outlets = new Outlet();

            $arr["DOS"] = $_POST["DOS"];
            $arr["contactNo"] = $_POST["contactNo"];
            $arr["ActiveState"] = $_POST["ActiveState"];
            $arr["Address"] = $_POST["Address"];
            $arr["District"] = $_POST["District"];
            $arr["Email"] = $_POST["Email"];
            $arr["Manager"] = $_POST["Manager"];
            

            if($arr['District'] == "Dehiwala"){
                $C = "DH";
            }
            if($arr['District'] == "Nugegoda"){
                $C = "NG";
            }
            if($arr['District'] == "Rajagiriya"){
                $C = "RG";
            }
            if($arr['District'] == "Battaramulla"){
                $C = "BT";
            }
            if($arr['District'] == "Kotte"){
                $C = "KT";
            }
            if($arr['District'] == "Malabe"){
                $C = "MB";
            }
            if($arr['District'] == "Kohuwala"){
                $C = "KW";
            }
            if($arr['District'] == "Nawala"){
                $C = "NW";
            }
            if($arr['District'] == "Pamankada"){
                $C = "PM";
            }
            if($arr['District'] == "Wellawatte"){
                $C = "WL";
            }
            if($arr['District'] == "Bambalapitiya"){
                $C = "BP";
            }
            if($arr['District'] == "Kirulapone"){
                $C = "KP";
            }
            if($arr['District'] == "Kolonnawa"){
                $C = "KN";
            }
            if($arr['District'] == "Ethul Kotte"){
                $C = "EK";
            }
            if($arr['District'] == "Maharagama"){
                $C = "MG";
            }

            $max_outlet_id = $outlets->getMinMax("OutletID", "max");
            $max_outlet_id = $max_outlet_id[0]->{"max(OutletID)"};
            $max_outlet_id = $max_outlet_id + 1;
            $max_outlet_id = str_pad($max_outlet_id, 5, '0', STR_PAD_LEFT);

            $arr["OutletCode"] = $C.$max_outlet_id;

            $outlets->insert($arr);
            $this->redirect(BASE_URL."AdminControls/loadOutletsView");
        }

        function AddOutletview(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            $outlets = new Outlet();
        
            // Get all outlet managers
            $managers = $systemuser->where("Role", "outletmanager");
        
            // Get all outlets
            $allOutlets = $outlets->findall();
        
            // Filter managers who do not have outlets
            $managersWithoutOutlets = [];
            foreach ($managers as $manager) {
                $hasOutlet = false;
                foreach ($allOutlets as $outlet) {
                    if ($manager->EmployeeNo == $outlet->Manager) {
                        $hasOutlet = true;
                        break;
                    }
                }
                if (!$hasOutlet) {
                    $managersWithoutOutlets[] = $manager;
                }
            }

            echo $this->view("admin/addoutlet", ["managers" => $managersWithoutOutlets]);
        }

        function EditOutletView($id){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $outlets = new Outlet();
            $systemuser = new Systemuser();
            $outlets = new Outlet();
        
            // Get all outlet managers
            $managers = $systemuser->where("Role", "outletmanager");
        
            // Get all outlets
            $allOutlets = $outlets->findall();
        
            // Filter managers who do not have outlets
            $managersWithoutOutlets = [];
            foreach ($managers as $manager) {
                $hasOutlet = false;
                foreach ($allOutlets as $outlet) {
                    if ($manager->EmployeeNo == $outlet->Manager) {
                        $hasOutlet = true;
                        break;
                    }
                }
                if (!$hasOutlet) {
                    $managersWithoutOutlets[] = $manager;
                }
            }

            $data = $outlets->where("OutletID", $id);
            
            echo $this->view("admin/editoutlet", ["data" => $data,"managers" => $managersWithoutOutlets]);
        }

        function EditOutlet(){
            session_start();
            $outlets = new Outlet();

            $id = $_POST['id'];
            
            if (!empty($_POST['DOS'])){
                $data['DOS'] = $_POST['DOS'];
            } 
            if (!empty($_POST['contactNo'])){
                $data['contactNo'] = $_POST['contactNo'];
            }
            if (!empty($_POST['ActiveState'])) {
                    if ($_POST['ActiveState'] == "active") {
                        $data['ActiveState'] = 1;
                    } else {
                        $data['ActiveState'] = 0;
                    }
            }
            if (!empty($_POST['Address'])){
                $data['Address'] = $_POST['Address'];
            }
            if (!empty($_POST['District'])){
                $data['District'] = $_POST['District'];

                if($data["District"] == "Dehiwala"){
                    $C = "DH";
                }
                if($data["District"] == "Nugegoda"){
                    $C = "NG";
                }
                if($data["District"] == "Rajagiriya"){
                    $C = "RG";
                }
                if($data["District"] == "Battaramulla"){
                    $C = "BT";
                }
                if($data["District"] == "Kotte"){
                    $C = "KT";
                }
                if($data["District"] == "Malabe"){
                    $C = "MB";
                }
                if($data["District"] == "Kohuwala"){
                    $C = "KW";
                }
                if($data["District"] == "Nawala"){
                    $C = "NW";
                }
                if($data["District"] == "Pamankada"){
                    $C = "PM";
                }
                if($data["District"] == "Wellawatte"){
                    $C = "WL";
                }
                if($data["District"] == "Bambalapitiya"){
                    $C = "BP";
                }
                if($data["District"] == "Kirulapone"){
                    $C = "KP";
                }
                if($data["District"] == "Kolonnawa"){
                    $C = "KN";
                }
                if($data["District"] == "Ethul Kotte"){
                    $C = "EK";
                }
                if($data["District"] == "Maharagama"){
                    $C = "MG";
                }
                
                $max_outlet_id = $outlets->getMinMax("OutletId", "max");
                $max_outlet_id = $max_outlet_id[0]->{"max(OutletId)"};
                $max_outlet_id = $max_outlet_id + 1;
                $max_outlet_id = str_pad($max_outlet_id, 5, '0', STR_PAD_LEFT);
    
                $data["OutletCode"] = $C.$max_outlet_id;

            }
            if (!empty($_POST['Email'])){
                $data['Email'] = $_POST['Email'];
            }
            if (!empty($_POST['Manager'])){
                $data['Manager'] = $_POST['Manager'];
            }

            if ($_POST['Password'] == $_SESSION["USER"]->Password){
                var_dump($data);
                echo $outlets->update($id,"OutletID",$data);
                $this->redirect(BASE_URL."AdminControls/loadOutletsView");
            }else
            {
                $outlets = new Outlet();
                $data = $outlets->where("OutletID", $id);
                echo $this->view("admin/EditOutletView", ["data" => $data, "error" => "Password is incorrect"]);
            }
           
        }

        function searchOutlet(){
            $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

            $outlets = new Outlet();
            $outletsbyCode= $outlets->where("OutletCode", $searchQuery);
            $outletsbyDistrict = $outlets->where("District", $searchQuery);
            $outletsbyManager = $outlets->where("Manager", $searchQuery);

            if (count($outletsbyCode) > 0) {
                $outlets = $outletsbyCode;
            } else if (count($outletsbyDistrict) > 0) {
                $outlets = $outletsbyDistrict;
            }else if (count($outletsbyManager) > 0) {
                $outlets = $outletsbyManager;
            }
            else {
                $outlets = [];
            }
            echo $this->view("admin/outlets", [ "outlets" => $outlets]);
        }


        //advertiesment functions
        function AddAdvertiesment(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("admin/createadvertiesment");
        }

        function createAdvertisement1() {
            $type = $_POST["type"];

            $target_dir = "../public/media/uploads/Advertiesments/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Set the new filename based on the type
            if ($type == "Desktop") {
                $newfilename = "bg1" . "." . $imageFileType;
                echo $newfilename;
            } elseif ($type == "Mobile") {
                $newfilename = "bg1m" . "." . $imageFileType;
                echo $newfilename;
            } else {
                // Handle other cases if needed
                return false;
            }
        
            // Construct the final target file path
            $target_file = $target_dir . $newfilename;
            echo $target_file;
        
            // Perform the upload
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $this->redirect(BASE_URL."AdminControls/AddAdvertiesment");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        function createAdvertisement2(){
            $type = $_POST["type"];

            $target_dir = "../public/media/uploads/Advertiesments/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Set the new filename based on the type
            if ($type == "Desktop") {
                $newfilename = "bg2" . "." . $imageFileType;
                echo $newfilename;
            } elseif ($type == "Mobile") {
                $newfilename = "bg2m" . "." . $imageFileType;
                echo $newfilename;
            } else {
                // Handle other cases if needed
                return false;
            }
        
            // Construct the final target file path
            $target_file = $target_dir . $newfilename;
            echo $target_file;
        
            // Perform the upload
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $this->redirect(BASE_URL."AdminControls/AddAdvertiesment");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        function createAdvertisement3(){
            $type = $_POST["type"];

            $target_dir = "../public/media/uploads/Advertiesments/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Set the new filename based on the type
            if ($type == "Desktop") {
                $newfilename = "bg3" . "." . $imageFileType;
                echo $newfilename;
            } elseif ($type == "Mobile") {
                $newfilename = "bg3m" . "." . $imageFileType;
                echo $newfilename;
            } else {
                // Handle other cases if needed
                return false;
            }
        
            // Construct the final target file path
            $target_file = $target_dir . $newfilename;
            echo $target_file;
        
            // Perform the upload
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $this->redirect(BASE_URL."AdminControls/AddAdvertiesment");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        //view edit functions
        function EditItem($id){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productitem = new ProductItem();
            $data = $productitem->where("itemid", $id);
            echo $this->view("admin/edititem", ["data" => $data]);
        }

        function EditStock(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            echo $this->view("admin/editstockalertlevels");
        }

        function EditUser($id){
            $systemuser = new Systemuser();
            $data = $systemuser->where("UserID", $id);

            if($data[0]->Role == "outletmanager"){
                $outlets = new Outlet();
                $outlet = $outlets->where("Manager", $data[0]->EmployeeNo);
                $data[0]->Outlet = $outlet[0]->OutletCode;
                if($data[0]->Outlet == null){
                    echo $this->view("admin/editsystemuser", ["data" => $data]);
                }
                else{
                   $this->redirect(BASE_URL."AdminControls/loadUsersView");
                }
            }else{
                echo $this->view("admin/editsystemuser", ["data" => $data]);
            }
            
        }

    }
?>