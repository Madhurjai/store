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
            $val = $stmt->prepare("select * from users where password = $this->password and email = '$this->email'");
            $val->execute();
            $val->setFetchMode(PDO::FETCH_ASSOC);
            $val = new RecursiveArrayIterator($val->fetchAll()) ;
            // print_r($val);

            // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
            // $value  = $val->fetch();
            //  print_r($value['email']);
            if($val['role'] == 'admin'){
                 return "admin" ;
            }
            else if($val[0]['email'] == $this->email){

                return $val ;
            }
            else{
                return false;
            }
            
        }
    }