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
	
	$query="select * from kar where uname=?";
	
	
	if ($stmt = mysqli_prepare($link, $query)) {
	
	mysqli_stmt_bind_param($stmt, 's', $htno);
	/*http://php.net/manual/en/mysqli-stmt.bind-param.php*/
	$htno = $_POST['htno'];
	    /* execute query */
    	mysqli_stmt_execute($stmt);
	

	

	    /* store result */
	    mysqli_stmt_store_result($stmt);
	
	    printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));
	
	
	
	if(mysqli_stmt_num_rows($stmt)>0)
	{
	echo "thank you";
	echo "recieved";
	echo "<table>";
	echo "<tr><th>Hall N</th><th>Padd</th></tr>";
	//$stmt = mysqli_query($link,$query);
		
	while($row = /*mysqli_fetch_assoc($stmt)*/  $stmt->fetch(PDO::FETCH_ASSOC)  ) {
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
	}
	?>
	
	</body>
	</html>
