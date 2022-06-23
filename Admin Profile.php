<!DOCTYPE html>

<html>

<head>

    <title> Admin Profile </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script type="module" src='JS/Navigation Bar.js'></script>
    <link rel="stylesheet" href="CSS/User.css">    
    <link rel="stylesheet" href="CSS/Page Title.css">

</head>

<body>
    
    <?php include_once "Navigation Bar.php" ?>
    
    <br><br><br><br><br><br>

    <div class="container page-title bg-info p-1"> <?php echo $_SESSION["admin_name"]; ?> </div>

    <br>

    <form role="form" action="Includes/Review Feedback.Inc.php" method="post">

        <div class="container">
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-info" type="submit" name="reviewfeedback-submit">REVIEW FEEDBACK</button>
            </div>
        </div>

    </form>

    <br>

    <form role="form" action="Includes/Verify Author.Inc.php" method="post">

        <div class="container">
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-info" type="submit" name="verifyauthor-submit">VERIFY AUTHOR</button>
            </div>
        </div>

    </form>

</body>

</html>