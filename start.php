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
<title>Start Building</title>
</head>

<body>
<div class="content" >

<h1>Create Project</h1>

<a href="choosepr.php" ><h3>Choose existing Project</h3></a>

<b>OR</b><br/><br/>

Create a directory to store your project.

<table align="center" cellpadding="10px" >
<form method="POST" action="adproj.php" >
<caption  >

<?php

session_start();
session_regenerate_id();
if($_SESSION['pex']=='True')
{
$_SESSION['pex']='False';
echo "Project Name already taken";
}

?>

</caption>
<tr>
<td>
Project Name:</td>
<td>
<input class="textbox" type="text" name="prname" required  />
</td>
</tr>


<tr>
<td></td>
<td align="center">
<input value="Create" class="cbutton" type="Submit" />

</td>
</tr>

</form>

</table>

<b>OR</b><br/><br/>

<a href = "cdb.php"><h3>Create a MySQL DataBase</h3></a>

</div>
</body>

</html>
