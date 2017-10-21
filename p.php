<html>
	<body>
	
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
	
	$htno = $_POST['htno'];
	echo $htno;
	
	$query="select * from kar where uname=$htno";
	
	$result = mysqli_query($link,$query);
	
	    printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));
	
	
	
	if(mysqli_stmt_num_rows($stmt)>0)
	{
	echo "thank you";
	echo "recieved";
	echo "<table>";
	echo "<tr><th>Hall Ticket No.</th><th>Sub. Code</th><th>Sub. Name</th><th>Internal Marks</th><th>External Marks</th><th>Total Marks</th><th>Credits</th></tr>";
	//$stmt = mysqli_query($link,$query);
		
	while($row = mysqli_fetch_array($stmt)) {
	  echo "inside yeah!!!";
	  echo "<tr><td>" . $row['uname'] . "</td><td>" . $row['pwd'] . "</td></tr>";
	
	}
	echo "</table>";
	echo "over";
	mysqli_stmt_close($stmt);
	mysqli_close($link);
	
	}
	
	else
	{
	    /* close statement */
	    mysqli_stmt_close($stmt);
	echo "Roll No. not found";
	}
	?>
	
	</body>
	</html>
