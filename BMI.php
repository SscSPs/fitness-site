<?php
         session_start();   
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
        <title>BMI Calculator - Fitness Central</title>
    
    </head>

    <body>
        <header id = 'header1'></header>

        <?php
        if(isset($_SESSION['email'])) echo "Logged in as: ".$_SESSION['email'];
        ?>
        
        <div class="bmi_calc">
            <center>
                <table>
                    <tr>
                        <td colspan="2" class="sub_head">BMI Calculator<hr></td>
                    </tr>
                    <tr>
                        <td><label for="weight" style="width:200px;display: inline-block;">Weight: </label></td>
                        <td><input type = "text" style="width: 250px;" id = "weight" placeholder="in kg"><br></td>
                    </tr>
                    <tr>
                        <td><label for="height" style="width:200px;display: inline-block;">Height:</label></td>
                        <td><input type = "text" style="width: 100px; margin-right: 44px;" id = "m_height" placeholder="in meters"><input type = "text" style="width: 100px;" id = "cm_height" placeholder="in centimeters"><br></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p id="result"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="butt"><input type="submit" value="Calculate" style="height: 40px; width: 170px;" onclick="bmi_calc()"></td>
                    </tr>
                    
            <!--Weight: <input type = "text" style="width: 250px; margin-left: 10px;" id = "weight" placeholder="in kg"><br>
            <br>
            Height: <input type = "text" style="width: 100px; margin-left: 12px; margin-right: 45px;" id = "m_height" placeholder="in meters"><input type = "text" style="width: 100px;" id = "cm_height" placeholder="in centimeters"><br>
            <br><br>
            <input type="button" value="Calculate" style="height: 40px; width: 100px;" onclick="bmi_calc()"><br>
            <br>
            -->
                </table>
            </center>
        </div> 
           
        
        <script>
            <?php 
                if(isset($_SESSION['email'])) 
                {
                    echo "loadHeaderRegistered('header1');";
                }
                else echo "loadHeader('header1');";
            ?>
            
            function bmi_calc(){
                
                var prompt_text;
                var w = document.getElementById("weight").value;
                var h_m = document.getElementById("m_height").value*100;
                var h_cm = document.getElementById("cm_height").value;
                
                if(w == "" || w == null || h_m == "" || h_m == null)
                    {
                        alert("Missing Info");
                        document.getElementById("weight").value = "";
                        document.getElementById("m_height").value = "";
                        document.getElementById("cm_height").value = "";
                    }
                
                else{
                if(h_cm == "" || h_cm == null) h_cm = 0;        
                h = parseFloat((parseFloat(h_m) + parseFloat(h_cm))/100);
                bmi = parseFloat(w/(h*h));
                
                if(bmi < 18.5)
                    prompt_text = "Underweight";
                else if(bmi > 25 && bmi < 30)
                    prompt_text = "Overweight";
                else if(bmi >= 30)
                    prompt_text = "Obese";
                else
                    prompt_text = "Normal"
                    
                result_text = bmi.toString;    
                    
                document.getElementById("weight").value = "";
                document.getElementById("m_height").value = "";
                document.getElementById("cm_height").value = "";    
                
                document.getElementById("result").innerHTML = "Your BMI is: <b  style='color: coral;'>" + bmi + "</b> which is considered <b  style='color: coral;'>" + prompt_text + "</b> BMI.";
                }
            }

        </script>
    </body>
</html>
