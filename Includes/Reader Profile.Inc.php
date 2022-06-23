<?php

if (isset($_POST["readerinfo-submit"])) {
    include_once "../Classes/Reader.Class.php";

    session_start();

    $new_reader_name = $_POST["username"];
    $new_reader_phone = $_POST["phone"];
    $new_reader_email = $_POST["email"];

    $_SESSION["reader_name"] = $new_reader_name;
    $_SESSION["reader_email"] = $new_reader_email;
    $_SESSION["reader_phone"] = $new_reader_phone;

    $objReader = new Reader();
    $objReader->updateReaderInfo($new_reader_name, $new_reader_phone, $new_reader_email, $_SESSION["reader_id"]);

    $_SESSION["outmessage"] = "infoupdate=success";
    header("Location: ../Reader Profile.php?".$_SESSION["outmessage"]);
    exit();
}