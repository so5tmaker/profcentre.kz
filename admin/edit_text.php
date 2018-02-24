<?php 
include ("lock.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<? $title_here = "Страница изменения содержания страниц сайта ".$name_dt; include("header.html"); ?>
<p><strong>Выберите страницу для редактирования данных</strong></p>      
<? 

if (!isset($id))

{
$result = mysql_query("SELECT title,id FROM settings");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_text.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{

$result = mysql_query("SELECT * FROM settings WHERE id=$id");      
$myrow = mysql_fetch_array($result);

print <<<HERE

<form name="form1" method="post" action="update_text.php">
         <p>
           <label>Введите название страницы (тэг title)<br>
             <input value="$myrow[title]" type="text" name="title" id="title" size="$SizeOfinput">
             </label>
         </p>
         <p>
           <label>Введите краткое описание страницы<br>
           <input value="$myrow[meta_d]" type="text" name="meta_d" id="meta_d" size="$SizeOfinput">
           </label>
         </p>
         <p>
           <label>Введите ключевые слова для страницы<br>
           <input value="$myrow[meta_k]" type="text" name="meta_k" id="meta_k" size="$SizeOfinput">
           </label>
         </p>
        
         <p>
           <label>Введите полный текст страницы с тэгами
           <textarea name="text" id="text" cols="$ColsOfarea" rows="30">$myrow[text]</textarea>
           </label>
         </p>
            <input name="id" type="hidden" value="$myrow[id]">
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
