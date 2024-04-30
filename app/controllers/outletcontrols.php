<?php
class OutletControls extends Controller {
    
    //HOME 
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "outletmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        //(TODAY AVAILABILITIES)
        
        $productorder = new ProductOrder();

        $outlet = new Outlet();
        $foundoutlet = $outlet->where("Manager", $_SESSION["USER"]->EmployeeNo);
        $outletcode = $foundoutlet[0]->OutletCode;

        
        $orders = $productorder->findLastOrderbyUser($outletcode);
        

        if($orders == null){
            $this->view("outlet/outletdash",["placefirstorder"=>"Place your first Order"]);
            
        }else{

            $todayorder = $productorder->findOnTodaybyUserConstant($outletcode);

            if($todayorder == null){
                $todayorder = $productorder->findLastOrderbyUser($outletcode);
            }

            $tommoroworder = $productorder->findOnTommorowbyUser($outletcode);

            if($tommoroworder == null){

                $first_order = $todayorder[0];
                $tomorrow_date = date("Y-m-d", strtotime("+1 day"));

                $max_orderid = $productorder->getMinMax("orderid","max");
                $max_orderid = $max_orderid[0]->{"max(orderid)"};
                $max_orderid += 1;
                $max_orderid = str_pad($max_orderid, 7, '0', STR_PAD_LEFT);

                $new_order = array(
                    "orderdate" => $tomorrow_date,
                    "placeby" => $outletcode,
                    "paymentstatus" => "paid", 
                    "deliverystatus" => "outletpickup",
                    "orderstatus" => "pending",
                    "total" => $first_order->total,
                    "pickername" =>  $outletcode,
                    "unique_id" => $first_order->unique_id,
                    "deliverby" => "outletpickup",
                    "deliver_address" => $first_order->deliver_address,
                    "orderref" => "OP".$max_orderid,
                    "paid_amount" => $first_order->paid_amount,
                    "order_type" => "constant"
                );
            
                $productorder->insert($new_order);
                header("Refresh:0");
            }

            foreach ($todayorder as $order) {
                $uniqueIds[] = $order->unique_id;
            }
            
            $productorderline = new ProductOrderLine();
            $productorderlines = $productorderline->productOrderLinesbyUniqueIds($uniqueIds);

            $this->view("outlet/outletdash",["productorderlines"=>$productorderlines]);
        }
    }

//HOME
    function outletdash(){
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "outletmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->view("outlet/outletdash");
    }

//OUTLET PLACE ORDER
    function placeorder(){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "outletmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }


        echo $this->view("outlet/outletplaceorder");
    }

    //PURCHASE HISTORY
    function purchasehistory(){
        
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "outletmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION == null){
            session_start();
        }

        $outlet = new Outlet();
        $foundoutlet = $outlet->where("Manager", $_SESSION["USER"]->EmployeeNo);
        $outletcode = $foundoutlet[0]->OutletCode;

        $productorder = new ProductOrder();
        $orders = $productorder->findOrdersDecendingDate($outletcode);
        echo $this->view("outlet/outletpurchasehistory",["orders"=>$orders]);

     
    }

    //ORDER SUBMITTION
    function submitorder(){
        
        session_start();

        $outlet = new Outlet();
        $foundoutlet = $outlet->where("Manager", $_SESSION["USER"]->EmployeeNo);

        $_SESSION["date"] = $_POST['orderdate'];
        $_SESSION["deliverstatus"] = "outletpickup";
        $_SESSION['picker'] =  $foundoutlet[0]->OutletCode;
        $_SESSION['order_type'] = $_POST['ordertype'];

        
        if (isset($_SESSION['unique_id'])) {
            unset($_SESSION['unique_id']);
            unset($_SESSION['cart']);
         }

        $unique_id = uniqid();

        $_SESSION["adress"] = $foundoutlet[0]->OutletCode;
        $_SESSION['unique_id'] = $unique_id;

        $this->redirect(BASE_URL."OrderControls/showcategories");

    }

    function searchOrders(){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "outletmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder();

        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

        $orderbyref = $productorder->where("orderref", $searchQuery);
        
        if($orderbyref != null){
           $orders = $orderbyref;
           echo $this->view("outlet/outletpurchasehistory",["orders"=>$orders]);
    
        }else{
            echo $this->view("outlet/outletpurchasehistory",["orders"=>null]); // changed
        }

        }

}

?>