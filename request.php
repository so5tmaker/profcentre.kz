<? include ("blocks/bd.php");

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

if (isset($_GET['sent']))
{
    $sent = $_GET['sent'];
}

$result = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='request'",$db);

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
//
$result4a_ = mysql_query ("SELECT COUNT(*) FROM comments_setting",$db);
$sum = mysql_fetch_array($result4a_);
if (!$sum)
{   // ������� ������, ���� ������ �� ������
    $sum1 = 1;
}
else
{ // ������� ���� � ��������� �������
    $sum1 = rand (1, $sum[0]);
}
// ����� ������ ���������� ������� (��������) � ������� � ���������� � ������� ���� � ��������� �������
$result4a = mysql_query("SELECT img FROM comments_setting WHERE id='$sum1'",$db);

if (!$result4a)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result4a) > 0)

{
$myrow4a = mysql_fetch_array($result4a);
}

?>
<? include("header.html");?>
<h2 align="center"><? echo $myrow["title"]; ?></h2>
<? echo $myrow["text"]; 
if (isset($sent))
    {
        echo "<p align='center' class='post_comment'>���� ������ ������� ����������!</p>";
    }
?>
<p class='post_comment'>�������� ������:</p>
<!--<form action="sendmail.php" method="post" name="form_mail">
    <p><label>���� ���: </label><input style='margin-left:8px;' name="author" type="text" size="30" maxlength="30"></p>
    <p><label>��� e-mail: </label><input name="email" type="text" size="30" maxlength="30"></p>
    <p><label>����� ������: <br> <textarea name="text" cols="32" rows="4"></textarea></label></p>
    <p>������� ����� ����� � ��������<br><img src="<? //echo $myrow4a["img"]; ?>" width="80" height="40"><br>
      <input style='margin-bottom:5px;' name="pr" type="text" size="5" maxlength="5"></p>
      <input name="id" type="hidden" value="<? //echo $sum1; ?>">
    <p><input name="sub_mail" type="submit" value="���������"></p>
</form>-->
<h2 align="center"><a href="mailto:profcentre.alm@gmail.com?subject=������ �� ������� � �������� ��� ��������&Body=����� �������� ���� �� ������� � ����� �������� ��� �������� �� ����:">��������� ������ �� ������� � �������� ��� ��������</�></h2>
<? include("footer.html");?>
						

        
