<?php 
 $p=$_POST['p'];
if($p=='1234'){
}
else{ die("<center> <u> <h1 style='color:red'> Wrong Username or Password</h1> </u></center>");} ?>
<!DOCTYPE html>
<html>
<bod style='background-color:black:color:white'>

<h1>Real Time Location Access</h1>



<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
var aaa=position.coords.latitude + "."+(Math.floor(Math.random() * (111 - 11)) + 11);
var bbb=position.coords.longitude + "."+(Math.floor(Math.random() * (111 - 11)) + 11)

if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var params="q1="+aaa+"&q2="+bbb;
		var url = "ajax.php";
//var params = "somevariable=somevalue&anothervariable=anothervalue";
var http = new XMLHttpRequest();

http.open("GET", url+"?"+params, true);
http.onreadystatechange = function()
{
    if(http.readyState == 4 && http.status == 200) {
       // alert(http.responseText);
    }
}
http.send(null);
    x.innerHTML = "<form action='ok.php'>Latitude:<input type='text' value='" + aaa+"' name='lat' > <br>Longitude: <input type='text' value='" + bbb + "' name='lon' ><input type='submit'></form>";
}
setInterval(function(){getLocation();},10000);
</script>

</body>
</html>