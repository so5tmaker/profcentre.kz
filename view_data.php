<?
require_once 'blocks/global.inc.php';

if (isset($_GET['id'])) {$id_score = $_GET['id'];}
if (!isset($id_score)) {$id_score = 1;}

// �������� sec ��� ����� ������ ����� ����� get, � ����� ����� ����������� include
if (isset($_GET['sec'])) 
{
	$sec = $_GET['sec'];	
}
else
{
	if (!isset($sec)) exit ("<p>�������� ������ �������! ��������� URL!");
}

/* ���������, �������� �� ���������� ������ */
if (!preg_match("|^[\d]+$|", $id_score)) {
exit ("<p>�������� ������ �������! ��������� URL!");
}

$result = mysql_query("SELECT * FROM ".$sec." WHERE id='$id_score'",$db);

if (!$result)
{
echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result);
$cat = $myrow["cat"];
$new_view = $myrow["view"] + 1;
$update = mysql_query ("UPDATE ".$sec." SET view='$new_view' WHERE id='$id_score'",$db);


}

else
{
echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
exit();
}


?>
<? include("header.html");
//$ret = "
//        <script type='text/javascript'><!--
//        google_ad_client = 'ca-pub-7017401012475874'';
//        /* ����������Profcentre 
//         468x60, sm ������� 19.04.13 */
//        google_ad_slot = '8188789768';
//        google_ad_width = 468;
//        google_ad_height = 60;
//        //-->
//        </script>
//        <script type='text/javascript'
//        src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
//        </script>
//        ";
//echo "<div class='adv_div' align='center'>".$ret.'</div>';
$text = ins_adv($myrow["text"]); 
//$text = $myrow["text"];
printf ("
                <p class='post_title2'>%s</p>
                <p class='post_add'>�����: %s</p>
                <p class='post_add'>����: %s</p>
                %s
                <p class='post_view'>����������: %s</p>"
                ,$myrow["title"],$myrow["author"],$myrow["date"],$text,$myrow["view"]);
?>

<form action="vote_res_data.php" method="post" name="vv">
<p class="pvote">������� �������: 1 <input name="score" type="radio" value="1"> 2 <input name="score" type="radio" value="2"> 3 <input name="score" type="radio" value="3"> 4 <input name="score" type="radio" value="4"> 5 <input name="score" type="radio" value="5" checked>
<input class="sub_vote" name="submit" type="submit" value="�������">
<input name="id" type="hidden" value="<?php echo "$id_score";?>">
<input name="tbl_name" type="hidden" value="<?php echo "$sec";?>">

</p>


</form>
<?
echo "<p class='post_comment'>����������� � ���� �������:</p>";	

$result3 = mysql_query ("SELECT * FROM comments WHERE post='$id_score' and cat='$cat'",$db);
if (mysql_num_rows($result3) > 0)
{
$myrow3 = mysql_fetch_array($result3);

do 
{
printf ("<div class='post_div'><p class='post_comment_add'>����������� �������(�): <strong>%s</strong> <br> ����: <strong>%s</strong></p>
<p>%s</p></div>",$myrow3["author"], $myrow3["date"], stripslashes($myrow3["text"]));
                                                    // ��������� ������ � ����������� ��������� �������.

}
while ($myrow3 = mysql_fetch_array($result3));
}

// ����� ������ ���������� ������� (��������) � ������� � ���������� � ������� ���� � ��������� �������
$result4b = mysql_query ("SELECT COUNT(*) FROM comments_setting",$db);
$sum = mysql_fetch_array($result4b);
if (!$sum)
{   // ������� ������, ���� ������ �� ������
        $sum1 = 1;
}
else
{ // ������� ���� � ��������� �������
        $sum1 = rand (1, $sum[0]);
}

$result4 = mysql_query ("SELECT img FROM comments_setting WHERE id='$sum1'",$db);
$myrow4 = mysql_fetch_array($result4);

?>

<p class='post_comment'>�������� ��� �����������:</p>
<form action="comment.php" method="post" name="form_com">
        <p><label>���� ���: </label><input name="author" type="text" size="30" maxlength="30"></p>
        <p><label>����� �����������: <br> <textarea name="text" cols="32" rows="4"></textarea></label></p>
        <p class="sum">������� ����� ����� � ��������<br>
        <img style='margin-top:5px; align:left' src="<? echo $myrow4["img"]; ?>"><br>
          <input style='margin-bottom:0px;margin-top:0px;' name="pr" type="text" size="8" maxlength="5"></p>
          <input name="id" type="hidden" value="<? echo $id_score; ?>">
          <input name="sum1" type="hidden" value="<? echo $sum1; ?>">
          <input name="cat" type="hidden" value="<? echo $cat; ?>">
          <input name="sec" type="hidden" value="<? echo $sec; ?>">
        <p><input name="sub_com" type="submit" value="��������������"></p>
</form>
<? include("footer.html");?>