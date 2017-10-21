<?php
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
?>
