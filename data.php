<? include ("blocks/bd.php");
//����� � �������� ���������� sec, ����� ������� ����� ������(�� ������) ��������.
if (isset($_GET['sec']))
{
    $sec = $_GET['sec']; $text_sec = "='$sec'";
	$n=0;
    /* ���������, �������� �� �������� ��������� ���������� ��� ��� */
    if ($sec == 'courses'){$n=2;}
	if ($sec == 'trainings'){$n=3;}
	if ($sec == 'articles'){$n=4;}
	if ($n == 0)
    {
        exit ("<p>�������� ������ �������! ��������� URL!");
    }
}
//����� � �������� ���� � ����� ������������ � ������ ������ �������,
//����� ���������� ����� url ��� ����� ��� rss-�����
//$SERVER = $_SERVER['SCRIPT_FILENAME'];
//$rus = strstr($SERVER, 'localhost');
//$HOST = $_SERVER['HTTP_HOST'];
//if ($rus !== false){$url = "http://".$HOST."/profcentre/";}else{$url = 'http://www.profcentre.kz/';}
if (isset($_GET['cat'])==True And isset($_GET['id'])==True)
{
    $id_score=$_GET['id'];
    include ("view_data.php");
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
    $result_raz = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='".$sec."'",$db);
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
<? include("header.html");?>
<? include ("data_body.php"); ?>
<? include("footer.html");?>
