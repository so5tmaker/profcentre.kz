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
<? $title_here = "Обработчик"; include("header.html"); ?>
<?php 
if (isset($title) && isset($link))
{
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("INSERT INTO friends (title,link) VALUES ('$title', '$link')");

if ($result == 'true') {echo "<p>Ваш друг успешно добавлен!</p>";}
else {echo "<p>Ваш друг не добавлен!</p>";}
}		 
else 
{
echo "<p>Вы ввели не всю информацию, поэтому друг в базу не может быть добавлен.</p>";
}
?>
<? include("footer.html");?>
