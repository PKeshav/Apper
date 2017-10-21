<html><!--starting html code-->

<head>

<link rel="shortcut icon"
 href="apper-icon2.png" />

<title>Apper</title>

<link rel="stylesheet" type="text/css" href="mystyle.css">

<script type="text/javascript" >

function pageScroll()/*http://www.mediacollege.com/internet/javascript/page/scroll.html*/ {

    	window.scrollBy(0,1); // horizontal and vertical scroll increments

    	scrolldelay = setTimeout('pageScroll()',1); // scrolls every 1 milliseconds

/*http://www.w3schools.com/js/js_timing.asp*/
setInterval(function stopScroll()
 {
    	clearTimeout(scrolldelay);
},2300);


}



$(document).ready(function(){
    $("#notification").load('ProjectFiles/notifications.php');
  });


</script>

</head>


<body background="" onLoad="pageScroll()" >


<div class="heading" >

</div>

<div class="menubar" >

<a class="button" href="index.php" >
Home
</a>

<a class="button" href="howto.php" >
How to Build
</a>

<a class="button" href="start.php" >
Start Building
</a>

<a class="button" href="anotif.php" >
Add Notification
</a>

<a class="button" href="login.php" >

<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['usern']))
{
echo "Log In";
}

else
{
echo "Log Out";
}

?>

</a>


<div class="searchengine" >
<script>
  (function() {
    var cx = '009761745208096287506:gyydjxfrwj8';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
</div>

</div>





<iframe src="projects.php" frameBorder="0" class="leftcolumn" id="notification" >
</iframe>

<iframe src="notifications.php" frameBorder="0" class="rightcolumn" id="notification" >
</iframe>

<div class="content" >

<h1>Welcome to<img src="headimg0.png" alt="Apper" width="150" height="50" valign="middle" /></h1>

<p>Apper is a platform for students and faculty to efficiently create web apps or static web pages on the fly.</p>
<h2>How to use</h2>
<p>To use this site most effitciently read the following.</p>
<h3>Add Notification</h3>
<p>To add any notification to the site click the <a href="anotif.php" >Add Notification</a> button in the toolbar, by doing so you can add the latest news and updates related to the college or any event.<h5><b><i><u>Note</u>: </i></b>You can only add notification if you are one of the admins, faculty or an authorized person who is given extra permission to add a notification.</h5></p>
<h3>Learn to build</h3>
<p>To learn about tips and tricks of how to use this app in a more efficient manner, click on the <a href="howto.php" >How to Build</a> button on the toolbar.</p>
<h3>Start!!!</h3>
<p>To start building a site or your web app click on the <a href="start.php" >Start Building</a> button on the toolbar and start your project<h5><b><i><u>Note</u>: </i></b>You must have a valid login ID and password to start building the site.<br/>(to know more about getting your ID and password contact your faculty or class incharge)</h5></p>

</div>



<div class="footer" style="margin-top:50px;" >


<?php
session_start();
session_regenerate_id();
if(isset($_SESSION['usern']))
{
echo "<span class='line' ><a  >Change Password</a></span>";
if($_SESSION['class2'] == 'faculty' or $_SESSION['class'] == 'admin')
{
echo "<span class='line' ><a>Add Student</a></span>";
if($_SESSION['class2'] == 'admin')
{
echo "<span class='line' ><a>Add Faculty</a></span>";
}
}
}

?>


</div>

</body>

<html>
