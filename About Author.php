<!DOCTYPE html>

<html>

<head>

    <title> Book Title </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" href="CSS/Page Title.css">

</head>

<body>
    
    <?php include_once "Navigation Bar.php" ?>

    <?php
    include_once "Classes/Author.Class.php"; 

    $objAuthor = new Author();
    $objAuthor->AboutAuthor($_SESSION["author_id_selected"]);

    $_SESSION["author_dob_selected"] = $objAuthor->author_dob_about;
    $_SESSION["author_about_selected"] = $objAuthor->author_about_about;
    $_SESSION["author_verified_by_selected"] = $objAuthor->author_about_verified_by;

    ?>
    
    <br><br><br><br><br><br>

    <div class="container page-title bg-info p-1"> AUTHOR INFORMATION </div>

    <br><br>

    <div class="container p-3" style="background-color: #4F40BF; color: white;">
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center">
                <div class="row">
                    <img class="ml-lg-5" src="Images/Authors/Author 1.jpg" alt="Book Name" width="250px" height="400px" style="border: 5px solid white;">
                </div>
            </div>
    
            <div class="col-9">
                <form role="form" action="Includes/About Author.Inc.php" method="post">
                    <div class="form-group row ml-2">
                        <h3><?php echo $_SESSION["author_name_selected"]; ?></h3>
                    </div>
        
                    <div class="form-group row ml-2">
                        <label class="col-2 col-form-label"><strong>Date of Birth:</strong></label>
                        <label class="col-10 col-form-label"><i><?php echo $_SESSION["author_dob_selected"]; ?></i></label>
                    </div>
        
                    <div class="form-group row ml-2">
                        <label class="col-2 col-form-label"><strong>About:</strong></label>
                        <label class="col-10 col-form-label"><i><?php echo $_SESSION["author_about_selected"]; ?></i></label>
                    </div>

                    <?php

                    if (isset($_SESSION["admin_id"]) && empty($_SESSION["author_verified_by_selected"])) {
                        echo '<div class="form-group row mr-5" style="float: right;">
                            <button class="btn btn-info" type="submit" name="verifyauthor-submit" id="save">Verify Author</button>
                        </div>';
                    }

                    ?>
        
                    <br>
                </form>
            </div>
        </div>
    </div>

    <br><br><br>

</body>

</html>