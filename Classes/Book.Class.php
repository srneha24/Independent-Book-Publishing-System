<?php

require_once "Database Connection.Class.php";

class Book extends Dbh {
    public $isbn, $title, $author_id, $pub_year, $cost, $book_description, $category, $sold;
    public $isbn_search = array();
    public $title_search = array();
    public $author_name_search = array();
    public $author_id_search = array();
    public $verified_by_search = array();
    public $cost_search = array();
    public $book_description_search = array();
    public $pub_year_search = array();
    public $sold_search = array();
    public $isbn_author = array();
    public $title_author = array();
    public $pub_year_author = array();
    public $sold_author = array();
    public $category_author = array();
    public $cost_author = array();
    public $book_description_author = array();

    public function SearchResult($search) {
        $query = "SELECT isbn, author_name, author.author_id, title, cost, book_description, verified_by FROM author, book WHERE (author_name LIKE '%$search%' OR title LIKE '%$search%') AND book.author_id = author.author_id ORDER BY title ASC";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();
        $this->total_results = count($values);

        if ($this->total_results > 0) {
            foreach($values as $value) {
                $this->isbn_search[] = $value['isbn'];
                $this->title_search[] = $value['title'];
                $this->author_name_search[] = $value['author_name'];
                $this->author_id_search[] = $value['author_id'];
                $this->cost_search[] = $value['cost'];
                $this->book_description_search[] = $value['book_description'];
                $this->verified_by_search[] = $value['verified_by'];
            }

            return 1;
        }

        else {
            return 0;
        }
    }

    public function AuthorBooks($author_id) {
        $query = "SELECT isbn, title, pub_year, sold, category, cost, book_description FROM book, author WHERE author.author_id = '$author_id' AND book.author_id = author.author_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll();
        $this->total_results = count($values);

        if ($this->total_results > 0) {
            foreach($values as $value) {
                $this->isbn_author[] = $value['isbn'];
                $this->title_author[] = $value['title'];
                $this->pub_year_author[] = $value['pub_year'];
                $this->sold_author[] = $value['sold'];
                $this->category_author[] = $value['category'];
                $this->cost_author[] = $value['cost'];
                $this->book_description_author[] = $value['book_description'];
            }

            return 1;
        }

        else {
            return 0;
        }
    }

    public function checkBook($isbn) {
        $query = "SELECT isbn FROM book WHERE isbn = ?";
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

    public function setBookInfo($isbn, $title, $pub_year, $cost, $book_description, $category, $author_id) {        
        $query = "INSERT INTO `book`(`isbn`, `title`, `pub_year`, `cost`, `book_description`, `category`, `author_id`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$isbn, $title, $pub_year, $cost, $book_description, $category, $author_id]);
    }

    public function updateBookInfo($isbn, $title, $pub_year, $cost, $book_description, $category) {
        $query = "UPDATE `book` SET `title`=?,`pub_year`=?,`cost`=?,`book_description`=?,`category`=? WHERE isbn = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$title, $pub_year, $cost, $book_description, $category, $isbn]);
    }

    public function deleteBook($isbn) {
        $query = "DELETE FROM book WHERE isbn = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$isbn]);
    }
}