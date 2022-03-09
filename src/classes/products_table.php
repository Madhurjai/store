<?php
namespace App ;
// include('config.php');
// include('../classes/DB.php');
class products_table extends DB
{
    // public  $user_id;
    public  $username;
    public  $email;
    public  $password;
    public  $re_pass;


    public function product_store($offset)
    {


        $stmt = DB::getInstance();
        $val = $stmt->prepare("select * from products limit $offset , 5 ;");
        $val->execute();
        $val->setFetchMode(\PDO::FETCH_ASSOC);
        $arr = array();
        foreach (new \RecursiveArrayIterator($val->fetchAll()) as $key => $v) {
            array_push($arr, $v);
            // return $v ;
        };

        // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
        // $value  = $val->fetch();
        return $arr;
    }
    public function number_of_row(){


        $stmt = DB::getInstance();
        $val = $stmt->prepare("select count(*) from products ;");
        $val->execute();
        $val->setFetchMode(\PDO::FETCH_ASSOC);
        $num = $val->fetchAll();

     
    // }
          return $num[0]['count(*)'] ;
        //  print_r($value['email']);
   
        
        }
    public function search_product($value)
    {


        $stmt = DB::getInstance();
        $val = $stmt->prepare("select * from products where name = '$value' or price = '$value' ;");
        $val->execute();
        $val->setFetchMode(\PDO::FETCH_ASSOC);

        // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
        // $value  = $val->fetch();
        $arr = array();
        foreach (new \RecursiveArrayIterator($val->fetchAll()) as $key => $v) {
            array_push($arr, $v);
            // return $v ;
        };
        return $arr;
    }
    public function order_by_price($value)
    {


        $stmt = DB::getInstance();
        $val = $stmt->prepare("select * from products where name = '$value' or price = '$value' order by price;");
        $val->execute();
        $val->setFetchMode(\PDO::FETCH_ASSOC);

        // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
        // $value  = $val->fetch();
        $arr = array();
        foreach (new \RecursiveArrayIterator($val->fetchAll()) as $key => $v) {
            array_push($arr, $v);
            // return $v ;
        };
        return $arr;
    }

    public function cart()
    {


        $stmt = DB::getInstance();
        $val = $stmt->prepare("select * from cart ;");
        $val->execute();
        $val->setFetchMode(\PDO::FETCH_ASSOC);
        $arr = array();
        foreach (new \RecursiveArrayIterator($val->fetchAll()) as $key => $v) {
            array_push($arr, $v);
        };
        return $arr;



        // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
        // $value  = $val->fetch();


    }
    public function add_to_cart($id)
    {


        $stmt = DB::getInstance();
        $val = $stmt->prepare("select * from products where product_id = $id");
        $val->execute();
        $val->setFetchMode(\PDO::FETCH_ASSOC);
        // $arr = new RecursiveArrayIterator($val->fetchAll());
        foreach (new \RecursiveArrayIterator($val->fetchAll()) as $key => $val) {

            return $val;
        }

        // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
        // $value  = $val->fetch();


    }
    public function update_to_cart($id)
    {


        $stmt = DB::getInstance();
        $val = $stmt->prepare("select * from cart where product_id = $id");
        $val->execute();
        $val->setFetchMode(\PDO::FETCH_ASSOC);
        // $arr = new RecursiveArrayIterator($val->fetchAll());
        foreach (new \RecursiveArrayIterator($val->fetchAll()) as $key => $val) {

            return $val;
        }
    }

    public function order_by_only_price()
    {


        $stmt = DB::getInstance();
        $val = $stmt->prepare("select * from products ORDER BY price ");
        $val->execute();
        $val->setFetchMode(\PDO::FETCH_ASSOC);
        // $arr = new RecursiveArrayIterator($val->fetchAll());
        $arr = array();
        foreach (new \RecursiveArrayIterator($val->fetchAll()) as $key => $v) {
            array_push($arr, $v);
        };
        return $arr;
        // $val = DB::getInstance()->query("select * from users where password = $this->password ;");
        // $value  = $val->fetch();


    }
    public function insert_into_cart($id, $name, $price, $quantity, $total)
    {
        $stmt = DB::getInstance();
        $val = $stmt->prepare("select * from cart where product_id = $id");
        $val->execute();
        $val->setFetchMode(\PDO::FETCH_ASSOC);
        $res = $val->fetchAll();
        if (count($res) == 0) {

            DB::getInstance()->exec("insert into cart (product_id, product_name , price , quantity, total) values 
                ($id, '$name' , $price , $quantity ,$total )");
        }
    }
    public function update_quantity($quant, $id)
    {
        DB::getInstance()->exec(" update cart set quantity = $quant  where product_id = $id ");
    }
    public function update_cart_quantity($id, $quant)
    {
        DB::getInstance()->exec(" update cart set quantity = $quant  where product_id = $id ");
    }
    public function del_from_cart($id)
    {
        DB::getInstance()->exec(" delete from cart  where product_id = $id ;");
    }
}
