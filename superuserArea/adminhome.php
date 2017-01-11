<?php
$db = mysqli_connect("localhost", "root", "", "Project_fitness");
session_start();

if(isset($_SESSION['authenticated']))
{
  $nameselectofuser = "SELECT name FROM project_admin_details WHERE email = 'sscsps@gmail.com'";

  $result = $db->query($nameselectofuser);
  $value = $result->fetch_assoc();
  $_SESSION['usersname'] = $value["name"];

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
        <title>Admin - Fitness Central</title>
    </head>

    <body>
        <header id = 'header1'></header>
            <?php
          if(isset($_SESSION['message']))
              echo "<p style='color:#666666;'>" . $_SESSION['message'] . "</p>";
              $_SESSION['message']="";
            ?>
            <h1>Hello <?php echo $_SESSION['usersname']?></h1>

        <script>
            loadHeaderAdmin("header1");
        </script>
    </body>
</html>
