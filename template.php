
<html><!--starting html code-->

<head>

<link rel="shortcut icon"
 href="apper-icon2.png" />


<link rel="stylesheet" type="text/css" href="mystyle.css">

<script type="text/javascript" >



</script>

</head>

<body background="" >


<div class="header" >

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
$blue0="NatriumChloride";
$blue1="SodiumChloride";
$blue2="NaCl";
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

<div class="searchengine">
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




</body>

<html>

</html>
