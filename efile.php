<?php
session_start();
session_regenerate_id();

include 'template.php';
include 'checksession.php';




/*
if(!isset($_SESSION['user']))
{
$_SESSION['nop']='True';
header("Location: login.php");
}
else
{
$_SESSION['nop']='False';
}*/

	$db_hostname = "localhost";
	$db_username = "adbuser";
	$db_password = "aurora";
	$db_name     = "apper";

$link=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$pname = $_SESSION['pd'];
$name = $_SESSION['user'];

$query = "SELECT distinct uname FROM projects WHERE name=? AND uname=?";

if ($stmt = mysqli_prepare($link, $query)) {

mysqli_stmt_bind_param($stmt, 'ss', $pname,$name);
/*http://php.net/manual/en/mysqli-stmt.bind-param.php*/

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

//    printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));//helps to know that query is working



if(mysqli_stmt_num_rows($stmt)>0)
{







?>

<html>
<head>
<title>Edit File</title>
</head>
<body>
<div class="content" >
<h1>
<?php
echo $pname . "/" . $_SESSION['filn'];
?>
</h1>
<h2>Edit:</h2>
<form method="post" action="save.php" >
<textarea class ="textarea" cols=60 rows=20 name="fcont" ><?php readfile($_SESSION['pd'] . "/" . $_SESSION['filn']); ?></textarea>
<input type="submit" value="save" class="cbutton" >
</form>
</div>
</body>


<?php
}
else
{
$_SESSION['nep'] = 'True';
header("Location: choosepr.php");
}

}
    mysqli_stmt_close($stmt);
?>
</html>
