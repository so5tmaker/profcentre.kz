<?php
 header("Content-Type: text/xml");
 echo "<?xml version=\"1.0\" encoding=\"windows-1251\"?>";
?>

<rss version="2.0">
<channel>
<title>Канал новостей сайта profcentre.kz</title>
<link>http://www.profcentre.kz/</link>
<description>Десять новых курсов сайта www.profcentre.kz</description>
<language>ru</language>
<?php 
    include ("blocks/bd.php");
//    $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];
//    if ($REMOTE_ADDR = '127.0.0.1') $url = 'http://localhost/profcentre/';
//    else $url = 'http://www.profcentre.kz/';
    $date = '2009-12-12';
    $ndate = SUBSTR($date, 8, 2)."-".SUBSTR($date, 5, 2)."-".SUBSTR($date, 0,4);
       $result = mysql_query("SELECT id,cat,title,description,date as mdate FROM `courses` WHERE secret='0' and (lang='ru' or lang='') ORDER BY `mdate` DESC LIMIT 0,10",$db);
    if ($myrow = mysql_fetch_array($result))
    {
    do
    {
        $descr = "";
        $descr = stripslashes($myrow["description"]);
        $descr = htmlspecialchars($myrow["description"]);
        $title = htmlspecialchars($myrow["title"]);
        $dt = htmlspecialchars($myrow["mdate"]);

        $link=htmlspecialchars($url."view_data.php?cat=".$myrow["cat"]."&id=".$myrow["id"]."&sec=courses");
        $guid=htmlspecialchars($url."view_data.php?cat=".$myrow["cat"]."&id=".$myrow["id"]."&sec=courses");
        printf ("<item>
        <title>%s</title>
        <link>%s</link>
        <description>%s</description>
        <author>info@profcentre.kz</author>
        <guid>%s</guid>
        </item>", $title.' '.$dt,$link,$descr,$guid);
      }
    while($myrow = mysql_fetch_array($result));
    }
    
?>
</channel>
</rss>