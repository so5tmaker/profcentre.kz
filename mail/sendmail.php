<?php  include ("blocks/bd.php");

function smtpmail($to, $subject, $content, $attach=false)
{
    require_once('mail/config.php');
    require_once('mail/class.phpmailer.php');
    $mail = new PHPMailer(true);

    $mail->IsSMTP();
    echo $to."<br />".$subject."<br />".$content."<br />";
    try
    {
      $mail->Host       = $__smtp['host'];
      $mail->SMTPDebug  = $__smtp['debug'];
      $mail->SMTPAuth   = $__smtp['auth'];
      $mail->Host       = $__smtp['host'];
      $mail->Port       = $__smtp['port'];
      $mail->Username   = $__smtp['username'];
      $mail->Password   = $__smtp['password'];
      $mail->AddReplyTo($__smtp['addreply'], $__smtp['username']);
      $mail->AddAddress($to);
      $mail->SetFrom($__smtp['addreply'], $__smtp['username']);
      $mail->AddReplyTo($__smtp['addreply'], $__smtp['username']);
      $mail->Subject = htmlspecialchars($subject);
      $mail->MsgHTML($content);
      if($attach)  $mail->AddAttachment($attach);
	  $n = 0;
      if(!$mail->Send()) 
	  {
		  return $n;
	  } 
	  else 
	  {
		  return 1;;
	  }
      echo "Message sent Ok!</p>\n";
    }
    catch (phpmailerException $e)
    {
      echo $e->errorMessage();
	  return $n;
    }
    catch (Exception $e)
    {
      echo $e->getMessage();
	  return $n;
    }
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
    exit ("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля. <br> <input name='back' type='button' value='Вернуться назад' onclick='javascript:self.back();'>");
    }

    $is_ok = preg_match('/^[\.\-_A-Za-z0-9]+?@[\.\-A-Za-z0-9]+?\.[A-Za-z0-9]{2,6}$/', $email);

    if ($is_ok==0)
    {
    exit ("<p>Вы ввели неверный адрес электронной почты. <br> <input name='back' type='button' value='Вернуться назад' onclick='javascript:self.back();'>");
    }

    $author = stripslashes($author); // Обезапасить от / перед кавычками
    $text = stripslashes($text);
    $author = htmlspecialchars($author); // подставляет мнемонические символы вместо знаков тегов и исполняемых выражений
    $text = htmlspecialchars($text);

    $result = mysql_query ("SELECT sum FROM comments_setting  WHERE id='$id'",$db);
    $myrow = mysql_fetch_array($result);

    if ($pr == $myrow["sum"])
    {
        $date = date("Y-m-d");
        $address = "profcentre.alm@gmail.com";
        $subject = "Заявка на семинар или тренинг - ".$author;
        $message = "Пришло письмо с сайта www.profcentre.kz - адресат: ".$email."\nПисьмо написал(а): ".$author."\nТекст письма: ".$text."";
		$ret=smtpmail($address, $subject, $message, false);
        if ($ret=0)
        {
        echo "<p>Отправка письма не прошла. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
        exit(mysql_error());
        }

        if (!$result)
        {
        echo "<p>Отправка письма не прошла. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
        exit(mysql_error());
        }

        echo "<html><head>
        <meta http-equiv='Refresh' content='0; URL=request.php?sent=$id'>
        </head></html>";
        exit();
    }
    else
        {
            exit ("<p>Вы ввели неверную сумму цифр с картинки на предыдущей странице. <br> <input name='back' type='button' value='Вернуться назад' onclick='javascript:self.back();'>");
        }
}
?>