<?php
    namespace App ;
    // include('config.php');
    
    class User_checkout extends DB
    {
        // public  $user_id;
        // public  $username;
        // public  $email;
        // public  $password;
        // public  $re_pass;

        public function __construct()
        {
            // $this->user_id = $user_id;
            // $this->username = $username;
            // $this->password = $password;
            // $this->email = $email;
            // $this->re_pass = $re_pass;
        }

        public function user_checkout_det($username, $email, $address, $zipcode, $payment_method, $name_on_card, $card_num , $expiry , $cvv ){
            DB::getInstance()->exec("insert into user_checkout (full_name, email , address , zipcode , payment_method, 
            name_on_card ,card_number ,expiry , cvv) values
            ('$username', '$email' , '$address' , $zipcode , '$payment_method' , '$name_on_card',$card_num , '$expiry' , $cvv )") ;
        }
    }