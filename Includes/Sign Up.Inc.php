<?php

if (isset($_POST['signup-submit'])) {

    include_once "../Classes/Author.Class.php";
    include_once "../Classes/Reader.Class.php";

    session_start();

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $conpwd = $_POST["conpwd"];*
    $author_address = $_POST["author-address"];

    $date = date_create($_POST["dob"]);
    $dob = date_format($date,"Y-m-d");

    if ($pwd !== $conpwd) { 
        $_SESSION["outmessage"] = "error=PasswordMismatch";

        header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        if (empty($dob)) {

            $objReader = new Reader();
            $checkEmail = $objReader->checkEmail($email);

            if ($checkEmail === 0) {
                $_SESSION["outmessage"] = "error=Email-Exists";
                
                header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);

                exit();
            }

            else {
                $_SESSION["new_id"] = $objReader->setReaderInfo($name, $pwd, $phone, $email);

                $_SESSION["outmessage"] = "usersignup=success";
                header("Location: ../Homepage.php?".$_SESSION["outmessage"]);
                
                exit();
            }

        }

        else {

            $objAuthor = new Author();
            $checkEmail = $objAuthor->checkEmail($email);

            if ($checkEmail === 0) {
                $_SESSION["outmessage"] = "error=Email-Exists";
                
                header("Location: ../Sign Up.php?".$_SESSION["outmessage"]);

                exit();
            }

            else {
                $_SESSION["new_id"] = $objAuthor->setAuthorInfo($name, $pwd, $phone, $email, $address, $dob);

                $_SESSION["outmessage"] = "usersignup=success";
                header("Location: ../Homepage.php?".$_SESSION["outmessage"]);
                
                exit();
            }

        }
        
        
    }
}

else {
    header("Location: ../Sign Up.php");
    exit();
}