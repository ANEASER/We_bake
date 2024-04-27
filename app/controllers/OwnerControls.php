<?php 

class OwnerControls extends Controller{

    function index() {

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION['USER']->Role != "owner"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $systemuser = new Systemuser();
        $producorder = new ProductOrder();
        $productorderline = new ProductOrderLine();
        $productitem = new ProductItem();

        $data = $systemuser->where("UserName", $_SESSION["USER"]->UserName);
        $producorderdata = $producorder->findall();
        $productorderlinedata = $productorderline->findall();
        $productitemdata = $productitem->findall();
        
        $this->view("owner/ownerdash",[ "data" => $data, "producorderdata" => $producorderdata, "productorderlinedata" => $productorderlinedata, "productitemdata" => $productitemdata]);
    }

    function viewEnquiries(){
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION['USER']->Role != "owner"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->redirect (BASE_URL."OwnerControls/loadviewEnquiries");

    }

    function loadviewEnquiries(){
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION['USER']->Role != "owner"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $inquiry = new Inquiry();
        $inquiry = $inquiry ->findall();
        echo $this->view("owner/inquiry",  ["inquiry" => $inquiry]);

    }

    function viewReports(){
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION['USER']->Role != "owner"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        $producorder = new ProductOrder();
        $productorderline = new ProductOrderLine();
        $productitem = new ProductItem();

        $producorderdata = $producorder->findall();
        $productitemdata = $productitem->findall();
        $unique_ids = [];
        foreach ($producorderdata as $order) {
            array_push($unique_ids, $order->unique_id);
        }
       
        $productorderlines = $productorderline->productOrderLinesbyUniqueIds($unique_ids);
        echo $this->view("owner/report", ["orders" => $producorderdata, "productorderlines" => $productorderlines, "productitemdata" => $productitemdata]);
    }


    function ProductItemReport(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION['USER']->Role != "owner"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $mostleast = $_POST['mostleast'];

            $productitem = new ProductItem();
            $producorder = new ProductOrder();
            $productorderline = new ProductOrderLine();

            $productitemdata = $producorder->findbetweendates($startdate, $enddate);

            $uniqe_ids = [];
            foreach ($productitemdata as $order) {
                array_push($uniqe_ids, $order->unique_id);
            }

            $productorderlines = $productorderline->productOrderLinesbyUniqueIds($uniqe_ids);

            // need alert if no data found
            if(!$productorderlines){
               $this->redirect(BASE_URL."OwnerControls/viewReports");
            }

            foreach ($productorderlines as $productorderline) {
                
                
                $item = $productitem->where('Itemcode', $productorderline->Itemcode);
                
                if ($item) {
                    $associativeArray[] = [
                        'Itemcode' => $productorderline->Itemcode,
                        'Itemname' => $item[0]->itemname,
                        'Quantity' => $productorderline->quantity,
                        'Price' => $productorderline->price,
                        'Total' => $productorderline->totalprice,
                    ];
            }
            
        }

        $sorton = $_POST['sorton'];

        if($sorton == "Quantity"){
            if($mostleast == "most"){
                usort($associativeArray, function($a, $b) {
                    return $b['Quantity'] <=> $a['Quantity'];
                });
            }else{
                usort($associativeArray, function($a, $b) {
                    return $a['Quantity'] <=> $b['Quantity'];
                });
            }
        }else{
            if($mostleast == "most"){
                usort($associativeArray, function($a, $b) {
                    return $b['Total'] <=> $a['Total'];
                });
            }else{
                usort($associativeArray, function($a, $b) {
                    return $a['Total'] <=> $b['Total'];
                });
            }
        }
        
        var_dump($associativeArray);
        $report = new Report();
        $report->generateItemReport($associativeArray);
    }


    function ProdcutOrderReport(){
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            if($_SESSION['USER']->Role != "owner"){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $orderstatus = $_POST['orderstatus'];

            $productorder = new ProductOrder();
            $productitemdata = $productorder->findbetweendates($startdate, $enddate);


            $associativeArray = [];
            foreach ($productitemdata as $productorder) {
                if($productorder->orderstatus == $orderstatus){
                    $associativeArray[] = $productorder;
                }
            }

            $report = new Report();
            $report->generateOrderReport($productitemdata);
            
            
        }

}


 
?>