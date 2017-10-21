<?php
include 'template.php';

?>

<html>
<head>
<title>Choose Project</title>
</head>

<body>
<div class=content>
<h1>List of Apps</h1>

<?php

echo "<h4>";
if($_SESSION['ma'] == 'True')
{
$_SESSION['ma'] = 'False';
echo "Member successfully added";
}

if($_SESSION['df'] == 'True')
{
$_SESSION['df'] = 'False';
echo "The file has been deleted";
}
if($_SESSION['cf'] == 'True')
{
$_SESSION['cf'] = 'False';
echo "The File has been successfully created";
}
if($_SESSION['ef'] == 'True')
{
$_SESSION['ef'] = 'False';
echo "Changes have been successfully updated";
}
echo "</h4>";

?>

<form method="post" action="editpr.php" >
<p style='font-size:30px;' >Edit:&nbsp&nbsp<input type="text" placeholder="Project Name" name = "prname" class = "textbox" >&nbsp<input type="image" value="submit" src="code.gif" alt="submit Button" >
<!--http://stackoverflow.com/questions/1994406/set-image-as-submit-button-->
</p>
</form>
<?php

session_start();
session_regenerate_id();

	$db_hostname = "localhost";
	$db_username = "adbuser";
	$db_password = "aurora";
	$db_name     = "apper";

$con=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT distinct name FROM projects ORDER BY name");
if($_SESSION['pc']=='True')
{
$_SESSION['pc']='False';
echo "Project Directory successfully created";
}

if($_SESSION['nep']=='True')
{
$_SESSION['nep']='False';
echo "You don't have permission to edit that project";
}
echo "<ol ><table style='font-size:30px;' >";

  while($row = mysqli_fetch_array($result)) {
  //$_SESSION['path'] = "";
  $path = $row['name'];
  echo "<b><u><tr><th><li><a href='$path' >" . $row['name'] . "</a></u></b><th  ><a href='$path' ><img width=30px height=30px src='execute.gif'></a><br/><br/>";
}
echo "</table></ol>";
    // disconnect from the database

mysqli_close($con);

?>

</div>
</body>

</html>
