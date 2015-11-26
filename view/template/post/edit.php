
<?php ob_start(); ?>
			<h1>Админитсратирование странички<h1>

<form action="/2KTVR15/index.php/update" method="POST" name="add form">
	<table>	
	<tr>
		<td>Автор:</td>
		<td>
		
			<input type="text" name="update_autor" value="<?php echo $post ['autor']?>">
			<input type="hidden" name="id" value="<?php echo $post ['id']?>">
		</td>
	</tr>
	<tr>
		<td>Дата:</td>
		<td><input type="calendar" name="update_date" value="<?php echo $post ['date']?>"></td>
	</tr>
	<tr>
		<td>Заголовок:</td>
		<td><input type="text" name="update_title" value="<?php echo $post ['title']?>"></td>
	</tr>
	<tr>
		<td>Текст:</td>
		<td><input type="text" name="update_content" value="<?php echo $post ['content']?>"></td>
	</tr>
	<tr>
		<td><input type="reset" name="reset" value="Очистить"></td>
		<td><input type="submit" name="submit" value="Изменить"></td>
	</tr>
	</table>
</form>
<?php $content=ob_get_clean();?>

<?php include 'view/template/post/layout.php'; ?>