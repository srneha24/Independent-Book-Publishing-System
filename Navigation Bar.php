<?php

    session_start();

?>

<style> 

    nav {
        max-height: 75px;
    }

</style>

<nav class="navbar navbar-expand bg-info navbar-dark fixed-top">
    <div class="container-fluid m-5">
        <div class="navbar-header">
            <a class="navbar-brand" href="Homepage.php" data-toggle="tooltip" data-placement="bottom" title="Home">
                <img class = "rounded" src="Images/System Images/Logo.png" alt="Independent Book Publishing System" width="250" height="50">
            </a>
        </div>

        <div class="d-flex justify-content-center">
            <form role="form" action="Includes/Search Results.Inc.php" method="post">
                <input type="text" name="search" style="background-color:#4F40BF; color:white" size=50 placeholder="Search" required>
                <button type="submit" name="search-submit" class="btn bg-info" style="background-color:#4F40BF">
                    <span class="material-icons" style="color:#4F40BF">search</span> 
                </button>
            </form>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <?php
                if (isset($_SESSION["reader_id"])) {
                    echo '<li class="nav-item">
                        <form role="form" action="#" method="post">
                            <!-- <button type="submit" name="cart" id="cart" class="btn bg-info">
                                <span class="material-icons" style="color:#4F40BF">shopping_cart</span>  
                            </button> -->
                            <a class="nav-link" href="Cart.php" data-toggle="tooltip" data-placement="bottom" title="Cart">
                                <span class="material-icons" style="color:#4F40BF">shopping_cart</span>  
                            </a>
                        </form>
                    </li>';
                }

                if (isset($_SESSION["author_id"]) || isset($_SESSION["reader_id"]) || isset($_SESSION["admin_id"])) {
                    echo '<li class="nav-item">';
                        if (isset($_SESSION["author_id"])) {
                            echo '<a class="nav-link" href="Author Profile.php" data-toggle="tooltip" data-placement="bottom" title="Profile">
                                <span class="material-icons" style="color:#4F40BF">account_circle</span>
                            </a>';
                        }

                        elseif (isset($_SESSION["admin_id"])) {
                            echo '<a class="nav-link" href="Admin Profile.php" data-toggle="tooltip" data-placement="bottom" title="Profile">
                                <span class="material-icons" style="color:#4F40BF">account_circle</span>
                            </a>';
                        }

                        else {
                                echo '<a class="nav-link" href="Reader Profile.php" data-toggle="tooltip" data-placement="bottom" title="Profile">
                                <span class="material-icons" style="color:#4F40BF">account_circle</span>
                            </a>';
                        }
                    echo '</li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="Includes/Log Out.Inc.php" data-toggle="tooltip" data-placement="bottom" title="Log Out">
                            <span class="material-icons" style="color:#4F40BF">logout</span>
                        </a>
                    </li>';
                }

                else {
                    echo '<li class="nav-item">
                        <a class="nav-link" href="Log In.php" data-toggle="tooltip" data-placement="bottom" title="Log In">
                            <span class="material-icons" style="color:#4F40BF">login</span>
                        </a>
                    </li>';
                }

            ?>
        </ul>
    </div>
</nav>