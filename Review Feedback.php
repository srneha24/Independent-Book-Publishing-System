<!DOCTYPE html>

<html>

<head>

    <title> Review Feedback </title>

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

    <div class="container page-title bg-info p-1"> REVIEW FEEDBACKS </div>

    <br><br><br>

    <?php
                        
    if ($_SESSION["total_results"] == 0) {
        echo '<div class="container" style="background-color:#4F40BF">
            <h2 style="background-color:#4F40BF; font-family: '."Redressed".', cursive; color: white; text-align: center">No Unreviewed Feedback</h2>
        </div>';
    }

    else {
        for($i=0; $i<$_SESSION["total_results"]; $i++) {
            echo '<div class="container" style="background-color:#4F40BF">
                <form role="form" action="Includes/Feedback.Inc.php" method="post">
                    <div class="form-group row p-3 text-light">
                        <div class="col-2">
                            <h4>'; 

                            if ($i > 0) {
                                if ($_SESSION["date_posted_review"][$i] == $_SESSION["date_posted_review"][$i - 1]) {
                                    echo " ";
                                }

                                else {
                                    echo $_SESSION["date_posted_review"][$i];
                                }
                            }

                            else {
                                echo $_SESSION["date_posted_review"][$i];
                            }
                            
                            echo'</h4>
                        </div>
            
                        <div class="col-8">
                            <div class="row">
                                <span style="background-color:#4F40BF; font-family: '."Redressed".', cursive; font-size: 30px; color: white;">'.$_SESSION["title_review"][$i].'</span>
                            </div>
            
                            <div class="row">
                                <i><b> Reader: </b> '.$_SESSION["reader_name_review"][$i].'</i>
                            </div>
            
                            <div class="row" style="font-size: medium;">
                                <b>Feedback:</b> '.$_SESSION["feedback_description_review"][$i].'
                            </div>
                        </div>

                        <div class="col-2">
                            <button class="mb-2 btn btn-info" type="submit" name="reviewfeedback-submit" id="reviewfeedback" value="'.$i.'">Add To Feedback</button>
                            <button class="btn btn-info" type="submit" name="deletefeedback-submit" id="deletefeedback" value="'.$i.'">Remove Feedback</button>
                        </div>
                    </div>
                </form>
            </div>
        
            <br>';
        }                   
        
    }
    
    ?>

    

</body>

</html>