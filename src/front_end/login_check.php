<?php 
session_start();
if($_SESSION['start'] == true){
    // print_r($_SESSION['start']);
    header("location: checkout.php");
}
else{
    // $_SESSION['start'] == false ;
    header("location: ../admin/index.php");

}
?>