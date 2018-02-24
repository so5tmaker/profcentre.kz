<td valign="top" width="186" >
<div style="width:186px;background:url('img/11.gif') no-repeat;margin:0;padding:5px 0 0 0;">
  <?
     function show_cat($id,$file,$result2,$db)
     {
        if (!$result2)
        {
        echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
        exit(mysql_error());
        }

        if (mysql_num_rows($result2) > 0)
        {
            $myrow2 = mysql_fetch_array($result2);
            do
            {
                //Здесь хочу проверить, есть ли в категории хоть одна заметка,
                //если нет не буду выводить категорию
                $cat=$myrow2["id"];
                //$tbl=$myrow2["cat_tbl"];
                $tbl = "courses";
                $res_kol = mysql_query ("SELECT COUNT(*) FROM ".$tbl." WHERE cat='$cat' and (lang='ru' or lang='')",$db);
                $sum_kol = mysql_fetch_array($res_kol);
                if ($sum_kol[0]<>0)
                {
                    printf ("<p class='point'><img src='img/18.gif' height='10' width='10'><a class='m' href='%s?cat=%s&sec=%s'>%s (%s)</a></p>",$file,$cat,'courses',$myrow2["title"],$sum_kol[0]);
                }
            }
            while ($myrow2 = mysql_fetch_array($result2));
        }
        else
        {
            echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
            exit();
        }
     }

    $sec_res = mysql_query("SELECT * FROM sections WHERE id='1'",$db);

    if (!$sec_res)
    {
    echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
    exit(mysql_error());
    }

    if (mysql_num_rows($sec_res) > 0)
    {
        $sec_row = mysql_fetch_array($sec_res);
    do
    {
        $id=$sec_row["id"];
        $result2 = mysql_query("SELECT * FROM categories WHERE sec='$id'",$db);
        if (mysql_num_rows($result2) > 0)
        {
            if (!$result2)
            {
                echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
                exit(mysql_error());
            }
            printf ("<div class='menu_title'>%s</div>",$sec_row["title"]);
            show_cat($id,"data.php",$result2,$db);
        }
    }
        while ($sec_row = mysql_fetch_array($sec_res));
    }
    else
    {
        echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
        exit();
    }

 ?>
  
 <div class="menu_title">Новые курсы</div>

<?php

$result3 = mysql_query("SELECT id,cat,title FROM courses WHERE lang='ru' or lang='' and secret=0 ORDER BY id DESC LIMIT 5",$db);

if (!$result3)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}
if (mysql_num_rows($result3) > 0)
{
$myrow3 = mysql_fetch_array($result3);
do 
{

printf ("<p class='point'><img src='img/18.gif' height='10' width='10'><a class='m' href='data.php?cat=%s&id=%s&sec=%s'>%s</a></p>",$myrow3["cat"],$myrow3["id"],'courses',$myrow3["title"]);
}
while ($myrow3 = mysql_fetch_array($result3));
}
else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}
?>

 
<!-- <div class="menu_title">Архив</div>-->
<? 
 
// $result4 = mysql_query("SELECT DISTINCT left(date,7) AS month FROM courses WHERE lang='ru' or lang='' ORDER BY month DESC",$db);
//
//if (!$result4)
//{
//echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
//exit(mysql_error());
//}
//
//if (mysql_num_rows($result4) > 0)
//
//{
//$myrow4 = mysql_fetch_array($result4); 
//
//do 
//{
//printf ("<p class='point'><img src='img/18.gif' height='10' width='10'><a class='m' href='view_date.php?date=%s'>%s</a></p>",$myrow4["month"],$myrow4["month"]);
//
//
//
//}
//while ($myrow4 = mysql_fetch_array($result4));
//
//
//
//
//}
//
//else
//{
//echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
//exit();
//}

?> 

<div class="menu_title">Друзья сайта</div>


<?

$result7 = mysql_query("SELECT title,link FROM friends WHERE lang='ru' or lang='' ",$db);

if (!$result7)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result7) > 0)

{
$myrow7 = mysql_fetch_array($result7);

do 
{
printf ("<p class='point'><img src='img/18.gif' height='10' width='10'><a class='m' href='%s' target='_blank'>%s</a></p>",$myrow7["link"],$myrow7["title"]);



}
while ($myrow7 = mysql_fetch_array($result7)); 


}

else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}

?>

 <div class="menu_title">Поиск</div>
 	<!--Это поиск-->
	<div align="center">
	<form action="<?echo $url ?>google_search.php" id="cse-search-box">
	  <div>
		<input type="hidden" name="cx" value="partner-pub-7017401012475874:7009447769" />
		<input type="hidden" name="cof" value="FORID:10" />
		<input type="hidden" name="ie" value="windows-1251" />
		<input type="text" name="q" size="24" />
		<input class="search_b" type="submit" name="sa" value="Искать" />
	  </div>
	</form>
	<script type="text/javascript" src="http://www.google.kz/cse/brand?form=cse-search-box&amp;lang=ru"></script> 
        </div>
	<!--Это конец поиска-->

<div class="menu_title">Статистика</div>
 
 <?php 
 
$result10 = mysql_query ("SELECT COUNT(*) FROM articles WHERE lang='ru' or lang='' ",$db);
$sum = mysql_fetch_array($result10);

$result11 = mysql_query ("SELECT COUNT(*) FROM comments",$db);
$sum2 = mysql_fetch_array($result11);

//function online () {
//$ip=getenv("HTTP_X_FORWARDED_FOR");
//if (empty($ip) || $ip=='unknown') { $ip=getenv("REMOTE_ADDR"); }
//# уд. старые сессии
//mysql_query ("DELETE FROM online WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(time) > 300") or die ("Can't delete old sess");
//
//# проверка на присутстаие или занесение нового пользователя
//$select = mysql_query ("SELECT ip FROM online WHERE ip='$ip'") or die ("Can't select duble");
//$tmp = mysql_fetch_row ($select);
//if ($ip == $tmp[0]) {
//mysql_query ("UPDATE online SET time=NOW() WHERE ip='$ip'") or die ("Can't update");
//} else {
//mysql_query ("INSERT INTO online (ip,time) VALUES ('$ip',NOW())") or die ("Can't insert");
//}
//# считывание результатов
//$select = mysql_query ("SELECT COUNT(*) FROM online") or die ("Can't select result");
//$tmp = mysql_fetch_row ($select);
//$result = $tmp[0];
//
//return $result;
//}

echo "<p class='comments'>Заметок в базе: $sum[0]<br> Комментариев: $sum2[0]</p>"; 
 
 ?>
 
<div class="menu_title">Контакты</div>
<?php 
echo "<p class='comments'>Адрес: г. Алматы, 050057,<br>ул. Ауэзова 136, оф. 16,<br>между<br> ул. Тимирязева <br>и ул. Габдуллина<br>Тел./факс: (727) 274-68-60</p>";
?>

 
<img src="img/12.gif" border="0"></div>
</td>


