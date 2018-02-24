<? include ("lock.php");
$addtitle = "правого блока";
if (isset($_GET['tbl_dt'])) {
    $tbl_dt = $_GET['tbl_dt'];
    $addtitle = "правого блока";
} else {
    $tbl_dt = "";
    $addtitle = "левого блока";
}
?>

<? $title_here = "Страница добавления нового раздела ".$addtitle; include("header.html"); 
echo "<h3 align='center'>Добавление категории ".$addtitle."</h3>";?>
<form name="form1" method="post" action="add_sec.php">
 <p>
   <label>Введите название раздела<br>
     <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
     </label>
 </p>
 <p>
   <label>Введите краткое описание раздела<br>
   <input type="text" name="meta_d" id="meta_d" size="<? echo $SizeOfinput ?>">
   </label>
 </p>
 <p>
   <label>Введите ключевые слова для раздела<br>
   <input type="text" name="meta_k" id="meta_k" size="<? echo $SizeOfinput ?>">
   </label>
 </p>

 <p>
   <label>Введите полный текст раздела с тэгами
   <textarea name="text" id="text" cols="<? echo $ColsOfarea ?>" rows="30"></textarea>
   </label>
 </p>
<input name="tbl_dt" type="hidden" value="<? echo $tbl_dt ?>">
 <!--<p>
   <label>Введите полный путь к файлу раздела
   <input type="text" name="file" id="file" size="25" maxlength="40">
   </label>
 </p>-->

 <p>
   <label>
   <input type="submit" name="submit" id="submit" value="Занести раздел в базу">
   </label>
 </p>
 </form>
<? include("footer.html");?>