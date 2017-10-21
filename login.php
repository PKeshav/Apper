
<?php
include 'template.php';
?>

<html><!--starting html code-->

<head>

<title>Log In</title>

</head>


<div class="content" style="margin-top:100px;" >


<table align="center"  >
<form class="loginform"  method="POST" action="checklogin.php" >
<caption id="checku" >

<?php

session_start();
session_regenerate_id();
if(!isset($_SESSION['usern']))
{
if($_SESSION['logf']=='True')
{
$_SESSION['logf']='False';
session_destroy();
echo "Log In Failed, Try again";
}
if($_SESSION['los']=='True')
{
$_SESSION['los']='False';
session_destroy();
echo "Successfully Logged Out!";
}
if($_SESSION['nop']=='True')
{
$_SESSION['nop']='False';
session_destroy();
echo "You don't have permission to open that page!";
}
}
else
{
unset($_SESSION['usern']);
$_SESSION['los']='True';
//session_destroy();
header("Location: login.php");
}

?>

</caption>
<tr>

<td>
<input class="textbox" type="text" name="uname" placeholder="Username" required />
</td>
</tr>
<tr>

<td>
<input class="textbox" type="password" name="pwd" placeholder="Password" required />
</td>
</tr>
<tr>
<td align="center">
<input value="Log In" class="cbutton" type="Submit" />

<input type="Reset" class="cbutton" value="Clear" / >
</td>
</tr>
</form>

</table>

</div>


</body>

<html>

</html>
<?php

function checklogin()
{

/**************************************************/

	$db_hostname = "localhost";
	$db_username = "adbuser";
	$db_password = "aurora";
	$db_name     = "apper";

$link=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/***************************/

$name = $_POST["uname"];
$pswd = $_POST["pwd"];


$query = "SELECT * FROM comments WHERE name=? AND body=?";
/*http://php.net/manual/en/mysqli.prepare.php*/

if ($stmt = mysqli_prepare($link, $query)) {
mysqli_stmt_bind_param($stmt, 'ss', $name, $pswd);
/*http://php.net/manual/en/mysqli-stmt.bind-param.php*/

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

    printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));



if(mysqli_stmt_num_rows($stmt)>0)
{
session_start();
$_SESSION['usern']=$name;
echo "You are logged in as ".$name;
echo "thank you";
echo "recieved";
}
else
{
header("Location: http://www.google.com/");
echo "Error";
echo "sorry";
}


    /* close statement */
    mysqli_stmt_close($stmt);
    
}
/******************************/

mysqli_close($con);

/**************************************************/

}

?>
