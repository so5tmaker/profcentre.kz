<? include ("blocks/bd.php");
$mini_img_art='img/article.gif';
if (isset($_GET['date']))
{
$date = $_GET['date'];
}
else 
{
exit("<p>Вы обратились к файлу без необходимых параметров. Проверьте адресную строку браузера.");
}
$date_title = $date;

$date_begin = $date;
$date++;
$date_end = $date;

$date_begin = $date_begin."-01";
$date_end = $date_end."-01";




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo "Заметки за $date_title"; ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
<table align="center" cellpadding="0" cellspacing="0" border="0" width="932" style="background:url('img/1.png')">
<!--table1-->
	<tr><!--table1_tr1-->
		<td align="center" valign="top"><? include ("blocks/header.php"); ?></td>
	</tr><!--table1_tr1-->
	<tr><!--table1_tr2-->
		<td align="center" valign="top" style="background:url('img/8.gif') center repeat-y;"><!--table1_tr2_td1-->
            <div style="height:5px;">
            </div>
			<table cellpadding="0" cellspacing="0" border="0" width="932" style="background:url('img/9.gif') #686552;">
            <!--table2-->
				<tr width="932"><!--table2_tr1-->
					<td><!--table2_tr1_td1-->
                        <img src="img/10.gif" border="0">
                    </td><!--table2_tr1_td1-->
				</tr><!--table2_tr1-->
                <td valign="top" align="center"><!--table2_td1-->
                    <table cellpadding="5" cellspacing="0" border="0" width="100%">
                    <!--table3-->
                        <? include ("blocks/lefttd.php"); ?>
                        <td valign="top"><!--table3_td1-->
                        <? $n=1; include ("blocks/nav.php"); ?>
						<? 
						$result = mysql_query("SELECT id,cat,title,description,date,author,mini_img,view,rating,q_vote FROM courses WHERE (lang='ru' or lang='') and (secret=0 AND date>'$date_begin') AND (date<'$date_end')",$db);
						
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
						
						$r = $myrow["rating"]/$myrow["q_vote"];
						$r = intval($r);
						
						printf ("<br><table align='center' class='post'>
								 
								 <tr>
								 <td class='post_title'>
								 <p class='post_name'><a href='data.php?cat=%s&id=%s&sec=%s'>%s</a></p>
								 <p class='post_adds'>Дата добавления: %s</p>
								 <p class='post_adds'>Автор урока: %s</p></td>
								 </tr>
								 
								 <tr>
								 <td>%s <p class='post_view'>Просмотров: %s &nbsp;&nbsp; Рейтинг: <img src='img/%s.gif'></p></td>
								 </tr>
								 
								 </table><br><br>",$myrow["cat"],$myrow["id"],'courses',$myrow["title"], $myrow["date"],$myrow["author"],$myrow["description"], $myrow["view"], $r);
						}
						while ($myrow = mysql_fetch_array($result));//<img class='mini' align='left' src='%s'>$mini_img_art,
						}
						else
						{
						echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
						exit();
						}
						?>
        				</td><!--table3_td1-->
                       <? include ("blocks/righttd.php"); ?> 
                     </table><!--table3-->
                  </td><!--table2_td1-->
                <tr><!--table2_tr2-->
                    <td><img src="img/13.gif" border="0"></td>
                </tr><!--table2_tr2-->
  			</table><!--table2-->
			<? include ("blocks/footer.php"); ?>
        </td><!--table1_tr2_td1-->
	</tr><!--table1_tr2-->
	<tr><!--table1_tr3-->
		<td align="center"><img src="img/14.gif" border="0"></td>
	</tr><!--table1_tr3-->
</table><!--table1-->
</body>
</html>
