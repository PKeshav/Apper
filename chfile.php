<?php

include 'template.php';
include 'checksession.php';

$dir = $_SESSION['pd'] . "/";

?>

<html>
<head>
<title>Upload File</title>
</head>
<body>
<div class="content" >

<form action="upfile.php" method="post"
enctype="multipart/form-data">
<label for="file"><h1>Select a File to Upload:</h1></label>
<input type="file" name="file" id="file"><br>
<input type="hidden" name="dir" value="<?php echo $dir; ?>" >
<input height=50px width=50px type="image" value="submit" src="upfile.png" alt="submit Button" >
</form>

</div>
</body>
</html>
