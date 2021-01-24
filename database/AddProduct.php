<?php

class AddProduct{

    public $db=null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db=$db;
    }

    public function getData($table='products')
    {
   $result= $this->db->con->query("SELECT * FROM {$table}");

   $resultArray=array();

   //fetch product 
   while($item=mysqli_fetch_array($result,MYSQLI_ASSOC)){
       $resultArray[]=$item;
   }

   return $resultArray;

    }

    
    // get product using item id
    public function getProduct($item_id = null, $table= 'products'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE id={$item_id}");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }


}

?>