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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playball&family=Rajdhani&display=swap" rel="stylesheet">


</head>

<body>
    
    <?php include_once "Navigation Bar.php" ?>
    
    <br><br><br><br><br><br>

    <div class="container" style="background-color:#4F40BF">
        <form role="form" action="Includes/Purchase Page.Inc.php" method="post">
            <div class="form-group row p-4 text-light">
                <div class="col-5">
                    <img src="Images/Book Covers/<?php echo $_SESSION["isbn_selected"]; ?>.jpg" alt="Book Name" width="350" height="500">
                </div>

                <div class="col-7">
                    <div class="row">
                        <span style="background-color:#4F40BF; font-family: 'Redressed', cursive; font-size: 50px; color: white;">
                        <?php echo $_SESSION["title_selected"]; ?>
                        </span>
                    </div>

                    <div class="row" style="font-size: 25px;">
                        <a href="About Author.php" class="bg-light"><i><b> Written By: </b> <?php echo $_SESSION["author_name_selected"]; ?></i></a>
                        <?php

                            if (!empty($_SESSION["verified_by_selected"])) {
                                echo '<span class="material-icons">
                                verified
                                </span>';
                            }

                        ?>
                    </div>

                    <div class="row" style="font-size: 20px;">
                        <b>Price:</b> Tk. <?php echo $_SESSION["cost_selected"]; ?>
                    </div>

                    <br><br><br><br>

                    <div class="row bg-dark text-info p-3" style="border-radius: 15 px;">
                        <blockquote class = "blockquote-reverse">
	
                            <p style="font-family: 'Playball', cursive; font-size:large">
                            
                            <?php echo $_SESSION["book_description_selected"]; ?>
                            
                            </p>
                            
                            <footer class = "blockquote-footer"> <i style="font-family: 'Rajdhani', sans-serif; font-size: medium;">Synopsis</i> </footer>
                        
                        </blockquote>
                    </div>

                    <br><br>

                    <?php

                    if (isset($_SESSION["reader_id"])) {
                        echo '<div class="row mb-2 float-right">
                            <button type="submit" class="text-light badge-pill btn btn-outline-info" name="addtocart-submit">
                                <span class="material-icons">
                                    add_shopping_cart
                                </span>
                                Add To Cart
                            </button>
                        </div>';
                    }

                    ?>
                </div>
            </div>
        </form>
    </div>

    <br>

<hr>

<div class="container">
    <h3>READER REVIEW</h3>

    <hr>

    <br>

    <?php

    if ($_SESSION["total_results"] > 0) {
        for ($i=0; $i < $_SESSION["total_results"]; $i++) { 
            echo '<div class="m-3 mb-5">
                <i><h5>'.$_SESSION["reader_name_review"][$i].'</h5></i>

                '.$_SESSION["date_posted"][$i].'

                <br><br>

                <p>
                '.$_SESSION["feedback_description"][$i].'
                </p>
            </div>';
        }
    }

    ?>

    <br><br>
</div>

</body>

</html>