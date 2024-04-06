<?php

    class PmControls extends Controller{

        function index($id=null){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            $this->view("productionmanager/pmdash");
        }
    

                                //production orders
//pending orders (all)
function pendingOrdersView(){

    if(!Auth::loggedIn()){
        $this->redirect(BASE_URL."CommonControls/loadLoginView");
    }

    echo $this->view("productionmanager/pmorders");

}
//process order

//cancle order
//complete order

//more details

                              //vehicles
//load vehicle view
function loadVehiclesView(){

    if(!Auth::loggedIn()){
        $this->redirect(BASE_URL."CommonControls/loadLoginView");
    }

    echo $this->view("productionmanager/vehicles");
}

//Add vehicle
//view
//Addvehicle

//assign vehicle

//delete vehicle

//edit vehicle
//view
//edit vehicle

//raw materials request
function rmView() {

    if (!Auth::loggedIn()) {
        $this->redirect("CommonControls/loadLoginView");
    }

    echo $this->view("productionmanager/rmrequests");
}

}

?>