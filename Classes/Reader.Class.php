<?php

require_once "Database Connection.Class.php";

class reader extends Dbh {
    public $new_reader_id, $reader_id, $reader_name, $reader_email, $reader_phone, $reader_address;

    public function checkEmail($email) {
        $query = "SELECT reader_email FROM reader WHERE reader_email = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$email]);
        $values = $stmt->fetchAll();

        if (count($values) > 0) {
            return 0;
        }
        else {
            return 1;
        }
    }

    private function newReaderID() {
        $query = "SELECT MAX(reader_id) FROM reader";
        $stmt = $this->connect()->query($query);

        while($row = $stmt->fetch()) {
            $max_id = $row['MAX(reader_id)'];
        }

        $max_id_int = (int) substr($max_id, 1);
        $max_id_int = $max_id_int + 1;

        $this->new_reader_id = "R".strval($max_id_int);
    }

    public function setReaderInfo($reader_name, $reader_pwd, $reader_phone, $reader_email) {
        $this->newReaderID();
        
        $query = "INSERT INTO `reader`(`reader_id`, `reader_name`, `reader_pwd`, `reader_phone`, `reader_email`) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->new_reader_id, $reader_name, $reader_pwd, $reader_phone, $reader_email]);

        return $this->new_reader_id;
    }

    public function getReaderInfo($reader_email, $reader_pwd) {
        $query = "SELECT * FROM reader WHERE reader_email = ? AND reader_pwd = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$reader_email, $reader_pwd]);
        $values = $stmt->fetchAll();

        if (count($values) === 1) {
            foreach($values as $value) {
                $this->reader_id = $value['reader_id'];
                $this->reader_name = $value['reader_name'];
                $this->reader_email = $value['reader_email'];
                $this->reader_phone = $value['reader_phone'];
            }

            return 1;
        }

        else {
            return 0;
        }
    }

    public function updateReaderInfo($new_reader_name, $new_reader_phone, $new_reader_email, $reader_id) {
        $query = "UPDATE `reader` SET `reader_name`=?,`reader_phone`=?,`reader_email`=? WHERE reader_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$new_reader_name, $new_reader_phone, $new_reader_email, $reader_id]);

    }
}