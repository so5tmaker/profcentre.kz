<? include ("blocks/bd.php");
//Здесь я проверяю переменную sec, чтобы указать какие данные(по секции) выводить.
if (isset($_GET['sec']))
{
    $sec = $_GET['sec']; $text_sec = "='$sec'";
	$n=0;
    /* Проверяем, является ли значение переменнй подходящим для нас */
    if ($sec == 'courses'){$n=2;}
	if ($sec == 'trainings'){$n=3;}
	if ($sec == 'articles'){$n=4;}
	if ($n == 0)
    {
        exit ("<p>Неверный формат запроса! Проверьте URL!");
    }
}
//Здесь я проверяю путь к файлу исполняемого в данный момент скрипта,
//чтобы определить какой url мне нужен для rss-ленты
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

    /* Проверяем, является ли переменная числом */
    if (!preg_match("|^[\d]+$|", $cat))
    {
        exit ("<p>Неверный формат запроса! Проверьте URL!");
    }
}
// Здесь я проверяю номер категории, если нет, то в запросах нужно изменить текст.
if (!isset($cat))
{
    $text_cat = "<>'0'";
    $result_raz = mysql_query("SELECT title,meta_d,meta_k,text FROM settings WHERE page='".$sec."'",$db);
    if (!$result_raz)
    {
    echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
    exit(mysql_error());
    }

    if (mysql_num_rows($result_raz) > 0)

    {
    $myrow_raz = mysql_fetch_array($result_raz);
    }

    else
    {
    echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
    exit();
    }
    //    Здесь заполняю переменные из раздела
    $text=$myrow_raz["text"];
    $title=$myrow_raz["title"];
    $meta_d=$myrow_raz["meta_d"];
    $meta_k=$myrow_raz["meta_k"];
  }
$result = mysql_query("SELECT * FROM categories WHERE id".$text_cat,$db);

if (!$result)
{
    echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору info@profcentre.kz. <br> <strong>Код ошибки:</strong></p>";
    exit(mysql_error());
}
if (mysql_num_rows($result) > 0)
{
    $myrow = mysql_fetch_array($result);
    if (isset($cat))
    {
        //    Здесь заполняю переменные из категории
        $text=$myrow["text"];
        $title="Заметки категории - ".$myrow["title"];
        $meta_d=$myrow["meta_d"];
        $meta_k=$myrow["meta_k"];
    }
}
else
{
    echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
    exit();
}
?>
<? include("header.html");?>
<? include ("data_body.php"); ?>
<? include("footer.html");?>
