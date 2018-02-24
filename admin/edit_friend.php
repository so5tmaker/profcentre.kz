<?php 
include ("lock.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<? $title_here = "Страница редактирования друга"; include("header.html"); ?>
<? 
if (!isset($id))

{
$result = mysql_query("SELECT title,id FROM friends");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_friend.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{

$result = mysql_query("SELECT * FROM friends WHERE id=$id");      
$myrow = mysql_fetch_array($result);

echo "<h3 align='center'>Редактирование друга</h3>";
print <<<HERE
<form name='form1' method='post' action='update_friend.php'>
 <p>
   <label>Введите название сайта друга<br>
	 <input value="$myrow[title]" type="text" name="title" id="title" size="$SizeOfinput">
	 </label>
 </p>
 <p>
   <label>Введите ссылку на сайт друга<br>
   <input value="$myrow[link]" type="text" name="link" id="link" size="$SizeOfinput">
   </label>
 </p>

 <input name="id" type="hidden" value="$myrow[id]">
 
 <p>
   <label>
   <input type="submit" name="submit" id="submit" value="Сохранить изменения">
   </label>
 </p>
</form>
HERE;
}
?>
<? include("footer.html");?>
