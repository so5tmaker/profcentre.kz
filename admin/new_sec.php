<? include ("lock.php");
$addtitle = "������� �����";
if (isset($_GET['tbl_dt'])) {
    $tbl_dt = $_GET['tbl_dt'];
    $addtitle = "������� �����";
} else {
    $tbl_dt = "";
    $addtitle = "������ �����";
}
?>

<? $title_here = "�������� ���������� ������ ������� ".$addtitle; include("header.html"); 
echo "<h3 align='center'>���������� ��������� ".$addtitle."</h3>";?>
<form name="form1" method="post" action="add_sec.php">
 <p>
   <label>������� �������� �������<br>
     <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
     </label>
 </p>
 <p>
   <label>������� ������� �������� �������<br>
   <input type="text" name="meta_d" id="meta_d" size="<? echo $SizeOfinput ?>">
   </label>
 </p>
 <p>
   <label>������� �������� ����� ��� �������<br>
   <input type="text" name="meta_k" id="meta_k" size="<? echo $SizeOfinput ?>">
   </label>
 </p>

 <p>
   <label>������� ������ ����� ������� � ������
   <textarea name="text" id="text" cols="<? echo $ColsOfarea ?>" rows="30"></textarea>
   </label>
 </p>
<input name="tbl_dt" type="hidden" value="<? echo $tbl_dt ?>">
 <!--<p>
   <label>������� ������ ���� � ����� �������
   <input type="text" name="file" id="file" size="25" maxlength="40">
   </label>
 </p>-->

 <p>
   <label>
   <input type="submit" name="submit" id="submit" value="������� ������ � ����">
   </label>
 </p>
 </form>
<? include("footer.html");?>