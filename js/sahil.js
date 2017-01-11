function loadHeader(headerId) {
    var text = '<h1><a style="color: white; text-decoration: none;" href="/">Fitness Central</a></h1>';
    text += '<ul >';
    text += '<a style="color: white; text-decoration: none;" href="/"><li>Home</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/About.php"><li>About</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/Contact.php"><li>Contact Us</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/register.php"><li>Register</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/Login.php"><li>Login</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/BMI.php"><li>BMI Calculator</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/workout_calendar.php"><li>Workout Calendar</li></a>';
    text += '</ul>';
    document.getElementById(headerId).innerHTML = text;
}

function loadHeaderRegistered(headerId) {
    var text='';
    text = '<h1><a style="color: white; text-decoration: none;" href="/">Fitness Central</a></h1>';
    text += '<ul >';
    text += '<a style="color: white; text-decoration: none;" href="/"><li>Home</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/About.php"><li>About</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/Contact.php"><li>Contact Us</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="#"><li>Logout</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/BMI.php"><li>BMI Calculator</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/workout_calendar.php"><li>Workout Calendar</li></a>';
    text += '</ul>';
    document.getElementById(headerId).innerHTML = text;
}

function loadHeaderAdmin(headerID) {
    var text = '';
    text += '<h1><a style="color: white; text-decoration: none;" href="/superuserArea/adminhome.php">Admin Pannel - Fitness Central</a></h1>';
    text += '<ul >';
    text += '<a style="color: white; text-decoration: none;" href="/superuserArea/adminhome.php"><li>Home</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/superuserArea/Exercises.php"><li>Exercises</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/superuserArea/Users.php"><li>Users</li></a>';
    text += '<a style="color: white; text-decoration: none;" href="/superuserArea/PersonalDetails.php"><li>Personal Details</li></a>';
    text += '<a style="color: RED; text-decoration: none;" href="/superuserArea/LOGOUT.php" onmouseover = ><li>LOG OUT</li></a>';
    text += '</ul>';
    document.getElementById(headerID).innerHTML = text;

}

function fillThePage(nameOfPage){
    //code to be filled
}
