<?php
    include('config.php');
    
    class User_verify extends DB
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
        public function verify_user(){


            $stmt = DB::getInstance();
            $val = $stmt->query("select * from users where password = $this->password and email = '$this->email'");
            // $stmt->execute();
            // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
            $value  = $val->fetch();
            //  print_r($value['email']);
            if($value['email'] == $this->email){

                return true ;
            }
            else{
                return false;
            }
            
        }
    }