<? include ("lock.php");  ?>
<? $title_here = "�������� ���������� ������ ����� �����"; include("header.html"); ?>
<p><strong>�������� ���������� ����� �����</strong></p>
<form name="form1" method="post" action="add_friend.php">
<p>
<label>������� �������� ����� �����<br>
 <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
 </label>
</p>
<p>
<label>������� ������ �� ���� �����<br>
<input type="text" name="link" id="link" size="<? echo $SizeOfinput ?>">
</label>
</p>
<p>
<label>
<input type="submit" name="submit" id="submit" value="������� ���� � ����">
</label>
</p>
</form>
<? include("footer.html");?>