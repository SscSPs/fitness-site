function loadHeader(headerId){
    var text = '<h1><a href="/">Fitness Central</a></h1>';
    text+='<ul class="nav_bar">';
    text+='<li><a href="/">Home</a></li>';
    text+='<li><a href="About.html">About</a></li>';
    text+='<li><a href="Contact.html">Contact Us</a></li>';
    text+='<li><a href="register.html">Register</a></li>';
    text+='<li><a href="Login.html">Login</a></li>';
    text+='</ul>';
    document.getElementById(headerId).innerHTML = text;
}