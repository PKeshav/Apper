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

$name = $_POST["prname"];


session_start();

$query = "SELECT * FROM projects WHERE name=?";
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
$_SESSION['pex']='True';
mysqli_stmt_close($stmt);
mysqli_close($link);
header("Location: start.php");
}
else
{


$structure=$_POST['prname'];
/*
mkdir(strtolower("$structure"),0777);

echo $structure;

if (!is_dir("/var/www/html/ProjectFiles/$structure"))
{

echo "going inside if";
echo exec('whoami');
}
else
{
echo "not inside if :)";
}
*/

if (!mkdir("/var/www/html/ProjectFiles/$structure", 0777)) {/*initially didn't work because umask was set to 0022 as specified in http://stackoverflow.com/questions/3997641/why-cant-php-create-a-directory-with-777-permissions and permission or the owner of apache2 was not the user i.e., keshav but www-data therefore by changing the owner as told in http://stackoverflow.com/questions/5165183/apache-permissions-php-file-create-mkdir-fail (using gedit etc/apache2/envvars 'export APACHE_RUN_USER=keshav') now we are able to create the directory :) */
    die('Failed to create folders...');
}
else
{
//$result = 'False';
//$result = mysqli_query($link,"Insert INTO projects (name, uname) VALUES ('$name', '$usern')");


$stmt = mysqli_prepare($link, "Insert INTO projects (name, uname) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt,'ss',$name,$usern);
mysqli_stmt_execute($stmt);


/* close statement */
    mysqli_stmt_close($stmt);
$_SESSION['pc']='True';
header("Location: choosepr.php");
}

}
    
}


?>
