<?php 
include ("blocks/bd.php");
//����� � �������� ���� � ����� ������������ � ������ ������ �������,
//����� ���������� ����� ���� ��� ����� ��������� ��� ���������
//$SERVER = $_SERVER['SCRIPT_FILENAME'];
//$rus = strstr($SERVER, 'localhost');
//$HOST = $_SERVER['HTTP_HOST'];
//if ($rus !== false){$url = "http://".$HOST."/profcentre/";}else{$url = 'http://www.profcentre.kz/';}

if (isset($_POST['author']))
{
$author = $_POST['author'];
}

if (isset($_POST['text']))
{
$text = $_POST['text'];
}

if (isset($_POST['pr']))
{
$pr = $_POST['pr'];
}

if (isset($_POST['sub_com']))
{
$sub_com = $_POST['sub_com'];
}

if (isset($_POST['id']))
{
$id = $_POST['id'];
}

if (isset($_POST['sum1']))
{
$sum1 = $_POST['sum1'];
}

if (isset($_POST['cat']))
{
$cat = $_POST['cat'];
}

if (isset($_POST['sec']))
{
$sec = $_POST['sec'];
}

if (isset($sub_com))
{
if (isset($author)) {trim($author);   }
else {$author = "";}

if (isset($text)) {trim($text);   }
else {$text = "";}

if (empty($author) or empty($text))
{
exit ("<p>�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����. <br> <input name='back' type='button' value='��������� �����' onclick='javascript:self.back();'>");
}

$text_old = $text;
$author = mysql_real_escape_string($author);  // ������������ ��������� ������� "\" - �������� ������,
$text = mysql_real_escape_string($text);      //����� ������� � ����
//$author = stripslashes($author); // ����������� �� / ����� ���������
//$text = stripslashes($text);
$author = htmlspecialchars($author); // ����������� ������������� ������� ������ ������ ����� � ����������� ���������
$text = htmlspecialchars($text);

$result = mysql_query ("SELECT sum FROM comments_setting  WHERE id='$sum1'",$db);
$myrow = mysql_fetch_array($result);

if ($pr == $myrow["sum"])
{
$date = date("Y-m-d");
$result2 = mysql_query ("INSERT INTO comments (post,cat,author,text,date) VALUES ('$id','$cat','$author','$text','$date')",$db);
if ($result2 !== FALSE)
{
    $address = "info@profcentre.kz"; // data.php?cat=2&id=40&sec=courses
    $ref = $url."data.php?cat=".$cat."&id=".$id."&sec=".$sec;
    $subject = "����� ����������� �� ����� - ".$ref;
    $result3 = mysql_query ("SELECT title FROM ".$sec." WHERE id='$id'",$db);
    $myrow3 = mysql_fetch_array ($result3);
    $post_title = $myrow3["title"];
    $message = "�������� ����������� � ������� - ".$post_title."\n����������� �������(�): ".$author."\n����� �����������: ".$text_old."\n������: ".$ref;
    mail($address,$subject,$message,"Content-type:text/plain; Charset=windows-1251\r\n");
}
//$url = 'view_data.php';
// �������� ������ ������ ������, ���� �� view_file, ����� ���������� it_is_file
// ����� ������������ � ��������� 1
/*if (isset($_POST['it_is_file']))
{
$url = 'view_file.php';
}
else $url = 'view_post.php';
*/
echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=$ref'>
</head></html>";
exit();
}
else 
    {
    exit ("<p>�� ����� �������� ����� ���� � �������� �� ���������� ��������. <br> <input name='back' type='button' value='��������� �����' onclick='javascript:self.back();'>");
    }
}

?>