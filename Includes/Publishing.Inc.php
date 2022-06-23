<?php

if (isset($_POST['publish-submit'])) {

    include_once "../Classes/Book.Class.php";

    session_start();

    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $pub_year = $_POST["pub_year"];
    $category = $_POST["category"];
    $cost = $_POST["cost"];
    $book_description = $_POST["book_description"];

    $objBook = new Book();
    $checkBook = $objBook->checkBook($isbn);

    if ($checkBook === 0) {
        $_SESSION["outmessage"] = "error=Book-Exists";
        
        header("Location: ../Publishing.php?".$_SESSION["outmessage"]);

        exit();
    }

    else {
        $objBook->setBookInfo($isbn, $title, $pub_year, $cost, $book_description, $category, $_SESSION["author_id"]);

        $dir = "../Books";

        $files_pdf = $_FILES['uploadpdf'];

        $exts = array('pdf');

        $fileName = $files_pdf['name'];
        $fileTmpName = $files_pdf['tmp_name'];
        $fileSize = $files_pdf['size'];
        $fileError = $files_pdf['error'];
        $fileType = $files_pdf['type'];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if (in_array($fileActualExt, $exts)) {
            if ($fileError === 0) {
                $fileNameNew = $isbn.".".$fileActualExt;

                $fileDestination = $dir."/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                $dir = "../Images/Book Covers";

                $files_cover = $_FILES['bookcover'];

                $exts = array('jpg', 'jpeg');

                $fileName = $files_cover['name'];
                $fileTmpName = $files_cover['tmp_name'];
                $fileSize = $files_cover['size'];
                $fileError = $files_cover['error'];
                $fileType = $files_cover['type'];

                $fileExt = explode(".", $fileName);
                $fileActualExt = strtolower(end($fileExt));

                if (in_array($fileActualExt, $exts)) {
                    if ($fileError === 0) {
                        $fileNameNew = $isbn.".".$fileActualExt;

                        $fileDestination = $dir."/".$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        
                        $_SESSION["isbn_selected"] = $isbn;
                        $_SESSION["title_selected"] = $title;
                        $_SESSION["pub_year_selected"] = $pub_year;
                        $_SESSION["cost_selected"] = $cost;
                        $_SESSION["book_description_selected"] = $book_description;
                        $_SESSION["category_selected"] = $category;

                        $_SESSION["outmessage"] = "publish=success";
                        header("Location: ../Author Book Information.php?".$_SESSION["outmessage"]);
                    }

                    else {
                        $_SESSION["outmessage"] = "error=uploaderror";
                        header("Location: ../Publishing.php?".$_SESSION["outmessage"]);
                        exit();
                    }
                }

                else{
                    $_SESSION["outmessage"] = "error=wronguploadformat";
                    header("Location: ../Publishing.php?".$_SESSION["outmessage"]);
                    exit();
                }
            }

            else {
                $_SESSION["outmessage"] = "error=uploaderror";
                header("Location: ../Publishing.php?".$_SESSION["outmessage"]);
                exit();
            }
        }

        else{
            $_SESSION["outmessage"] = "error=wronguploadformat";
            header("Location: ../Publishing.php?".$_SESSION["outmessage"]);
            exit();
        }
        
        exit();
    }
}

else {
    header("Location: ../Publishing.php");
    exit();
}