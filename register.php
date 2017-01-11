<?php

    $db = mysqli_connect("localhost", "root", "", "Project_fitness");

    if(isset($_POST['register'])){
        session_start();
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password2 = mysqli_real_escape_string($db, $_POST['password2']);
        $dob = mysqli_real_escape_string($db, $_POST['dob']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $tempdatetimenow = date("Y_m_d_h_i_s_a");
        $datetimenow = mysqli_real_escape_string($db, $tempdatetimenow);

        if($password == $password2){
            $password = md5($password);
            $sql1 = $db->query("INSERT INTO Project_Customer_Details VALUE('$datetimenow', '$email', '$name', '$dob', '$gender')");
            $sql2 = $db->query("INSERT INTO Project_Customer_Login VALUE('$datetimenow', '$email', '$password')");

            if($sql1)
            {
                if($sql2){
                    $_SESSION['message'] = "you are registered, please login.";
                    $_SESSION['user'] = $name;
                    $_SESSION['email'] = $email;
                    header("location: login.php");
                }
                else{
                    $sql3 = $db->query("DELETE FROM Project_Customer_Details WHERE email = '$email'");
                    $_SESSION['message'] = "couldn't insert in credentials table";
                }
            }
            else{
                if($sql2){
                    $sql4 = $db->query("DELETE FROM Project_Customer_Login WHERE email = '$email'");
                    $_SESSION['message'] = "couldn't insert in details table;";
                }
                else{
                    $_SESSION['message'] = "couldn't insert in any table";
                }
            }

        }
        else{
            $_SESSION['message'] = "The passwords do not match, correct that.";
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
        <title>Registration - Fitness Central</title>
    </head>

    <body>
        <header id='header1'></header>
        <p id='a'></p>

        <div>
            <form action="register.php" method="post">
                <?php
              if(isset($_SESSION))
                  echo "<p style='color:RED;'>" . $_SESSION['message'] . "</p>";
                ?>
                
                <center>
            
                <table>
                    <tr>
                        <td colspan="2" class="sub_head">Registration<hr></td>
                    </tr>
                    <tr>
                        <td><label for="email" style="width:200px;display: inline-block;">Email address</label></td>
                        <td><input type="text" name="email" id="email" placeholder="Email" required/><br></td>
                    </tr>
                    <tr>
                        <td><label for="name" style="width:200px;display: inline-block;">Your Name</label></td>
                        <td><input type="text" name="name" id="name" placeholder="Name" required/><br></td>
                    </tr>
                    <tr>
                        <td><label for="password" style="width:200px;display: inline-block;">Password</label></td>
                        <td><input type="password" name="password" id="password" placeholder="Password" required/></td>
                    </tr>
                    <tr>
                        <td><label for="password2" style="width:200px;display: inline-block;">Confirm Password</label></td>
                        <td><input type="password" name="password2" id="password2" placeholder="Confirm Password" required/></td>
                    </tr>
                    <tr>
                        <td><label for="dob" style="width:200px;display: inline-block;">Date of Birth</label></td>
                        <td><input type="date" name="dob" id="dob" placeholder="DD/MM/YYYY" required/><br></td>
                    </tr>
                    <tr>
                        <td>
                              <label for="gender" style="display: inline-block;">Gender</label>
                        </td>
                        <td>
                              <input type="radio" name="gender" value="Male"/>Male
                              <input type="radio" name="gender" value="Female">Female
                              <input type="radio" name="gender" value="Other">Other
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><p>By clicking Register, you agree on our <a href="/tac.html">terms and condition</a>.</p></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="butt"><input type="submit" name="register" value="Register" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p>Already a member? &nbsp;&nbsp;<a href="login.php">Login</a></p></td>
                    </tr>
                    
                </table>
                
            </center>
                
                <!--
                    <hr>
                    <label for="email" style="width:200px;display: inline-block;">Email address</label>
                    <input type="text" name="email" id="email" placeholder="Email" required/><br>
                    <label for="name" style="width:200px;display: inline-block;">Your Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" required/><br>
                    <label for="password" style="width:200px;display: inline-block;">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required/><br>
                    <label for="password2" style="width:200px;display: inline-block;">Confirm Password</label>
                    <input type="password" name="password2" id="password2" placeholder="Confirm Password" required/><br>
                    <label for="dob" style="width:200px;display: inline-block;">Date of Birth</label>
                    <input type="date" name="dob" id="dob" placeholder="Password" required/><br>
                    <div class="gender" style="display: inline-block;">
                      <label for="gender" style="display: inline-block;">Gender</label>
                      <input type="radio" name="gender" value="Male">Male</input>
                      <input type="radio" name="gender" value="Female">Female</input>
                      <input type="radio" name="gender" value="Other">Other</input>
                    </div>
                    <p>By clicking Register, you agree on our <a href="/tac.html">terms and condition</a>.</p>
                    <input type="submit" name="register" value="Register" />
                    <p>Already a member? <a href="login.php">Login</a></p>
-->
            </form>
        </div>

        <script>
            loadHeader("header1");

        </script>
    </body>

</html>
