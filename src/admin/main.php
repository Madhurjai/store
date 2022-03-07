<?php
    include('../classes/admin_dash.php');
    include('../classes/User.php');
    include('../classes/user_verify.php');
    include('../classes/product_cls.php');
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
            header("location: index.php");

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
      //   print_r($val);
        if($val == "admin"){
         header('location: dashboard.php?login_type=1');

        }
        else if($val == false){
           header("location: index.php?correct=2"); 
         }
        else if($val == 'restrict'){
           header("location: index.php?correct=1"); 
         }
         else{
          header('location: user_profile.php?data=1');
              
         }
         

     }
     if(isset($_POST['add_product'])){
      $name = $_POST['name'];
      $price = $_POST['price'];
      $src = $_FILES["image"]["tmp_name"];
      $destination = isset($_FILES["image"]["name"])?$_FILES["image"]["name"]:"";
      if(move_uploaded_file($src, "../image_upload/". $destination)){
         $product = new products($name,$price);
         $product->addproduct($destination);
         header("location: products.php");

      };
      // print_r($_FILES);
     }

     if(isset($_POST['update_product'])){
      $id = $_POST['product_id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      
      // print_r($id);
      $product = new products($name,$price);
      $product->update_product($id , $name , $price); 
      header("location: products.php");


     }

?>
