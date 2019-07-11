<?php
include_once('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author"  content="Shubham Maurya">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
<title>Notification</title>
<link href="index.css" type="text/css" rel="stylesheet">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8" type="text/javascript"></script>
</head>
<body>

<div id="popup" style="display:none;">

</div>

<p class="head">Live notification using Ajax, php & mysql</p>
<div class="msg">
<form method='post' autocomplete="off">
<input type="text" placeholder="Topic" name="topic" id="topic">
<input type="text" placeholder="Message" name="msg" id="msg">
<input type="submit" id="send" value="Send" name="send">
</form>
</div>
<img src="notification.svg" onclick="show()">
<span id="count"></span>

</body>

</html>


<script type="text/javascript">

var action=1;
function show()
{
if(action==1)
{

//setInterval(function(){

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
 if (this.readyState == 4 && this.status == 200)
 {
  document.getElementById("popup").innerHTML = this.responseText;
 }
};
xhttp.open("GET", "get_noti.php", true);
xhttp.send();

//},1000);

document.getElementById('popup').style.display='block';

action=2;
}
else
{
document.getElementById('popup').style.display='none';
action=1;
}
}





$(document).ready ( function(){

$("#send").click(function(){

var topic = $('#topic').val().trim();
var msg = $('#msg').val().trim();

       $.ajax({

        url:'insert.php',
        type:'post',
        data:{topic:topic, msg:msg},
        success: function(response)
		{
             alert(response);
                                    
		}

       })

})


})

/* ===================   Live Notification  number of notification    ==================== */
function loadDoc() {

setInterval(function(){

 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   document.getElementById("count").innerHTML = this.responseText;
  }
 };
 xhttp.open("GET", "fetch.php", true);
 xhttp.send();

},1000);

}
loadDoc();


</script>

