<?php

if (isset($_POST['author_books-submit'])) {
    include_once "../Classes/Book.Class.php";

    session_start();

    $objBook = new Book();
    $result = $objBook->AuthorBooks($_SESSION["author_id"]);

    if ($result == 1){
        $_SESSION["total_results"] = $objBook->total_results;
        $_SESSION["isbn_author"] = $objBook->isbn_author;
        $_SESSION["title_author"] = $objBook->title_author;
        $_SESSION["pub_year_author"] = $objBook->pub_year_author;
        $_SESSION["sold_author"] = $objBook->sold_author;
        $_SESSION["category_author"] = $objBook->category_author;
        $_SESSION["cost_author"] = $objBook->cost_author;
        $_SESSION["book_description_author"] = $objBook->book_description_author;
        
        header("Location: ../Author Books.php");
        exit();

        //print_r($_SESSION["title_author"]);
    }

    else {
        $_SESSION["total_results"] = $objBook->total_results;

        header("Location: ../Author Books.php");
        exit();
    }
}