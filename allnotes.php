<?php
include 'template.php';
?>

<html>
<head>
<title>All Notifications</title>
</head>
<body>
<div class="content" >
<h1>List of all the Notifications</h1>
<?php
	$db_hostname = "localhost";
	$db_username = "adbuser";
	$db_password = "aurora";
	$db_name     = "apper";

$con=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

    // select everything from the news table
$st=0;
$result = 'False';
$result = mysqli_query($con,"SELECT * FROM notif ORDER BY dat desc");

echo "<ul>";
  while($row = mysqli_fetch_array($result)) {
  echo "<li><b><u>[" . $row['subject'] . "]</u></b> " . $row['note'] . " <i>by <b>" . $row['user'] . "</b> on <b>" . $row['dat'] . "</b></i></li>";
  echo "<br>";
}
echo "</ul>";
    // disconnect from the database

mysqli_close($con);
?>

</div>
</body>
</html>
