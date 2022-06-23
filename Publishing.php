<!DOCTYPE html>

<html>

<head>

    <title> Publish New Book </title>

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

    <div class="container page-title bg-info p-1"> PUBLISH NEW BOOK </div>

    <br><br>

    <div class="container p-lg-5" style="background-color: #4F40BF; color: white;">
        <form role="form" action="Includes/Publishing.Inc.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-3 col-form-label"><strong>Upload Book</strong></label>
                <div class="col-9">
                    <input type="file" name="uploadpdf" class="form-control-file" accept=".pdf" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label"><strong>ISBN</strong></label>
                <div class="col-9">
                    <input type="text" class="form-control" name="isbn" id="isbn" maxlength = "17" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label"><strong>Title</strong></label>
                <div class="col-9">
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label"><strong>Publishing Year</strong></label>
                <div class="col-9">
                    <input type="number" min="1970" max="2022" step="1" value="2016" name="pub_year"  required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label"><strong>Genre</strong></label>
                <div class="col-9">
                    <select name="category" id="category" class="custom-select" required>
                        <option value="Science Fiction">Science Fiction</option>
                        <option value="Drama">Drama</option>
                        <option value="Horror">Horror</option>
                        <option value="Mystery">Mystery</option>
                        <option value="History">History</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Romance">Romance</option>
                        <option value="Young Adult">Young Adult</option>
                        <option value="Poetry">Poetry</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Self-help">Self-help</option>
                        <option value="Autobiography">Autobiography</option>
                        <option value="Mythology">Mythology</option>
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
                            <input type="number" class="form-control" name="cost" id="cost" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label"><strong>Synopsis</strong></label>
                <div class="col-9">
                    <textarea name="book_description" id="author-about" cols = "45" rows = "3" class="form-control" required> </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label"><strong>Book Cover</strong></label>
                <div class="col-9">
                    <input type="file" name="bookcover" class="form-control-file" accept=".jpg, .jpeg" required>
                </div>
            </div>

            <br><br>

            <div class="form-group row">
                <button class="btn btn-block btn-info" type="submit" name="publish-submit" id="publish">
                    <span class="material-icons">
                        upload_file
                    </span>
                    <b>Publish</b>
                </button>
            </div>

            <br>
        </form>
    </div>

    <br><br><br>

</body>

</html>