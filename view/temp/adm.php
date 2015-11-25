<?php ob_start();?>
<script>
	function update(){
		document.getElementById.
	}
</script>
<h1>Админ страницы</h1>
<form action="/Zrl/index.php/add">
	<table>
		<tr>
			<td><input type="text" name="add_autor" value=<?php echo $edipo['autor'];?>> - Автор</td>

		</tr>
		<tr>
			<td><input type="calendar" name="add_date"  value=<?php echo $edipo['date'];?>> - Дата</td>

		</tr>
		<tr>
			<td><input type="text" name="add_title" value=<?php echo $edipo['title'];?>> - Название</td>
		</tr>
		<tr>
			<td><input type="text" name="add_content" value=<?php echo $edipo['content'];?>> - Текс</td>
		</tr>

		<tr>
			<td><input type="reset" name="res" value="Почисти"></td>
			<td><input type="submit" name="submit" value="Добавить"></td>
			<td><input type="button" name="change" onclick="update()" value="Изменить"></td>
		</tr>
	</table>
</form>
<h3>Какой-то список из базы</h3>
<ul>
				<?php foreach ($posts as $post):  ?>
					<li>
						
						<a href="/Zrl/index.php/show?id=<?php echo $post['id'];?>">
							<?php echo $post['id'].'.'.$post['title']?> 
						</a>
						<a href="/Zrl/index.php/delete?id=<?php echo $post['id'];?>"> X 
						</a> 
						<a href="/Zrl/index.php/edit?id=<?php echo $post['id'];?>">  Обновить
						</a>
					</li>
				<?php endforeach;?>
			</ul>

<?php $content=ob_get_clean();?>
<?php	include 'view/temp/lay.php'; ?>