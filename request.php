<? include ("blocks/bd.php");

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

if (isset($_GET['sent']))
{
    $sent = $_GET['sent'];
}

$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='request'",$db);

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
//
$result4a_ = mysql_query ("SELECT COUNT(*) FROM comments_setting",$db);
$sum = mysql_fetch_array($result4a_);
if (!$sum)
{   // выбираю первую, если запрос не прошёл
    $sum1 = 1;
}
else
{ // выбираю одну в случайном порядке
    $sum1 = rand (1, $sum[0]);
}
// Здесь нахожу количество записей (картинок) в таблице с картинками и выбираю одну в случайном порядке
$result4a = mysql_query("SELECT img FROM comments_setting WHERE id='$sum1'",$db);

if (!$result4a)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result4a) > 0)

{
$myrow4a = mysql_fetch_array($result4a);
}

?>
<? include("header.html");?>
<h2 align="center"><? echo $myrow["title"]; ?></h2>
<? echo $myrow["text"]; 
if (isset($sent))
    {
        echo "<p align='center' class='post_comment'>Ваше письмо успешно отправлено!</p>";
    }
?>
<p class='post_comment'>Написать письмо:</p>
<!--<form action="sendmail.php" method="post" name="form_mail">
    <p><label>Ваше имя: </label><input style='margin-left:8px;' name="author" type="text" size="30" maxlength="30"></p>
    <p><label>Ваш e-mail: </label><input name="email" type="text" size="30" maxlength="30"></p>
    <p><label>Текст письма: <br> <textarea name="text" cols="32" rows="4"></textarea></label></p>
    <p>Введите сумму чисел с картинки<br><img src="<? //echo $myrow4a["img"]; ?>" width="80" height="40"><br>
      <input style='margin-bottom:5px;' name="pr" type="text" size="5" maxlength="5"></p>
      <input name="id" type="hidden" value="<? //echo $sum1; ?>">
    <p><input name="sub_mail" type="submit" value="Отправить"></p>
</form>-->
<h2 align="center"><a href="mailto:profcentre.alm@gmail.com?subject=Заявка на участие в тренинге или семинаре&Body=Прошу записать меня на участие в вашем тренинге или семинаре по теме:">Отправить заявку на участие в тренинге или семинаре</а></h2>
<? include("footer.html");?>
						

        
