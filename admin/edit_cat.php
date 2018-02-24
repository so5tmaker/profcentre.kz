<?php 
include ("lock.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
$addtitle = "";
if (isset($_GET['tbl_dt']))
{
    $addtitle = "правого блока";
    $tbl_dt = $_GET['tbl_dt'];
    if (!isset($_GET['tbl_dt_full']))
    {
        $tbl_dt_full = "tbl_dt=".$tbl_dt;
    }
    else {$tbl_dt_full = $_GET['tbl_dt_full'];}
}
else
{
    $tbl_dt = "";
    $tbl_dt_full = "";
    $addtitle = "левого блока";
}
?>
<? $title_here = "Страница редактирования категории ".$addtitle; include("header.html"); ?>
<? 
if (!isset($id))
{
    $result = mysql_query("SELECT title,id FROM categories".$tbl_dt);
    $myrow = mysql_fetch_array($result);
    do
    {
    printf ("<p><a href='edit_cat.php?id=%s&%s'>%s</a></p>",$myrow["id"],$tbl_dt_full,$myrow["title"]);
    }
    while ($myrow = mysql_fetch_array($result));
}
else
{
    $result = mysql_query("SELECT * FROM categories".$tbl_dt." WHERE id=$id");
    $myrow = mysql_fetch_array($result);

    $result2 = mysql_query("SELECT id,title FROM sections".$tbl_dt);
    $myrow2 = mysql_fetch_array($result2);

    $count = mysql_num_rows($result2);

    echo "<h3 align='center'>Редактирование категории ".$addtitle."</h3>";
    echo "<form name='form1' method='post' action='update_cat.php'>
    <p>Выберите раздел для заметки<br><select name='sec' size='$count'>";

    do
    {

    if ($myrow['sec'] == $myrow2['id'])
    {
    printf ("<option value='%s' selected>%s</option>",$myrow2["id"],$myrow2["title"]);
    }

    else
    {
    printf ("<option value='%s'>%s</option>",$myrow2["id"],$myrow2["title"]);
    }

    }
    while ($myrow2 = mysql_fetch_array($result2));

    echo "</select></p>";

print <<<HERE
         <p>
           <label>Введите название категории<br>
             <input value="$myrow[title]" type="text" name="title" id="title" size="$SizeOfinput">
             </label>
         </p>
         <p>
           <label>Введите краткое описание категории<br>
           <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d" size="$SizeOfinput">
           </label>
         </p>
         <p>
           <label>Введите ключевые слова для категории<br>
           <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k" size="$SizeOfinput">
           </label>
         </p>
        
         <p>
           <label>Введите полный текст описании категории
           <textarea name="text" id="text" cols="$ColsOfarea" rows="30">$myrow[text]</textarea>
           </label>
         </p>

        <!--<p>
           <label>Введите полный путь к файлу категории
           <input value="$myrow[file]" type="text" name="file" id="file" size="25" maxlength="40">
           </label>
         </p>

         <p>
           <label>Введите таблицу данной категории
           <input value="$myrow[cat_tbl]" type="text" name="table" id="table" maxlength="20">
           </label>
         </p>-->

		 <input name="id" type="hidden" value="$myrow[id]">
                 <input name="tbl_dt" type="hidden" value="$tbl_dt">
		 
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Сохранить изменения">
           </label>
         </p>
       </form>
HERE;
}
?>
<? include("footer.html");?>
