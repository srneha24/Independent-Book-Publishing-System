<?php

if (isset($_POST['login-submit'])) {
    include_once "../Classes/Author.Class.php";
    include_once "../Classes/Reader.Class.php";
    include_once "../Classes/Admin.Class.php";

    session_start();

    $user_email = $_POST["login-email"];
    $user_pwd = $_POST["login-pwd"];

    if (empty($user_email) || empty($user_pwd)) {
        $_SESSION["outmessage"] = "error=emptyfields";

        header("Location: ../Log In.php?".$_SESSION["outmessage"]);
        exit();
    }

    else {
        $objAuthor = new Author();
        $result = $objAuthor->getAuthorInfo($user_email, $user_pwd);

        if ($result === 1) {
            $_SESSION["author_id"] = $objAuthor->author_id;
            $_SESSION["author_name"] = $objAuthor->author_name;
            $_SESSION["author_email"] = $objAuthor->author_email;
            $_SESSION["author_phone"] = $objAuthor->author_phone;
            $_SESSION["author_address"] = $objAuthor->author_address;
            $_SESSION["dob"] = $objAuthor->author_dob;
            $_SESSION["about"] = $objAuthor->about;
            $_SESSION["verified_by"] = $objAuthor->verified_by;

            $_SESSION["outmessage"] = "login=success";
            header("Location: ../Homepage.php?".$_SESSION["outmessage"]);
            exit();
        }

        else {
            $objReader = new Reader();
            $result = $objReader->getReaderInfo($user_email, $user_pwd);

            if ($result === 1) {
                $_SESSION["reader_id"] = $objReader->reader_id;
                $_SESSION["reader_name"] = $objReader->reader_name;
                $_SESSION["reader_email"] = $objReader->reader_email;
                $_SESSION["reader_phone"] = $objReader->reader_phone;
    
                $_SESSION["outmessage"] = "login=success";
                header("Location: ../Homepage.php?".$_SESSION["outmessage"]);
                exit();
            }

            else {
                $objAdmin = new Admin();
                $result = $objAdmin->getAdminInfo($user_email, $user_pwd);

                if ($result === 1) {
                    $_SESSION["admin_id"] = $objAdmin->admin_id;
                    $_SESSION["admin_name"] = $objAdmin->admin_name;
                    $_SESSION["admin_email"] = $objAdmin->admin_email;
                    $_SESSION["admin_phone"] = $objAdmin->admin_phone;
        
                    $_SESSION["outmessage"] = "login=success";
                    header("Location: ../Homepage.php?".$_SESSION["outmessage"]);
                    exit();
                }

                else {
                    $_SESSION["outmessage"] = "error=incorrectentry";
    
                    header("Location: ../Log In.php?".$_SESSION["outmessage"]);
                    exit();
    
                } 
            }  
            
            
        }
        
    }
}