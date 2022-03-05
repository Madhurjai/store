<?php
    // include('config.php');
    
    class products extends DB
    {
        // public  $user_id;
        // public  $username;
        public  $email;
        public  $password;
        public  $address;
        public  $address_2;
        public  $city;
        public  $state;
        public  $zip;

        public function __construct($name , $price)
        {
            // $this->user_id = $user_id;
            $this->name = $name;
         
            $this->price = $price ;
        }

        public function addproduct(){
            DB::getInstance()->exec("insert into products (name , price) values
            ('$this->name',$this->price)") ;
        }
    }
        // public function add_product($userid){


           
        //     $stmt = DB::getInstance();
        //     $stmt->exec("update  users set status = 'approved' where user_id = $userid ;");
        //     // $val->execute();
        //     // $val->setFetchMode(PDO::FETCH_ASSOC);
        //     // $val = new RecursiveArrayIterator($val->fetchAll()) ;

        //      }
        //      public function update_restricted($userid){


           
        //         $stmt = DB::getInstance();
        //         $stmt->exec("update users set status = 'restricted' where user_id = $userid ;");
        //         // $val->execute();
        //         // $val->setFetchMode(PDO::FETCH_ASSOC);
        //         // $val = new RecursiveArrayIterator($val->fetchAll()) ;
    
                
                
        //     }
    