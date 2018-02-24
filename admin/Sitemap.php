<? require_once 'blocks/global.inc.php';
if (isset($_POST['rec'])) {$rec = $_POST['rec'];}

$name_dt = "Sitemap.xml";
$title_here = "Страница создания файла  ".$name_dt; include("header.html");
if (isset($rec))
{
    CreateSitemap();
}
?>
<form name="form1" method="post" action="Sitemap.php">
<input name="rec" type="hidden" value="yes">       
 <p>
   <label>
   <input type="submit" name="submit" id="submit" value="Создать Sitemap">
   </label>
 </p>
</form>
<!--Подключаем нижний графический элемент-->  
<?  include_once ("footer.html"); ?>  
