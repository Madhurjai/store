<?php
    namespace App ;

    include('config.php');
    include('DB.php');

class Admin_dash extends DB
    {
        // public  $user_id;
        public  $username;
        public  $email;
        public  $password;
        public  $re_pass;

        
        public function verify_user($offset){


            $stmt = DB::getInstance();
            $val = $stmt->prepare("select * from users limit $offset , 5;");
            $val->execute();
            $val->setFetchMode(\PDO::FETCH_ASSOC);

            // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
            // $value  = $val->fetch();
            // return $val ;
            $arr = array();

        foreach (new \RecursiveArrayIterator($val->fetchAll()) as $k => $v) {
                 array_push($arr,$v);
        }
              return $arr ;
    }
        public function number_of_row(){


            $stmt = DB::getInstance();
            $val = $stmt->prepare("select count(*) from users ;");
            $val->execute();
            $val->setFetchMode(\PDO::FETCH_ASSOC);
            $num = $val->fetchAll();

            // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
            // $value  = $val->fetch();
            // return $val ;
        //     $arr = array();

        // foreach (new \RecursiveArrayIterator($val->fetchAll()) as $k => $v) {
        //          array_push($arr,$v);
        // }
              return $num[0]['count(*)'] ;
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