<?php
$rus=0;
include ("lock.php");
if (isset($_POST['title']))       
{
	$title = $_POST['title']; 
	if ($title == '') 
	{
	unset($title);
	}  
}
if (isset($_POST['link']))      {$link = $_POST['link']; if ($link == '') {unset($link);}}
?>
<? $title_here = "����������"; include("header.html"); ?>
<?php 
if (isset($title) && isset($link))
{
/* ����� ����� ��� ����� �������� ���������� � ���� */
$result = mysql_query ("INSERT INTO friends (title,link) VALUES ('$title', '$link')");

if ($result == 'true') {echo "<p>��� ���� ������� ��������!</p>";}
else {echo "<p>��� ���� �� ��������!</p>";}
}		 
else 
{
echo "<p>�� ����� �� ��� ����������, ������� ���� � ���� �� ����� ���� ��������.</p>";
}
?>
<? include("footer.html");?>
