<?php
	$db_hostname = "localhost";
	$db_username = "adbuser";
	$db_password = "aurora";
	$db_name     = "apper";

$con=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

$blue0="NatriumChloride";
$blue1="SodiumChloride";
$blue2="NaCl";

$link=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/***************************/

$name = $_POST["uname"];


session_start();

$query = "SELECT * FROM kar WHERE uname=? AND pwd=?";
/*http://php.net/manual/en/mysqli.prepare.php*/

if ($stmt = mysqli_prepare($link, $query)) {
$body = $_POST["pwd"];
mysqli_stmt_bind_param($stmt, 'ss', $name, $body);
/*http://php.net/manual/en/mysqli-stmt.bind-param.php*/

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

    printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));



if(mysqli_stmt_num_rows($stmt)>0)
{
echo "thank you";
echo "recieved";
$_SESSION['usern']=$_POST['uname'];
$_SESSION['user']=$_POST['uname'];
$_SESSION['logf']='False';
$_SESSION['class2']='admin';
$_SESSION['class']='admin';
mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: index.php");
}


    /* close statement */
    mysqli_stmt_close($stmt);
    
}
/******************************/

$query = "SELECT * FROM faculty WHERE uname=? AND pwd=?";
/*http://php.net/manual/en/mysqli.prepare.php*/

if ($stmt = mysqli_prepare($link, $query)) {
$body = $_POST["pwd"];
mysqli_stmt_bind_param($stmt, 'ss', $name, $body);
/*http://php.net/manual/en/mysqli-stmt.bind-param.php*/

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

    printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));



if(mysqli_stmt_num_rows($stmt)>0)
{
echo "thank you";
echo "recieved";
$_SESSION['usern']=$_POST['uname'];
$_SESSION['user']=$_POST['uname'];
$_SESSION['class2']='faculty';
$_SESSION['class']='faculty';
$_SESSION['logf']='False';
mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: index.php");
}


    /* close statement */
    mysqli_stmt_close($stmt);
    
}
/******************************/

$query = "SELECT * FROM student WHERE uname=? AND pwd=?";
/*http://php.net/manual/en/mysqli.prepare.php*/

if ($stmt = mysqli_prepare($link, $query)) {
$body = $_POST["pwd"];
mysqli_stmt_bind_param($stmt, 'ss', $name, $body);
/*http://php.net/manual/en/mysqli-stmt.bind-param.php*/

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

    printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));



if(mysqli_stmt_num_rows($stmt)>0)
{
echo "thank you";
echo "recieved";
$_SESSION['usern']=$_POST['uname'];
$_SESSION['user']=$_POST['uname'];
$_SESSION['class2']='student';
$_SESSION['class']='student';
$_SESSION['logf']='False';
mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: index.php");
}


    /* close statement */
    mysqli_stmt_close($stmt);
    
}
/******************************/



if(!isset($_SESSION['usern']))
{
$_SESSION['logf']='True';
mysqli_stmt_close($stmt);
mysqli_close($con);
header("Location: login.php");
echo "Error";
echo "sorry";
}

mysqli_close($con);
?>
