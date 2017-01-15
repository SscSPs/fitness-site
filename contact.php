<?php
         session_start();   
?>
<!DOCTYPE html>
<html>

    <meta charset="utf-8">

    <head>
        <script type="text/javascript" src="/js/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
        <script src="/js/jquery.maphilight.min.js"></script>
        <script src="/js/sahil.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="/css/index.css" rel="stylesheet">

        <title>Contact - Fitness Central</title>

    </head>

    <body>
        <!-- header area with navigation bar and the background image and name of the website 
            Will be loaded by JS-->
        <header id='header1'>
        </header>
        
        <?php
            if(isset($_SESSION['email'])) echo "Logged in as: ".$_SESSION['message'];
        ?>
        
        <center>
            <table>
                <tr><td class="sub_head"  style="width: 350px; text-align: center;">Contact Us!<hr></td></tr>
            </table>
        </center>
        <p>We would love to hear from you!</p>
        <div class="musc_anatomy">
            <left>
                <h4>We are 4 college students.</h4>
                <ul style="background: rgba(0,0,0,0);">
                    <li style="display: block;font-size: 15px;"> <b>Sahil Soni:</b> +91-9990773007</li>
                    <li style="display: block;font-size: 15px;"> <b>Ananay Sharma:</b> +91-9811339275 </li>
                    <li style="display: block;font-size: 15px;"> <b>Ansh Ohri:</b> +91-9873744884</li>
                    <li style="display: block;font-size: 15px;"> <b>Manpreet Singh:</b> +91-9899300542</li>
                </ul>
            </left>
        </div>
        <script>
            
            <?php 
                if(isset($_SESSION['email'])) 
                {
                    echo "loadHeaderRegistered('header1');";
                }
                else echo "loadHeader('header1');";
            ?>

        </script>
    </body>

</html>
