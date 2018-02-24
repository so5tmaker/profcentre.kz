<? 

include ("blocks/bd.php");

if (isset($_POST['score']))
{
$score = $_POST['score'];
}

if (isset($_POST['id']))
{
$id_score = $_POST['id'];
}

if (isset($_POST['tbl_name']))
{
$tbl_name = $_POST['tbl_name'];
}

if ($tbl_name=="files")
{
    $file_name = "view_file.php";
}
elseif ($tbl_name=="data")
{
    $file_name = "view_post.php";
}

$result = mysql_query("SELECT rating,q_vote FROM ".$tbl_name." WHERE id='$id_score'",$db);

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
    $update = mysql_query("UPDATE  ".$tbl_name." SET rating = '$new_rating', q_vote = '$new_q_vote'  WHERE id='$id_score'",$db);
    if ($update)
    {
        echo "<html><head>
        <meta http-equiv='Refresh' content='0; URL=$file_name?id=$id_score'>
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
