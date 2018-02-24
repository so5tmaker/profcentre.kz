<?php
include ("bd.php");

// ********************** Создаём карту сайта (sitemap) *******************************
function get_array($table, $subs = "")
{
	global $db;
        // Выберем записи
	$result = mysql_query("SELECT * FROM ".$table." WHERE (lang<>'EN')", $db);
	$myrow = mysql_fetch_array($result);
	do 
	{
		$subs[] = "data.php?cat=".$myrow["cat"]."&amp;id=".$myrow["id"]."&amp;sec=".$table;
	}
	while ($myrow = mysql_fetch_array($result));
	return $subs;
}

function CreateSitemap()
{
    $fw=fopen('../Sitemap.xml','w'); #писать
    $subs = array();
    $subs = get_array("articles", $subs);
    $subs = get_array("trainings", $subs);
    $subs = get_array("courses", $subs);
    fwrite($fw,"<?xml version=\"1.0\" encoding=\"UTF-8\"?>"."\n");
    fwrite($fw,"<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">"."\n");

    foreach($subs as $k => $v) {
        fwrite($fw,"<url>"."\n");
        $strokaxml = "<loc>http://www.profcentre.kz/".$v."</loc>";
        fwrite($fw,$strokaxml."\n");
        fwrite($fw,"<lastmod>".date("Y-m-d")."</lastmod>"."\n");
        fwrite($fw,"<changefreq>monthly</changefreq>"."\n");
        fwrite($fw,"<priority>0.8</priority>"."\n");
        $stroka = "<p>http://www.profcentre.kz/".$v."</p>";
//        print $stroka;
        fwrite($fw,"</url>"."\n");
    }
    fwrite($fw,"</urlset>"."\n");
    print "<p>Всего строк: ".count($subs)."</p>";
    #закрыли файл
    fclose($fw);
}

// ********************** Создаём карту сайта (sitemap) конец *******************************
    
?>
