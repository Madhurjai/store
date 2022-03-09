<?php
    // include('config.php');
    namespace App ;
    class products extends DB
    {
        // public  $user_id;
        // public  $username;
  

        public function __construct($name , $price )
        {
            // $this->user_id = $user_id;
            $this->name = $name;
         
            $this->price = $price ;
            // $this->img = $img ;
        }

        public function addproduct($image){
            DB::getInstance()->exec("insert into products (name , price , image) values
            ('$this->name',$this->price , '$image')") ;
        }
        public function update_product($id , $name , $price){
            DB::getInstance()->exec("update products set name = '$name' , price = $price where product_id = $id ") ;
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
    