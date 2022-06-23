<?php    

session_start();

if (isset($_POST['reviewfeedback-submit']) || (isset($_SESSION["feedback"]))) {
    include_once "../Classes/Feedback.Class.php";

    $objFeedback = new Feedback();
    $objFeedback->getUnreviewed();

    $_SESSION["total_results"] = $objFeedback->total_results;

    $_SESSION["reader_name_review"] = $objFeedback->reader_name_review;
    $_SESSION["feedback_description_review"] = $objFeedback->feedback_description_review;
    $_SESSION["title_review"] = $objFeedback->title_review;
    $_SESSION["date_posted_review"] = $objFeedback->date_posted_review;
    $_SESSION["reader_id_review"] = $objFeedback->reader_id_review;

    if ($_SESSION["feedback"] == 1) {
        unset($_SESSION["feedback"]);

        header("Location: ../Review Feedback.php?feedback=posted");
        exit();
    }

    elseif ($_SESSION["feedback"] == 2) {
        unset($_SESSION["feedback"]);

        header("Location: ../Review Feedback.php?feedback=removed");
        exit();
    }

    else {
        header("Location: ../Review Feedback.php");
        exit();
    }

    
}