<?php /*Заполняю массив значением по умолчанию class='nav_t и только один 
элемент изменяю для высвечивания другим цветом надписи на кнопке меню навигации*/
	$a = array_fill(1, 5, "class='nav_t'");
	if(isset($n))
	{
		$a[$n]="class='nav_a'";
	} 
?>
<table width="530" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width='20%' <?php echo $a[1];?>><strong><a href="index.php?">Главная</a></strong></td>
    <td width='20%' <?php echo $a[2];?> ><strong><a href="data.php?sec=courses">Курсы</a></strong></td>
    <td width='20%' <?php echo $a[3];?>><strong><a href="data.php?sec=trainings">Тренинги и семинары</a></strong></td>
    <td width='20%' <?php echo $a[4];?>><strong><a href="data.php?sec=articles">Статьи</a></strong></td>
	<td width='20%' <?php echo $a[5];?>><strong><a href="about.php?">О нас</a></strong></td>
  </tr>
</table>