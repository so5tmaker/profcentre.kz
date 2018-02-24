<td width="165px" valign="top" class="left">

<p align="center" class="title">Разделы</p>
<div id="coolmenu">
<a href="new_sec.php">Добавить</a>
<a href="edit_sec.php">Редактировать</a>
<a href="del_sec.php">Удалить</a>
</div>

<p align="center" class="title">Категории</p>
<div id="coolmenu">
<a href="new_cat.php">Добавить</a>
<a href="edit_cat.php">Редактировать</a>
<a href="del_cat.php">Удалить</a>
</div>

<?
$name[1] = "курса";
$name_b[1] = "Курсы";
$name[2] = "тренинга";
$name_b[2] = "Тренинги";
$name[3] = "статьи";
$name_b[3] = "Статьи";
$table[1]= "courses";
$table[2]= "trainings";
$table[3]= "articles";
// Внимание переменная i будет указывать и на id секций 1 - Курсы, 2 - Тренинги, 3 - Статьи.
for ($i=1; $i <= 3; $i++)
{
    $args = "?name_dt=".$name[$i]."&tbl_dt=".$table[$i]."&sec_dt=".$i;
    printf ("
    <p align='center' class='title'>%s</p>
    <div id='coolmenu'>
    <a href='new_data.php%s'>Добавить</a>
    <a href='edit_data.php%s'>Редактировать</a>
    <a href='del_data.php%s'>Удалить</a>
    </div>",
    $name_b[$i],$args,$args,$args);
}
?>

<!--<p align="center" class="title">Файлы</p>
<div id="coolmenu">
<a href="new_file.php">Добавить</a>
<a href="edit_file.php">Редактировать</a>
<a href="del_file.php">Удалить</a>
</div>-->

<p align="center" class="title">Друзья</p>
<div id="coolmenu">
<a href="new_friend.php">Добавить</a>
<a href="edit_friend.php">Редактировать</a>
<a href="del_friend.php">Удалить</a>
</div>	

<p align="center" class="title">Содержание страниц</p>
<div id="coolmenu">
<a href="edit_text.php">Редактировать</a>
</div>	

<p align="center" class="title">Полезное</p>
<div id="coolmenu">
<a href="index.php">Главная</a>
</div>

</td>