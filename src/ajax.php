<?php
    include('classes/costumer_status.php');
    // include('classes/DB.php');

  if(isset($_POST['status_approve'])){
        $value = $_POST['status_approve'] ;
        $val = new customer_status($value);
        $val->update_approved() ;
    }
    if(isset($_POST['status_restrict'])){
        $value = $_POST['status_restrict'] ;
        $val = new customer_status($value);
        $val->update_restricted() ;
        // print_r($val);
    }