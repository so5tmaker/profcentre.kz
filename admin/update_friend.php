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
if (isset($_POST['link']))      {$link = $_POST['link']; if ($link == '') {unset($link);}}


if (isset($_POST['id']))      {$id = $_POST['id'];}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>����������</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
<!--���������� ����� �����-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>
<!--���������� ����� ���� �����-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
      
         <?php 
if (isset($title) && isset($link))
{
/* ����� ����� ��� ����� �������� ���������� � ���� */
$result = mysql_query ("UPDATE friends SET title='$title', link='$link'  WHERE id='$id'");

if ($result == 'true') {echo "<p>��� ���� ������� ��������!</p>";}
else {echo "<p>��� ���� �� ��������!</p>";}


}		 
else 

{
echo "<p>�� ����� �� ��� ����������, ������� ���� � ���� �� ����� ���� ��������.</p>";
}
		 
		 
		 
		 ?>
         
         
             </td>
      </tr>
    </table></td>
  </tr>
<!--���������� ������ ����������� �������-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>
