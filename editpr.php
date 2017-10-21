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

$pname = $_POST['prname'];
$_SESSION['pd'] = $pname;
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
{/*
$_SESSION['pex']='True';
mysqli_stmt_close($stmt);
mysqli_close($link);
header("Location: start.php");
*/

echo "<html>
<head>
<title>Edit Project</title>
</head>
<body>
<div class='content' >";

$dir = $pname . "/";
echo "<h1>" . $dir . "</h1>";
?>




<div><!--
<span style="float:left;" >
<form method="post" action="editpr.php" >
<input type="hidden" value="<?php echo $pname; ?>" name="prname" ><!-- Using hidden field http://stackoverflow.com/questions/18431638/pass-a-php-variable-value-through-an-html-form--><!--
<input style='width:210px;' type="text" placeholder="FileName(create file)" name = "cfiln" class = "textbox" >&nbsp&nbsp<input height=30px width=30px type="image" value="submit" src="newfile2.png" alt="submit Button" >
<!--http://stackoverflow.com/questions/1994406/set-image-as-submit-button--><!--
</form>
</span>-->
<!--
<span style="float:right;" >
<form method="post" action="editpr.php" >
<input type="hidden" value="<?php echo $pname; ?>" name="prname" >
<input style='width:210px;' type="text" placeholder="UserName(Add User)" name = "auname" class = "textbox" >&nbsp&nbsp<input height=30px width=30px type="image" value="submit" src="adduser2.png" alt="submit Button" >
<!--http://stackoverflow.com/questions/1994406/set-image-as-submit-button--><!--
</form>
</span>-->
<span style="float:left;" >
<form method="post" action="editpr.php" >
<input type="hidden" value="<?php echo $pname; ?>" name="prname" >
<input style='width:210px;' type="text" placeholder="FileName(create/edit)" name = "efiln" class = "textbox" >&nbsp&nbsp<input type="image" value="submit" src="code.gif" alt="submit Button" >
<!--http://stackoverflow.com/questions/1994406/set-image-as-submit-button-->
</form>
</span>
<span style="float:right;" >
<form method="post" action="editpr.php" >
<input type="hidden" value="<?php echo $pname; ?>" name="prname" >
<input style='width:210px;' type="text" placeholder="FileName(delete)" name = "dfiln" class = "textbox" >&nbsp&nbsp<input height=30px width=30px type="image" value="submit" src="delfile.png" alt="submit Button" >
<!--http://stackoverflow.com/questions/1994406/set-image-as-submit-button-->
</form>

</span>

<a href="chfile.php" >Upload File</a>

</div>
<h2>Files:</h2>
<?php



$phpfiles = glob($dir."*");

echo "<ol style='font-size:20px;' >";
foreach($phpfiles as $phpfile)
{
echo "<li><a href=$phpfile >".basename($phpfile) . "</a><a href='$phpfile' ><img width=30px height=30px src='execute.gif'></a></li><br/>";
}

echo "</ol>";



?>


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

/////////////////////////////////////////////////////


if(isset($_POST['dfiln']))
{

delfun();

}

function delfun()
{
if(unlink($_POST['prname'] . "/" . $_POST['dfiln']))
{
//header("Location: editpr.php");
$_SESSION['df'] = 'True';
}
else
{
$_SESSION['df'] = 'False';
}
header("Location: choosepr.php");

}

if(isset($_POST['efiln']))
{
edfun();
}
function edfun()
{
$_SESSION['filn'] = $_POST['efiln'];
header("Location: efile.php");
}

if(isset($_POST['auname']))
{
admem();
}
function admem()
{
$name = $_POST['auname'];

$query = "Insert INTO projects (name, uname) VALUES (?,?)";
//$result = mysqli_query($link,"insert into projects(name,uname) values($pname,$name)");

if ($stmt = mysqli_prepare($link, $query)) {

mysqli_stmt_bind_param($stmt, 'ss', $_SESSION['pd'], $_POST['auname']);

    /* execute query */
    mysqli_stmt_execute($stmt);

mysqli_close($link);

}

$_SESSION['ma'] = 'True';
header("Location: choosepr.php");
}


?>

</html>
