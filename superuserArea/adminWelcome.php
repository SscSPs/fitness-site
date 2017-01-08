<?php
    $db = mysqli_connect("localhost", "root", "", "Project_fitness");
    
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        $password = md5($password);
        $sql1 = $db->query("SELECT * FROM Project_Admin_Login WHERE email = '$email' AND passhash = '$password'");
        if(mysqli_num_rows($sql1) == 1 ){
            session_start();
            session_unset();
            $_SESSION['message'] = "Login Successful";
            $_SESSION['email'] = $email;
            header("location: /superuserArea/adminhome.php");
        }
        else{
            $_SESSION['message'] = "Some error occured. Please check your email and password.";
        }
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
        <title>Admin Access Panel - Fitness Central</title>
    </head>

    <body>
        <header id='header1'>asd</header>

        <div>
            <h1>Welcome Admin, Please Login</h1>
            <form action="adminhome.php" method="post">
                <?php session_start();
              if(isset($_SESSION['message']))
                  echo "<p style='color:#666666;'>" . $_SESSION['message'] . "</p>";
                session_unset();
                ?>
                    <hr>
                    <label for="email" style="width:200px;display: inline-block;">Email address</label>
                    <input type="text" name="email" id="email" placeholder="Email" required/><br>
                    <label for="password" style="width:200px;display: inline-block;">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required/><br>
                    <input type="submit" name="login" value="Login" />
                    <p>Forgot password? Contact your supervisor.</p>
                    <p>Do not have an account? Then what are you doing here?</p>
            </form>
        </div>
        <script>
            loadHeaderAdmin("header1");
        </script>
    </body>

</html>