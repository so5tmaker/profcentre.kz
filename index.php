<? include ("blocks/bd.php");
//Здесь я проверяю путь к файлу исполняемого в данный момент скрипта,
//чтобы определить какой url мне нужен для rss-ленты
//$SERVER = $_SERVER['SCRIPT_FILENAME'];
//if (strstr($SERVER, 'localhost')) $url = 'http://localhost/profcentre/';
//    else $url = 'http://www.profcentre.kz/';
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='index'",$db);

$test = "Проверка отладки кода";

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
<? $n=1; include("header.html");?>
<? echo $myrow["text"]; ?>
<? include ("view_index.php"); ?>
<? include("footer.html");?>
