<!DOCTYPE html>

<html>

<head>

    <title> Publications </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="CSS/Page Title.css">

</head>

<body>
    
    <?php include_once "Navigation Bar.php" ?>
    
    <br><br><br><br><br><br>

    <div class="container page-title bg-info p-1"> YOUR PUBLICATIONS </div>

    <br><br><br>

    <?php

    if ($_SESSION["total_results"] == 0) {
        echo '<div class="container" style="background-color:#4F40BF">
            <h2 style="background-color:#4F40BF; font-family: '."Redressed".', cursive; color: white; text-align: center">You Have Not Published Anything Yet</h2>
        </div>';
    }

    else {
        for ($i=0; $i<$_SESSION["total_results"]; $i++) { 
            echo '<div class="container" style="background-color:#4F40BF">
                <form role="form" action="Includes/Author Book Information.Inc.php" method="post">
                    <div class="form-group row p-3 text-light">
                        <div class="col-2">
                            <img src="Images/Book Covers/'.$_SESSION["isbn_author"][$i].'.jpg" alt="Book Name" width="100" height="120">
                        </div>

                        <div class="col-10">
                            <div class="row">
                                <button type="submit" class="btn" name="author-book-submit" value='.$_SESSION["isbn_author"][$i].' style="background-color:#4F40BF; font-family: '."Redressed".', cursive; font-size: 30px; color: white;">
                                '.$_SESSION["title_author"][$i].'
                                </button>
                            </div>

                            <div class="row">
                                <i><b> Year Published: </b> '.$_SESSION["pub_year_author"][$i].'</i>
                            </div>

                            <div class="row">
                                <i><b> Copies Sold: </b> '.$_SESSION["sold_author"][$i].'</i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <br>';
        }
    }

    ?>

    <br>

</body>

</html>