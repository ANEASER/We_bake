<?php

    class CustomerControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $customer = new Customer();
            $productorder = new ProductOrder();

            
            $productitem = new ProductItem();
            $productorderline = new ProductOrderLine();
            $productorderlines = $productorderline->SumProductItemsGroupByIDandCategory();
            $mostsellingitems = array_slice($productorderlines, 0, 2);

            $latestaddeditems = $productitem->getlatestProductItems();

            $mostPurchasedItems = [];

            foreach ($mostsellingitems as $item) {
                $product = $productitem->where("itemid", $item->itemid);
                array_push($mostPurchasedItems, $product);
            }
            
            echo $this->view("customer/customerdash",[ "mostPurchasedItems" => $mostPurchasedItems, "latestaddeditems" => $latestaddeditems]);
        }
    

        function profile($message=null){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $customer = new Customer();
            $data = $customer->where("UserName", $_SESSION["USER"]->UserName);

            $productorder = new ProductOrder();
            $orders = $productorder->findalldescwithplaceby($_SESSION["USER"]->UserName);

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
                $topProducts = array_slice($itemQuantities, 0, 5, true);

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

        // Views
        function purchasehistory(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorder = new ProductOrder();
            $orders = $productorder->findOrdersDecendingDate($_SESSION["USER"]->UserName);
            echo $this->view("customer/purchasehistory",[ "orders" => $orders]);
        }

        function customerdash(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("customer/customerdash");
        }

        // edit profile details
        function editprofiledetailsview(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }

            if(isset($_SESSION["error"])){
                $error = $_SESSION["error"];
                unset($_SESSION["error"]);
                echo $this->view("customer/editprofiledetails",["error"=>$error]);
            }
            else{
                echo $this->view("customer/editprofiledetails");
            }
        }

        function editprofile(){
                
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }


            if(session_status() == PHP_SESSION_NONE){
                session_start();
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
                        
                        if (isset($arr["UserName"])) {
                            $_SESSION["USER"] = $customer->where("UserName", $arr["UserName"])[0];
                        } else {
                            $_SESSION["USER"] = $customer->where("UserName", $_SESSION["USER"]->UserName)[0];
                        }
                        $this->redirect(BASE_URL."CustomerControls/profile/success");
                    }

                    else{
                        $_SESSION["error"] = "Password is incorrect";
                        $this->redirect(BASE_URL."CustomerControls/editprofiledetailsview");
                    }

                }
                else{
                    $_SESSION["error"] = "Form not submitted!";
                    $this->redirect(BASE_URL."CustomerControls/editprofiledetailsview");
                }
        }

        function uploadprofilepicview(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("customer/uploadprofilepic");
        }

        function uploadproof(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $username = $_POST["username"];
                $image = $_FILES["image"];
                $imageData = file_get_contents($image["tmp_name"]);
                $base64Image = base64_encode($imageData);

                $customer = new Customer();
                $customer->update($username, "UserName", ["profilepic" => $base64Image]);

                $_SESSION["USER"]->profilepic = $base64Image;

                $this->redirect(BASE_URL."CustomerControls/profile");
            } else {
                echo "Form not submitted!";
            }
        }


        // Change password
        function changepasswordview(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            echo $this->view("customer/changepassword");        
        }

        function changepassword(){
            
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }


            if(session_status() == PHP_SESSION_NONE){
                session_start();
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
                            echo $this->view("customer/changepassword",["error"=>"New password and confirm password does not match"]); 
                        }
                    }
                    else{

                        if(isset($_SESSION['loginattempts'])){
                            $_SESSION['loginattempts'] = $_SESSION['loginattempts'] + 1;
                        }else{
                            $_SESSION['loginattempts'] = 1;
                        }

                        if($_SESSION['loginattempts'] >= 5){
                            $email = $customerfound[0]->Email;
                            $subject = "Security Alert";
                            $message = "There are suspicious activities on your account. Please change your password.";
                            $mail = new Mail();
                            $mail->sendMail($email,$subject,$message);
                            unset($_SESSION['loginattempts']);
                            $this->redirect(BASE_URL."CommonControls/loadLoginView");
                        }
                        echo $this->view("customer/changepassword",["error"=>"Current password is incorrect"]);
                    }

            }
            else{
                    echo $this->view("customer/changepassword",["error"=>"Form not submitted!"]);
                }
        }

        function updatepassword(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
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

        //Make inquiry
        function makeinquiryview(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

           echo $this->view("customer/makeinquiry");
    
        }

        function makeinquiry(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
           
           $makeinquiry = new Inquiry();

           $arr["placeby"] = $_SESSION["USER"]->UserName;
           $arr["address"] = $_SESSION["USER"]->Address;
           $arr["inquirytext"] = $_POST["inquirytext"];
        

           $makeinquiry->insert($arr);

            
            $this->redirect(BASE_URL."CustomerControls/profile");
        }

        // cancel order
        function cancelorder($unique_id){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if(isset($_SESSION["USER"]->Role)){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $productorder = new ProductOrder();
            $productorder->update($unique_id,"unique_id",["orderstatus"=>"cancelled"]);

            $this->redirect(BASE_URL."CustomerControls/purchasehistory");
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