<?php
    namespace App ;

    // include('config.php');
class Checkout_cls extends DB
{
        // public  $user_id;
        public $username;
        public $email;
        public $password;
        public $re_pass;

        public function __construct()
        {
            // $this->username = $username;
        //     $this->password = $password;
        //     $this->email = $email;
        // }}
        }
        public function User_checkout_details($email){


            // $stmt = DB::getInstance();
            // $val = $stmt->prepare("select * from users  where password = $this->password and email = '$this->email';");
            // $val->execute();
            // $val->setFetchMode(PDO::FETCH_ASSOC);
            $stmt = DB::getInstance() ;

            $val = $stmt->prepare("select * from users  where email = '$email' ;");
            $val->execute();
            $val->setFetchMode(\PDO::FETCH_ASSOC);
            $arr = array();
            foreach (new \RecursiveArrayIterator($val->fetchAll()) as $k => $v) {
                array_push($arr,$v);
              }
              return $arr ;
            //  print_r($value['email']);
            // if($value['role'] == 'admin'){
            //      return "admin" ;
            // }
            // else if($value['email'] == $this->email){

            //     return true ;
            // }
            // else{
            //     return false;
            // }
            
        }
}
