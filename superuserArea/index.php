<?php
      session_start();
      require 'commonFiles/getConnection.php';
 if(isset($_SESSION['authenticated'])){
   $_SESSION['message']="You are already logged in, logout to exit.";
  header("Location: ./adminhome.php");
}

      if(isset($_POST['login'])){
          $email = mysqli_real_escape_string($db, $_POST['email']);
          $password = mysqli_real_escape_string($db, $_POST['password']);

          $password = md5($password);
         $sql1 = $db->query("SELECT * FROM Project_Admin_Login WHERE email = '$email' AND passhash = '$password'");
         if($sql1->num_rows > 0 ){
             $_SESSION['message'] = "Login Successful";
              $_SESSION['email'] = $email;
             $_SESSION['authenticated'] = 1;
             header("Location: ./adminhome.php");
             echo $email;
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
          <header id='header1'></header>

          <div>
            <h1>Welcome Admin, Please Login</h1>
            <form action="./" method="post">
                  <?php
               if(isset($_SESSION['message']))
                    echo "<p style='color:#666666;'>" . $_SESSION['message'] . "</p>";
                    $_SESSION['message'] = '';
                  ?>
                     <hr>

                      <label for="email" style="width:200px;display: inline-block;">Email address</label>
                      <input type="text" name="email" id="email" placeholder="Email" required/><br>
                      <label for="password" style="width:200px;display: inline-block;">Password</label>
                      <input type="password" name="password" id="password" placeholder="Password" required/><br>
                      <input type="submit" name="login" value="Login" />
                     <p>Forgot password? Contact someone with authority.</p>
                     <p>Do not have an account? Then what are you doing here?</p>
              </form>
          </div>
          <script>
             loadHeaderAdmin("header1");
          </script>
      </body>

</html>
