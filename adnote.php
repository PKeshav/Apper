<?php

include 'checksession.php';


	$db_hostname = "localhost";
	$db_username = "adbuser";
	$db_password = "aurora";
	$db_name     = "apper";

$con=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

/***************************/

$name = $_POST["subject"];
$body = $_POST["body"];
$user = $_SESSION['usern'];
$date = date('Y-m-d H:i:s');

$query = "Insert INTO notif (subject, note, user, dat) VALUES (?,?,?,?)";

if ($stmt = mysqli_prepare($con, $query)) {

mysqli_stmt_bind_param($stmt, 'ssss', $name,$body,$user,$date);

    /* execute query */
    mysqli_stmt_execute($stmt);
    /* store result */
  //  mysqli_stmt_store_result($stmt);

//$result = 'False';
//$result = mysqli_query($con,"Insert INTO notif (subject, note, user, dat) VALUES ('$name', '$body', '$user', '$date')");

//if(mysqli_stmt_num_rows($stmt)>0)//if($result)

echo "thank you";
echo "recieved";
header("Location: notifications.php");


/******************************/

mysqli_close($con);
}

?>
