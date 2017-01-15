<?php
$db = mysqli_connect("localhost", "root", "", "Project_fitness");

parse_str($_SERVER['QUERY_STRING']);
// we have email and id from query string;
if(isset($email)){
$md5email = md5($email);
$sql1 = $db->query("SELECT name FROM Project_Customer_Details WHERE email = '$email' limit 1");
if(mysqli_num_rows($sql1) == 1 ){
  while($row = $sql1->fetch_assoc()){
    echo $row['name'];
    $name = $row['name'];
  }
}
$md5name = md5($name);
echo $md5email.$md5name;
  $sql2;
if($id == $md5email.$md5name){
  //verified
  $verified = true;
  $verifyemail = "UPDATE Project_Customer_Login set verified = 1 WHERE email = '$email'";
  $sql2 = $db->query($verifyemail);
}
else{
  session_unset();
  session_destroy();
  header("location: /");
}
}
else{
  session_unset();
  session_destroy();
  header("location: /");
}

?>

<html>
   <meta charset="utf-8">

   <head>
       <script type="text/javascript" src="/js/index.js"></script>
       <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
       <script src="/js/jquery.maphilight.min.js"></script>
       <script src="/js/sahil.js"></script>

       <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
       <link href="/css/index.css" rel="stylesheet">
       <title>Thank You - Fitness Central</title>
   </head>

   <body>
       <header id='header1'></header>

       <div>
           <center>
             <?php
             if($sql2 === TRUE){
               echo "<h2>Email Address is verified!</h2><p>Thank you for verifing your email address.<br>You may now login </p>";
             }
             else {
               session_unset();
               session_destroy();
               header("location: /");
             }
             ?>

           <p><a href="/login.php">Click here</a> to go to the Login Page.</p>
         </center>
       </div>

       <script>
           loadHeader("header1");

       </script>
   </body>

</html>
