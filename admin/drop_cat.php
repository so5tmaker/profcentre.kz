<?php 
include ("lock.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['tbl_dt'])) {$tbl_dt = $_POST['tbl_dt'];} else {$tbl_dt = "";}
?>
<? $title_here = "����������"; include("header.html"); ?>
<?php 
if (isset($id))
{
//    $result0 = mysql_query ("SELECT id FROM courses WHERE cat='$id'",$db);
//    $result1 = mysql_query ("SELECT id FROM articles WHERE cat='$id'",$db);
//    $result2 = mysql_query ("SELECT id FROM trainings WHERE cat='$id'",$db);
//    $num_rows = mysql_num_rows($result0) + mysql_num_rows($result1) + mysql_num_rows($result2);
//    if ($num_rows > 0)
//    {
//        echo "<p>� ���������, ������� �� ������ �������, ���� �������. ������� ���������� �� �� ������ ����������.</p>";
//    }
//    else
//    {
        $result = mysql_query ("DELETE FROM categories".$tbl_dt." WHERE id='$id'");
        if ($result == 'true') {echo "<p>���� ��������� ������� �������!</p>";}
        else {echo "<p>���� ��������� �� �������!</p>";}
//    }
}		 
else 
{
    echo "<p>�� ��������� ������ ���� ��� ��������� id � �������, ������� ��������� ���������� (������ ����� �� �� ������� ����������� �� ���������� ����).</p>";
}		 
?>
<? include("footer.html");?>