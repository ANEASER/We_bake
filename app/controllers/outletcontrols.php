<?php
class OutletControls extends Controller {
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $user = $_SESSION["USER"];

        $this->view("outlet/outletdash",["user"=>$user]);
    }

    //=======================================================================================================================
    function placeorder($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
    $placeorder = new productorder();
    //$omplaceorder = $placeorder->where("placeby","OM00122");//var dump danne mekata
     //$omplaceorder = $placeorder->findall();
    $omplaceorder= $placeorder->where("placeby",$_SESSION["USER"]->EmployeeNo);

        
        $this->view("outlet/outletplaceorder",["omplaceorder"=>$omplaceorder]);
    }
//----------------------------------------------------------------------------------------------------------------------------------------
    function purchasehistory($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
    $purchaseorder = new productorder();
    $purchasedetails = $purchaseorder->where("placeby",$_SESSION["USER"]->EmployeeNo);
   

    $this->view("outlet/outletpurchasehistory",["purchasedetails"=>$purchasedetails ]);

    }
    //------------------------------------------------------------------------------------------------------------------------------

    function constantorder($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $user = $_SESSION["USER"];

        $this->view("outlet/outletco",["user"=>$user]);
    }


}
?>