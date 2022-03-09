<?php
session_start();
// include('../classes/products_table.php');
// include('../classes/user_checkout.php');
// include('classes/DB.php');
use App\products_table ;
use App\User_checkout ;

include('../vendor/autoload.php');
$product = new products_table();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $val = $_POST['value'];
    $arr = $product->update_to_cart($id);
    print_r($id);
    print_r($arr);
    $quantity = $arr['quantity']  + $val;
    $product->update_cart_quantity($id, $quantity);
    // header("location: cart.php");
}
if (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];

    $product->del_from_cart($id);
}
if (isset($_POST['search'])) {
    $value = $_POST['input'];
    $select = $_POST['select'];
    if (isset($_POST['input'])) {
        if ($select == '1') {
            $arr = $product->order_by_price($value);
            $_SESSION['print_arr'] = $arr;
        } else {
            $arr = $product->search_product($value);
            // print_r($arr);
            // unset($_SESSION['print_arr']);
            $_SESSION['print_arr'] = $arr;
        }
    }
     else {
        if($select == '1'){
            $arr = $product->order_by_only_price();
            $_SESSION['print_arr'] = $arr;
        }
    }


    // print_r($_SESSION['print_arr']);
    header("location: index.php");


}

// if(isset($_POST['select'])){
//     $value = $_POST['select'] ;
//     if($value == '1'){
//     // $arr= $product->order_by_price();
//     $_SESSION['print_select'] = $arr ;
//     }
//     else{
//     $arr= $product->order_by_name();
//     $_SESSION['print_select'] = $arr ;

//     }
//     header("location: index.php");

// }
if(isset($_POST['place_order'])){
    $name = $_POST['username']; 
    $email = $_POST['email'] ; 
    $address = $_POST['address'] ; 
    $zipcode = $_POST['zipcode'] ; 
    $payment_method = $_POST['paymentMethod'] ; 
    $name_on_card = $_POST['name_on_card'] ; 
    $card_number = $_POST['card_number'] ; 
    $expiry = $_POST['expiry'] ; 
    $cvv = $_POST['cvv'] ; 
    $detail = new User_checkout();
    $detail->user_checkout_det($name , $email, $address , $zipcode ,$payment_method , $name_on_card ,
    $card_number,$expiry, $cvv);
    header("location: index.php?placed=2");

}
