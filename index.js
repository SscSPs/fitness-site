//variable to store true/false
var x = 0;
            
//to toggle between images
function butt_rot(){
               
    if(x == 0){
        document.getElementById("image").innerHTML = "<img src = 'muscle_back_final.png' usemap='#back'>";
        x = 1;
        return;
    }  
                
    if(x == 1){   
        document.getElementById("image").innerHTML = "<img src = 'muscle_front_final.png' usemap='#front'>";
        x = 0;
        return;
    }
}
            
//to display core details on click of the core
function core(){
        document.getElementById("info_head").innerHTML = "The Core";
        document.getElementById("info").innerHTML = "About the core";
        document.getElementById("butt_container").innerHTML = "<p id='butt'><a href='core.html'>Read More</a></p>";
}

function chest(){
        document.getElementById("info_head").innerHTML = "Chest";
        document.getElementById("info").innerHTML = "About the chest";
        document.getElementById("butt_container").innerHTML = "<p id='butt'><a href='#'>Read More</a></p>";
}

