<?
if (!isset($db)) {include ("blocks/bd.php");}
// �������� sec ��� ����� ������ ����� ����� get, � ����� ����� ����������� include
if (isset($_GET['sec'])) 
{
	$sec = $_GET['sec'];	
}
else
{
	if (!isset($sec)) exit ("<p>�������� ������ �������! ��������� URL!");
}
// �������� cat ��� ����� ������ ����� ����� get, � ����� ����� ����������� include
if (isset($_GET['cat'])) 
{
	$cat = $_GET['cat'];	
}
else
{
	if (!isset($cat)) exit ("<p>�������� ������ �������! ��������� URL!");
}

/* ���������, �������� �� ���������� ������ */
if (!preg_match("|^[\d]+$|", $sec)) {
exit ("<p>�������� ������ �������! ��������� URL!");
}
/* ���������, �������� �� ���������� ������ */
if (!preg_match("|^[\d]+$|", $cat)) {
exit ("<p>�������� ������ �������! ��������� URL!");
}
$result = mysql_query("SELECT * FROM categories_rtd WHERE (id='$cat')and(sec='$sec')",$db);

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
<? include("header.html");?>
<? printf ("
        <p class='post_title2'>%s</p>
        <p>	%s </p>"
        ,$myrow["title"],$myrow["text"]);
?>
<? include("footer.html");?>							
						