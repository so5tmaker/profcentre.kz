<?php 
include ("lock.php");
if (isset($_POST['tbl_dt'])) {$tbl_dt = $_POST['tbl_dt'];} else {$tbl_dt = "";}
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
if (isset($_POST['sec']))      {$sec = $_POST['sec']; if ($sec == '') {unset($sec);}}
if (isset($_POST['file']))      {$file = $_POST['file']; if ($file == '') {unset($file);}}
if (isset($_POST['table']))      {$table = $_POST['table']; if ($table == '') {unset($table);}}
?>
<? $title_here = "����������"; include("header.html"); ?>
<?php
$file="������"; $table="������";
if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text) && isset($sec) && isset($file) && isset($table))
{
    /* ����� ����� ��� ����� �������� ���������� � ���� */
    $result = mysql_query ("INSERT INTO categories".$tbl_dt." (sec,title,meta_d,meta_k,text,file,cat_tbl) VALUES ('$sec','$title','$meta_d','$meta_k','$text','$file','$table')");
    if ($result == 'true') {echo "<p>���� ��������� ������� ���������!</p>";}
    else {echo "<p>��� ������ �� ��������!</p>";}
 }
 else
 {
    echo "<p>�� ����� �� ��� ����������, ������� ��������� � ���� �� ����� ���� ���������.</p>";
 }
?>
<? include("footer.html");?>
