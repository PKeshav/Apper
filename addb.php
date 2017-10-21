<?php

session_start();
session_regenerate_id();
$usern=$_SESSION['usern'];

	$db_hostname = "localhost";
	$db_username = "adbuser";
	$db_password = "aurora";
	$db_name     = "apper";

//$con=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

$link=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/***************************/

$name = $_POST["dbname"];
$dbuser=$_POST['dbuname'];
$dbpwd=$_POST['dbpwd'];

session_start();

$query = "SELECT * FROM db WHERE name=?";
/*http://php.net/manual/en/mysqli.prepare.php*/

if ($stmt = mysqli_prepare($link, $query)) {

mysqli_stmt_bind_param($stmt, 's', $name);
/*http://php.net/manual/en/mysqli-stmt.bind-param.php*/

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

    printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));



if(mysqli_stmt_num_rows($stmt)>0)
{
$_SESSION['dex']='True';
mysqli_stmt_close($stmt);
mysqli_close($link);
header("Location: cdb.php");
}
else
{


//$result = 'False';
//$result = mysqli_query($link,"Insert INTO projects (name, uname) VALUES ('$name', '$usern')");


$stmt = mysqli_prepare($link, "Insert INTO db (name, uname) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt,'ss',$name,$usern);
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($link, "CREATE DATABASE $name");
mysqli_stmt_bind_param($stmt,'s',$name);
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($link, "CREATE USER '$dbuser'@'localhost' IDENTIFIED BY '$dbpwd'");
mysqli_stmt_bind_param($stmt,'ss',$dbuser,$dbpwd);
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($link, "GRANT ALL PRIVILEGES ON $name . * TO '$dbuser'@'localhost'");
mysqli_stmt_bind_param($stmt,'ss',$name,$dbuser);
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($link, "FLUSH PRIVILEGES");
mysqli_stmt_execute($stmt);

/* close statement */
    mysqli_stmt_close($stmt);
$_SESSION['dbc']='True';
header("Location: cdb.php");


}
    
}


?>
