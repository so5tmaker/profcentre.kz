<?php /*�������� ������ ��������� �� ��������� class='nav_t � ������ ���� 
������� ������� ��� ������������ ������ ������ ������� �� ������ ���� ���������*/
	$a = array_fill(1, 5, "class='nav_t'");
	if(isset($n))
	{
		$a[$n]="class='nav_a'";
	} 
?>
<table width="530" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width='20%' <?php echo $a[1];?>><strong><a href="index.php?">�������</a></strong></td>
    <td width='20%' <?php echo $a[2];?> ><strong><a href="data.php?sec=courses">�����</a></strong></td>
    <td width='20%' <?php echo $a[3];?>><strong><a href="data.php?sec=trainings">�������� � ��������</a></strong></td>
    <td width='20%' <?php echo $a[4];?>><strong><a href="data.php?sec=articles">������</a></strong></td>
	<td width='20%' <?php echo $a[5];?>><strong><a href="about.php?">� ���</a></strong></td>
  </tr>
</table>