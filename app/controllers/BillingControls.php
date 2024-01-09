<?php
class BillingControls extends Controller {
    
    
    function index($id = null) {

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        $productorder = new ProductOrder();
        $productorders = $productorder->findall();
        $this->view("billingclerk/billingdash",["productorders" => $productorders]);
    }

    // order handle
    function processOrder($orderid,$paymentstatus) {
        echo $this->view("billingclerk/uploadproof", ["orderid" => $orderid, "paymentstatus" => $paymentstatus]);
    }


    function uploadproof() {
        if(isset($_FILES["image"])){
            
            $orderid = $_POST["orderid"];
            $amount = $_POST["amount"];
            $initialorfinal = $_POST["initialorfinal"];

            $target_dir = "../public/media//uploads/Billingproofs/";

            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $newfilename = $initialorfinal.$orderid . "." . $imageFileType;
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
                    $payment = new Payment();

                    $payment->insert([
                        "orderid" => $orderid,
                        "amount" => $amount,
                        "initialorfinal" => $initialorfinal,
                        "link" => $newfilename
                    ]);

                    $productorder = new ProductOrder();

                    if ($initialorfinal == "initial") {
                        $productorder->update($orderid,"orderid",["paymentstatus"=>"advanced"]);
                    } else {
                        $productorder->update($orderid,"orderid",["paymentstatus"=>"paid"]);
                    }

                    $this->redirect(BASE_URL."BillingControls");

                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $this->redirect(BASE_URL."BillingControls");
                    return;
                }
            }
        }
    }

    function viewProfile(){
        echo $this->view("billingclerk/profile");
    }

    function moredetails($orderid ,$unique_id){
        $productorderline = new ProductOrderLine();
        $payment = new Payment();

        $productorderlines = $productorderline->where("unique_id",$unique_id);
        
        $payments = $payment->where("orderid",$orderid);

        echo $this->view("billingclerk/moredetails",["productorderlines"=>$productorderlines, "payments"=>$payments]);
    }
    
}
?>
