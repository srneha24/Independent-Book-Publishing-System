<?php

function CreateZip() {

    $zip_file = "../Books/Temp".$_SESSION["current_receipt"].".zip";
    touch($zip_file);

    $zip = new ZipArchive;
    $this_zip = $zip->open($zip_file);

    if ($this_zip) {
        $folder = opendir("../Books");

        if ($folder) {
            for ($i=0; $i < $_SESSION["total_items"]; $i++) { 
                
                $file_with_path = "../Books/".$_SESSION["in_cart_isbn"][$i].".pdf";
                $name = $_SESSION["in_cart_title"][$i]." - ".$_SESSION["in_cart_author_name"][$i].".pdf";

                $zip->addfile($file_with_path, $name);
            }
        }
    }
}

function DownloadZip() {
    session_start();

    $zip_file = "../Books/Temp".$_SESSION["current_receipt"].".zip";

    $demo_name = $_SESSION["current_receipt"];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.$demo_name.'.zip"');
    header('Content-Length: ' . filesize($zip_file));
    header('Pragma: public');

    //Clear system output buffer
    flush();

    //Read the size of the file
    readfile($zip_file,true);
    unlink($zip_file);

    if(!file_exists($zip_file)) {        

        unset($_SESSION["current_receipt"]);
        unset($_SESSION["in_cart_isbn"]);
        unset($_SESSION["in_cart_title"]);
        unset($_SESSION["in_cart_author_name"]);
        unset($_SESSION["in_cart_cost"]);
        unset($_SESSION["ongoing_purchase"]);
        unset($_SESSION["total_items"]);

        header("Location: ../Cart.php?purchase=success");
        exit();
    }

    
}

if (isset($_POST["removebook-submit"])) {
    session_start();

    $remove_book = (int)$_POST["removebook-submit"];

    array_splice($_SESSION["in_cart_isbn"], $remove_book, 1);
    array_splice($_SESSION["in_cart_title"], $remove_book, 1);
    array_splice($_SESSION["in_cart_author_name"], $remove_book, 1);
    array_splice($_SESSION["in_cart_cost"], $remove_book, 1);

    $_SESSION["total_items"] = count($_SESSION["in_cart_isbn"]);

    header("Location: ../Cart.php?bookremove=success");
    exit();
}

elseif (isset($_POST["purchase-submit"])) {
    include_once "../Classes/Cart.Class.php";    

    session_start();

    $objCart = new Cart();
    $objCart->setReceipt($_SESSION["current_receipt"], $_SESSION["reader_id"], strval(date('Y-m-d')));

    for ($i=0; $i < $_SESSION["total_items"]; $i++) { 
        $objCart->setCart($_SESSION["current_receipt"], $_SESSION["in_cart_isbn"][$i]);
    }

    CreateZip();
    $zip_file = "../Books/Temp".$_SESSION["current_receipt"].".zip";

    if(file_exists($zip_file)) {        

        DownloadZip();
    }
}