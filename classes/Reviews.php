<?php


class Reviews extends Database {
    private $table = 'reviews';

    private $product_id;
    private $reviewer_name;
    private $text;
    private $grade;

    public function getAllReviews($product_id){
        return $this->query("SELECT * FROM `$this->table` WHERE `product_id` = '$product_id' ORDER BY `id` DESC ");
    }

    public function addReviews($data){
        $this->product_id = $data['product_id'];
        $this->reviewer_name = $data['reviewer_name'];
        $this->text = $data['text'];
        $this->grade = $data['grade'];
        $this->query("INSERT INTO `$this->table` (`product_id`, `reviewer_name`, `text`, `grade`) VALUES ('$this->product_id', '$this->reviewer_name', '$this->text', '$this->grade')");
    }

    public function getAmountReviews($product_id){
        $getAmount = $this->query("SELECT COUNT(*) as 'amount' FROM `$this->table` WHERE `product_id` = '$product_id' GROUP BY product_id");
        $amount = $getAmount->fetch_array(MYSQLI_ASSOC);
        if (empty($amount['amount'])){
            return ["amount" => "0"];
        }
        return $amount;
    }

}