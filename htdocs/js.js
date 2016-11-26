function switchButtons() {
    if(document.getElementById('origbuttons').style.display != "none") {
        document.getElementById('delconf').style.display = "inline-block";
        document.getElementById('origbuttons').style.display = "none";
        } else {
        document.getElementById('delconf').style.display = "none";
        document.getElementById('origbuttons').style.display = "inline-block";
        }
}

function switchButtonsAdm() {
    if(document.getElementById('origbuttonsAdm').style.display != "none") {
        document.getElementById('delconfAdm').style.display = "inline-block";
        document.getElementById('origbuttonsAdm').style.display = "none";
        } else {
        document.getElementById('delconfAdm').style.display = "none";
        document.getElementById('origbuttonsAdm').style.display = "inline-block";
        }
}