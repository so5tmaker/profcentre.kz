<? include ("blocks/bd.php");
//����� � �������� ���� � ����� ������������ � ������ ������ �������,
//����� ���������� ����� url ��� ����� ��� rss-�����
//$SERVER = $_SERVER['SCRIPT_FILENAME'];
//if (strstr($SERVER, 'localhost')) $url = 'http://localhost/profcentre/';
//    else $url = 'http://www.profcentre.kz/';
$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='index'",$db);

$test = "�������� ������� ����";

if (!$result)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 
}

else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
exit();
}
?>
<? $n=1; include("header.html");?>
<? echo $myrow["text"]; ?>
<? include ("view_index.php"); ?>
<? include("footer.html");?>
