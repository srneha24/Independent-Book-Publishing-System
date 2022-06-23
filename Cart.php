<!DOCTYPE html>

<html>

<head>

    <title> Cart </title>

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

    <div class="container page-title bg-info p-1"> CART </div>

    <br><br><br>

    <?php

    if (isset($_SESSION["total_items"])) {
        if ($_SESSION["total_items"] == 0) {
            echo '<div class="container" style="background-color:#4F40BF">
                <h2 style="background-color:#4F40BF; font-family: '."Redressed".', cursive; color: white; text-align: center">Cart Is Empty</h2>
            </div>';
        }

        else {
            echo '<form role="form" id="purchaseform" action="Includes/Cart.Inc.php" method="post">';
            for ($i=0; $i < $_SESSION["total_items"]; $i++) { 
                echo '<div class="container" style="background-color:#4F40BF">
                    <div class="form-group row p-3 text-light">
                        <div class="col-2">
                            <img src="Images/Book Covers/'.$_SESSION["in_cart_isbn"][$i].'.jpg" alt="Book Name" width="100" height="120">
                        </div>
        
                        <div class="col-8">
                            <div class="row">
                                <button type="submit" class="btn" name="book_id" style="background-color:#4F40BF; font-family: '."Redressed".', cursive; font-size: 30px; color: white;">
                                '.$_SESSION["in_cart_title"][$i].'
                                </button>
                            </div>
        
                            <div class="row">
                                <i><b> Author: </b> '.$_SESSION["in_cart_author_name"][$i].'</i>
                            </div>
        
                            <div class="row" style="font-size: medium;">
                                <b>Price:</b> Tk. '.$_SESSION["in_cart_cost"][$i].'
                            </div>
                        </div>
        
                        <div class="col-2">        
                            <div class="row d-flex justify-content-center">
                                <button class="m-5 btn btn-danger" type="submit" name="removebook-submit" id="removebook" value="'.$i.'">Remove</button>
                            </div>
                        </div>
                    </div>
            </div>';
            }
            echo '</form>';

            echo '<br><br>
            
            <div class="container form-group">
                <button class="mr-3 btn btn-block btn-info" form="purchaseform" type="submit" name="purchase-submit" id="purchase">Purchase Books</button>
            </div>';
        }
    }

    else {
        echo '<div class="container" style="background-color:#4F40BF">
            <h2 style="background-color:#4F40BF; font-family: '."Redressed".', cursive; color: white; text-align: center">Cart Is Empty</h2>
        </div>';
    }

    ?>

    <br><br><br><br><br>

</body>

</html>