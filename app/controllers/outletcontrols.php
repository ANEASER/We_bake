<?php
class OutletControls extends Controller {
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "outletmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        
        $productorder = new ProductOrder();

        $orders = $productorder->findOnTodaybyUser($_SESSION["USER"]->EmployeeNo);

        if($orders == null){
            $this->view("outlet/outletdash",["placefirstorder"=>"Place your first Order"]);
            
        }else{

            $todayorder = $productorder->findOnTodaybyUserConstant($_SESSION["USER"]->EmployeeNo);

            if($todayorder == null){
                $todayorder = $productorder->findLastOrderbyUser($_SESSION["USER"]->EmployeeNo);
            }

            $tommoroworder = $productorder->findOnTommorowbyUser($_SESSION["USER"]->EmployeeNo);

            if($tommoroworder == null){

                $first_order = $todayorder[0];
                $tomorrow_date = date("Y-m-d", strtotime("+1 day"));

                $max_orderid = $productorder->getMinMax("orderid","max");
                $max_orderid = $max_orderid[0]->{"max(orderid)"};
                $max_orderid += 1;
                $max_orderid = str_pad($max_orderid, 7, '0', STR_PAD_LEFT);

                $new_order = array(
                    "orderdate" => $tomorrow_date,
                    "placeby" => $_SESSION["USER"]->EmployeeNo,
                    "paymentstatus" => "paid", 
                    "deliverystatus" => "outletpickup",
                    "orderstatus" => "pending",
                    "total" => $first_order->total,
                    "pickername" => $_SESSION["USER"]->EmployeeNo,
                    "unique_id" => $first_order->unique_id,
                    "deliverby" => "OP".$max_orderid,
                    "deliver_address" => $first_order->deliver_address,
                    "orderref" => $first_order->orderref,
                    "paid_amount" => $first_order->paid_amount,
                    "order_type" => "constant"
                );
            
                $productorder->insert($new_order);
                header("Refresh:0");
            }

            foreach ($orders as $order) {
                $uniqueIds[] = $order->unique_id;
            }
            
            $productorderline = new ProductOrderLine();
            $productorderlines = $productorderline->productOrderLinesbyUniqueIds($uniqueIds);

            $this->view("outlet/outletdash",["productorderlines"=>$productorderlines]);
        }
    }


    function outletdash(){
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "outletmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->view("outlet/outletdash");
    }


    function placeorder(){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        if($_SESSION["USER"]->Role != "outletmanager"){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }


        echo $this->view("outlet/outletplaceorder");
    }


    function submitorder(){
        
        session_start();

        $_SESSION["date"] = $_POST['orderdate'];
        $_SESSION["deliverstatus"] = "outletpickup";
        $_SESSION['picker'] = $_SESSION["USER"]->EmployeeNo;
        $_SESSION['order_type'] = $_POST['ordertype'];

        
        if (isset($_SESSION['unique_id'])) {
            unset($_SESSION['unique_id']);
            unset($_SESSION['cart']);
         }

        $unique_id = uniqid();

        $outlet = new Outlet();
        $foundoutlet = $outlet->where("Manager", $_SESSION["USER"]->EmployeeNo);

        $_SESSION["adress"] = $foundoutlet[0]->OutletCode;
        $_SESSION['unique_id'] = $unique_id;

        $this->redirect(BASE_URL."OrderControls/showcategories");

    }
    
     
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

        $productorder = new ProductOrder();
        $orders = $productorder->findalldescwithplaceby($_SESSION["USER"]->EmployeeNo);
        echo $this->view("outlet/outletpurchasehistory",["orders"=>$orders]);

     
    }

}
?>