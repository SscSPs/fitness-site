<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    
    <head>
        <script type="text/javascript" src="js/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
        <script src="js/jquery.maphilight.min.js"></script>
        <script src="js/sahil.js"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <title>Login - Fitness Central</title>
    </head>
    
    <body>
        <header id = 'header1'></header>
        <p id='a'></p>
        
        <div>
          <h1>Login</h1>

          <form action="/">
              <hr>
            <label for="email" style="width:200px;display: inline-block;">Email address</label>
          <input type="text" name="email" id="email" placeholder="Email" required/><br>
            <label for="password" style="width:200px;display: inline-block;">Password</label>
          <input type="password" name="password" id="password" placeholder="Password" required/><br>
           <input type="button" value="Login" onclick="login();"></input>
            <p>Not a member? <a href="register.php">Sign Up</a></p>
          </form>
        </div>

        <script>
            loadHeader("header1");
            function login(){}
            
        </script>
    </body>
</html>
