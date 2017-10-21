
<?php
include 'template.php';
?>

<html><!--starting html code-->

<head>

<title>How To Build</title>

</head>

<body>
<div class="content" >

<h1>How To Build</h1>
<p>In this section we will explain you how you can make use the features of this site instead of being on your own.</p>
<p>
<a href="#index" id="index" ><b><h2>Index:</h2></b></a>
<a href="#start" ><b>Start</b></a><br/>
<ul>
<li><a href="#cd" >Create Directory</a><br/>
<li><a href="#cf" >Create Files</a><br/>
</ul>
<a href="#tips" ><b>Tips</b></a><br/>
<ul>
<li><a href="#cs" >Authenticate User</a><br/>
<li><a href="#cu" >Check type of user</a><br/>
<li><a href="#av" >Add variables</a><br/>
</ul>
</p>
<h2 id="start" >Start</h2>
<p>To start building a site press on the <a href="start.php" >Start Building</a> button on the toolbar.<h5>(<b><i><u>Note</u>: </i></b>All the sites or apps you build will be stored in sub directories and as part of this site, but giving you the freedom to write your own code)</h5></p>
<h3 id="cd" >Create Directory</h3>
At first you have to create a directory(say your project or app name), which doesn't collide with already existing names of any other user.
<h3 id="cf" >Create Files</h3>
You can create any no. of files in your directory, by default only you will be able to edit or make any changes in your directory, you can give any name to your files. By default the index page will be show by directing to your projects URL, so don't create multiple index files.

<h2 id="tips" >Tips and tricks</h2>
<h3 id="cs" >Authenticate User</h3>
To check whether the user is logged in or not include the path as "include '../checksession.php';", if the user is not logged in, he will be automatically redirected to the main login page. The username in the current session is stored in the "$_SESSION['user']" field.
<h3 id="cu" >Type of User</h3>
To check the type of user, check if "$_SESSION['class']" field contains string "admin", "faculty" or "student".
<h3 id="av" >Add variables</h3>
You can add extra session variables according to your need in your web app by using the "$_SESSION['variable_name']='value';"<h5>(<b><i><u>Note</u>: </i></b>You need to start session with "session_start();" to add session variables and get existing session variables with "session_regenerate_id();" to use existing session variables).</h5>

</div>
</body>

</html>

