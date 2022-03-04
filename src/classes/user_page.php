<?php
    include('config.php');
    
    class user_page extends DB
    {
        // public  $user_id;
        public  $username;
        public  $email;
        public  $password;
        public  $re_pass;

        public function __construct($email,$password)
        {
            // $this->username = $username;
            $this->password = $password;
            $this->email = $email;
        }
        public function user_profile(){


            $stmt = DB::getInstance();
            // $val = $stmt->prepare("select * from users  where password = $this->password and email = '$this->email';");
            // $val->execute();
            // $val->setFetchMode(PDO::FETCH_ASSOC);

            $val = DB::getInstance()->query("select * from users  where password = $this->password and email = '$this->email';");
            $value  = $val->fetch();
            return $value ;
            // foreach( new RecursiveArrayIterator($val->fetchAll()) as $k=>$v) {
            //     print_r($v);
            //   }
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