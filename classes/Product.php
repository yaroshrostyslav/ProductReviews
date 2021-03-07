<?php
require_once ('Database.php');

class Product extends Database {
    private $table = 'products';

    private $name;
    private $creator_name;
    private $image_url;
    private $avg_price;

    public function getProduct($product_id){
        $product = $this->query("SELECT * FROM `$this->table` WHERE `id` = '$product_id' ");
        return $product->fetch_array(MYSQLI_ASSOC);
    }

    public function getAllProducts($sort=null, $param='ASC'){
        if ($sort == null){
            $products = $this->query("SELECT `$this->table`.`id`, `name`, `creator_name`, `image_url`, `avg_price`, `$this->table`.`date`, COUNT(`reviews`.product_id) AS 'reviews' FROM `$this->table` LEFT JOIN `reviews` ON `$this->table`.`id` = `reviews`.`product_id` GROUP BY `$this->table`.`id` ");
        }else{
            $products = $this->query("SELECT `$this->table`.`id`, `name`, `creator_name`, `image_url`, `avg_price`, `$this->table`.`date`, COUNT(`reviews`.product_id) AS 'reviews' FROM `$this->table` LEFT JOIN `reviews` ON `$this->table`.`id` = `reviews`.`product_id` GROUP BY `$this->table`.`id` ORDER BY `$sort` $param ");
        }
        return $products;
    }

    function addProduct($data){
        $this->name = $data['name'];
        $this->creator_name = $data['creator_name'];
        $this->image_url = $data['image_url'];
        $this->avg_price = $data['avg_price'];
        $this->query("INSERT INTO `$this->table` (`name`, `creator_name`, `image_url`, `avg_price`) VALUES ('$this->name', '$this->creator_name', '$this->image_url', '$this->avg_price')");
    }

}