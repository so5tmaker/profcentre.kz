<? echo "<p class='text'>".$text."</p>";
	$mini_img_art='img/article.gif';
	$result77 = mysql_query("SELECT str FROM options", $db);
	$myrow77 = mysql_fetch_array($result77);
	$num = $myrow77["str"];
	// ��������� �� URL ������� ��������
	@$page = $_GET['page'];
	// ���������� ����� ����� ��������� � ���� ������
	$result00 = mysql_query("SELECT COUNT(*) FROM ".$sec." WHERE secret=0 AND cat".$text_cat);
	$temp = mysql_fetch_array($result00);
	$posts = $temp[0];
	// ������� ����� ����� �������
	$total = (($posts - 1) / $num) + 1;
	$total =  intval($total);
	// ���������� ������ ��������� ��� ������� ��������
	$page = intval($page);
	// ���� �������� $page ������ ������� ��� ������������
	// ��������� �� ������ ��������
	// � ���� ������� �������, �� ��������� �� ���������
	if(empty($page) or $page < 0) $page = 1;
	  if($page > $total) $page = $total;
	// ��������� ������� � ������ ������
	// ������� �������� ���������
	$start = $page * $num - $num;
	// �������� $num ��������� ������� � ������ $start			
			
	//
	function quant_comment($id,$cat)
	{
		include ("blocks/bd.php");
		$res_kol = mysql_query ("SELECT COUNT(*) FROM comments WHERE post='$id' and cat='$cat'",$db);
		$sum_kol = mysql_fetch_array($res_kol);
		return $sum_kol[0];
	}
	//echo "SELECT id,cat,title,description,date,author,mini_img,view,rating,q_vote FROM ".$sec." WHERE cat".$text_cat." ORDER BY `date`,`id` LIMIT 0, $num";
	$result = mysql_query("SELECT id,cat,title,description,date,author,mini_img,view,rating,q_vote FROM ".$sec." WHERE secret=0 AND cat".$text_cat." and (lang='' or lang='RU') ORDER BY date desc, id LIMIT $start, $num",$db);

        $num_rows = mysql_num_rows($result);
	if (!$result)                     
	{
		echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
		exit(mysql_error());
	}
	
	if ($num_rows > 0)
	{
		$myrow = mysql_fetch_array($result); 
		if (!isset($cat)) {$cat_here = "";} else {$cat_here = "cat=".$cat."&";}
                if (!isset($sec)) {$sec_here = "";} else {$sec_here = "sec=".$sec."&";}
		do 
		{
			$r = $myrow["rating"]/$myrow["q_vote"];
			$r = intval($r);
			printf ("<table align='center' class='post'>
					 <tr>
					 <td class='post_title'>
					 <p class='post_name'><a href='data.php?cat=%s&id=%s&sec=%s'>%s</a></p>
					 <p class='post_adds'>���� ����������: %s</p>
					 <p class='post_adds'>�����: %s</p></td>
					 </tr>
					 <tr>
					 <td>%s <p class='post_view'>����������: %s &nbsp;&nbsp; ������: %s &nbsp;&nbsp; �������: <img src='img/%s.gif'></p></td>
					 </tr>
					 </table><br><br>",$myrow["cat"],$myrow["id"],$sec,$myrow["title"], $myrow["date"],$myrow["author"],$myrow["description"], $myrow["view"], quant_comment($myrow["id"],$myrow["cat"]), $r);
			}
			while ($myrow = mysql_fetch_array($result));//<img class='mini' align='left' src='%s'>$mini_img_art,
			
			// ��������� ����� �� ������� �����
			if ($page !== 1) $pervpage = '<a href=data.php?'.$sec_here.''.$cat_here.'page=1>������</a> | <a href=data.php?'.$sec_here.''.$cat_here.'page='. ($page - 1) .'>����������</a> | ';
			// ��������� ����� �� ������� ������
			if ($page !== $total) $nextpage = ' | <a href=data.php?'.$sec_here.''.$cat_here.'page='. ($page + 1) .'>���������</a> | <a href=data.php?'.$sec_here.''.$cat_here.'page=' .$total. '>���������</a>';

                        for ($i = 5; $i >= 1;  $i--)
                        {
                            // ������� ��� ��������� ������� � ����� �����, ���� ��� ����
			if($page - $i > 0) $page5left = ' <a href=data.php?'.$sec_here.''.$cat_here.'page='. ($page - $i) .'>'. ($page - $i) .'</a> | ';
                        if($page + $i <= $total) $page5right = ' | <a href=data.php?'.$sec_here.''.$cat_here.'page='. ($page + $i) .'>'. ($page + $i) .'</a>';
                        }
			// ������� ��� ��������� ������� � ����� �����, ���� ��� ����
//			if($page - 5 > 0) $page5left = ' <a href=data.php?'.$cat_here.'page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
//			if($page - 4 > 0) $page4left = ' <a href=data.php?'.$cat_here.'page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
//			if($page - 3 > 0) $page3left = ' <a href=data.php?'.$cat_here.'page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
//			if($page - 2 > 0) $page2left = ' <a href=data.php?'.$cat_here.'page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
//			if($page - 1 > 0) $page1left = '<a href=data.php?'.$cat_here.'page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';
//
//			if($page + 5 <= $total) $page5right = ' | <a href=data.php?'.$cat_here.'page='. ($page + 5) .'>'. ($page + 5) .'</a>';
//			if($page + 4 <= $total) $page4right = ' | <a href=data.php?'.$cat_here.'page='. ($page + 4) .'>'. ($page + 4) .'</a>';
//			if($page + 3 <= $total) $page3right = ' | <a href=data.php?'.$cat_here.'page='. ($page + 3) .'>'. ($page + 3) .'</a>';
//			if($page + 2 <= $total) $page2right = ' | <a href=data.php?'.$cat_here.'page='. ($page + 2) .'>'. ($page + 2) .'</a>';
//			if($page + 1 <= $total) $page1right = ' | <a href=data.php?'.$cat_here.'page='. ($page + 1) .'>'. ($page + 1) .'</a>';
//			
			// ����� ���� ���� ������� ������ �����
		
			if ($total > 1)
			{
			Error_Reporting(E_ALL & ~E_NOTICE);
			echo "<div class=\"pstrnav\">";
			echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
			echo "</div>";
			}
	}
	else
	{
	echo "<p>���������� �� ������� �� ����� ���� ��������� � ������� ��� �������.</p>";
	exit();
	}
?>

