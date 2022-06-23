<?php

require_once "Database Connection.Class.php";

class Author extends Dbh {
    public $new_author_id, $author_id, $total_results, $author_name,$author_email, $author_phone, $author_address, $author_dob, $about, $verified_by, $author_dob_about, $author_about_about, $author_about_verified_by;    
    public $author_name_unverified = array();
    public $author_id_unverified = array();

    public function checkEmail($email) {
        $query = "SELECT author_email FROM author WHERE author_email = ?";
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

    private function newAuthorID() {
        $query = "SELECT MAX(author_id) FROM author";
        $stmt = $this->connect()->query($query);

        while($row = $stmt->fetch()) {
            $max_id = $row['MAX(author_id)'];
        }

        $max_id_int = (int) substr($max_id, 1);
        $max_id_int = $max_id_int + 1;

        $this->new_author_id = "A".strval($max_id_int);
    }

    public function setAuthorInfo($author_name, $author_pwd, $author_phone, $author_email, $author_address, $dob) {
        $this->newAuthorID();

        $verified_by = "AD101";
        
        $query = "INSERT INTO `author`(`author_id`, `author_name`, `author_pwd`, `author_phone`, `author_email`, `author_address`, `author_dob`, `verified_by`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->new_author_id, $author_name, $author_pwd, $author_phone, $author_email, $author_address, $dob, $verified_by]);

        return $this->new_author_id;
    }

    public function getAuthorInfo($author_email, $author_pwd) {
        $query = "SELECT * FROM author WHERE author_email = ? AND author_pwd = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$author_email, $author_pwd]);
        $values = $stmt->fetchAll();

        if (count($values) === 1) {
            foreach($values as $value) {
                $this->author_id = $value['author_id'];
                $this->author_name = $value['author_name'];
                $this->author_email = $value['author_email'];
                $this->author_phone = $value['author_phone'];
                $this->author_address = $value['author_address'];                
                $this->author_dob = $value['author_dob'];
                $this->about = $value['about'];
                $this->verified_by = $value['verified_by'];
            }

            return 1;
        }

        else {
            return 0;
        }
    }

    public function AboutAuthor($author_id) {
        $query = "SELECT author_dob, about, verified_by FROM author WHERE author_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$author_id]);
        $values = $stmt->fetchAll();

        if (count($values) === 1) {
            foreach($values as $value) {              
                $this->author_dob_about = $value['author_dob'];
                $this->author_about_about = $value['about'];
                $this->author_about_verified_by = $value['verified_by'];
            }
        }
    }

    public function VerifyAuthor($admin_id, $author_id) {
        $query = "UPDATE `author` SET `verified_by`=? WHERE author_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$admin_id, $author_id]);
    }

    public function getUnverified() {
        $query = "SELECT `author_name`, author_id FROM `author` WHERE verified_by IS NULL";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();
        $this->total_results = count($values);

        if ($this->total_results > 0) {
            foreach($values as $value) {
                $this->author_name_unverified[] = $value['author_name'];
                $this->author_id_unverified[] = $value['author_id'];
            }

            return 1;
        }

        else {
            return 0;
        }
    }

    public function updateAuthorInfo($new_author_name, $new_author_phone, $new_author_email, $new_author_address, $new_author_dob, $new_author_about, $author_id) {
        $query = "UPDATE `author` SET `author_name`=?,`author_phone`=?,`author_email`=?,`author_address`=?,`author_dob`=?,`about`=? WHERE author_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$new_author_name, $new_author_phone, $new_author_email, $new_author_address, $new_author_dob, $new_author_about, $author_id]);

    }
}