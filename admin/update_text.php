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

/* ���� ���������� � ���������� ������� $_POST['title'] ���. ������, �� �� ������� ������� ���������� �� ��. ���� ���������� ������, �� ���������� ����������.   */
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
?>
<? $title_here = "����������"; include("header.html"); ?>
<?php 
if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text))
{
/* ����� ����� ��� ����� �������� ���������� � ���� */
$result = mysql_query ("UPDATE settings SET title='$title', meta_d='$meta_d', meta_k='$meta_k', text='$text' WHERE id='$id'");

if ($result == 'true') {echo "<p>���� �������� ������� ���������!</p>";}
else {echo "<p>���� �������� �� ���������!</p>";}


}		 
else 

{
echo "<p>�� ����� �� ��� ����������, ������� ������ ���� �������� � ���� �� ����� ���� ���������.</p>";
}
?>
<? include("footer.html");?>
