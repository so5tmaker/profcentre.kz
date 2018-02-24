<?
require_once 'blocks/global.inc.php';
//if (!isset($db)) {include ("blocks/bd.php");}
if (isset($_GET['id'])) {$id_score = $_GET['id'];}
if (!isset($id_score)) {$id_score = 1;}

/* Проверяем, является ли переменная числом */
if (!preg_match("|^[\d]+$|", $id_score)) {
exit ("<p>Неверный формат запроса! Проверьте URL!");
}

$result = mysql_query("SELECT * FROM data WHERE id='$id_score'",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result);
$cat = $myrow["cat"];
$new_view = $myrow["view"] + 1;
$update = mysql_query ("UPDATE data SET view='$new_view' WHERE id='$id_score'",$db);


}

else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo $myrow["title"]; ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="img/favicon.ico">
<meta name="description" content="<? echo $myrow["meta_d"]; ?>">
<meta name="keywords" content="<? echo $myrow["meta_k"]; ?>">


</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
  <? include ("blocks/header.php"); ?>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <? include ("blocks/lefttd.php"); ?>
        <td valign='top'>
         <? $n=0; include ("blocks/nav.php"); ?>
<? 
//$ret = "
//        <script type='text/javascript'><!--
//        google_ad_client = 'ca-pub-7017401012475874'';
//        /* БлокСтатейProfcentre 
//         468x60, sm создано 19.04.13 */
//        google_ad_slot = '8188789768';
//        google_ad_width = 468;
//        google_ad_height = 60;
//        //-->
//        </script>
//        <script type='text/javascript'
//        src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
//        </script>
//        ";
//echo "<div class='adv_div' align='center'>".$ret.'</div>';
//$text = ins_adv($myrow["text"]);	
$text = $myrow["text"];
printf ("
        <p class='post_title2'>%s</p>
        <p class='post_add'>Автор: %s</p>
        <p class='post_add'>Дата: %s</p>
        %s
        <p class='post_view'>Просмотров: %s</p>"
        ,$myrow["title"],$myrow["author"],$myrow["date"],$text,$myrow["view"]);
?>

<form action="vote_res.php" method="post" name="vv">
<p class="pvote">Оцените заметку: 1 <input name="score" type="radio" value="1"> 2 <input name="score" type="radio" value="2"> 3 <input name="score" type="radio" value="3"> 4 <input name="score" type="radio" value="4"> 5 <input name="score" type="radio" value="5" checked>
<input class="sub_vote" name="submit" type="submit" value="Оценить">
<input name="id" type="hidden" value="<?php echo "$id_score";?>">
<input name="tbl_name" type="hidden" value="<?php echo "data";?>">

</p>


</form>



<?
echo "<p class='post_comment'>Комментарии к этой заметке:</p>";	

$result3 = mysql_query ("SELECT * FROM comments WHERE post='$id_score' and cat='$cat'",$db);
if (mysql_num_rows($result3) > 0)
{
$myrow3 = mysql_fetch_array($result3);

do 
{
printf ("<div class='post_div'><p class='post_comment_add'>Комментарий добавил(а): <strong>%s</strong> <br> Дата: <strong>%s</strong></p>
<p>%s</p></div>",$myrow3["author"], $myrow3["date"], $myrow3["text"]);

}
while ($myrow3 = mysql_fetch_array($result3));
}

// Здесь нахожу количество записей (картинок) в таблице с картинками и выбираю одну в случайном порядке
$result4b = mysql_query ("SELECT COUNT(*) FROM comments_setting",$db);
$sum = mysql_fetch_array($result4b);
if (!$sum)
{   // выбираю первую, если запрос не прошёл
    $sum1 = 1;
}
else
{ // выбираю одну в случайном порядке
    $sum1 = rand (1, $sum[0]);
}

$result4 = mysql_query ("SELECT img FROM comments_setting WHERE id='$sum1'",$db);
$myrow4 = mysql_fetch_array($result4);

?>

<p class='post_comment'>Добавить Ваш комментарий:</p>
<form action="comment.php" method="post" name="form_com">
    <p><label>Ваше имя: </label><input name="author" type="text" size="30" maxlength="30"></p>
    <p><label>Текст комментария: <br> <textarea name="text" cols="32" rows="4"></textarea></label></p>
    <p class="sum">Введите сумму чисел с картинки<br>
    <img style='margin-top:5px; align:left' src="<? echo $myrow4["img"]; ?>"><br>
      <input style='margin-bottom:0px;margin-top:0px;' name="pr" type="text" size="8" maxlength="5"></p>
      <input name="id" type="hidden" value="<? echo $id_score; ?>">
      <input name="sum1" type="hidden" value="<? echo $sum1; ?>">
      <input name="cat" type="hidden" value="<? echo $cat; ?>">
    <p><input name="sub_com" type="submit" value="Комментировать"></p> 
</form>

        
        </td>
      </tr>
    </table></td>
  </tr>
  <? include ("blocks/footer.php"); ?>
</table>
</body>
</html>