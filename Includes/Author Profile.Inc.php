<?php

if (isset($_POST["authorinfo-submit"])) {
    include_once "../Classes/Author.Class.php";

    session_start();

    $new_author_name = $_POST["username"];
    $new_author_phone = $_POST["phone"];
    $new_author_email = $_POST["email"];
    $new_author_address = $_POST["author-address"];
    $new_author_about = $_POST["author-about"];

    $date = date_create($_POST["dob"]);
    $new_author_dob = date_format($date,"Y-m-d");

    $_SESSION["author_name"] = $new_author_name;
    $_SESSION["author_email"] = $new_author_email;
    $_SESSION["author_phone"] = $new_author_phone;
    $_SESSION["author_address"] = $new_author_address;
    $_SESSION["dob"] = $new_author_dob;
    $_SESSION["about"] = $new_author_about;

    $objAuthor = new Author();
    $objAuthor->updateAuthorInfo($new_author_name, $new_author_phone, $new_author_email, $new_author_address, $new_author_dob, $new_author_about, $_SESSION["author_id"]);

    $_SESSION["outmessage"] = "infoupdate=success";
    header("Location: ../Author Profile.php?".$_SESSION["outmessage"]);
    exit();
}