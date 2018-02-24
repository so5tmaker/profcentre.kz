<?
if (!isset($db)) {include ("blocks/bd.php");}
// Проверяю sec она может прийти через метод get, а может через конструкцию include
if (isset($_GET['sec'])) 
{
	$sec = $_GET['sec'];	
}
else
{
	if (!isset($sec)) exit ("<p>Неверный формат запроса! Проверьте URL!");
}
// Проверяю cat она может прийти через метод get, а может через конструкцию include
if (isset($_GET['cat'])) 
{
	$cat = $_GET['cat'];	
}
else
{
	if (!isset($cat)) exit ("<p>Неверный формат запроса! Проверьте URL!");
}

/* Проверяем, является ли переменная числом */
if (!preg_match("|^[\d]+$|", $sec)) {
exit ("<p>Неверный формат запроса! Проверьте URL!");
}
/* Проверяем, является ли переменная числом */
if (!preg_match("|^[\d]+$|", $cat)) {
exit ("<p>Неверный формат запроса! Проверьте URL!");
}
$result = mysql_query("SELECT * FROM categories_rtd WHERE (id='$cat')and(sec='$sec')",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result);
}
else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}
?>
<? include("header.html");?>
<? printf ("
        <p class='post_title2'>%s</p>
        <p>	%s </p>"
        ,$myrow["title"],$myrow["text"]);
?>
<? include("footer.html");?>							
						