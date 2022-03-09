<?php 
session_start();
// $_SESSION['start'] = false ;
session_unset();
header("location:index.php");
