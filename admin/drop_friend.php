<?php 
include ("lock.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
?>
<? $title_here = "����������"; include("header.html"); ?>
<?php 
if (isset($id))
{
$result = mysql_query ("DELETE FROM friends WHERE id='$id'");

if ($result == 'true') {echo "<p>��� ���� ������� ������!</p>";}
else {echo "<p>��� ���� �� ������!</p>";}


}		 
else 

{
echo "<p>�� ��������� ������ ���� ��� ��������� id � �������, ������� ����� ���������� (������ ����� �� �� ������� ����������� �� ���������� ����).</p>";
}
?>
<? include("footer.html");?>