<?php

if (isset($_POST['verifyauthor-submit'])) {
    include_once "../Classes/Author.Class.php";    

    session_start();

    $objAuthor = new Author();
    $objAuthor->VerifyAuthor($_SESSION["admin_id"], $_SESSION["author_id_selected"]);

    header("Location: ../About Author.php");
    exit();
}

elseif (isset($_POST["authorname-submit"])) {
    include_once "../Classes/Author.Class.php";    

    session_start();

    $i = $_POST["authorname-submit"];

    $_SESSION["author_id_selected"] = $_SESSION["author_id_unverified"][$i];
    $_SESSION["author_name_selected"] = $_SESSION["author_name_unverified"][$i];

    header("Location: ../About Author.php");
    exit();
}