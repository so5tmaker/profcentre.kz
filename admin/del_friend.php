<?php include ("lock.php");?>
<? $title_here = "�������� �������� �����"; include("header.html"); ?>
<p><strong>�������� ����� ��� ��������          </strong></p>
<form action="drop_friend.php" method="post">
<? 

$result = mysql_query("SELECT title,id FROM friends");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><input name='id' type='radio' value='%s'><label> %s</label></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));
?>

<p> <input name="submit" type="submit" value="������� �����!!!"></p>

</form>
<? include("footer.html");?>
