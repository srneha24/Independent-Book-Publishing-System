<!DOCTYPE html>

<html>

<head>

    <title> Sign Up </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="CSS/User.css">    
    <link rel="stylesheet" href="CSS/Page Title.css">

    <script type="text/javascript">
        $(function() {
            $(userAuthor).change(function() {
                var x = this.checked;
                var dob = document.getElementById("dobDiv");
                var address = document.getElementById("addressDiv");

                if (x) {
                    dob.style.display ='flex';
                    address.style.display = 'flex';
                }

                else {
                    dob.style.display ='none';
                    address.style.display = 'none';
                }
            });
        });
    </script>

</head>

<body>
    
    <?php include_once "Navigation Bar.php" ?>
    
    <br><br><br><br><br><br>

    <div class="container page-title bg-info p-1"> SIGN UP </div>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "error=PasswordMismatch") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Passwords Do Not Match</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=Email/Phone-Exists") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Phone/Email Address Already Exists</b></p>
                
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

        elseif ($popup === "error=InvalidID") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Employee ID Does Not Exist!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "custsignup=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Sign Up Successful. Your User ID is '. $_SESSION["new_cust_id"] .'</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "empsignup=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Sign Up Successful!</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=RegComplete") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Employee Registration Previously Completed</b></p>
                
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

            <form role="form" action="Includes/Sign Up.Inc.php" method="post">
                <div class="form-group row">
                    <input type="text" class="form-control" name="name" maxlength = "20" placeholder="Full Name" required>
                </div>

                <div class="form-group row">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                </div>

                <div class="form-group row">
                    <input type="tel" class="form-control" name="phone" pattern="[0-9]{11}" placeholder="Phone Number" required>
                </div>

                <div class="form-group row">
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                </div>

                <div class="form-group row">
                    <input type="password" class="form-control" name="conf-pwd" placeholder="Confirm Password" required>
                </div>

                <div class="form-group row">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="userAuthor" name="userAuthor" value="yes">
                        <label class="custom-control-label" for="userAuthor">I Am An Author</label>
                    </div>
                </div>

                <div class="form-group row author-input" id="dobDiv">
                    <label class="col-5 col-form-label"><strong>Date Of Birth:</strong></label>
                    <div class="col-7">
                        <input type="date" name="dob" id="dob" class="form-control" min="1970-01-01" max="2004-12-31" required>
                    </div>
                </div>

                <div class="form-group row author-input" id="addressDiv">
                    <label class="col-5 col-form-label"><strong>Address:</strong></label>
                    <div class="col-7">
                        <textarea name="author-address" id="author-address" cols = "45" rows = "2" class="form-control" required> </textarea>
                    </div>
                </div>

                <br>

                <button class="btn btn-block btn-info" type="submit" name="signup-submit">Sign Up</button>
            </form>
        </div>
    </div>

</body>

</html>