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
<? $title_here = "Страница редактирования раздела ".$addtitle; include("header.html"); ?>
    
<? 

if (!isset($id))

{
    $resultrtd = mysql_query("SELECT title,id FROM `sections".$tbl_dt."`");
    $myrowrtd = mysql_fetch_array($resultrtd);
    do
    {
        printf ("<p><a href='edit_sec.php?id=%s&%s'>%s</a></p>",$myrowrtd["id"],$tbl_dt_full,$myrowrtd["title"]);
    }
    while ($myrowrtd = mysql_fetch_array($resultrtd));
}
else
{
    $result = mysql_query("SELECT * FROM sections".$tbl_dt." WHERE id=$id");
    $myrow = mysql_fetch_array($result);
    echo "<h3 align='center'>Редактирование раздела ".$addtitle."</h3>";
    print <<<HERE
    <form name='form1' method='post' action='update_sec.php'>
         <p>
           <label>Введите название раздела<br>
             <input value="$myrow[title]" type="text" name="title" id="title" size="$SizeOfinput">
             </label>
         </p>
         <p>
           <label>Введите краткое описание раздела<br>
           <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d" size="$SizeOfinput">
           </label>
         </p>
         <p>
           <label>Введите ключевые слова для раздела<br>
           <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k" size="$SizeOfinput">
           </label>
         </p>
        
         <p>
           <label>Введите полный текст описания раздела
           <textarea name="text" id="text" cols="$ColsOfarea" rows="30">$myrow[text]</textarea>
           </label>
         </p>

         <!--<p>
           <label>Введите полный путь к файлу раздела
           <input value="$myrow[file]" type="text" name="file" id="file" size="25" maxlength="40">
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
