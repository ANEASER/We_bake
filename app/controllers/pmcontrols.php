<?php

class PmControls extends Controller
{
    function index($id = null)
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        $this->view("productionmanager/pmdash");
    }

    // Production Orders
    // Pending Orders (All)
    function pendingOrdersView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        echo $this->view("productionmanager/pmorders");
    }

    // Process Order
    // Cancel Order
    // Complete Order
    // More Details

    // Vehicles
    // Load Vehicle View
    function loadVehiclesView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        $vehicle = new vehicle();
        $vehicles = $vehicle->findall();
        echo $this->view("productionmanager/vehicles", ["vehicles" => $vehicles]);
    }

    // View All Vehicles
    function allVehicleView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        $vehicle = new vehicle();
        $vehicles = $vehicle->findall();
        echo $this->view("productionmanager/allvehicles", ["vehicles" => $vehicles]);
    }

    // Add Vehicle
    // View
    function addVehicleView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        echo $this->view("productionmanager/addvehicle");
    }

    // Add Vehicle
    // Assign Vehicle
    // Delete Vehicle
    // Edit Vehicle
    // View
    // Edit Vehicle

    // Raw Materials Request
    function rmView()
    {
        if (!Auth::loggedIn()) {
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        echo $this->view("productionmanager/rmrequests");
    }
}
?>
