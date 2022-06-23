<?php

if (isset($_POST['author-book-submit'])) {
    session_start();

    $book_selected = $_POST['author-book-submit'];

    for ($i=0; $i<$_SESSION["total_results"]; $i++) {
        if ($book_selected === $_SESSION["isbn_author"][$i]) {
            $index = $i;
            break;
        }
    }
    
    $_SESSION["isbn_selected"] = $_SESSION["isbn_author"][$index];
    $_SESSION["title_selected"] = $_SESSION["title_author"][$index];
    $_SESSION["pub_year_selected"] = $_SESSION["pub_year_author"][$index];
    $_SESSION["cost_selected"] = $_SESSION["cost_author"][$index];
    $_SESSION["book_description_selected"] = $_SESSION["book_description_author"][$index];
    $_SESSION["category_selected"] = $_SESSION["category_author"][$index];

    header("Location: ../Author Book Information.php");
    exit();
}

elseif (isset($_POST['bookinfo-submit'])) {
    include_once "../Classes/Book.Class.php";

    session_start();

    $objBook = new Book();

    $_SESSION["title_selected"] = $_POST["book_title"];
    $_SESSION["pub_year_selected"] = $_POST["pub_year"];
    $_SESSION["cost_selected"] = $_POST["cost"];
    $_SESSION["book_description_selected"] = $_POST["book_description"];
    $_SESSION["category_selected"] = $_POST["category"];

    $objBook->updateBookInfo($_SESSION["isbn_selected"], $_SESSION["title_selected"], $_SESSION["pub_year_selected"], $_SESSION["cost_selected"], $_SESSION["book_description_selected"], $_SESSION["category_selected"]);

    header("Location: ../Author Book Information.php");
    exit();
}

elseif (isset($_POST['bookcover-change-submit'])) {
    session_start();

    $dir = "../Images/Book Covers";

    $files = $_FILES['bookcover'];

    $exts = array('jpg', 'jpeg');

    $fileName = $files['name'];
    $fileTmpName = $files['tmp_name'];
    $fileSize = $files['size'];
    $fileError = $files['error'];
    $fileType = $files['type'];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if (in_array($fileActualExt, $exts)) {
        if ($fileError === 0) {
            $fileNameNew = $_SESSION["isbn_selected"].".".$fileActualExt;

            $fileDestination = $dir."/".$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);                        

            $_SESSION["outmessage"] = "bookcoverchange=success";
            header("Location: ../Author Book Information.php?".$_SESSION["outmessage"]);
        }

        else {
            $_SESSION["outmessage"] = "error=uploaderror";
            header("Location: ../Author Book Information.php?".$_SESSION["outmessage"]);
            exit();
        }
    }

    else{
        $_SESSION["outmessage"] = "error=wronguploadformat";
        header("Location: ../Author Book Information.php?".$$_SESSION["outmessage"]);
        exit();
    }
}

elseif (isset($_POST["deletebook-submit"])) {
    include_once "../Classes/Book.Class.php";

    session_start();

    $objBook = new Book();
    $objBook->deleteBook($_SESSION["isbn_selected"]);

    $book = "../Books/".$_SESSION["isbn_selected"].".pdf";
    $book_cover = "../Images/Book Covers/".$_SESSION["isbn_selected"].".jpg";

    unlink($book);
    unlink($book_cover);

    $_SESSION["outmessage"] = "delete=sccess";
    header("Location: ../Author Profile.php?".$$_SESSION["outmessage"]);
    exit();
}