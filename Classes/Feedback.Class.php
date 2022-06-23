<?php

require_once "Database Connection.Class.php";

class Feedback extends Dbh {
    public $total_results;
    public $reader_name = array();
    public $feedback_description = array();
    public $date_posted = array();
    public $isbn = array();
    public $approved_by = array();
    public $reader_name_review = array();
    public $feedback_description_review = array();
    public $date_posted_review = array();
    public $title_review = array();
    public $reader_id_review = array();

    public function BookReview($isbn) {
        $query = "SELECT reader_name, feedback_description, date_posted FROM feedback, reader WHERE reader.reader_id = feedback.reader_id AND isbn = '$isbn' AND approved_by != 'NULL' ORDER BY date_posted DESC";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();
        $this->total_results = count($values);

        if ($this->total_results > 0) {
            foreach($values as $value) {
                $this->reader_name[] = $value['reader_name'];
                $this->feedback_description[] = $value['feedback_description'];

                $date = date_create($value['date_posted']);
                $this->date_posted[] = date_format($date,"d M Y");
            }
        }
    }

    public function NewReview($reader_id, $feedback_description, $date_posted, $isbn) {
        $query = "INSERT INTO `feedback`(`reader_id`, `feedback_description`, `date_posted`, `isbn`) VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$reader_id, $feedback_description, $date_posted, $isbn]);
    }

    public function getUnreviewed() {
        $query = "SELECT reader_name, feedback.reader_id, feedback_description, date_posted, title FROM feedback, reader, book WHERE reader.reader_id = feedback.reader_id AND feedback.isbn = book.isbn AND approved_by IS NULL GROUP BY title ORDER BY date_posted DESC; ";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();
        $this->total_results = count($values);

        if ($this->total_results > 0) {
            foreach($values as $value) {
                $this->reader_name_review[] = $value['reader_name'];
                $this->feedback_description_review[] = $value['feedback_description'];
                $this->title_review[] = $value['title'];
                $this->reader_id_review[] = $value['reader_id'];


                $date = date_create($value['date_posted']);
                $this->date_posted_review[] = date_format($date,"d M Y");
            }
        }
    }    

    public function VerifyFeedback($admin_id, $reader_id, $feedback_description, $date_posted) {
        $query = "UPDATE `feedback` SET `approved_by`=? WHERE reader_id = ? AND feedback_description = ? AND date_posted = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$admin_id, $reader_id, $feedback_description, $date_posted]);
    }

    public function RemoveFeedback($reader_id, $feedback_description, $date_posted) {
        $query = "DELETE FROM `feedback` WHERE reader_id = ? AND feedback_description = ? AND date_posted = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$reader_id, $feedback_description, $date_posted]);
    }
}