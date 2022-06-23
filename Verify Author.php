<!DOCTYPE html>

<html>

<head>

    <title> Verify Author </title>

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

    <div class="container page-title bg-info p-1"> VERIFY AUTHORS </div>

    <br><br><br>

    <?php
                        
    if ($_SESSION["total_results"] == 0) {
        echo '<div class="container" style="background-color:#4F40BF">
            <h2 style="background-color:#4F40BF; font-family: '."Redressed".', cursive; color: white; text-align: center">No Verified Authors</h2>
        </div>';
    }

    else {
        for($i=0; $i<$_SESSION["total_results"]; $i++) {
            echo '<div class="container" style="background-color:#4F40BF">
                <form role="form" action="Includes/About Author.Inc.php" method="post">
                    <div class="form-group row p-3 text-dark ">
                        <button class="mb-2 btn btn-light" type="submit" name="authorname-submit" id="reviewfeedback" value="'.$i.'">'.$_SESSION["author_name_unverified"][$i].'</button>
                    </div>
                </form>
            </div>
        
            <br>';
        }                   
        
    }
    
    ?>

    

</body>

</html>