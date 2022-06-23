<!DOCTYPE html>

<html>

<head>

<title> <?php session_start();
    echo $_SESSION["reader_name"]; ?> - Profile </title>

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
    
    <br><br><br><br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="page-title bg-info p-1"> <?php echo $_SESSION["reader_name"]; ?> </div>

                <br><br>

                <div class="row d-flex justify-content-center p-3">
                    <form role="form" action="Includes/Reader Purchase History.Inc.php" method="post">
                        <button class="btn badge badge-pill" type="submit" id="reader-purchase" name="reader-purchase-submit" style="background-color: #4F40BF; font-size: larger; color: white;">
                            <span class="material-icons">
                                shopping_bag
                            </span>
                            Purchase History
                        </button>
                    </form>
                </div>

                <hr>

                <div>
                    <form role="form" action="Includes/Reader Profile.Inc.php" method="post">                
                        <div class="form-group row">
                            <label class="col-3 col-form-label"><strong>ID</strong></label>
                            <div class="col-9">
                                <i><b><?php echo $_SESSION["reader_id"]; ?></b></i>
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label class="col-3 col-form-label"><strong>Name</strong></label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="username" id="username" maxlength = "50" value="<?php echo $_SESSION["reader_name"]; ?>" required>
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label class="col-3 col-form-label"><strong>Phone Number</strong></label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="phone" id="phone" pattern="[0-9]{11}" value="<?php echo $_SESSION["reader_phone"]; ?>" required>
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label class="col-3 col-form-label"><strong>Email Address</strong></label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION["reader_email"]; ?>" required>
                            </div>
                        </div>
        
                        <br>
        
                        <div class="form-group row" style="float: right;">
                            <button class="btn btn-info" type="submit" name="readerinfo-submit" id="save">Save Changes</button>
                        </div>
        
                        <br>
                    </form>
                </div>
            </div>

            <div class="col-2">
                <img src="Images/Authors/Author 1.jpg" class="rounded-circle p-1" width="220 px" height="220 px" style="border: 15px solid #4F40BF;">

                <br><br>

                <div class="d-flex justify-content-center" style="width: 220px;">
                    <form role="form" action="#" method="post" enctype="multipart/form-data">
                        <button class="float-left btn badge badge-pill badge-info" type="button" id="authordpselect" name="authordpselect" data-toggle="modal" data-target="#authordpselect-modal" style="font-size: medium; color: white;">
                            Change Profile Image
                        </button>

                        <div class="modal fade" id="authordpselect-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Change Profile Image</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
        
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Select A File To Upload
                                    </div>
        
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="file" name="dpselect" class="form-control-file" accept=".jpg, .jpeg">
                                        <button type="submit" class="btn btn-info" name="dp-submit">Upload</button>
                                    </div>
        
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>

</body>

</html>