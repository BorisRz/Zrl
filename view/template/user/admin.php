
<?php ob_start(); ?>
			<h1>Пользователи<h1>

<form action="/Zrl/index.php/user/add" method="POST" name="add form">
	<table>
	
	
	<tr>
		<td>Имя:</td>
		<td><input type="text" name="add_firstname"></td>
	</tr>
	<tr>
		<td>Фамилия:</td>
		<td><input type="text" name="add_lastname"></td>
	</tr>
	<tr>
		<td>Код:</td>
		<td><input type="text" name="add_isikukood"></td>
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
						<a href="/Zrl/index.php/user/delete?id=<?php echo $post['id'];?>">X
						</a>
						<a href="/Zrl/index.php/user/show?id=<?php echo $post['id'];?>">
							<?php echo $post['id']. '. '. $post['lastname'];?>
						</a>						
					</li>
				<?php endforeach; ?>					
			</ul>
<?php $content=ob_get_clean();?>

<?php include 'view/template/user/layout.php'; ?>