<?php

if (isset($_POST['book-purchase-submit'])) {
    include_once "../Classes/Feedback.Class.php";    

    session_start();

    $book_selected = $_POST['book-purchase-submit'];

    for ($i=0; $i<$_SESSION["total_results"]; $i++) {
        if ($book_selected === $_SESSION["isbn_search"][$i]) {
            $index = $i;
            break;
        }
    }
    
    $_SESSION["isbn_selected"] = $_SESSION["isbn_search"][$index];
    $_SESSION["title_selected"] = $_SESSION["title_search"][$index];
    $_SESSION["author_name_selected"] = $_SESSION["author_name_search"][$index];
    $_SESSION["author_id_selected"] = $_SESSION["author_id_search"][$index];
    $_SESSION["cost_selected"] = $_SESSION["cost_search"][$index];
    $_SESSION["book_description_selected"] = $_SESSION["book_description_search"][$index];
    $_SESSION["verified_by_selected"] = $_SESSION["verified_by_search"][$index];

    $objFeedback = new Feedback();
    $objFeedback->BookReview($_SESSION["isbn_selected"]);

    $_SESSION["total_results"] = $objFeedback->total_results;

    $_SESSION["reader_name_review"] = $objFeedback->reader_name;
    $_SESSION["feedback_description"] = $objFeedback->feedback_description;
    $_SESSION["date_posted"] = $objFeedback->date_posted;

    header("Location: ../Purchase Page.php");
    exit();
}

if (isset($_POST["addtocart-submit"])) {
    include_once "../Classes/Cart.Class.php";    

    session_start();
    
    if (isset($_SESSION["ongoing_purchase"])) {

        $added = 0;
        
        foreach ($_SESSION["in_cart_isbn"] as $item) {
            if ($item == $_SESSION["isbn_selected"]) {
                $added = 1;

                break;
            }
        }

        if ($added == 0) {
            $_SESSION["in_cart_isbn"][count($_SESSION["in_cart_isbn"])] = $_SESSION["isbn_selected"];
            $_SESSION["in_cart_title"][count($_SESSION["in_cart_title"])] = $_SESSION["title_selected"];
            $_SESSION["in_cart_author_name"][count($_SESSION["in_cart_author_name"])] = $_SESSION["author_name_selected"];
            $_SESSION["in_cart_cost"][count($_SESSION["in_cart_cost"])] = $_SESSION["cost_selected"];

            $_SESSION["total_items"] = count($_SESSION["in_cart_isbn"]);
        }

        header("Location: ../Purchase Page.php?addedtocart=success");
        exit();
    }
    
    else {
        $_SESSION["ongoing_purchase"] = 1;

        $objCart = new Cart();

        $receipt_status = $objCart->GetReceiptNo();

        if ($receipt_status == 0) {
            $date = date("d");
            $month = date("m");
            $year = date("Y");

            $reciept_date = $year.$month.$date;

            $new_receipt_no = $reciept_date.'000001';
        }

        else {
            $new_receipt_no = strval((int)$receipt_status + 1);
        }

        $_SESSION["current_receipt"] = $new_receipt_no;

        $_SESSION["in_cart_isbn"] = array();
        $_SESSION["in_cart_title"] = array();
        $_SESSION["in_cart_author_name"] = array();
        $_SESSION["in_cart_cost"] = array();

        $_SESSION["in_cart_isbn"][0] = $_SESSION["isbn_selected"];
        $_SESSION["in_cart_title"][0] = $_SESSION["title_selected"];
        $_SESSION["in_cart_author_name"][0] = $_SESSION["author_name_selected"];
        $_SESSION["in_cart_cost"][0] = $_SESSION["cost_selected"];

        $_SESSION["total_items"] = count($_SESSION["in_cart_isbn"]);

        header("Location: ../Purchase Page.php?addedtocart=success");
        exit();

    }
}