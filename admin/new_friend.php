<? include ("lock.php");  ?>
<? $title_here = "Страница добавления нового сайта друга"; include("header.html"); ?>
<p><strong>Страница добавления сайта друга</strong></p>
<form name="form1" method="post" action="add_friend.php">
<p>
<label>Введите название сайта друга<br>
 <input type="text" name="title" id="title" size="<? echo $SizeOfinput ?>">
 </label>
</p>
<p>
<label>Введите ссылку на сайт друга<br>
<input type="text" name="link" id="link" size="<? echo $SizeOfinput ?>">
</label>
</p>
<p>
<label>
<input type="submit" name="submit" id="submit" value="Занести сайт в базу">
</label>
</p>
</form>
<? include("footer.html");?>