<table width="530" ><!--table4-->
   <td width="50%" valign="top" style="border-right:1px solid #ccc;"><!--table4_td1-->
      <div class="new_head">����� �����</div>
      <?php
	  $mini_img_art='img/article.gif';
	  $mini_img_tra='img/training.gif';
      function quant_comment($id,$cat)
    {
        include ("blocks/bd.php");
        $res_kol = mysql_query ("SELECT COUNT(*) FROM comments WHERE post='$id' and cat='$cat'",$db);
        $sum_kol = mysql_fetch_array($res_kol);
        return $sum_kol[0];
    }

        $result = mysql_query("SELECT id,cat,title,description,date,author,mini_img,view,rating,q_vote FROM courses WHERE lang='ru' or lang='' ORDER BY id DESC LIMIT 5",$db);

        if (!$result)
        {
        echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
        exit(mysql_error());
        }
        if (mysql_num_rows($result) > 0)
        {
            $myrow = mysql_fetch_array($result);
            do
            {
            printf ("
                     <div class='content3'>
                     <p class='new_name'><a href='data.php?cat=%s&id=%s&sec=%s'>%s</a></p>
                     <p class='new_adds'>�����: %s</p>
                     <p class='new_title'>%s</p>

                     <div class='new_line'><img src='img/spacer.gif' width='1' height='1'></div>
                     <div class='info'>
                     <span class='comment'>��������: %s</span><br>
                     <span class='comment'>����������: %s</span>
                     <span class='comment'>������: %s</span>
                     </div></div>",$myrow["cat"],$myrow["id"],'courses',$myrow["title"], $myrow["author"],$myrow["description"],$myrow["date"], $myrow["view"], quant_comment($myrow["id"],$myrow["cat"]));
                   }
            while ($myrow = mysql_fetch_array($result));//<img class='mini' align='left' src='%s'>$mini_img_art ,
        }
     ?>
  </td><!--table4_td1-->
  <td width="50%" valign="top" ><!--table4_td2-->
      <div class="new_head_1">����� �������� � ��������</div>
       <?php
        $result = mysql_query("SELECT id,cat,title,description,date,author,mini_img,view,rating,q_vote FROM trainings WHERE lang='ru' or lang='' ORDER BY id DESC LIMIT 5",$db);

        if (!$result)
        {
        echo "<p>������ �� ������� ������ �� ���� �� ������. �������� �� ���� �������������� info@profcentre.kz. <br> <strong>��� ������:</strong></p>";
        exit(mysql_error());
        }
        if (mysql_num_rows($result) > 0)
        {
            $myrow = mysql_fetch_array($result);
            do
            {
            printf ("
                     <div class='content3'>
                     <p class='new_name1'><a href='data.php?cat=%s&id=%s&sec=%s'>%s</a></p>
                     <p class='new_adds'>�����: %s</p>
                     <p class='new_title'>%s</p>

                     <div class='new_line1'><img src='img/spacer.gif' width='1' height='1'></div>
                     <div class='info1'>
                     <span class='comment'>��������: %s</span><br>
                     <span class='comment'>����������: %s</span>
                     <span class='comment'>������: %s</span>
                     </div></div>", $myrow["cat"],$myrow["id"],'trainings',$myrow["title"], $myrow["author"],$myrow["description"],$myrow["date"], $myrow["view"], quant_comment($myrow["id"],$myrow["cat"]));
                   }
            while ($myrow = mysql_fetch_array($result));//<img class='mini' align='left' src='%s'>$mini_img_tra,
        }
     ?>
    </td><!--table4_td2-->
</table><!--table4-->
