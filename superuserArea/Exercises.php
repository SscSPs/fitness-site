<?php
session_start();
if(!isset($_SESSION['authenticated']))
{
  $_SESSION['message'] = "Login First";
  header("location: ./");
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
        <title>Admin - Exercises - Fitness Central</title>
    </head>

    <body>
        <header id='header1'></header>
        <div class="list">
            <div style="width: 500px; margin-left:0; margin-right:auto; float:left;">
                <h2>Exercises</h2>
                <ul style="background: rgba(0,0,0,0);font-size: auto;padding:auto;text-aligh:auto;display:auto;" >
                    <li onClick="visitlink(this);">Add Exercise</li>
                    <li onClick="visitlink(this);">Edit existig Exercise</li>
                </ul>
                <h2>Body Parts</h2>
                <ul style="background: rgba(0,0,0,0);font-size: auto;padding:auto;text-aligh:auto;display:auto;" >
                    <li onClick="visitlink(this);">Add Body Part</li>
                    <li onClick="visitlink(this);">Remove Body Part</li>
                </ul>
            </div>
            <div style="margin-left:auto; margin-right:0;">
                <iframe id='form1' style="width:500px; height:300px; padding: 10px;"></iframe>
            </div>
        </div>
            <script>
                loadHeaderAdmin("header1");

                function visitlink(a) {
                    switch (a.innerHTML) {
                        case "Add Exercise":
                            form1.src = "addexercise.php";
                            break;
                        case "Edit existig Exercise":
                            form1.src = "editexercise.php";
                            break;
                        case "Add Body Part":
                            form1.src = "addpart.php";
                            break;
                        case "Remove Body Part":
                            form1.src = "removepart.php";
                            break;
                        default:
                            console.log("what are you doing!? click on the list");
                    }
                }

            </script>
    </body>

</html>
