//variable to store true/false
var x = 0;

//to toggle between images
function butt_rot(id) {         //id is used to identify the navigation page
    //=== is used to check if they are exactly the same, i.e. same data type, and value. == will work, but === is in better
    if (x === 0) {
        switch(id) 
        {    
            case 20: { document.getElementById("image").innerHTML = "<img src = 'images/muscle_back_final.png' usemap='#back' class='map'>"; break; }       //operation from home page
            case 10: { document.getElementById("image").innerHTML = "<img src = '../images/muscle_back_final.png' usemap='#back' class='map'>"; break; }    //operation from registered user page
        }
        x = 1;
        return;
    }

    if (x === 1) {
        switch(id) 
        {    
            case 20: { document.getElementById("image").innerHTML = "<img src = 'images/muscle_front_final.png' usemap='#front' class='map'>"; break; }       //operation from home page
            case 10: { document.getElementById("image").innerHTML = "<img src = '../images/muscle_front_final.png' usemap='#front' class='map'>"; break; }    //operation from registered user page
        }    
        x = 0;
        return;
    }
}

//to display core details on click of the core
function getInfo(elem,t) {  //t is the identifier
    document.getElementById("info_head").innerHTML = "The " + elem.id;
    changeInnerhtmlFromXML(elem, "info", t);
    if(t === 10) document.getElementById("butt_container").innerHTML = "<a href='../exercise/" + elem.id + ".php' style='color: #ffffff; text-decoration: none;'><p id='butt'>See Exercises</p></a>";
    else document.getElementById("butt_container").innerHTML = "<a href='/exercise/" + elem.id + ".php' style='color: #ffffff; text-decoration: none;'><p id='butt'>See Exercises</p></a>";
}


function changeInnerhtmlFromXML(a, elementToChange, u) {
    var txt = '';
    var request = new XMLHttpRequest();
    if(u === 10)    request.open("GET", "../xml/aboutBodyParts.xml", false);    //operation in registered user page, u is the identifier
    else request.open("GET", "xml/aboutBodyParts.xml", false);
    request.send();
    var xml = request.responseXML;
    var i;
    var x = xml.documentElement.childNodes;
    for (i = 1; i < x.length; i += 2)
        if (x[i].nodeName === a.id)
            txt = x[i].textContent + "<br>";
    document.getElementById(elementToChange).innerHTML = txt;
}


