<? include ("blocks/bd.php");

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='about'",$db);

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
<? $n=5; include("header.html");?>
<? echo $myrow["text"]; ?>
<? include("footer.html");?>
				
						

        
