<!DOCTYPE html>

<html>

<head>

    <title> Log In </title>

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

    <div class="container page-title bg-info p-1"> LOG IN </div>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "error=incorrectentry") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Incorrect Data Entered. Please Try Again.</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=emptyfields") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Necessary Fields Empty!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <br>

    <div class="user-card container">
        <div class="center p-5">
            <div class="d-flex justify-content-center">                
                <span class="material-icons" style="font-size: 80px;">person</span>
            </div>

            <br><br>

            <form role="form" action="Includes/Log In.Inc.php" method="post">
                <div class="form-group row">
                    <input type="email" class="form-control" name="login-email" maxlength = "20" placeholder="Email Address" required>
                </div>

                <div class="form-group row">
                    <input type="password" class="form-control" name="login-pwd" placeholder="Password" required>
                </div>

                <br><br>

                <button class="btn btn-block btn-info" type="submit" name="login-submit">Log In</button>
            </form>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="d-flex justify-content-center">
            <button class="btn btn-outline-info" type="button" name="register" onclick="document.location='Sign Up.php'">Create New Account</button>
        </div>
    </div>

</body>

</html>