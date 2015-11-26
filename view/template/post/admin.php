
<?php ob_start(); ?>
			<h1>Админитсратирование странички<h1>

<form action="/Zrl/index.php/add" method="POST" name="add form">
	<table>
	<tr>
		<td>Автор:</td>
		<td><input type="text" name="add_autor"></td>
	</tr>
	<tr>
		<td>Дата:</td>
		<td><input type="calendar" name="add_date"></td>
	</tr>
	<tr>
		<td>Заголовок:</td>
		<td><input type="text" name="add_title"></td>
	</tr>
	<tr>
		<td>Текст:</td>
		<td><input type="text" name="add_content"></td>
	</tr>
	<tr>
		<td><input type="reset" name="reset" value="Очистить"></td>
		<td><input type="submit" name="submit" value="Добавить"></td>
	</tr>

	</table>
</form>
<h1>Список<h1>
			<ul>
				<?php foreach ($posts as $post): ?>
					<li>
						<a href="/Zrl/index.php/delete?id=<?php echo $post['id'];?>">X
						</a>
						<a href="/Zrl/index.php/show?id=<?php echo $post['id'];?>">
							<?php echo $post['id']. '. '. $post['title'];?>
						</a>					
					</li>
				<?php endforeach; ?>					
			</ul>
<?php $content=ob_get_clean();?>

<?php include 'view/template/post/layout.php'; ?>