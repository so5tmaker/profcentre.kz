<td valign="top" width="170"   >
<div style="width:186px;background:url('img/11.gif') no-repeat;margin:0;padding:5px 0 0 0;">
<?
function show_cat_rtd($id,$file,$res_cat,$db)
     {
        if (!$res_cat)
        {
        echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
        exit(mysql_error());
        }

        if (mysql_num_rows($res_cat) > 0)
        {
            $row_cat = mysql_fetch_array($res_cat);
            do
            {
                //Здесь хочу проверить, есть ли в категории хоть одна заметка,
                //если нет не буду выводить категорию
                $cat=$row_cat["id"];
                /*$tbl=$myrow2["cat_tbl"];
                $res_kol = mysql_query ("SELECT COUNT(*) FROM ".$tbl." WHERE cat='$cat' and (lang='ru' or lang='')",$db);*/
                /*$sum_kol = mysql_fetch_array($res_kol);
                if ($sum_kol[0]<>0)
                {*/
                    printf ("<p class='point'><img src='img/18.gif' height='10' width='10'><a class='m' href='%s?sec=%s&cat=%s'>%s</a></p>",$file,$id,$cat,$row_cat["title"]);
                /*}*/
            }
            while ($row_cat = mysql_fetch_array($res_cat));
        }
        else
        {
            echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
            exit();
        }
     }

    $sec_res_rtd = mysql_query("SELECT * FROM sections_rtd",$db);

    if (!$sec_res_rtd)
    {
    echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
    exit(mysql_error());
    }

    if (mysql_num_rows($sec_res_rtd) > 0)
    {
        $sec_row_rtd = mysql_fetch_array($sec_res_rtd);
    do
    {
        $sec_rtd=$sec_row_rtd["id"];
        $res_cat_rtd = mysql_query("SELECT * FROM categories_rtd WHERE sec='$sec_rtd'",$db);
        if (mysql_num_rows($res_cat_rtd) > 0)
        {
            if (!$res_cat_rtd)
            {
                echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
                exit(mysql_error());
            }
            printf ("<div class='menu_title'>%s</div>",$sec_row_rtd["title"]);
            show_cat_rtd($sec_rtd,"data_rtd.php",$res_cat_rtd,$db);
        }
    }
        while ($sec_row_rtd = mysql_fetch_array($sec_res_rtd));
    }
    else
    {
        echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
        exit();
    }

 ?>  

<?php 
echo '<div class="menu_title" style="padding:0 0 0 0;font-size:8pt;"><a href="request.php">Заявка на участие в семинаре (тренинге)</a></div>';
?>

</div>
<img src="img/12.gif" border="0">
</td>



