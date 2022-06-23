<!DOCTYPE html>

<html>

<head>

    <title> Search Results </title>

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

    <div class="container page-title bg-info p-1"> SEARCH RESULTS </div>

    <br><br><br>

    <?php
                        
    if ($_SESSION["total_results"] == 0) {
        echo '<div class="container" style="background-color:#4F40BF">
            <h2 style="background-color:#4F40BF; font-family: '."Redressed".', cursive; color: white; text-align: center">No Results</h2>
        </div>';
    }

    else {
        for($i=0; $i<$_SESSION["total_results"]; $i++) {
            echo '<div class="container" style="background-color:#4F40BF">
                <form role="form" action="Includes/Purchase Page.Inc.php" method="post">
                    <div class="form-group row p-3 text-light">
                        <div class="col-2">
                            <img src="Images/Book Covers/'.$_SESSION["isbn_search"][$i].'.jpg" alt="Book Name" width="100" height="120">
                        </div>
        
                        <div class="col-10">
                            <div class="row">
                                <button type="submit" class="btn" name="book-purchase-submit" value="'.$_SESSION["isbn_search"][$i].'" style="background-color:#4F40BF; font-family: '."Redressed".', cursive; font-size: 30px; color: white;">
                                    '.$_SESSION["title_search"][$i].'
                                </button>
                            </div>
        
                            <div class="row">
                                <i><b> Author: </b> '.$_SESSION["author_name_search"][$i].'</i>
                            </div>
        
                            <div class="row" style="font-size: medium;">
                                <b>Price:</b> Tk. '.$_SESSION["cost_search"][$i].'
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