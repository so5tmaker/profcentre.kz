<?php 
include ("lock.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
?>
<? $title_here = "Обработчик"; include("header.html"); ?>
<?php 
if (isset($id))
{
$result = mysql_query ("DELETE FROM friends WHERE id='$id'");

if ($result == 'true') {echo "<p>Ваш друг успешно удален!</p>";}
else {echo "<p>Ваш друг не удален!</p>";}


}		 
else 

{
echo "<p>Вы запустили данный фаил без параметра id и поэтому, удалить друга невозможно (скорее всего Вы не выбрали радиокнопку на предыдущем шаге).</p>";
}
?>
<? include("footer.html");?>