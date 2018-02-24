<?php 
include ("lock.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['tbl_dt'])) {$tbl_dt = $_POST['tbl_dt'];} else {$tbl_dt = "";}
?>
<? $title_here = "Обработчик"; include("header.html"); ?>
<?php 
if (isset($id))
{
//    $result0 = mysql_query ("SELECT id FROM courses WHERE cat='$id'",$db);
//    $result1 = mysql_query ("SELECT id FROM articles WHERE cat='$id'",$db);
//    $result2 = mysql_query ("SELECT id FROM trainings WHERE cat='$id'",$db);
//    $num_rows = mysql_num_rows($result0) + mysql_num_rows($result1) + mysql_num_rows($result2);
//    if ($num_rows > 0)
//    {
//        echo "<p>В категории, которую Вы хотите удалить, есть заметки. Сначала перекиньте их по другим категориям.</p>";
//    }
//    else
//    {
        $result = mysql_query ("DELETE FROM categories".$tbl_dt." WHERE id='$id'");
        if ($result == 'true') {echo "<p>Ваша категория успешно удалена!</p>";}
        else {echo "<p>Ваша категория не удалена!</p>";}
//    }
}		 
else 
{
    echo "<p>Вы запустили данный файл без параметра id и поэтому, удалить категорию невозможно (скорее всего Вы не выбрали радиокнопку на предыдущем шаге).</p>";
}		 
?>
<? include("footer.html");?>