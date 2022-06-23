<?php

if (isset($_POST['reviewfeedback-submit'])) {
    include_once "../Classes/Feedback.Class.php";    

    session_start();

    $i = $_POST['reviewfeedback-submit'];

    $date = date_create($_SESSION["date_posted_review"][$i]);
    $new_date = date_format($date,"Y-m-d");

    $Feedback = new Feedback();
    $Feedback->VerifyFeedback($_SESSION["admin_id"], $_SESSION["reader_id_review"][$i], $_SESSION["feedback_description_review"][$i], $new_date);

    $_SESSION["feedback"] = 1;

    header("Location: Review Feedback.Inc.php");
    exit();
}

elseif (isset($_POST['deletefeedback-submit'])) {
    include_once "../Classes/Feedback.Class.php";    

    session_start();

    $i = $_POST['deletefeedback-submit'];

    $date = date_create($_SESSION["date_posted_review"][$i]);
    $new_date = date_format($date,"Y-m-d");

    $Feedback = new Feedback();
    $Feedback->RemoveFeedback($_SESSION["reader_id_review"][$i], $_SESSION["feedback_description_review"][$i], $new_date);

    $_SESSION["feedback"] = 2;

    header("Location: Review Feedback.Inc.php");
    exit();
}