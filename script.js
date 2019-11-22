$( document ).ready(function() {
    
    

});

function Search() {    
    var courseName = $('#courseName').val();
    
    document.getElementById("results").innerHTML = "";

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("results").innerHTML = this.responseText;
        }
    };
    
    xmlhttp.open("POST", "query.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("courseName=" + courseName.toString() + "&lname=Ford");
}