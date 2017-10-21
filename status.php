<?php
include 'checklogin.php';
session_start();
session_regenerate_id();
if(!isset($_SESSION['usern']))
{
$_SESSION['logo']='False';
header("Location: login.php");
}
else
{
$_SESSION['logo']='True';
header("Location: login.php");
}

?>
