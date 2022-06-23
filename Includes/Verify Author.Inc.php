<?php

if (isset($_POST["verifyauthor-submit"])) {
    include_once "../Classes/Author.Class.php";    

    session_start();

    $objAuthor = new Author();
    $objAuthor->getUnverified();

    $_SESSION["total_results"] = $objAuthor->total_results;
    $_SESSION["author_name_unverified"] = $objAuthor->author_name_unverified;
    $_SESSION["author_id_unverified"] = $objAuthor->author_id_unverified;

    header("Location: ../Verify Author.php");
    exit();
}