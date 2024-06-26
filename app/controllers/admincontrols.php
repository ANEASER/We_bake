<?php

use function PHPSTORM_META\type;

    class AdminControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            
            $systemuser = new Systemuser();
            $outlet = new Outlet();
            $productitem = new ProductItem();
            $vehicle = new Vehicle();
            $productitem = new ProductItem();
            $stockitem = new StockItem();

            $systemusercount = $systemuser->getSystemuserCount();
            $outletcount = $outlet->getOutletCount();
            $productitemcountgroupby = $productitem->countProductItemsGroupByCategory();
            $vehicles = $vehicle->findall();
            $productitems = $productitem->findall();
            $stockitems = $stockitem->findall();
            $systemusergroupbyrole = $systemuser->getSystemuserCountGroupBy();

            echo $this->view("admin/admindash", [ "systemusercount" => $systemusercount, "outletcount" => $outletcount, "productitemcountgroupby" => $productitemcountgroupby, "vehiclecount" => count($vehicles),"productitemcount" => count($productitems), "stockitemscount" => count($stockitems), "systemusergroupbyrole" => $systemusergroupbyrole]);
        }

        //Item functions
        function AddItem(){

            if(!Auth::loggedIn()){
                $this->redirect("CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("admin/additem");
        }

        function addproductitem(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }


            if(isset($_FILES["image"])){

                $productitem = new ProductItem();

                $arr["itemname"] = $_POST["itemname"];
                $arr["retailprice"] = $_POST["retailprice"];
                $arr["cost"] = $_POST["cost"];
                $arr["ipc"] = $_POST["ipc"];
                $arr["itemdescription"] = $_POST["itemdescription"];
                $arr["category"] = $_POST["category"];

                
                if($arr["category"] == "Bread"){
                    $C = "BR";
                }
                else if($arr["category"] == "Pastries"){
                    $C = "PA";
                }
                else if($arr["category"] == "Cakes"){
                    $C = "CK";
                }
                else if($arr["category"] == "Cookies"){
                    $C = "CO";
                }
                else if($arr["category"] == "Muffins"){
                    $C = "MU";
                }
                else if($arr["category"] == "Doughnuts"){
                    $C = "DN";
                }
                else if($arr["category"] == "Pies"){
                    $C = "PI";
                }
                else if($arr["category"] == "Buns"){
                    $C = "BN";
                }
                else if($arr["category"] == "Rolls"){
                    $C = "RL";
                }
                else if($arr["category"] == "Sandwiches"){
                    $C = "SW";
                }
                else if($arr["category"] == "Pizza"){
                    $C = "PZ";
                }
                else if($arr["category"] == "Others"){
                    $C = "OT";
                }
                else if($arr["category"] == "Specials"){
                    $C = "SP";
                }
                else {
                    $error = "Invalid Category";
                    echo $this->view("admin/additem", ["error" => $error]);
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
                    $error = "File is not an image.";
                    echo $this->view("admin/additem", ["error" => $error]);
                }
                if (file_exists($target_file)) {
                    $error = "Sorry, file already exists.";
                    echo $this->view("admin/additem", ["error" => $error]);
                }
                if ($_FILES["image"]["size"] > 500000) {
                    $error = "Sorry, your file is too large.";
                    echo $this->view("admin/additem", ["error" => $error]);
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $error = "Sorry, only JPG, JPEG, PNG files are allowed.";
                    echo $this->view("admin/additem", ["error" => $error]);
                }
                if ($uploadOk == 0) {
                    $error = "Sorry, your file was not uploaded.";
                    echo $this->view("admin/additem", ["error" => $error]);
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                       
                        $_SESSION["message"] = "Item added successfully";

                        $arr["imagelink"] = $newfilename;
                        $productitem->insert($arr);
                        $this->redirect(BASE_URL."AdminControls/addRawsview");
                    }
                }


               
            }
            else{
                $error = "Sorry, there was an error uploading your file.";
                echo $this->view("admin/additem", ["error" => $error]);
            }

        }

        function loadItemsView(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productitem = new ProductItem();
            $items = $productitem->findall();
            echo $this->view("admin/items", [ "items" => $items]);
        }

        function EditItem($id){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productitem = new ProductItem();
            $data = $productitem->where("itemid", $id);
            echo $this->view("admin/edititem", ["data" => $data]);
        }

        function editproduct(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            $productitem = new ProductItem();
            $id = $_POST['id'];
            if (!empty($_POST['itemname'])){
                $data['itemname'] = $_POST['itemname'];
            } 
            if (!empty($_POST['retailprice'])){
                $data['retailprice'] = $_POST['retailprice'];
            }
            if (!empty($_POST['cost'])){
                $data['cost'] = $_POST['cost'];
            }
            if (!empty($_POST['itemdescription'])){
                $data['itemdescription'] = $_POST['itemdescription'];
            }
            if (!empty($_POST['category'])){
                $data['category'] = $_POST['category'];
            }
            if (!empty($_POST['ipc'])){
                $data['ipc'] = $_POST['ipc'];
            }

            if (!empty($_POST['availability'])){
                if ($_POST['availability'] == "1"){
                    $data['availability'] = 1;
                }
            }else{
                $data['availability'] = 0;
            }

            if(isset($_FILES["image"]) && isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])){
                
                $arr = $productitem->where("itemid", $id);
                $arr = $arr[0];

                $target_dir = "../public/media/uploads/Product/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                $newfilename = $arr->Itemcode . "." . $imageFileType;
                $target_file = $target_dir . $newfilename;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["image"]["tmp_name"]);

                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $error = "File is not an image.";
                    
                }
                
                if (file_exists($target_file)) {
                    unlink($target_file); // Delete existing file
                }

                if ($_FILES["image"]["size"] > 500000) {
                    $error = "Sorry, your file is too large.";
                    
                }
                if($imageFileType != "jpeg") {
                    $error = "Sorry, only JPEG files are allowed.";
                    
                }
                if ($uploadOk == 0) {
                    $error = "Sorry, your file was not uploaded.";
                    
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        var_dump($newfilename)  ;
                    }
                }
            }

            echo $productitem->update($id,"itemid",$data);
            $_SESSION["message"] = "Product updated successfully";
            $this->redirect(BASE_URL."CommonControls/loadProductsView");
        }



        // System User

        function addsystemuser(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            
            $arr["Name"] = $_POST["Name"];
            $arr["NIC"] = $_POST["NIC"];
            $arr["DOB"] = $_POST["DOB"];
            $arr["Email"] = $_POST["Email"];
            $arr["contactNo"] = $_POST["contactNo"];
            $arr["Address"] = $_POST["Address"];
            $arr["Role"] = $_POST["Role"];
            $arr["UserName"] = $_POST["UserName"];
            $password = $_POST["Password1"];
            $arr["Password"] = password_hash($password, PASSWORD_DEFAULT);
        
            // Validate NIC
            $patternNIC = '/^\d{9}[vV]$|^\d{12}$/';
            if (!preg_match($patternNIC, $arr["NIC"])) {
                echo $this->view("admin/addsystemuser", ["error" => "Invalid NIC format"]);
                return;
            }
        
            // Validate Date of Birth (DOB)
            $patternDOB = '/^\d{4}-\d{2}-\d{2}$/';
            if (!preg_match($patternDOB, $arr["DOB"])) {
                echo $this->view("admin/addsystemuser", ["error" => "Invalid Date of Birth format"]);
                return;
            }
        
            $patternEmail = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';
            if (!preg_match($patternEmail, $arr["Email"])) {
            $existingUser = $systemuser->where("Email", $arr["Email"]);
            if ($existingUser) {
                echo $this->view("admin/addsystemuser", ["error" => "Email already in use"]);
                return;
            }
                echo $this->view("admin/addsystemuser", ["error" => "Invalid Email"]);
                return;
            }
        
            $patternContactNo = '/^\d{10}$/';
            if (!preg_match($patternContactNo, $arr["contactNo"])) {
            $existingUser = $systemuser->where("contactNo", $arr["contactNo"]);
            if ($existingUser) {
                echo $this->view("admin/addsystemuser", ["error" => "Contact number already in use"]);
                return;
            }
                
                echo $this->view("admin/addsystemuser", ["error" => "Invalid contact number"]);
                return;
            }

            $existingUserName = $systemuser->where("UserName", $arr["UserName"]);
            if ($existingUserName) {
                echo $this->view("admin/addsystemuser", ["error" => "Username already in use"]);
                return;
            }
        
            $validRoles = ["admin", "billingclerk", "outletmanager", "productionmanager", "receptionist", "storemanager"];
            if (!in_array($arr["Role"], $validRoles)) {
                echo $this->view("admin/addsystemuser", ["error" => "Invalid Role"]);
                return;
            }

            $existingNIC = $systemuser->where("NIC", $arr["NIC"]);
            if ($existingNIC) {
                echo $this->view("admin/addsystemuser", ["error" => "NIC already in use"]);
                return;
            }
        
            
            switch ($arr["Role"]) {
                case "admin":
                    $C = "AD";
                    break;
                case "billingclerk":
                    $C = "BC";
                    break;
                case "outletmanager":
                    $C = "OM";
                    break;
                case "productionmanager":
                    $C = "PM";
                    break;
                case "receptionist":
                    $C = "RC";
                    break;
                case "storemanager":
                    $C = "SM";
                    break;
                default:
                    echo $this->view("admin/addsystemuser", ["error" => "Invalid Role"]);
                    return;
            }
        
            // Generate EmployeeNo
            $max_user_id = $systemuser->getMinMax("UserID", "max");
            $max_user_id = $max_user_id[0]->{"max(UserID)"};
            $max_user_id = $max_user_id + 1;
            $max_user_id = str_pad($max_user_id, 5, '0', STR_PAD_LEFT);
        
            $arr["EmployeeNo"] = $C.$max_user_id;
        
            $systemuser->insert($arr);
            $mail = new Mail();
            $mail->sendMail($arr["Email"], "User Account Created", "Your account has been created you should change your password on 1st login.<br> username :  <b>".$arr["UserName"]."</b> <br> password : <b>".$password." </b>.");
            $this->redirect(BASE_URL."AdminControls/loadUsersView");
        
        }
        
        function loadUsersView(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            $users = $systemuser->findall();
            echo $this->view("admin/systemusers", [ "users" => $users]);
        }
     
        function deletesystemuser($id){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            $systemuser->update($id, "UserID", ["ActiveState" => "Inactive"]);
            
            $this->redirect(BASE_URL."AdminControls/loadUsersView");
        }

        function editsystemuser(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
        
            $systemuser = new Systemuser();
            $outlets = new Outlet();
        
            $id = $_POST['id'];
            $data = []; // Initialize an empty array to store validated data
        
            if (!empty($_POST['Name'])){
                $data['Name'] = $_POST['Name'];
            } 
            if (!empty($_POST['NIC'])){
                // Validate NIC
                $patternNIC = '/^\d{9}[vV]$|^\d{12}$/';
                if (!preg_match($patternNIC, $_POST["NIC"])) {
                    $data = $systemuser->where("UserID", $id);
                    echo $this->view("admin/editsystemuser", ["data" => $data ,"error" => "Invalid NIC format"]);
                    return;
                }
                $data['NIC'] = $_POST['NIC'];
            }
            if (!empty($_POST['DOB'])){
                // Validate Date of Birth (DOB)
                $patternDOB = '/^\d{4}-\d{2}-\d{2}$/';
                if (!preg_match($patternDOB, $_POST["DOB"])) {
                    $data = $systemuser->where("UserID", $id);
                    echo $this->view("admin/editsystemuser", ["data" => $data ,"error" => "Invalid Date of Birth format"]);
                    return;
                }
                $data['DOB'] = $_POST['DOB'];
            }
            if (!empty($_POST['Email'])){
                // Validate Email
                $patternEmail = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';
                if (!preg_match($patternEmail, $_POST["Email"])) {
                    // Check if email already in use
                    $existingUser = $systemuser->where("Email", $_POST["Email"]);
                    if ($existingUser && $existingUser[0]->UserID != $id) {
                        $data = $systemuser->where("UserID", $id);
                        echo $this->view("admin/editsystemuser", ["data" => $data , "error" => "Email already in use"]);
                        return;
                    }
                    $data = $systemuser->where("UserID", $id);
                    echo $this->view("admin/editsystemuser", ["data" => $data ,"error" => "Invalid Email"]);
                    return;
                }
                $data['Email'] = $_POST['Email'];
            }
            if (!empty($_POST['contactNo'])){
                // Validate Contact Number
                $patternContactNo = '/^\d{10}$/';
                if (!preg_match($patternContactNo, $_POST["contactNo"])) {
                    // Check if contact number already in use
                    $existingUser = $systemuser->where("contactNo", $_POST["contactNo"]);
                    if ($existingUser && $existingUser[0]->UserID != $id) {
                        $data = $systemuser->where("UserID", $id);
                        echo $this->view("admin/editsystemuser", ["data" => $data ,"error" => "Contact number already in use"]);
                        return;
                    }
                    $data = $systemuser->where("UserID", $id);
                    echo $this->view("admin/editsystemuser", ["data" => $data ,"error" => "Invalid contact number"]);
                    return;
                }
                $data['contactNo'] = $_POST['contactNo'];
            }
            if (!empty($_POST['Address'])){
                $data['Address'] = $_POST['Address'];
            }
            if (!empty($_POST['Role'])){
                // Validate Role
                $validRoles = ["admin", "billingclerk", "outletmanager", "productionmanager", "receptionist", "storemanager"];
                if (!in_array($_POST["Role"], $validRoles)) {
                    $data = $systemuser->where("UserID", $id);
                    echo $this->view("admin/editsystemuser", ["data" => $data ,"error" => "Invalid Role"]);
                    return;
                }
        
                // Generate EmployeeNo based on Role
                switch ($_POST["Role"]) {
                    case "admin":
                        $C = "AD";
                        break;
                    case "billingclerk":
                        $C = "BC";
                        break;
                    case "outletmanager":
                        $C = "OM";
                        break;
                    case "productionmanager":
                        $C = "PM";
                        break;
                    case "receptionist":
                        $C = "RC";
                        break;
                    case "storemanager":
                        $C = "SM";
                        break;
                    default:
                        $data = $systemuser->where("UserID", $id);
                        echo $this->view("admin/editsystemuser", ["data" => $data ,"error" => "Invalid Role"]);
                        return;
                }
        
                // Generate EmployeeNo
                $max_user_id = $systemuser->getMinMax("UserID", "max");
                $max_user_id = $max_user_id[0]->{"max(UserID)"};
                $max_user_id = $max_user_id + 1;
                $max_user_id = str_pad($max_user_id, 5, '0', STR_PAD_LEFT);
        
                $data["EmployeeNo"] = $C.$max_user_id;
            }
            if (!empty($_POST['UserName'])){
                $data['UserName'] = $_POST['UserName'];
            }
        
            $verifiedpassword = password_verify($_POST["Password"], $_SESSION["USER"]->Password);

            if ($verifiedpassword){
                // Update data in the tables
                echo $outlets->update($id, "OutletId", ["Manager" => $data["EmployeeNo"]]);
                echo $systemuser->update($id, "UserID", $data);
                $_SESSION["message"] = "User updated successfully";
                
                $this->redirect(BASE_URL."AdminControls/loadUsersView");
            } else {
                $data = $systemuser->where("UserID", $id);
                echo $this->view("admin/editsystemuser", ["data" => $data, "error" => "Password is incorrect"]);
            }
        }      

        public function searchUsers() {

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

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

        public function ResetPassword($username){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }


            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        
            $generatedpassword = uniqid();
            $passwordhashed = password_hash($generatedpassword, PASSWORD_DEFAULT);
            $systemuser = new Systemuser();
            $founduser = $systemuser->where("UserName", $username);
            $systemuser->update($username, "UserName", ["Password" => $passwordhashed, "ActiveState" => "FirstLogin"]);
            $mail = new Mail();
            $emailed = $mail->sendMail($founduser[0]->Email, "Password Reset", "Your password has been reset. Your new password is : ".$generatedpassword);

            if ($emailed){
                $_SESSION["message"] = "Password reset email sent successfully";
            } else {
                $_SESSION["error"] = "Password reset email failed to send";
            }
            $this->redirect(BASE_URL."AdminControls/loadUsersView");
        }
        
        //view add user page
        function AddUser(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("admin/addsystemuser");
        }

        //view edit user page
        function EditUser($id){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            $data = $systemuser->where("UserID", $id);

            if($data[0]->Role == "outletmanager"){
                $outlets = new Outlet();
                $outlet = $outlets->where("Manager", $data[0]->EmployeeNo);
                
                if($outlet == null){
                    echo $this->view("admin/editsystemuser", ["data" => $data]);
                }
                else{
                    $hasOutlet = "yes";
                    echo $this->view("admin/editsystemuser", ["data" => $data, "hasOutlet" => $hasOutlet]);
                }
            }else{
                echo $this->view("admin/editsystemuser", ["data" => $data]);
            }
        }

        function viewUser($id){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $systemuser = new Systemuser();
            $data = $systemuser->where("UserID", $id);
            echo $this->view("admin/viewmoreuser", ["data" => $data[0]]);
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

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $outlets = new Outlet();
            $outlets->delete($id,"OutletID");
            $this->redirect(BASE_URL."AdminControls/loadOutletsView");
        }

        function AddOutlet() {

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $outlets = new Outlet();
        
            if (
                isset($_POST["DOS"]) && isset($_POST["contactNo"]) && isset($_POST["ActiveState"]) &&
                isset($_POST["Address"]) && isset($_POST["District"]) && isset($_POST["Email"]) &&
                isset($_POST["Manager"]))   
             {
                $arr["DOS"] = $_POST["DOS"];
        
                $pattern = '/^\d{10}$/';
                if (preg_match($pattern, $_POST["contactNo"]) == 1) {
                    // Check if contact number already in use
                    $existingOutlet = $outlets->where("contactNo", $_POST["contactNo"]);
                    if ($existingOutlet) {
                        echo $this->view("admin/addoutlet", ["error" => "Contact number already in use"]);
                        return; // Stop execution if contact number is already in use
                    }
                    else{
                        $arr["contactNo"] = $_POST["contactNo"];
                    }
                } else {
                    echo $this->view("admin/addoutlet", ["error" => "Invalid contact number"]);
                    return; // Stop execution if contact number is invalid
                }
        
                if ($_POST["ActiveState"] == 1 || $_POST["ActiveState"] == 0) {
                    $arr["ActiveState"] = $_POST["ActiveState"];
                } else {
                    echo $this->view("admin/addoutlet", ["error" => "Invalid Active State"]);
                    return; // Stop execution if Active State is invalid
                }
        
                $arr["Address"] = $_POST["Address"];
                $arr["District"] = $_POST["District"];
        
                $pattern = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';
                if (preg_match($pattern, $_POST["Email"]) == 1) {
                    // Check if email already in use
                    $existingOutlet = $outlets->where("Email", $_POST["Email"]);
                    if ($existingOutlet) {
                        echo $this->view("admin/addoutlet", ["error" => "Email already in use"]);
                    }else{
                        $arr["Email"] = $_POST["Email"];
                    }
                } else {
                    echo $this->view("admin/addoutlet", ["error" => "Invalid Email"]);
                    return; // Stop execution if email is invalid
                }
        
                $arr["Manager"] = $_POST["Manager"];
            } else {
                echo $this->view("admin/addoutlet", ["error" => "Please fill all the fields"]);
                return; // Stop execution if any required field is missing
            }
        
            // District validation and code generation
            $districtCodes = [
                "Dehiwala" => "DH", "Nugegoda" => "NG", "Rajagiriya" => "RG", "Battaramulla" => "BT",
                "Kotte" => "KT", "Malabe" => "MB", "Kohuwala" => "KW", "Nawala" => "NW", "Pamankada" => "PM",
                "Wellawatte" => "WL", "Bambalapitiya" => "BP", "Kirulapone" => "KP", "Kolonnawa" => "KN",
                "Ethul Kotte" => "EK", "Maharagama" => "MG"
            ];
        
            if (isset($districtCodes[$arr['District']])) {
                $C = $districtCodes[$arr['District']];
            } else {
                echo $this->view("admin/addoutlet", ["error" => "Invalid District"]);
                return; // Stop execution if district is invalid
            }
        
            // Generate OutletCode
            $max_outlet_id = $outlets->getMinMax("OutletID", "max");
            $max_outlet_id = $max_outlet_id[0]->{"max(OutletID)"};
            $max_outlet_id = $max_outlet_id + 1;
            $max_outlet_id = str_pad($max_outlet_id, 5, '0', STR_PAD_LEFT);
        
            $arr["OutletCode"] = $C . $max_outlet_id;
        
            // Insert data into the table
            $outlets->insert($arr);
            $this->redirect(BASE_URL . "AdminControls/loadOutletsView");
        }
        
        function AddOutletview(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
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
            if(count($managersWithoutOutlets) > 0){
                echo $this->view("admin/addoutlet", ["managers" => $managersWithoutOutlets]);
            }else{
                echo $this->view("admin/addoutlet", ["error" => "No outlet managers available"]);
            }
        }

        function EditOutletView($id){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
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

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
            $outlets = new Outlet();
        
            $id = $_POST['id'];
            $data = []; 

            if (!empty($_POST['DOS'])){
                $data['DOS'] = $_POST['DOS'];
            }
        
            if (!empty($_POST['contactNo'])){
                $pattern = '/^\d{10}$/';
                if (preg_match($pattern, $_POST["contactNo"]) == 1){

                    // Check if contact number already in use
                    $existingOutlet = $outlets->where("contactNo", $_POST["contactNo"]);
                    if ($existingOutlet) {
                        $outlets = new Outlet();
                        $data = $outlets->where("OutletID", $id);
                        echo $this->view("admin/editoutlet", ["data" => $data, "error" => "Contact number already in use"]);
                    }else{
                        $data['contactNo'] = $_POST['contactNo'];
                    }
                } else {
                    $outlets = new Outlet();
                    $data = $outlets->where("OutletID", $id);
                    echo $this->view("admin/editoutlet", ["data"=>$data,  "error" => "Invalid contact number"]);
                    return;
                }
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
                $districtCodes = [
                    "Dehiwala" => "DH", "Nugegoda" => "NG", "Rajagiriya" => "RG", "Battaramulla" => "BT",
                    "Kotte" => "KT", "Malabe" => "MB", "Kohuwala" => "KW", "Nawala" => "NW", "Pamankada" => "PM",
                    "Wellawatte" => "WL", "Bambalapitiya" => "BP", "Kirulapone" => "KP", "Kolonnawa" => "KN",
                    "Ethul Kotte" => "EK", "Maharagama" => "MG"
                ];
        
                if (isset($districtCodes[$_POST['District']])) {
                    $C = $districtCodes[$_POST['District']];
        
                    $max_outlet_id = $outlets->getMinMax("OutletId", "max");
                    $max_outlet_id = $max_outlet_id[0]->{"max(OutletId)"};
                    $max_outlet_id = $max_outlet_id + 1;
                    $max_outlet_id = str_pad($max_outlet_id, 5, '0', STR_PAD_LEFT);
        
                    $data["OutletCode"] = $C.$max_outlet_id;
                } else {
                    $outlets = new Outlet();
                    $data = $outlets->where("OutletID", $id);
                    echo $this->view("admin/editoutlet", ["data" => $data ,"error" => "Invalid District"]);
                    return;
                }
            }
        
            if (!empty($_POST['Email'])){
                $pattern = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';
                if (preg_match($pattern, $_POST["Email"]) == 1){
                    // Check if email already in use
                    $existingOutlet = $outlets->where("Email", $_POST["Email"]);
                    if ($existingOutlet) {
                        $outlets = new Outlet();
                        $data = $outlets->where("OutletID", $id);
                        echo $this->view("admin/editoutlet", ["data" => $data, "error" => "Email already in use"]);
                    }else{
                        $data['Email'] = $_POST['Email'];
                    }
                } else {
                    $outlets = new Outlet();
                    $data = $outlets->where("OutletID", $id);
                    echo $this->view("admin/editoutlet", ["data" => $data,"error" => "Invalid Email"]);
                    return;
                }
            }
        
            if (!empty($_POST['Manager'])){
                $data['Manager'] = $_POST['Manager'];
            }
        
            $verifiedpassword = password_verify($_POST["Password"], $_SESSION["USER"]->Password);
            if ($verifiedpassword){
                echo $outlets->update($id,"OutletID",$data);
                $_SESSION["message"] = "Outlet updated successfully";
                $this->redirect(BASE_URL."AdminControls/loadOutletsView");
            } else {
                $outlets = new Outlet();
                $data = $outlets->where("OutletID", $id);
                echo $this->view("admin/editoutlet", ["data" => $data, "error" => "Password is incorrect"]);
            }
        }

        function searchOutlet(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

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
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }

            if(isset($_SESSION["message"])){
                $message = $_SESSION["message"];
                unset($_SESSION["message"]);
                echo $this->view("admin/createadvertiesment", ["message" => $message]);
            }else{
                echo $this->view("admin/createadvertiesment");
            }
        }

        function createAdvertisement1() {

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $type = $_POST["type"];

            $target_dir = "../public/media/uploads/Advertiesments/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Set the new filename based on the type
            if ($type == "Desktop") {
                $newfilename = "bg1" . "." . $imageFileType;
            } elseif ($type == "Mobile") {
                $newfilename = "bg1m" . "." . $imageFileType;
            } else {
                // Handle other cases if needed
                return false;
            }
        
            // Construct the final target file path
            $target_file = $target_dir . $newfilename;
        
            // Perform the upload
            if ($imageFileType=='jpg' && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                $_SESSION["message"] = "Advertiesment added successfully";
                $this->redirect(BASE_URL."AdminControls/AddAdvertiesment");
            } else {
                $error= "Sorry, there was an error uploading your file.this only support .jpg files.";
                $this->view("admin/createadvertiesment", ["error" => $error]);
            }
        }

        function createAdvertisement2(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $type = $_POST["type"];

            $target_dir = "../public/media/uploads/Advertiesments/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Set the new filename based on the type
            if ($type == "Desktop") {
                $newfilename = "bg2" . "." . $imageFileType;
            } elseif ($type == "Mobile") {
                $newfilename = "bg2m" . "." . $imageFileType;
            } else {
                // Handle other cases if needed
                return false;
            }
        
            // Construct the final target file path
            $target_file = $target_dir . $newfilename;
        
            // Perform the upload
            if ($imageFileType=='jpg' && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $_SESSION["message"] = "Advertiesment added successfully";
                $this->redirect(BASE_URL."AdminControls/AddAdvertiesment");
            } else {
                $error = "Sorry, there was an error uploading your file. this only support .jpg files.";
                $this->view("admin/createadvertiesment", ["error" => $error]);
            }
        }

        function createAdvertisement3(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            $type = $_POST["type"];

            $target_dir = "../public/media/uploads/Advertiesments/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Set the new filename based on the type
            if ($type == "Desktop") {
                $newfilename = "bg3" . "." . $imageFileType;
            } elseif ($type == "Mobile") {
                $newfilename = "bg3m" . "." . $imageFileType;
            } else {
                // Handle other cases if needed
                return false;
            }
        
            // Construct the final target file path
            $target_file = $target_dir . $newfilename;
        
            // Perform the upload
            if ( $imageFileType=='jpg' && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $_SESSION["message"] = "Advertiesment added successfully";
                $this->redirect(BASE_URL."AdminControls/AddAdvertiesment");
            } else {
                $error = "Sorry, there was an error uploading your file.this only support .jpg files.";
                $this->view("admin/createadvertiesment", ["error" => $error]);
            }
        }

        function addRawsview($itemid=null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productitem = new Productitem();
            $stockitem = new StockItem();
            $rawsforitem = new RawsForItem();

            $stockitems = $stockitem->getDistinct("Name");

            $maxitemid = $productitem->getMinMax("itemid", "max");
            $maxitemid = $maxitemid[0]->{"max(itemid)"};
            

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(isset($_SESSION["message"])){
                $message = $_SESSION["message"];
                unset($_SESSION['message']);
            }else{
                $message = null;
            }

            if($itemid != null){
                $raworderlines = $rawsforitem->where("itemid", $itemid);
                echo $this->view("admin/addraws", ["maxitemid" => $itemid, "stockitems" => $stockitems ,"raworderlines" => $raworderlines, "message" => $message]);
            }else{
                echo $this->view("admin/addraws", ["maxitemid" => $maxitemid, "stockitems" => $stockitems,"raworderlines" => null, "message" => $message]);
            }
        }

        function addRaws(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $raworderline = $_POST;

            for ($i = 0; $i < count($raworderline["itemcode"]); $i++) {
                $rawsforitem = new RawsForItem();
                $rawsforitem->insert([
                    "itemid" => $raworderline["itemid"][$i],
                    "RawName" => $raworderline["itemcode"][$i],
                    "quantity" => floatval($raworderline["quantity"][$i]),
                ]);
            }
           
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION["message"] = "Successed";
            
            try {
                $response = file_get_contents('http://127.0.0.1:8000/train/');
                if(!$response){
                    echo "error";
                }else
                {
                    var_dump($response);
                    //$this->redirect(BASE_URL."CommonControls/loadProductsView");
                }
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
            

        }
        
        function loadDeliveryChargesView($message = null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $deliverycharges = new DeliveryCharges();
            $deliverycharges = $deliverycharges->findall();
            if($message == "successed"){
                echo $this->view("admin/updatedeliverycharges", ["deliverycharges" => $deliverycharges, "message" => "successfully updated"]);
            }else{
                echo $this->view("admin/updatedeliverycharges", ["deliverycharges" => $deliverycharges]);
            }
        }

        function updateDeliveryCharges(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }


            $deliverycharges = new DeliveryCharges();
            $deliverychargesrow = $deliverycharges->where("city", $_POST["city"]);
            $deliverychargesid = $deliverychargesrow[0]->charge_id ;
            foreach ($_POST as $key => $value) {
                if ($value !== "") {
                    $result[$key] = $value;
                }
            }

            $deliverycharges->update($deliverychargesid, "charge_id", $result);

            $this->redirect(BASE_URL."AdminControls/loadDeliveryChargesView/successed");
            
        }

        function deleteRaw($itemid, $id){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(!Auth::isAdmin()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $rawsforitem = new RawsForItem();
            $rawsforitem->delete($id, "id");

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            //$_SESSION["message"] = "Raw deleted successfully";

            $this->redirect(BASE_URL."AdminControls/addRawsview/".$itemid);
        }

    }
?>