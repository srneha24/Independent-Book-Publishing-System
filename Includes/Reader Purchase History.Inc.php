<?php

if (isset($_POST["reader-purchase-submit"])) {
    include_once "../Classes/Cart.Class.php";

    session_start();

    $objCart = new Cart();
    $objCart->ReaderPurchaseHistory($_SESSION["reader_id"]);

    $_SESSION["total_results"] = $objCart->total_results;

    if ($objCart->total_results > 0) {
        $_SESSION["title_purchase_history"] = $objCart->title_purchase_history;
        $_SESSION["purchase_date_purchase_history"] = $objCart->purchase_date_purchase_history;
        $_SESSION["cost_purchase_history"] = $objCart->cost_purchase_history;
        $_SESSION["author_name_purchase_history"] = $objCart->author_name_purchase_history;
        $_SESSION["isbn_purchase_history"] = $objCart->isbn_purchase_history;
    }

    header("Location: ../Reader Purchase History.php");
    exit();
}

elseif (isset($_POST["reviewbook-submit"])) {
    include_once "../Classes/Feedback.Class.php";

    session_start();

    $feedback_description = $_POST["feedback_description"];
    $isbn = $_POST["reviewbook-submit"];

    $objFeedback = new Feedback();
    $objFeedback->NewReview($_SESSION["reader_id"], $feedback_description , strval(date('Y-m-d')), $isbn);    

    header("Location: ../Reader Purchase History.php");
    exit();
}