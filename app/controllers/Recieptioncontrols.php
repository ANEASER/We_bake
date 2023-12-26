<?php
class RecieptionControls extends Controller {
    
    //order hancdle
    function existingcustomer(){
        $this->view("receiptionist/existingcustomer");
    }

    function checkcustomer(){
        $customer = new Customer();
        $customerfound = $customer->where("contactNo", $_POST['phone']);
        if($customerfound){
            echo "customer found";
            echo $this->view("receiptionist/existingcustomer");
        }else{
            $this->redirect(BASE_URL."RecieptionControls/placeOrders");
        }
    }

    function addtocart(){
        session_start();

        $_SESSION["name"] = $_POST['name'];
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["phone"] = $_POST['phone'];
        $_SESSION["date"] = $_POST['orderdate'];
        $_SESSION["adress"] = $_POST['deliver_address'];
        $_SESSION["deliverstatus"] = $_POST['deliverystatus'];

        $unique_id = uniqid();
            
        $productitem = new ProductItem();
        $items = $productitem->findall();
        echo $this->view("receiptionist/addtocart", [ "items" => $items, "unique_id" => $unique_id]);
    }

    function storeinsession(){
 
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            session_start();

            $unique_id = $_POST['unique_id'];
            $items = $_POST['items'];
            $_SESSION['cart'] = $items;
            $_SESSION['unique_id'] = $unique_id;
            echo $this->view("receiptionist/Cart");

        } else {
            echo "Form not submitted!";
        }
    }

    function checkout(){
            
        session_start();

        $cartItems = $_SESSION['cart'];
        $unique_id = $_SESSION['unique_id'];

        $productorderline = new ProductOrderLine();
        $productitem = new ProductItem();
        $productorder = new ProductOrder();
        $customer = new Customer();

        $total = 0;

        foreach ($cartItems as $item) {

            $productitemfound = $productitem->where("itemid", $item['id']);
            
            $arr["itemid"] = $item['id'];
            $arr["quantity"] = $item['quantity'];
            $arr["unique_id"] = $unique_id;
            $arr["price" ]= $productitemfound[0]->retailprice;
            $arr["totalprice"] = $productitemfound[0]->retailprice * $item['quantity'];
            $arr["unit"] = $productitemfound[0]->unit;

            $productorderline->insert($arr);

            $total += $arr["totalprice"];
            
            unset($_SESSION['cart']); // destroy cart
            
        }

        

        $arr2["orderdate"] = $_SESSION["date"];
        $arr2["deliver_address"] = $_SESSION["adress"];
        $arr2["deliverystatus"] = $_SESSION["deliverstatus"];
        $arr2["unique_id"] = $unique_id;
        $arr2["placeby"] = $_SESSION["USER"]->role;
        $arr2["orderstatus"] = "pending";
        $arr2["paymentstatus"] = "pending";
        $arr2["pickername"] = $_SESSION['name'];
        $arr2["total"] = $total;

        $productorder->insert($arr2);


        $arr3["Name"] = $_SESSION["name"];
        $arr3["Email"] = $_SESSION["email"];
        $arr3["contactNo"] = $_SESSION["phone"];
        $arr3["UserName"] = $_SESSION["name"];

        $customer->insert($arr3);

        unset($_SESSION['unique_id']); // destroy unique_id

        $this->redirect(BASE_URL."RecieptionControls/rechistory");
            
    }

    function deletecart(){
        session_start();
        unset($_SESSION['cart']); // destroy cart
        $this->redirect(BASE_URL."RecieptionControls/rechistory");
    }

    function moredetails($unique_id){
        $productorderline = new ProductOrderLine();
        $productorderlines = $productorderline->where("unique_id",$unique_id);
        echo $this->view("receiptionist/moredetailsorder",["productorderlines"=>$productorderlines]);
    }
    
    
    function index($id = null) {
        $this->view("receiptionist/recepdash");
    }

    function viewProfile(){
        echo $this->view("receiptionist/recprofile");
    }

    function viewHistory(){
        $productorder = new ProductOrder();
        $customer = new Customer();
        $nonusercustomer = $customer->where("UserName", "nonuser");
        
        $productorders = $productorder->where("placeby", $nonusercustomer[0]->Name);
        
        echo $this->view("receiptionist/rechistory", ["productorders" => $productorders]);
    }

    function placeOrders(){
        echo $this->view("receiptionist/recplaceorder");
    }
    
}
?>
