function changeInnerhtmlFromXML(elementToChange, fileName, fromNode, childLevel) {
    var txt = '';
    var request = new XMLHttpRequest();
    request.open("GET", fileName, false);
    request.send();
    var xml = request.responseXML;
    var i;
    var x = xml.documentElement.childNodes;
    for (i = 1; i < x.length; i += 2)
        txt += x[i].nodeName + ": " + x[i].textContent + "<br>";
    document.getElementById(elementToChange).innerHTML = txt;
}
