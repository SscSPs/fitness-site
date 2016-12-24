function loadHeader(headerId){
    var text = '<h1><a style="color: white; text-decoration: none;" href="/">Fitness Central</a></h1>';
    text+='<ul >';
    text+='<li><a style="color: white; text-decoration: none;" href="/">Home</a></li>';
    text+='<li><a style="color: white; text-decoration: none;" href="About.html">About</a></li>';
    text+='<li><a style="color: white; text-decoration: none;" href="Contact.html">Contact Us</a></li>';
    text+='<li><a style="color: white; text-decoration: none;" href="register.html">Register</a></li>';
    text+='<li><a style="color: white; text-decoration: none;" href="Login.html">Login</a></li>';
    text+='</ul>';
    document.getElementById(headerId).innerHTML = text;
}