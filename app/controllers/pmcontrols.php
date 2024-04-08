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

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $vehicle = new Vehicle();
            $vehicles = $vehicle->findall();
            echo $this->view("productionmanager/vehicles", [ "vehicles" => $vehicles]);
        }

        function deletevehicle($vehicleid){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }
            
            $vehicle = new Vehicle();
            $vehicle->update($vehicleid,"vehicleno",["ActiveState"=>0, "availability"=>0]);

            $this->redirect(BASE_URL."PmControls/loadVehiclesView");
        
        }

        function editvehicle(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $vehicle = new Vehicle();
            
            $vehicleid = $_POST['id'];

            if (!empty($_POST['type'])){
                $data['type'] = $_POST['type'];
            }
            if (!empty($_POST['capacity'])){
                $data['capacity'] = $_POST['capacity'];
            }
            if (!empty($_POST['availability'])){
                if ($_POST['availability'] == "1"){
                    $data['availability'] = 1;
                }else{
                    $data['availability'] = 0;
                }
            }
           
            if (!empty($_POST['modelname'])){
                $data['modelname'] = $_POST['modelname'];
            }
            var_dump($data);
            echo $vehicle->update($vehicleid,"vehicleno",$data);
            $this->redirect(BASE_URL."PmControls/loadVehiclesView");
        }


        // views
        function AddVehicle(){

            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION["USER"]->Role != "productionmanager"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

    echo $this->view("productionmanager/rmrequests");
}

}

?>
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