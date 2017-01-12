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
      <div><h2>Change stuff</h2>
        <ul style="background: rgba(0,0,0,0);font-size: auto;padding:auto;text-aligh:auto;display:auto;" >
            <li onClick="visitlink(this);">Change own password.</li>
            <li onClick="visitlink(this);">Edit your details</li>
            <br><hr><br>
            <li onClick="visitlink(this);">View your details</li>
        </ul>
      </div>
      <div>
        <iframe id = "frame" style='width:500px;height:200px' ></iframe>
      </div>


        <script>
            loadHeaderAdmin("header1");
            function visitlink(a) {
              switch (a.innerHTML) {
                case "Change own password.":
                  frame.src = "changeOwnPass.php";
                  break;
                case "Edit your details":
                  frame.src = "editDetails.php";
                  break;
                case "View your details":
                  frame.src = "viewDetails.php";
                  break;
                default:
                  console.log("what are you doing!? click on the list");
                }
            }
        </script>
      </body>
</html>
