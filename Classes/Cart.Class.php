<?php

require_once "Database Connection.Class.php";

class Cart extends Dbh {
    public $total_results;
    public $title_purchase_history = array();
    public $purchase_date_purchase_history = array();
    public $cost_purchase_history = array();
    public $author_name_purchase_history = array();
    public $isbn_purchase_history = array();

    public function GetReceiptNo() {
        $date = date("d");
        $month = date("m");
        $year = date("Y");

        $reciept_date = $year.$month.$date;

        $query = "SELECT MAX(receipt_no) FROM `reader_purchase_history` WHERE receipt_no LIKE '$reciept_date%'";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();

        foreach($values as $value) {
            if (empty($value["MAX(receipt_no)"])) {
                return 0;
            }

            else {
                return $value["MAX(receipt_no)"];
            }
        }
    }

    public function setReceipt($reciept_no, $reader_id, $purchase_date) {
        $query = "INSERT INTO `reader_purchase_history`(`receipt_no`, `reader_id`, `purchase_date`) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$reciept_no, $reader_id, $purchase_date]);
    }

    public function setCart($reciept_no, $isbn) {
        $query = "INSERT INTO `cart`(`receipt_no`, `isbn`) VALUES (?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$reciept_no, $isbn]);
    }

    public function ReaderPurchaseHistory($reader_id) {
        $query = "SELECT title, cart.isbn, purchase_date, cost, author_name FROM reader_purchase_history, cart, book, author WHERE reader_purchase_history.receipt_no = cart.receipt_no AND book.author_id = author.author_id AND cart.isbn = book.isbn AND reader_id = '$reader_id' ORDER BY purchase_date DESC; ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();
        $this->total_results = count($values);

        if ($this->total_results > 0) {
            foreach($values as $value) {
                $this->title_purchase_history[] = $value['title'];
                $this->cost_purchase_history[] = $value['cost'];
                $this->author_name_purchase_history[] = $value['author_name'];
                $this->isbn_purchase_history[] = $value['isbn'];

                $date = date_create($value['purchase_date']);
                $this->purchase_date_purchase_history[] = date_format($date,"d M Y");
            }
        }
    }

}