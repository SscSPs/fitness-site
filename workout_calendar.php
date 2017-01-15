<?php
    session_start();   
    if(isset($_SESSION['email']))
        {
            $_SESSION['message'] = '';
            $user = $_SESSION['email'];
            $db = mysqli_connect("localhost", "root", "", "Project_fitness");

            $result = $db->query("SELECT * FROM Project_Customer_details WHERE email = '$user'");
            
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc()){
                    $_SESSION['message'] = $row["name"];
                    $user_name = $row["name"];
                    $user_dob = $row["dob"];
                    $user_gender = $row["gender"];    
                }
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
        <title>Workout Calendar - Fitness Central</title>
        
    </head>

    <body>
        <header id = 'header1'></header>
        
        <?php
            if(isset($_SESSION['email'])) echo "Logged in as: ".$_SESSION['message'];
        ?>

        <form action="" class="work_calendar">
            <center>
            
                <table>
                    <tr>
                        <td colspan="2" class="sub_head">Workout Calendar<hr></td>
                    </tr>
                    <tr>
                        <td><label for="email" style="width:200px;display: inline-block;">Email address</label></td>
                        <td><input type="text" name="email" id="email" placeholder="Email" <?php if(isset($_SESSION['email'])) echo "value=$user readonly" ?> required/><br></td>
                    </tr>
                    <tr>
                        <td><label for="name" style="width:200px;display: inline-block;">Your Name</label></td>
                        <td><input type="text" name="name" id="name" placeholder="Name" <?php if(isset($_SESSION['email'])) echo "value=$user_name readonly" ?> required/><br></td>
                    </tr>
                    <tr>
                        <td><label for="dob" style="width:200px;display: inline-block;">Date of Birth</label></td>
                        <td><input type="date" name="dob" id="dob" placeholder="DD/MM/YYYY" <?php if(isset($_SESSION['email'])) echo "value=$user_dob readonly" ?> required/><br></td>
                    </tr>
                    <tr>
                        <td><label for="bmi" style="width:200px;display: inline-block;">Motive</label></td>
                        <td>
                            <select style="width:147px;">
                                <option value="nil"> </option>
                                <option value="loose">Loose Weight</option>
                                <option value="gain">Gain Muscle</option>
                                <option value="health">Stay Healthy</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                              <label for="gender" style="display: inline-block;">Gender</label>
                        </td>
                        <td>
                              <input type="radio" name="gender" value="Male" <?php if(isset($_SESSION['email'])) if($user_gender == "Male") echo "checked='checked'" ?> />Male
                              <input type="radio" name="gender" value="Female" <?php if(isset($_SESSION['email'])) if($user_gender == "Female") echo "checked='checked'" ?> />Female
                              <input type="radio" name="gender" value="Other" <?php if(isset($_SESSION['email'])) if($user_gender == "Other") echo "checked='checked'" ?> />Other
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="butt"><input type="submit" name="cal_butt" value="Get Started ->" style="height: 40px; width: 170px;"/></td>
                    </tr>
                    
                </table>
                
            </center>
        
        </form>
           
        
        <script>
            
            <?php 
                if(isset($_SESSION['email'])) 
                {
                    echo "loadHeaderRegistered('header1');";
                }
                else echo "loadHeader('header1');";
            ?>

        </script>
    </body>
</html>
