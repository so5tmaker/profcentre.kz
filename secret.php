<? include ("blocks/bd.php");

$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='secret'",$db);

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

if (isset($_POST['code']))
{
$code = $_POST['code'];
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
        <td valign="top">
       
<? $n=0; include ("blocks/nav.php"); ?>
        
        <? echo $myrow["text"]; 

$result0 = mysql_query ("SELECT prcode FROM options",$db);
if ($result0)
{
$myrow = mysql_fetch_array($result0);
$prcode = $myrow["prcode"];		
}		
else
{
exit ("<p>Не удалось получить код секретного раздела. Проверьте наличие таблиц.");
}

if (!isset($code) or $code != $prcode)

{
		
echo "<form name='sec' action='secret.php' method='post'>
<p align='center'><strong>Введите код подписчика</strong></p>
<p align='center'><input class='sinput' type='text' name='code'></p>
<p align='center'><input class='sbutton' type='submit' name='submit' value='Получить доступ'></p>
</form>
<p align='center'><img src='img/zam.jpg' width='120' height='136'></p>";

$result = mysql_query("SELECT id,title,description,date,author,mini_img,view FROM data WHERE secret=1",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{
printf ("<table align='center' class='post'>
         
		 <tr>
         <td class='post_title'>
		 <p class='post_secret'><img class='mini' align='left' src='%s'><a href='#'>%s (доступ закрыт)</a></p>
		 <p class='post_adds'>Дата добавления: %s</p>
		 <p class='post_adds'>Автор урока: %s</p></td>
         </tr>
         
		 <tr>
         <td>%s <p class='post_view'>Просмотров: %s</p></td>
         </tr>
         
		 </table><br><br>",$myrow["mini_img"],$myrow["title"], $myrow["date"],$myrow["author"],$myrow["description"], $myrow["view"]);



}
while ($myrow = mysql_fetch_array($result));
		
}

}

else

{


$result = mysql_query("SELECT id,title,description,date,author,mini_img,view FROM data WHERE secret=1",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{
printf ("<table align='center' class='post'>
         
		 <tr>
         <td class='post_title'>
		 <p class='post_name'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
		 <p class='post_adds'>Дата добавления: %s</p>
		 <p class='post_adds'>Автор урока: %s</p></td>
         </tr>
         
		 <tr>
         <td>%s <p class='post_view'>Просмотров: %s</p></td>
         </tr>
         
		 </table><br><br>",$myrow["mini_img"],$myrow["id"],$myrow["title"], $myrow["date"],$myrow["author"],$myrow["description"], $myrow["view"]);



}
while ($myrow = mysql_fetch_array($result));

}	
		
}		
		
?>
        
        </td>
      </tr>
    </table></td>
  </tr>
  <? include ("blocks/footer.php"); ?>
</table>
</body>
</html>
