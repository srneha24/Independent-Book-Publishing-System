<!DOCTYPE html>

<html>

<head>

    <title> Welcome - Independent Book Publishing </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Nothing+You+Could+Do&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&family=Monoton&family=Open+Sans+Condensed:ital,wght@1,300&family=Playball&family=Special+Elite&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="CSS/Homepage.css">

</head>

<body>
    
    <?php include_once "Navigation Bar.php" ?>
    
    <br><br><br><br><br><br>

    <?php
    
    if (isset($_SESSION['outmessage'])) {
        $popup = $_SESSION['outmessage'];

        if ($popup === "login=success") {
            echo '
                <div class = "alert alert-success fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>Log In Successful!</b></p>
                
                </div>';

            unset($_SESSION['outmessage']);
        }

        elseif ($popup === "error=nokeyword") {
            echo '
                <div class = "alert alert-danger fade show">

                    <a href = "#" class = "close" data-dismiss = "alert"> &times; </a>
                    <p class="text-center"><b>No Keyword Entered</b></p>
                
                </div>';

                unset($_SESSION['outmessage']);
        }
    }
    
    ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-5">

                <div class="row ml-3 p-3" style="background-color: #CfA3F7">
                    <div class="col-4">
                        <img class="rounded zoom" src="Images/Book Covers/0062073621.jpg" alt="Book Title" width="150" height="300">
                    </div>
    
                    <div class="col-8">
                        <h2 style="font-family: 'Cinzel', serif; color: #033187;">BEST SELLER OF THE MONTH</h2>
                        <br>
                        <b><i><h3 style="font-family: 'Special Elite', cursive; color: blue;">The Moving Finger</h3></i></b>
                        <br>
                        <p style="font-family: 'Open Sans Condensed', sans-serif;"> The placid village of Lymstock seems the perfect place for Jerry Burton to recuperate from his accident under the care of his sister, Joanna. But soon a series of vicious poison-pen letters destroys the village's quiet charm, eventually causing one recipient to commit suicide. The vicar, the doctor, the servants—all are on the verge of accusing one another when help arrives from an unexpected quarter. The vicar's houseguest happens to be none other than Jane Marple.</p>
                    </div>
                </div>

            </div>

            <div class="col-2">

            </div>

            <div class="col-5">

                <div class="row mr-3 p-3" style="background-color: #73DAFA;">
                    <div class="col-8">
                        <h2 style="font-family: 'Monoton', cursive; color:#5822A8;">HIGHLIGHT OF THE MONTH</h2>
                        <br>
                        <b><i><h3 style="font-family: 'Playball', cursive; color: blue;">Frankenstein; or, The Modern Prometheus</h3></i></b>
                        <br>
                        <p style="font-family: 'Open Sans Condensed', sans-serif;"> Few creatures of horror have seized readers' imaginations and held them for so long as the anguished monster of Mary Shelley's Frankenstein. The story of Victor Frankenstein's terrible creation and the havoc it caused has enthralled generations of readers and inspired countless writers of horror and suspense. Considering the novel's enduring success, it is remarkable that it began merely as a whim of Lord Byron's.
'We will each write a story,' Byron announced to his next-door neighbors, Mary Wollstonecraft Godwin and her lover Percy Bysshe Shelley. The friends were summering on the shores of Lake Geneva in Switzerland in 1816, Shelley still unknown as a poet and Byron writing the third canto of Childe Harold. When continued rains kept them confined indoors, all agreed to Byron's proposal.
The illustrious poets failed to complete their ghost stories, but Mary Shelley rose supremely to the challenge. With Frankenstein, she succeeded admirably in the task she set for herself: to create a story that, in her own words, 'would speak to the mysterious fears of our nature and awaken thrilling horror -- one to make the reader dread to look round, to curdle the blood, and quicken the beatings of the heart.'</p>
                    </div>
                    
                    <div class="col-4">
                        <img class="rounded zoom" src="Images/Book Covers/0486282112.jpg" alt="Book Title" width="150" height="300">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <br><br><br>

    <div class="container">
        <div class="row p-4" style="color: white; background-color: #000000;">
            <div class="col-lg-8">
                <h2 style="color: blue; font-family: 'Playfair Display', serif;">AUTHOR OF THE MONTH</h2>
                <br>
                <b><i><h3 style="font-family: 'Cutive Mono', monospace;">Agatha Christie</h3></i></b>
                <br>
                <p style="font-family: 'Nothing You Could Do', cursive; font-size: larger;">Agatha Christie is the best-selling author of all time. She wrote 66 crime novels and story collections, fourteen plays, and six novels under a pseudonym in Romance. Her books have sold over a billion copies in the English language and a billion in translation. According to Index Translationum, she remains the most-translated individual author, having been translated into at least 103 languages. She is the creator of two of the most enduring figures in crime literature-Hercule Poirot and Miss Jane Marple-and author of The Mousetrap, the longest-running play in the history of modern theatre.</p>
            </div>
            <div class="col-lg-4">
                <img class = "rounded-circle" src="Images/Authors/Author 1.jpg" alt="Author Name" width="250" height="400">
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>

</body>

</html>