$( document ).ready(function() {
    Search();
});

$(document).keypress(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        Search();
    }
});

function Search() {    
    var courseId = $('#courseId').val();
    var daysId = $('#daysId').val();
    var instFname = $('#instFname').val();
    var instLname = $('#instLname').val();
    var semester = $('#semester').val();
    var blockId = $('#blockId').val();
    
    document.getElementById("results").innerHTML = "";

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("results").innerHTML = this.responseText;
        }
    };
    
    xmlhttp.open("POST", "query.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("courseId=" + courseId.toString() + "&daysId=" + daysId.toString() + "&instFname=" + instFname.toString()
    + "&instLname=" + instLname.toString() + "&semester=" + semester.toString() + "&blockId=" + blockId.toString());
}