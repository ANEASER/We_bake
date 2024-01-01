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
            $this->redirect(BASE_URL."RecieptionControls/placeOrders");
        }else{
            $this->redirect(BASE_URL."RecieptionControls/placeOrders");
        }
    }

    function submitorder(){
        session_start();

        $_SESSION["name"] = $_POST['name'];
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["phone"] = $_POST['phone'];
        $_SESSION["date"] = $_POST['orderdate'];
        $_SESSION["adress"] = $_POST['deliver_address'];
        $_SESSION["deliverstatus"] = $_POST['deliverystatus'];

        $unique_id = uniqid();
        $_SESSION["unique_id"] = $unique_id;

        $this->redirect(BASE_URL."RecieptionControls/showcategories");
    }

    function showcategories(){
        session_start();
        $productitem = new ProductItem();
        $categories = $productitem->getDistinct("category");
        
        $unique_id = $_SESSION['unique_id'];
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        $cartItems = $_SESSION['cart'];
        //var_dump($cartItems);
        
        echo $this->view("receiptionist/showcategories",[ "categories" => $categories,  "unique_id" => $unique_id, "cartItems" => $cartItems]);
    }

    function addtocart($category){
        session_start();
        echo $category;
            
        $productitem = new ProductItem();
        $items = $productitem->where("category", $category);
        echo $this->view("receiptionist/addtocart", [ "items" => $items, "unique_id" => $_SESSION['unique_id']]);
    }

    function storeinsession(){
 
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                
            session_start();

            $unique_id = $_POST['unique_id'];
            $items = $_POST['items'];
            if (isset($_SESSION['cart'])) {
                foreach ($items as $newItem) {
                    $found = false;
            
                    // Check if the item with the same ID exists in the cart
                    foreach ($_SESSION['cart'] as &$cartItem) {
                        if ($newItem['id'] === $cartItem['id']) {
                            // Update the quantity
                            $cartItem['quantity'] += $newItem['quantity'];
                            $found = true;
                            break;
                        }
                    }
            
                    // If the item is not found in the cart, add it
                    if (!$found) {
                        $_SESSION['cart'][] = $newItem;
                    }
                }
            } else {
                $_SESSION['cart'] = $items;
            }
            
            $_SESSION['unique_id'] = $unique_id;
            $this->redirect(BASE_URL."RecieptionControls/showcategories");

        } else {
            echo "Form not submitted!";
        }
    }

    //cart
    function viewcart(){
        
        $cartItems = $_SESSION['cart'];
        $unique_id = $_SESSION['unique_id'];

        echo $this->view("receiptionist/Cart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
    }

    function updatecart(){
        session_start();
        $cartItems = $_SESSION['cart'];
        $unique_id = $_SESSION['unique_id'];
        echo $this->view("receiptionist/updatecart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
    }

    function deletecartitem($id){
        session_start();
        $cartItems = $_SESSION['cart'];
        
        foreach ($cartItems as $key => $item) {
            if ($item['id'] === $id) {
                unset($cartItems[$key]);
                break;
            }
        }

        $_SESSION['cart'] = $cartItems;

        $this->redirect(BASE_URL."RecieptionControls/updatecart");
    }

    function editcartitem($id, $quantity){
        session_start();
        $cartItems = $_SESSION['cart'];
        
        foreach ($cartItems as $key => $item) {
            if ($item['id'] === $id) {
                $cartItems[$key]['quantity'] = $quantity;
                break;
            }
        }

        $_SESSION['cart'] = $cartItems;

        $this->redirect(BASE_URL."RecieptionControls/updatecart");
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
        $arr2["placeby"] = $_SESSION["USER"]->Role;
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
        $this->redirect(BASE_URL."RecieptionControls/showcategories");
    }

    function moredetails($unique_id){
        $productorderline = new ProductOrderLine();
        $productorderlines = $productorderline->where("unique_id",$unique_id);
        echo $this->view("receiptionist/moredetailsorder",["productorderlines"=>$productorderlines]);
    }
    
    
    function index($id = null) {
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
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
