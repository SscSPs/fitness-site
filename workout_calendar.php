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
        <header id = 'header3'></header>

        <form action="" class="work_calendar">
            <center>
            
                <table>
                    <tr>
                        <td colspan="2" class="sub_head">Workout Calendar<hr></td>
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
                        <td><label for="dob" style="width:200px;display: inline-block;">Date of Birth</label></td>
                        <td><input type="date" name="dob" id="dob" placeholder="DD/MM/YYYY" required/><br></td>
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
                              <input type="radio" name="gender" value="Male"/>Male
                              <input type="radio" name="gender" value="Female">Female
                              <input type="radio" name="gender" value="Other">Other
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="butt"><input type="submit" name="cal_butt" value="Get Started ->" style="height: 40px; width: 170px;"/></td>
                    </tr>
                    
                </table>
                
            </center>
        
        </form>
           
        
        <script>
            
            loadHeader('header3');

        </script>
    </body>
</html>
