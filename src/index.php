<?php
 session_start();
    include('config.php');
    include('classes/DB.php');
    include('classes/User.php');
    include('classes/user_verify.php');
    // include('signin.html');

     if(isset($_POST['submit'])){
        //  $user_id = $_POST['user_id'];
         $full_name = $_POST['full_name'];
         $email = $_POST['email'];
         $pass = $_POST['password'];
         $re_pass = $_POST['re_pass'];
         $user1 = new User($full_name,$email,$pass, $re_pass);
         if($pass == $re_pass){
            $user1->addUser();
         }
         else{
            //  echo "<h1>password not match !!</h1>" ;
             header("location: signin.php?correct=1");
         }
     }
     if(isset($_POST['login'])){
         $email = $_POST['email_login'];
         $password = $_POST['password_login'];
         $verify = new User_verify($email,$password);
        $val = $verify->verify_user();
        if($val == true){
         header('location: dashboard.html?login_type=1');

        }
        else{
            header("location: login.php?correct=2"); 
        }
         

     }

?>
