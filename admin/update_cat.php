<?php 
include ("lock.php");
if (isset($_POST['title']))       
{
    $title = $_POST['title'];

    if ($title == '')
    {
    unset($title);
    }
}
if (isset($_POST['tbl_dt'])) {$tbl_dt = $_POST['tbl_dt'];} else {$tbl_dt = "";}
$file="������"; $table="������";
/* ���� ���������� � ���������� ������� $_POST['title'] ���. ������, �� �� ������� ������� ���������� �� ��. ���� ���������� ������, �� ���������� ����������.   */
if (isset($_POST['meta_d']))      {$meta_d = $_POST['meta_d']; if ($meta_d == '') {unset($meta_d);}}
if (isset($_POST['meta_k']))      {$meta_k = $_POST['meta_k']; if ($meta_k == '') {unset($meta_k);}}

if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['sec']))      {$sec = $_POST['sec']; if ($sec == '') {unset($sec);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}
if (isset($_POST['file']))      {$file = $_POST['file']; if ($file == '') {unset($file);}}
if (isset($_POST['table']))      {$table = $_POST['table']; if ($table == '') {unset($table);}}

?>
<? $title_here = "����������"; include("header.html"); ?>
<?php 
if (isset($sec) && isset($title) && isset($meta_d) && isset($meta_k) && isset($text)&& isset($file) && isset($table))
{
/* ����� ����� ��� ����� �������� ���������� � ���� */
$result = mysql_query ("UPDATE categories".$tbl_dt." SET sec='$sec',title='$title', meta_d='$meta_d', meta_k='$meta_k', text='$text', file='$file', cat_tbl='$table' WHERE id='$id'");

if ($result == 'true') {echo "<p>���� ��������� ������� ���������!</p>";}
else {echo "<p>���� ��������� �� ���������!</p>";}


}		 
else 

{
echo "<p>�� ����� �� ��� ����������, ������� ��������� � ���� �� ����� ���� ���������.</p>";
}
?>
<? include("footer.html");?>
