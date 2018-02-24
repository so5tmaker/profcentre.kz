<?
//«десь € провер€ю путь к файлу исполн€емого в данный момент скрипта,
//чтобы определить какую базу мне нужно локальную или удаленную
$SERVER = $_SERVER['SCRIPT_FILENAME'];
$rus = strstr($SERVER, 'localhost');
$HOST = $_SERVER['HTTP_HOST'];
if ($rus !== false){$url = "http://".$HOST."/profcentre/";}else{$url = 'http://www.profcentre.kz/';}
if ($rus !== false)
{
    $mysql_host = "127.0.0.1";
    $mysql_database = "profcentredb";
    $mysql_user = "bloguser";
    $mysql_password = "12345";
    $db=mysql_connect($mysql_host,$mysql_user,$mysql_password);
    mysql_select_db($mysql_database,$db);

    mysql_query("SET NAMES 'cp1251'");
}
    else 
{
//    $mysql_host = "mysql12.000webhost.com";
//    $mysql_database = "a4853374_profcen";
//    $mysql_user = "a4853374_profcen";
//    $mysql_password = "datamaks@";
    
    $mysql_host = "mysql405.cp.idhost.kz";
    $mysql_database = "db1099894_profcentre";
    $mysql_user = "u1099894_profcen";
    $mysql_password = "datamaks@";

    $db = mysql_connect ($mysql_host,$mysql_user,$mysql_password);
    mysql_select_db($mysql_database,$db);

    mysql_query("SET NAMES 'cp1251'");
    //mysql_query("SET CHARACTER SET 'cp1251'");
}

?>