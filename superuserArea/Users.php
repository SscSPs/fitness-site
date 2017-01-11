<?php
session_start();
if(!isset($_SESSION['authenticated'])){
  $_SESSION['message'] = "Login First";
  header("location: ./");
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
        <title>Admin - Exercises - Fitness Central</title>
    </head>

    <body>
        <header id='header1'></header>
        <script>
            loadHeaderAdmin("header1");
        </script>
      </body>
</html>
