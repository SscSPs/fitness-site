//variable to store true/false
var x = 0;
            
//to toggle between images
function butt_rot() {
                //=== is used to check if they are exactly the same, i.e. same data type, and value. == will work, but === is in the correct syntax
    if (x === 0) {
        document.getElementById("image").innerHTML = "<img src = 'images/muscle_back_final.png' usemap='#back' class='map'>";
        x = 1;     
        return;
    }  
                
    if (x === 1) {   
        document.getElementById("image").innerHTML = "<img src = 'images/muscle_front_final.png' usemap='#front' class='map'>";   
        x = 0;
        return;
    }
}
            
//to display core details on click of the core
function getInfo(elem){
    document.getElementById("info_head").innerHTML = "The "+elem.id;
    changeInnerhtmlFromXML(elem, "info");
    document.getElementById("butt_container").innerHTML = "<a href='"+elem.id+".html' style='color: #ffffff; text-decoration: none;'><p id='butt'>Read More</p></a>";
}


function changeInnerhtmlFromXML(a,elementToChange) {
    var txt = '';
    var request = new XMLHttpRequest();
    request.open("GET", "xml/aboutBodyParts.xml", false);
    request.send();
    var xml = request.responseXML;
    var i;
    var x = xml.documentElement.childNodes;
    for (i = 1; i < x.length; i += 2)
        if(x[i].nodeName === a.id)
        txt = x[i].textContent + "<br>";
    document.getElementById(elementToChange).innerHTML = txt;
}
