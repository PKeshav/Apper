<?php
session_start();
session_regenerate_id();

file_put_contents($_SESSION['pd'] . "/" . $_SESSION['filn'], $_POST['fcont']);

$_SESSION['ef'] = 'True';
header("Location: choosepr.php");

?>
