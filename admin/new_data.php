<?
if (isset($_GET['name_dt'])) {$name_dt = $_GET['name_dt'];}
if (isset($_GET['tbl_dt'])) {$tbl_dt = $_GET['tbl_dt'];}
if (isset($_GET['sec_dt'])) {$sec_dt = $_GET['sec_dt'];}
?>
<? include ("lock.php");?>
<? $title_here = "Страница добавления ".$name_dt; include("header.html");?>
<form name_dt="form1" method="post" action="add_data.php">
 <p>
   <label>Введите название <? echo $name_dt ?><br>
       <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>" >
     </label>
 </p>
 <p>
   <label>Введите краткое описание <? echo $name_dt ?><br>
   <input type="text" name="meta_d" id="meta_d" size="<? echo $SizeOfinput ?>">
   </label>
 </p>
 <p>
   <label>Введите ключевые слова для <? echo $name_dt ?><br>
   <input type="text" name="meta_k" id="meta_k" size="<? echo $SizeOfinput ?>">
   </label>
 </p>
 <p>
   <label>Введите дату добавления <? echo $name_dt ?>:
   <input name="date" type="text" id="date" size="8px" value="<?php $date = date("Y-m-d"); echo $date; ?>">
   </label>
 </p>
 <p>
   <label>Ведите краткое описание <? echo $name_dt ?> с тэгами абзацев
   <textarea name="description" id="description" cols="<? echo $ColsOfarea ?>" rows="20"></textarea>
   </label>
 </p>
 <p>
   <label>Введите полный текст <? echo $name_dt ?> с тэгами
   <textarea name="text" id="text" cols="<? echo $ColsOfarea ?>" rows="30"></textarea>
   </label>
 </p>
 <p>
   <label>Введите автора <? echo $name_dt ?><br>
   <input type="text" name="author" id="author">
   </label>
 </p>
 
<!-- <p>
   <label>Введите где лежит миниатюра<br>
   <input type="text" name="img" id="img">
   </label>
 </p>-->
 
 <p>
   <label>Выберите категорию <? echo $name_dt ?><br>
   
   <select name="cat">
   
   <?
   
        $result = mysql_query("SELECT title,id FROM categories WHERE sec='$sec_dt'",$db);

        if (!$result)
        {
            echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
            exit(mysql_error());
        }
        $num_rows = mysql_num_rows($result);
        if ($num_rows > 0)
        {
            $myrow = mysql_fetch_array($result);
            do
            {
            printf ("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);
            }
            while ($myrow = mysql_fetch_array($result));
        }
        else
        {
//            echo "<p>Для добавления ".$name_dt." нужно добавить хотя бы одну категорию к разделу!</p>";
//            echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
//            exit();
        }
        ?>

   </select>
   </label>
 </p>
 <?if ($num_rows == 0) echo "<p style='color: red' ><label>Для добавления ".$name_dt." нужно добавить хотя бы одну категорию к разделу!</label></p>";?>
<!-- <p>Добавлять в секретный раздел?<br>
   <label><strong>Да</strong>
   <input type="radio" name="secret" id="secret" value="1">
   </label>
   
    <label><strong>Нет</strong>
   <input type="radio" checked name="secret" id="secret" value="0">
   </label>
 </p>-->
 <input name="name_dt" type="hidden" value="<? echo $name_dt ?>">
 <input name="tbl_dt" type="hidden" value="<? echo $tbl_dt ?>">
 <p>
   <label>
   <input type="submit" name="submit" id="submit" value="<? echo "Занесение ".$name_dt." в базу" ?>">
   </label>
 </p>
</form>
<? include("footer.html");?>
