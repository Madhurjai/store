<?php

use App\customer_status;

    include('../vendor/autoload.php');
    // include('classes/DB.php');

if (isset($_POST['status_approve'])) {
        $value = $_POST['status_approve'] ;
        $val = new customer_status($value);
        $val->update_approved() ;
}
if (isset($_POST['status_restrict'])) {
        $value = $_POST['status_restrict'] ;
        $val = new customer_status($value);
        $val->update_restricted() ;
        // print_r($val);
}
if (isset($_POST['del_user'])) {
        $value = $_POST['del_user'] ;
        $val = new customer_status($value);
        $val->del_from_dash() ;
        // print_r($val);
}
if (isset($_POST['del_product'])) {
        $value = $_POST['del_product'] ;
        $val = new customer_status($value);
        $val->del_product() ;
        // print_r($val);
}
if (isset($_POST['edit_product'])) {
      header("location: add_product.php") ;

        // $value = $_POST['edit_product'] ;
        // $val = new customer_status($value);
        // $val->del_product() ;
        // print_r($val);
}
