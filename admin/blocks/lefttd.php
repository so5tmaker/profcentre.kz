<td width="165px" valign="top" class="left">

<p align="center" class="title">�������</p>
<div id="coolmenu">
<a href="new_sec.php">��������</a>
<a href="edit_sec.php">�������������</a>
<a href="del_sec.php">�������</a>
</div>

<p align="center" class="title">���������</p>
<div id="coolmenu">
<a href="new_cat.php">��������</a>
<a href="edit_cat.php">�������������</a>
<a href="del_cat.php">�������</a>
</div>

<?
$name[1] = "�����";
$name_b[1] = "�����";
$name[2] = "��������";
$name_b[2] = "��������";
$name[3] = "������";
$name_b[3] = "������";
$table[1]= "courses";
$table[2]= "trainings";
$table[3]= "articles";
// �������� ���������� i ����� ��������� � �� id ������ 1 - �����, 2 - ��������, 3 - ������.
for ($i=1; $i <= 3; $i++)
{
    $args = "?name_dt=".$name[$i]."&tbl_dt=".$table[$i]."&sec_dt=".$i;
    printf ("
    <p align='center' class='title'>%s</p>
    <div id='coolmenu'>
    <a href='new_data.php%s'>��������</a>
    <a href='edit_data.php%s'>�������������</a>
    <a href='del_data.php%s'>�������</a>
    </div>",
    $name_b[$i],$args,$args,$args);
}
?>

<!--<p align="center" class="title">�����</p>
<div id="coolmenu">
<a href="new_file.php">��������</a>
<a href="edit_file.php">�������������</a>
<a href="del_file.php">�������</a>
</div>-->

<p align="center" class="title">������</p>
<div id="coolmenu">
<a href="new_friend.php">��������</a>
<a href="edit_friend.php">�������������</a>
<a href="del_friend.php">�������</a>
</div>	

<p align="center" class="title">���������� �������</p>
<div id="coolmenu">
<a href="edit_text.php">�������������</a>
</div>	

<p align="center" class="title">��������</p>
<div id="coolmenu">
<a href="index.php">�������</a>
</div>

</td>