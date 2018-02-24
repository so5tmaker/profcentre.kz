<? 

include ("blocks/bd.php");

if (isset($_POST['score']))
{
$score = $_POST['score'];
}

if (isset($_POST['id']))
{
$id = $_POST['id'];
}

$result = mysql_query("SELECT rating,q_vote FROM data WHERE id='$id'",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

$new_rating = $myrow['rating'] + $score;
$new_q_vote = $myrow['q_vote'] + 1;
$update = mysql_query("UPDATE data SET rating = '$new_rating', q_vote = '$new_q_vote'  WHERE id='$id'",$db); 

if ($update)
{
echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=files/blog.zip'>
</head></html>";
exit();

}


}

else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}




?>
