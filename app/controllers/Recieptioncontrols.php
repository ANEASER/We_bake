<?php
class RecieptionControls extends Controller {
    
    //order hancdle
    function customernumber(){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->view("receiptionist/existingcustomer");
    }

    function checkcustomer(){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $customer = new Customer();
        $customerfound = $customer->where("contactNo", $_POST['phone']);
        if($customerfound){
            $customerusername = $customerfound[0]->UserName;
            $this->redirect(BASE_URL."RecieptionControls/existingcustomer/$customerusername");
        }else{
            $this->redirect(BASE_URL."RecieptionControls/placeOrders");
        }
    }

    function submitorder(){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

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
        
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

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
        
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $category;
            
        $productitem = new ProductItem();
        $items = $productitem->where("category", $category);
        echo $this->view("receiptionist/addtocart", [ "items" => $items, "unique_id" => $_SESSION['unique_id']]);
    }

    function storeinsession(){
 
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                
            if(!Auth::loggedIn()){
                $this->redirect(BASE_URL."CommonControls/loadLoginView");
            }

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
        
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $cartItems = $_SESSION['cart'];
        $unique_id = $_SESSION['unique_id'];

        echo $this->view("receiptionist/Cart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
    }

    function updatecart(){
        
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $cartItems = $_SESSION['cart'];
        $unique_id = $_SESSION['unique_id'];
        echo $this->view("receiptionist/updatecart",[ "cartItems" => $cartItems, "unique_id" => $unique_id]);
    }

    function deletecartitem($id){
        
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

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
        
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
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
        
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

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
            $arr["Itemcode"] = $productitemfound[0]->Itemcode;
            $arr["price" ]= $productitemfound[0]->retailprice;
            $arr["Itemcode"] = $productitemfound[0]->Itemcode;
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

        $customer = new Customer();
        $customerEmail = $customer->where("Email", $_SESSION["email"]);

        if($customerEmail){
            unset($_SESSION['unique_id']); // destroy unique_id

            $this->redirect(BASE_URL."RecieptionControls/viewHistory");
        }
        else{
            $arr3["Name"] = $_SESSION["name"];
            $arr3["Email"] = $_SESSION["email"];
            $arr3["contactNo"] = $_SESSION["phone"];
            $arr3["UserName"] = $_SESSION["name"];

            $customer->insert($arr3);

            unset($_SESSION['unique_id']); // destroy unique_id

            $this->redirect(BASE_URL."RecieptionControls/viewHistory");}
        
    }

    function deletecart(){
        
        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

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

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->view("receiptionist/recprofile");
    }

    function viewHistory(){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        $productorder = new ProductOrder();
        
        $productorders = $productorder->where("placeby", $_SESSION["USER"]->Role);
        
        echo $this->view("receiptionist/rechistory", ["productorders" => $productorders]);
    }

    function placeOrders(){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }

        echo $this->view("receiptionist/recplaceorder");
    }

    function existingcustomer($customerusername = null){

        if(!Auth::loggedIn()){
            $this->redirect(BASE_URL."CommonControls/loadLoginView");
        }
        
        $customer = new Customer();
        $customerfound = $customer->where("UserName", $customerusername);
        echo $this->view("receiptionist/recplaceorder",["customerfound"=>$customerfound]);
    }
    
}
?>
