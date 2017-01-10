<?php
session_start();
if(isset($_SESSION['authenticated']))
{

}
else{
  header("Location: ./");
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
        <header id = 'header1'></header>
        <ul>
          <li onclick = "visitlink(this);">Add Exercise</li>
          <li>Edit existig Exercise</li>
        </ul>

        <script>
            loadHeaderAdmin("header1");
            function visitlink(){
              if(this.text == "Add Exercise")
              {
                openform();
              }
            }
        </script>
    </body>
</html>
