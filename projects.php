<html>

<body>

<h2>Projects:</h2>

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
$result = mysqli_query($con,"SELECT * FROM projects ORDER BY name asc LIMIT $st, 20");

echo "<ul style='font-size:20px' >";
  while($row = mysqli_fetch_array($result)) {
  echo "<li><b><u>" . $row['name'] . "</u></b> by <b><i>" . $row['uname'] . " </i></b>";
  echo "<br>";
}
echo "</ul>";
    // disconnect from the database

mysqli_close($con);
?>

<a target="_blank" href="allproj.php" >Show All</a>

</body>

</html>
