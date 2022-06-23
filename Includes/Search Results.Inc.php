<?php

if (isset($_POST['search-submit'])) {
    include_once "../Classes/Book.Class.php";

    session_start();

    $_SESSION["search"] = $_POST["search"];

    if (!empty($_SESSION["search"])) {
        $objBook = new Book();
        $result = $objBook->SearchResult($_SESSION["search"]);

        if ($result == 1){
            $_SESSION["total_results"] = $objBook->total_results;
            $_SESSION["isbn_search"] = $objBook->isbn_search;
            $_SESSION["title_search"] = $objBook->title_search;
            $_SESSION["author_name_search"] = $objBook->author_name_search;
            $_SESSION["author_id_search"] = $objBook->author_id_search;
            $_SESSION["cost_search"] = $objBook->cost_search;
            $_SESSION["book_description_search"] = $objBook->book_description_search;
            $_SESSION["verified_by_search"] = $objBook->verified_by_search;
            
            header("Location: ../Search Results.php");
            exit();
        }

        else {
            $_SESSION["total_results"] = $objBook->total_results;

            header("Location: ../Search Results.php");
            exit();
        }
    }

    else {
        $_SESSION["outmessage"] = "error=nokeyword";

        header("Location: {$_SERVER["HTTP_REFERER"]}?".$_SESSION["outmessage"]);
        exit();
    }
}