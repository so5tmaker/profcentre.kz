<? include ("blocks/bd.php");
if (isset($_GET['cat'])==True And isset($_GET['id'])==True)
{
    $id_score=$_GET['id'];
    include ("view_file.php");
    exit ("");
}
if (isset($_GET['cat']))
{
    $cat = $_GET['cat']; $text_cat = "='$cat'";

    /* ���������, �������� �� ���������� ������ */
    if (!preg_match("|^[\d]+$|", $cat))
    {
        exit ("<p>�������� ������ �������! ��������� URL!");
    }
}
// ����� � �������� ����� ���������, ���� ���, �� � �������� ����� �������� �����.
if (!isset($cat))
{
    $text_cat = "<>'0'";
    $result_raz = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='files'",$db);
    if (!$result_raz)
    {
    echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
    exit(mysql_error());
    }

    if (mysql_num_rows($result_raz) > 0)

    {
    $myrow_raz = mysql_fetch_array($result_raz);
    }

    else
    {
    echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
    exit();
    }
    //    ����� �������� ���������� �� �������
    $text=$myrow_raz["text"];
    $title=$myrow_raz["title"];
    $meta_d=$myrow_raz["meta_d"];
    $meta_k=$myrow_raz["meta_k"];
  }
$result = mysql_query("SELECT * FROM categories WHERE id".$text_cat,$db);

if (!$result)
{
    echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
    exit(mysql_error());
}
if (mysql_num_rows($result) > 0)
{
    $myrow = mysql_fetch_array($result);
    if (isset($cat))
    {
        //    ����� �������� ���������� �� ���������
        $text=$myrow["text"];
        $title="������� ��������� - ".$myrow["title"];
        $meta_d=$myrow["meta_d"];
        $meta_k=$myrow["meta_k"];
    }
}
else
{
    echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
    exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo $title; ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="img/favicon.ico">
<meta name="description" content="<? echo $meta_d; ?>">
<meta name="keywords" content="<? echo $meta_k; ?>">


</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
  <? include ("blocks/header.php"); ?>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <? include ("blocks/lefttd.php"); ?>
        <td valign='top'>
		 <? $n=3; include ("blocks/nav.php"); ?>

        <?

		echo "<p class='text'>".$text."</p>";

        print <<<HERE
        <div align="center">
        <form action="http://www.google.com/cse" id="cse-search-box" target="_blank">
          <div>
            <input type="hidden" name="cx" value="partner-pub-7017401012475874:9sl5ji-tx2f" />
            <input type="hidden" name="ie" value="windows-1251" />
            <input type="text" name="q" size="50" />
            <input type="submit" name="sa" value="&#x041f;&#x043e;&#x0438;&#x0441;&#x043a;" />
          </div>
        </form>
        <script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&amp;lang=ru"></script>
        </div>
        <div class="line"><img src="img/spacer.gif" width="1" height="1"></div>
        <p>
        <script type="text/javascript"><!--
        google_ad_client = "pub-7017401012475874";
        /* 728x90, ������� 04.09.09 */
        google_ad_slot = "5280890852";
        google_ad_width = 728;
        google_ad_height = 90;
        //-->
        </script>
        <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
        </p>
        <div class="line"><img src="img/spacer.gif" width="1" height="1"></div>
HERE;


$result77 = mysql_query("SELECT str FROM options", $db);
$myrow77 = mysql_fetch_array($result77);
$num = $myrow77["str"];
// ��������� �� URL ������� ��������
@$page = $_GET['page'];
// ���������� ����� ����� ��������� � ���� ������
$result00 = mysql_query("SELECT COUNT(*) FROM files WHERE secret=0 AND cat".$text_cat);
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
// ������� ����� ����� �������
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
// ���������� ������ ��������� ��� ������� ��������
$page = intval($page);
// ���� �������� $page ������ ������� ��� ������������
// ��������� �� ������ ��������
// � ���� ������� �������, �� ��������� �� ���������
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// ��������� ������� � ������ ������
// ������� �������� ���������
$start = $page * $num - $num;
// �������� $num ��������� ������� � ������ $start

function quant_comment($id,$cat)
{
    include ("blocks/bd.php");
    $res_kol = mysql_query ("SELECT COUNT(*) FROM comments WHERE post='$id' and cat='$cat'",$db);
    $sum_kol = mysql_fetch_array($res_kol);
    return $sum_kol[0];
}

$result = mysql_query("SELECT id,cat,title,description,date,author,mini_img,view,rating,q_vote FROM files WHERE secret=0 AND cat".$text_cat." and (lang='' or lang='RU') ORDER BY date desc, id LIMIT $start, $num",$db);

if (!$result)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result);

if (!isset($cat)) {$cat_here = "";} else {$cat_here = "cat=".$cat."&";}

do
{

$r = $myrow["rating"]/$myrow["q_vote"];
$r = intval($r);

printf ("<table align='center' class='post'>

		 <tr>
         <td class='new_title'>
		 <p class='new_name'><img class='mini' align='left' src='%s'><a href='files.php?cat=%s&id=%s'>%s</a></p>
		 <p class='new_adds'>���� ����������: %s</p>
		 <p class='new_adds'>�����: %s</p></td>
         </tr>

		 <tr>
         <td>%s <p class='new_view'>����������: %s &nbsp;&nbsp; ������: %s &nbsp;&nbsp; �������: <img src='img/%s.gif'></p></td>
         </tr>

		 </table><br><br>",$myrow["mini_img"],$myrow["cat"],$myrow["id"],$myrow["title"], $myrow["date"],$myrow["author"],$myrow["description"], $myrow["view"], quant_comment($myrow["id"],$myrow["cat"]), $r);



}
while ($myrow = mysql_fetch_array($result));

// ��������� ����� �� ������� �����
if ($page != 1) $pervpage = '<a href=files.php?'.$cat_here.'page=1>������</a> | <a href=files.php?'.$cat_here.'page='. ($page - 1) .'>����������</a> | ';
// ��������� ����� �� ������� ������
if ($page != $total) $nextpage = ' | <a href=files.php?'.$cat_here.'page='. ($page + 1) .'>���������</a> | <a href=files.php?'.$cat_here.'page=' .$total. '>���������</a>';

// ������� ��� ��������� ������� � ����� �����, ���� ��� ����
if($page - 5 > 0) $page5left = ' <a href=files.php?'.$cat_here.'page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=files.php?'.$cat_here.'page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=files.php?'.$cat_here.'page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=files.php?'.$cat_here.'page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=files.php?'.$cat_here.'page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=files.php?'.$cat_here.'page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=files.php?'.$cat_here.'page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=files.php?'.$cat_here.'page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=files.php?'.$cat_here.'page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=files.php?'.$cat_here.'page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// ����� ���� ���� ������� ������ �����

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
}




}

else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
exit();
}

?>

        </td>
      </tr>
    </table></td>
  </tr>
  <? include ("blocks/footer.php"); ?>
</table>
</body>
</html>
