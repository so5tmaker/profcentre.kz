<?php  include ("blocks/bd.php");


function sendingEmail($item, $name, $email, $website, $comment) {
		$to = "info@profcentre.kz";
		$subject = "GSPSite - Comment for ".$item; 
		$message = "
				Name : ".$name."
				E-mail : ".$email."
				Homepage : ".$website."
				Comment : ".$comment; 
		$headers = "From: webmaster@saintfalcon.site88.net\r\n";
		//$mail_sent = @mail( $to, $subject, $message, $headers );
		$mail_sent = @mail( $to, $subject, $message);
		//echo $mail_sent ? "Mail sent" : "Mail failed";
		return $mail_sent;
	}
	
if (isset($_POST['author']))
{
$author = $_POST['author'];
}

if (isset($_POST['email']))
{
$email = $_POST['email'];
}

if (isset($_POST['text']))
{
$text = $_POST['text'];
}

if (isset($_POST['pr']))
{
$pr = $_POST['pr'];
}

if (isset($_POST['sub_mail']))
{
$sub_mail = $_POST['sub_mail'];
}

if (isset($_POST['id']))
{
$id = $_POST['id'];
}

if (isset($sub_mail))
{
    if (isset($author)) {trim($author);   }
    else {$author = "";}

    if (isset($text)) {trim($text);   }
    else {$text = "";}

    if (empty($author) or empty($text))
    {
    exit ("<p>�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����. <br> <input name='back' type='button' value='��������� �����' onclick='javascript:self.back();'>");
    }

    $is_ok = preg_match('/^[\.\-_A-Za-z0-9]+?@[\.\-A-Za-z0-9]+?\.[A-Za-z0-9]{2,6}$/', $email);

    if ($is_ok==0)
    {
    exit ("<p>�� ����� �������� ����� ����������� �����. <br> <input name='back' type='button' value='��������� �����' onclick='javascript:self.back();'>");
    }

    $author = stripslashes($author); // ����������� �� / ����� ���������
    $text = stripslashes($text);
    $author = htmlspecialchars($author); // ����������� ������������� ������� ������ ������ ����� � ����������� ���������
    $text = htmlspecialchars($text);

    $result = mysql_query ("SELECT sum FROM comments_setting  WHERE id='$id'",$db);
    $myrow = mysql_fetch_array($result);

    if ($pr == $myrow["sum"])
    {
        $date = date("Y-m-d");
        $address = "info@profcentre.kz";
        $subject = "������ �� ������� ��� ������� - ".$author;
        $message = "������ ������ � ����� www.profcentre.kz - �������: ".$email."\n������ �������(�): ".$author."\n����� ������: ".$text."";

        if (!mail($address,$subject,$message,"Content-type:text/plain; Charset=windows-1251\r\n"))
        {
        echo "<p>�������� ������ �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
        exit(mysql_error());
        }

        if (!$result)
        {
        echo "<p>�������� ������ �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
        exit(mysql_error());
        }

        echo "<html><head>
        <meta http-equiv='Refresh' content='0; URL=request.php?sent=$id'>
        </head></html>";
        exit();
    }
    else
        {
            exit ("<p>�� ����� �������� ����� ���� � �������� �� ���������� ��������. <br> <input name='back' type='button' value='��������� �����' onclick='javascript:self.back();'>");
        }
}
?>