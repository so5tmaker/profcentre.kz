<? include ("blocks/bd.php");

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='about'",$db);

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
<? $n=5; include("header.html");?>
<? echo $myrow["text"]; ?>
<? include("footer.html");?>
				
						

        
