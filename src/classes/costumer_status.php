<?php
    include('config.php');
    include('classes/DB.php');

    // include('classes/User.php');

    
    class customer_status extends DB
    {
        // public  $user_id;
        public  $userid;
        public  $username;
        public  $email;
        public  $password;
        public  $re_pass;

        public function __construct($userid)
        {
            // $this->username = $username;
            $this->userid = $userid;
            // $this->email = $email;
        }
        public function update_approved(){


           
            $stmt = DB::getInstance();
            $stmt->exec("update  users set status = 'approved' where user_id = $this->userid ;");
            // return  $this->userid  ;
            // $val->execute();
            // $val->setFetchMode(PDO::FETCH_ASSOC);
            // $val = new RecursiveArrayIterator($val->fetchAll()) ;

            
            
        }
        public function update_restricted(){


           
            $stmt = DB::getInstance();
            $stmt->exec("update users set status = 'restricted' where user_id = $this->userid ;");
            // $val->execute();
            // $val->setFetchMode(PDO::FETCH_ASSOC);
            // $val = new RecursiveArrayIterator($val->fetchAll()) ;

            
            
        }
        public function del_from_dash(){


           
            $stmt = DB::getInstance();
            $stmt->exec("delete from users where user_id = $this->userid ;");
            // $val->execute();
            // $val->setFetchMode(PDO::FETCH_ASSOC);
            // $val = new RecursiveArrayIterator($val->fetchAll()) ;

            
            
        }
    }
  