<?php 
include ("lock.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['tbl_dt'])) {$tbl_dt = $_POST['tbl_dt'];} else {$tbl_dt = "";}
?>
<? $title_here = "Обработчик"; include("header.html"); ?>
<?php
if (($id<=3)and($tbl_dt = "")) exit("<p>Вы не можете удалять разделы: Курсы, Тренинги, Статьи! Это плохо скажется на работе сайта!</p>" );
if (isset($id))
{
$result0 = mysql_query ("SELECT id FROM categories".$tbl_dt." WHERE sec='$id'",$db);
if (mysql_num_rows($result0) > 0) {

echo "<p>В разделе, который Вы хотите удалить, есть категории. Сначала перекиньте их по другим разделам.</p>";
}
else
{
$result = mysql_query ("DELETE FROM sections".$tbl_dt." WHERE id='$id'");
if ($result == 'true') {echo "<p>Ваш раздел успешно удален!</p>";}
else {echo "<p>Ваш раздел не удален!</p>";}
}
}
else

{
echo "<p>Вы запустили данный фаил без параметра id и поэтому, удалить раздел невозможно (скорее всего Вы не выбрали радиокнопку на предыдущем шаге).</p>";
}
?>
<? include("footer.html");?>
