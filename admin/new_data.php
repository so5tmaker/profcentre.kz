<?
if (isset($_GET['name_dt'])) {$name_dt = $_GET['name_dt'];}
if (isset($_GET['tbl_dt'])) {$tbl_dt = $_GET['tbl_dt'];}
if (isset($_GET['sec_dt'])) {$sec_dt = $_GET['sec_dt'];}
?>
<? include ("lock.php");?>
<? $title_here = "�������� ���������� ".$name_dt; include("header.html");?>
<form name_dt="form1" method="post" action="add_data.php">
 <p>
   <label>������� �������� <? echo $name_dt ?><br>
       <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>" >
     </label>
 </p>
 <p>
   <label>������� ������� �������� <? echo $name_dt ?><br>
   <input type="text" name="meta_d" id="meta_d" size="<? echo $SizeOfinput ?>">
   </label>
 </p>
 <p>
   <label>������� �������� ����� ��� <? echo $name_dt ?><br>
   <input type="text" name="meta_k" id="meta_k" size="<? echo $SizeOfinput ?>">
   </label>
 </p>
 <p>
   <label>������� ���� ���������� <? echo $name_dt ?>:
   <input name="date" type="text" id="date" size="8px" value="<?php $date = date("Y-m-d"); echo $date; ?>">
   </label>
 </p>
 <p>
   <label>������ ������� �������� <? echo $name_dt ?> � ������ �������
   <textarea name="description" id="description" cols="<? echo $ColsOfarea ?>" rows="20"></textarea>
   </label>
 </p>
 <p>
   <label>������� ������ ����� <? echo $name_dt ?> � ������
   <textarea name="text" id="text" cols="<? echo $ColsOfarea ?>" rows="30"></textarea>
   </label>
 </p>
 <p>
   <label>������� ������ <? echo $name_dt ?><br>
   <input type="text" name="author" id="author">
   </label>
 </p>
 
<!-- <p>
   <label>������� ��� ����� ���������<br>
   <input type="text" name="img" id="img">
   </label>
 </p>-->
 
 <p>
   <label>�������� ��������� <? echo $name_dt ?><br>
   
   <select name="cat">
   
   <?
   
        $result = mysql_query("SELECT title,id FROM categories WHERE sec='$sec_dt'",$db);

        if (!$result)
        {
            echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
            exit(mysql_error());
        }
        $num_rows = mysql_num_rows($result);
        if ($num_rows > 0)
        {
            $myrow = mysql_fetch_array($result);
            do
            {
            printf ("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);
            }
            while ($myrow = mysql_fetch_array($result));
        }
        else
        {
//            echo "<p>��� ���������� ".$name_dt." ����� �������� ���� �� ���� ��������� � �������!</p>";
//            echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
//            exit();
        }
        ?>

   </select>
   </label>
 </p>
 <?if ($num_rows == 0) echo "<p style='color: red' ><label>��� ���������� ".$name_dt." ����� �������� ���� �� ���� ��������� � �������!</label></p>";?>
<!-- <p>��������� � ��������� ������?<br>
   <label><strong>��</strong>
   <input type="radio" name="secret" id="secret" value="1">
   </label>
   
    <label><strong>���</strong>
   <input type="radio" checked name="secret" id="secret" value="0">
   </label>
 </p>-->
 <input name="name_dt" type="hidden" value="<? echo $name_dt ?>">
 <input name="tbl_dt" type="hidden" value="<? echo $tbl_dt ?>">
 <p>
   <label>
   <input type="submit" name="submit" id="submit" value="<? echo "��������� ".$name_dt." � ����" ?>">
   </label>
 </p>
</form>
<? include("footer.html");?>
