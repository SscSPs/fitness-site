<?php
session_start();
if(session_status() != 2)
{
  $_SESSION['message'] = "Login First";
  header("location: /superuserArea/adminWelcome.php");
}
else{

}

?>
<!DOCTYPE HTML>
<html>
    <meta charset="utf-8">
    <head>
        <script type="text/javascript" src="/js/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
        <script src="/js/jquery.maphilight.min.js"></script>
        <script src="/js/sahil.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="/css/index.css" rel="stylesheet">
        <title>Registered User - Fitness Central</title>
    </head>

    <body>
        <header id='header1'></header>
        <ul>
            <li onClick="visitlink(this);">Add Exercise</li>
            <li onClick="visitlink(this);">Edit existig Exercise</li>
        </ul>

        <iframe id = 'form1'></iframe>

        <script>
            loadHeaderAdmin("header1");

            function visitlink(a) {
                if (a.innerHTML == "Add Exercise") {
                    form1.src = "addexercise.php";
                } else if (a.innerHTML == "Edit existig Exercise") {
                    form1.src = "editexercise.php";
                }
            }

        </script>
    </body>

</html>
