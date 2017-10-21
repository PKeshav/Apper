<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['user']))
{
$_SESSION['nop']='True';
header("Location: login.php");
}
else
{
$_SESSION['nop']='False';
}
?>
