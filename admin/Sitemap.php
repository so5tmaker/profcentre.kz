<? require_once 'blocks/global.inc.php';
if (isset($_POST['rec'])) {$rec = $_POST['rec'];}

$name_dt = "Sitemap.xml";
$title_here = "�������� �������� �����  ".$name_dt; include("header.html");
if (isset($rec))
{
    CreateSitemap();
}
?>
<form name="form1" method="post" action="Sitemap.php">
<input name="rec" type="hidden" value="yes">       
 <p>
   <label>
   <input type="submit" name="submit" id="submit" value="������� Sitemap">
   </label>
 </p>
</form>
<!--���������� ������ ����������� �������-->  
<?  include_once ("footer.html"); ?>  
