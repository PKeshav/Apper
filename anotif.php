
<?php

include 'template.php';
include 'checksession.php';

?>

<html><!--starting html code-->

<head>

<title>Add Notification</title>

</head>

<body background="" >



<div class="content" >

<table align="center" cellpadding="10px" >
<form method="POST" action="adnote.php" >
<tr>
<td>
Subject:</td>
<td>
<input class="textbox" type="text" name="subject" required  />
</td>
</tr>
<tr>
<td valign=top >
Content:
</td>
<td>
<textarea class="textarea" type="text" name="body" rows=11 cols=40 maxlength=250 required ></textarea>
</td>
<td>

</td>
</tr>

<tr>
<td></td>
<td align="center">
<input value="Submit" class="cbutton" type="Submit" />

<input type="Reset" class="cbutton" value="Clear Fields" / >
</td>
</tr>

</form>

</table>

</div>


</body>

<html>

</html>
