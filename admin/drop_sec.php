<?php 
include ("lock.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['tbl_dt'])) {$tbl_dt = $_POST['tbl_dt'];} else {$tbl_dt = "";}
?>
<? $title_here = "����������"; include("header.html"); ?>
<?php
if (($id<=3)and($tbl_dt = "")) exit("<p>�� �� ������ ������� �������: �����, ��������, ������! ��� ����� �������� �� ������ �����!</p>" );
if (isset($id))
{
$result0 = mysql_query ("SELECT id FROM categories".$tbl_dt." WHERE sec='$id'",$db);
if (mysql_num_rows($result0) > 0) {

echo "<p>� �������, ������� �� ������ �������, ���� ���������. ������� ���������� �� �� ������ ��������.</p>";
}
else
{
$result = mysql_query ("DELETE FROM sections".$tbl_dt." WHERE id='$id'");
if ($result == 'true') {echo "<p>��� ������ ������� ������!</p>";}
else {echo "<p>��� ������ �� ������!</p>";}
}
}
else

{
echo "<p>�� ��������� ������ ���� ��� ��������� id � �������, ������� ������ ���������� (������ ����� �� �� ������� ����������� �� ���������� ����).</p>";
}
?>
<? include("footer.html");?>
