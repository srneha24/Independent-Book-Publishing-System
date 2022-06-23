<?php
if(isset($_GET['download'])){
    session_start();

    //Read the url
    $url = $_GET['download'];

    //Clear the cache
    clearstatcache();

    //Check the file path exists or not
    if(file_exists($url)) {

        $new_filename = $_SESSION["title_selected"]." - ".$_SESSION["author_name"];
        
        //Define header information
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.$new_filename.'.pdf"');
        header('Content-Length: ' . filesize($url));
        header('Pragma: public');

        //Clear system output buffer
        flush();

        //Read the size of the file
        readfile($url,true);

        //Terminate from the script
        die();
    }

    else{
        echo "File path does not exist.";
    }
}
echo "File path is not defined.";