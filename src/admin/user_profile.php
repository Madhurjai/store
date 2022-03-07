<?php 
    include('../classes/DB.php');
    include('../classes/user_page.php');
    if(isset($_GET['data'])){
        $arr = $_GET['data'] ;
        // $email = $arr['email'];
        // $password = $arr['password'];
        // $val = new user_page($email,$password);
        // $val->user_profile();
        // foreach( new RecursiveArrayIterator($arr->fetchAll()) as $k=>$v) {
        //     print_r($v);
        // }
        echo "welcome in your profile";
    }



?>