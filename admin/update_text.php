<?php
$rus=0;
include ("lock.php");
if (isset($_POST['title']))       
{
$title = $_POST['title']; 

if ($title == '') 
{
unset($title);
}  

}

/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то мы создаем простую переменную из неё. Если переменная пустая, то уничтожаем переменную.   */
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
?>
<? $title_here = "Обработчик"; include("header.html"); ?>
<?php 
if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text))
{
/* Здесь пишем что можно заносить информацию в базу */
$result = mysql_query ("UPDATE settings SET title='$title', meta_d='$meta_d', meta_k='$meta_k', text='$text' WHERE id='$id'");

if ($result == 'true') {echo "<p>Ваша страница успешно обновлена!</p>";}
else {echo "<p>Ваша страница не обновлена!</p>";}


}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому данные этой страницы в базе не могут быть обновлены.</p>";
}
?>
<? include("footer.html");?>
