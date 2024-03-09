<?php
class BillingControls extends Controller {
    
    
    function index($id = null) {

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        $productorder = new ProductOrder();
        $productorders = $productorder->findOnToday();
        $this->view("billingclerk/billingdash",["productorders" => $productorders]);
    }

    // order handle
    function processOrder($orderid,$paymentstatus) {

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if (!Auth::isBillingClerk()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        $productorder = new ProductOrder();
        $order = $productorder->where("orderid",$orderid);
        $total = $order[0]->total;
        echo $this->view("billingclerk/uploadproof", ["orderid" => $orderid, "paymentstatus" => $paymentstatus, "total" => $total]);
    }


    function uploadproof() {
  
            $orderid = $_POST["orderid"];
            $amount = $_POST["amount"];
            $initialorfinal = $_POST["initialorfinal"];

            $productorder = new ProductOrder();
            $paymentproofs = new PaymentProof();

            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                $imageTmpName = $_FILES["image"]["tmp_name"];
                $imageData = file_get_contents($imageTmpName);
                $base64Image = base64_encode($imageData);

               
                $paymentproofs->insertImage($initialorfinal, $orderid, $base64Image);
                $productorder->update($orderid,"orderid",["paymentstatus" => $initialorfinal, "paid_amount" => $amount]);

                $this->redirect(BASE_URL."BillingControls/index");

                
    
            } else {
                echo "Error uploading image.";
                $this->redirect(BASE_URL."BillingControls/index");
            }
            

    }

    function viewProfile(){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if (!Auth::isBillingClerk()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        echo $this->view("billingclerk/profile");
    }
    
}
?>
