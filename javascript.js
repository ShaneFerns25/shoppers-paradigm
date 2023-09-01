function showhide() {
    var v = document.getElementById('choice');
    if (v.style.display !== "none") {
        v.style.display = "none";
    } else {
        v.style.display = "block";
        v.focus();
    }
}

function openNav() {
    document.getElementById("mySidenav").style.width = "260.5px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function showpass() {
    var x = document.getElementById("Pword");
    if(x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}


  