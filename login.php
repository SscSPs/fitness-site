<?php
    session_start();
    //$_SESSION['message'] = '';  //I done think we nees this...
    $db = mysqli_connect("localhost", "root", "", "Project_fitness");

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $password = md5($password);
        $sql1 = $db->query("SELECT * FROM Project_Customer_Login WHERE email = '$email' AND passhash = '$password' limit 1");
        if(mysqli_num_rows($sql1) == 1 ){
          while($row = $sql1->fetch_assoc()){
            if($row['verified'] == 1){
              $_SESSION['message'] = "Login Successful";
              $_SESSION['email'] = $email;
              header("location: /");
            }
            else{
              $_SESSION['email'] = $email;
              header("location: /verifyfirst.php");
            }
          }
        }
        else{
          $_SESSION['message'] = "Some error occured. Please check your email and password.";
        }
    }
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
        <title>Login - Fitness Central</title>
    </head>

    <body>
        <header id='header1'></header>

        <div>
            <form action="login.php" method="post">
                <?php
              if(isset($_SESSION['message']))
                  echo "<p style='color:#666666;'>" . $_SESSION['message'] . "</p>";
                ?>
            <center>
                <table>
                    <tr>
                        <td colspan="2" class="sub_head">Login<hr></td>
                    </tr>
                    <tr>
                        <td><label for="email" style="width:200px;display: inline-block;">Email address</label></td>
                        <td><input type="text" name="email" id="email" placeholder="Email" required/></td>
                    </tr>
                    <tr>
                        <td><label for="password" style="width:200px;display: inline-block;">Password</label></td>
                        <td><input type="password" name="password" id="password" placeholder="Password" required/></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="butt"><input type="submit" name="login" value="Login" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p>Not a member? &nbsp;&nbsp;<a href="register.php">Sign Up</a></p></td>
                    </tr>
                </table>
            </center>
            <!--<h1>Login</h1>

            <form action="login.php" method="post">


                    <label for="email" style="width:200px;display: inline-block;">Email address</label>
                    <input type="text" name="email" id="email" placeholder="Email" required/><br>
                    <label for="password" style="width:200px;display: inline-block;">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required/><br>
                    <input type="submit" name="login" value="Login" />
                    <p>Not a member? <a href="register.php">Sign Up</a></p>-->
            </form>
        </div>

        <script>
            loadHeader("header1");

        </script>
    </body>

</html>
