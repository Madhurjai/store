<?php
    include('config.php');
    include('DB.php');

    class admin_dash extends DB
    {
        // public  $user_id;
        public  $username;
        public  $email;
        public  $password;
        public  $re_pass;

        
        public function verify_user(){


            $stmt = DB::getInstance();
            $val = $stmt->prepare("select * from users ;");
            $val->execute();
            $val->setFetchMode(PDO::FETCH_ASSOC);

            // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
            // $value  = $val->fetch();
            return $val ;
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