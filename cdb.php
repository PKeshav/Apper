<?php

include 'template.php';

session_regenerate_id();
if(!isset($_SESSION['usern']))
{
$_SESSION['nop']='True';
header("Location: login.php");
}
else
{
$_SESSION['nop']='False';
}
?>

<html>
<head>
<title>Create Database</title>
</head>
<body>

<div class="content" >

<h1>Create Database</h1>
Create a database to access for your project

<table align="center" cellpadding="10px" >
<form method="POST" action="addb.php" >
<caption  >

<?php

session_start();
session_regenerate_id();
if($_SESSION['dex']=='True')
{
$_SESSION['dex']='False';
echo "Database with that Name already exists";
}

if($_SESSION['dbc']=='True')
{
$_SESSION['dbc']='False';
echo "Database Successfully created";
}

?>

</caption>
<tr>
<td>
Database Name:</td>
<td>
<input class="textbox" type="text" name="dbname" required  />
</td>
</tr>

<tr>
<td>
DB User Name:</td>
<td>
<input class="textbox" type="text" name="dbuname" required  />
</td>
</tr>

<tr>
<td>
DB Password:</td>
<td>
<input class="textbox" type="password" name="dbpwd" required  />
</td>
</tr>

<tr>
<td></td>
<td align="center">
<input value="Create" class="cbutton" type="Submit" />

</td>
</tr>
<h5>(<u>Note</u>: hostname is 'localhost' by default.)</h5>
</form>

</table>

</div>

</body>
</html>
