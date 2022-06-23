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
    
    <link rel="stylesheet" href="CSS/Page Title.css">

</head>

<body>
    
    <?php include_once "Navigation Bar.php" ?>
    
    <br><br><br><br><br><br>

    <div class="container page-title bg-info p-1"> BOOK INFORMATION </div>

    <br><br>

    <div class="container p-3" style="background-color: #4F40BF; color: white;">
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center">
                <div class="row">
                    <img class="ml-lg-5" src="Images/Book Covers/<?php echo $_SESSION["isbn_selected"]; ?>.jpg" alt="Book Name" width="250px" height="400px" style="border: 5px solid white;">

                    <form role="form" action="Includes/Author Book Information.Inc.php" method="post" enctype="multipart/form-data">
                        <button class="ml-lg-5 btn badge badge-pill badge-info" type="button" id="bookcover_change" name="bookcover_change" data-toggle="modal" data-target="#bookcover-change-modal" style="font-size: medium; color: white;">
                            Change Book Cover
                        </button>

                        <div class="modal fade text-dark" id="bookcover-change-modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Change Book Cover</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
        
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Select A File To Upload
                                    </div>
        
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="file" name="bookcover" class="form-control-file" accept=".jpg, .jpeg">
                                        <button type="submit" class="btn btn-info" name="bookcover-change-submit">Upload</button>
                                    </div>
        
                                </div>
                            </div>
                        </div>
                    </form>

                    <a class="ml-lg-5 text-warning" href="Includes/Download.php?download=Books/<?php echo $_SESSION["isbn_selected"]; ?>.pdf"> Download PDF </a>
                </div>
            </div>
    
            <div class="col-9 d-flex justify-content-center">
                <form role="form" action="Includes/Author Book Information.Inc.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-3 col-form-label"><strong>ISBN</strong></label>
                        <div class="col-9">
                            <i><b><?php echo $_SESSION["isbn_selected"]; ?></b></i>
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label class="col-3 col-form-label"><strong>Title</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="book_title" id="book_title" value="<?php echo $_SESSION["title_selected"]; ?>" required>
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label class="col-3 col-form-label"><strong>Publishing Year</strong></label>
                        <div class="col-9">
                            <input type="number" min="1970" max="2022" step="1" name="pub_year" value="<?php echo $_SESSION["pub_year_selected"]; ?>" required>
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label class="col-3 col-form-label"><strong>Genre</strong></label>
                        <div class="col-9">
                            <select name="category" id="category" class="custom-select" required>
                                <option value="Science Fiction" <?php if ($_SESSION["category_selected"] === 'Science Fiction') {echo 'selected';} ?>>Science Fiction</option>
                                <option value="Drama" <?php if ($_SESSION["category_selected"] === 'Drama') {echo 'selected';} ?>>Drama</option>
                                <option value="Horror" <?php if ($_SESSION["category_selected"] === 'Horror') {echo 'selected';} ?>>Horror</option>
                                <option value="Mystery" <?php if ($_SESSION["category_selected"] === 'Mystery') {echo 'selected';} ?>>Mystery</option>
                                <option value="History" <?php if ($_SESSION["category_selected"] === 'History') {echo 'selected';} ?>>History</option>
                                <option value="Adventure" <?php if ($_SESSION["category_selected"] === 'Adventure') {echo 'selected';} ?>>Adventure</option>
                                <option value="Fantasy" <?php if ($_SESSION["category_selected"] === 'Fantasy') {echo 'selected';} ?>>Fantasy</option>
                                <option value="Thriller" <?php if ($_SESSION["category_selected"] === 'Thriller') {echo 'selected';} ?>>Thriller</option>
                                <option value="Romance" <?php if ($_SESSION["category_selected"] === 'Romance') {echo 'selected';} ?>>Romance</option>
                                <option value="Young Adult" <?php if ($_SESSION["category_selected"] === 'Young Adult') {echo 'selected';} ?>>Young Adult</option>
                                <option value="Poetry" <?php if ($_SESSION["category_selected"] === 'Poetry') {echo 'selected';} ?>>Poetry</option>
                                <option value="Satire" <?php if ($_SESSION["category_selected"] === 'Satire') {echo 'selected';} ?>>Satire</option>
                                <option value="Self-help" <?php if ($_SESSION["category_selected"] === 'Self-help') {echo 'selected';} ?>>Self-help</option>
                                <option value="Autobiography" <?php if ($_SESSION["category_selected"] === 'Autobiography') {echo 'selected';} ?>>Autobiography</option>
                                <option value="Mythology" <?php if ($_SESSION["category_selected"] === 'Mythology') {echo 'selected';} ?>>Mythology</option>
								<option value="Literary Fiction" <?php if ($_SESSION["category_selected"] === 'Literary Fiction') {echo 'selected';} ?>>Literary Fiction</option>
                            </select>
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label class="col-3 col-form-label"><strong>Price</strong></label>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-1">
                                    <i>Tk.</i>
                                </div>
        
                                <div class="col-11">
                                    <input type="number" class="form-control" name="cost" id="cost" value="<?php echo $_SESSION["cost_selected"]; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label class="col-3 col-form-label"><strong>Synopsis</strong></label>
                        <div class="col-9">
                            <textarea name="book_description" id="book_description" cols = "45" rows = "3" class="form-control" required><?php echo $_SESSION["book_description_selected"]; ?></textarea>
                        </div>
                    </div>
        
                    <br><br>
        
                    <div class="form-group row" style="float: right;">
                        <button class="mr-3 btn btn-info" type="submit" name="deletebook-submit" id="delete">Delete Book</button>
                        <button class="btn btn-info" type="submit" name="bookinfo-submit" id="save">Save Changes</button>
                    </div>
        
                    <br>
                </form>
            </div>
        </div>
    </div>

    <br><br><br>

</body>

</html>