<?php
    include('config.php');
    
    class User extends DB
    {
        // public  $user_id;
        public  $username;
        public  $email;
        public  $password;
        public  $re_pass;

        public function __construct($username, $email, $password,$re_pass)
        {
            // $this->user_id = $user_id;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->re_pass = $re_pass;
        }

        public function addUser(){
            DB::getInstance()->exec("insert into users (full_name,email,password,re_pass) values
            ('$this->username','$this->email',$this->password,$this->re_pass)") ;
        }

        public function update_approved($userid){


           
            $stmt = DB::getInstance();
            $stmt->exec("update  users set status = 'approved' where user_id = $userid ;");
            // $val->execute();
            // $val->setFetchMode(PDO::FETCH_ASSOC);
            // $val = new RecursiveArrayIterator($val->fetchAll()) ;

             }
             public function update_restricted($userid){


           
                $stmt = DB::getInstance();
                $stmt->exec("update users set status = 'restricted' where user_id = $userid ;");
                // $val->execute();
                // $val->setFetchMode(PDO::FETCH_ASSOC);
                // $val = new RecursiveArrayIterator($val->fetchAll()) ;
    
                
                
            }
    }