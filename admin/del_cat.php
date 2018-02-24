<?php include ("lock.php");?>
<?if (isset($_GET['tbl_dt'])) {$tbl_dt = $_GET['tbl_dt'];} else {$tbl_dt = "";}?>
<? $title_here = "Страница удаления категории"; include("header.html"); ?>
<p><strong>Выберите категорию для удаления</strong></p>
<form action="drop_cat.php" method="post">
<? 

$result = mysql_query("SELECT title,id FROM categories".$tbl_dt);
$myrow = mysql_fetch_array($result);

do 
{
    printf ("<p><input name='id' type='radio' value='%s'><label> %s</label></p>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysql_fetch_array($result));
?>
<input name="tbl_dt" type="hidden" value="<? echo $tbl_dt ?>">
<p> <input name="submit" type="submit" value="Удалить категорию"></p>
</form>
<? include("footer.html");?>
