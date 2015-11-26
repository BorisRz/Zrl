<?php ob_start(); ?>
			<h1>Список<h1>
			<ul>
				<?php foreach ($posts as $post): ?>
					<li>
						<a href="/Zrl/index.php/show?id=<?php echo $post['id'];?>">
							<?php echo $post['id']. '. '. $post['title'];?>
						</a>
					</li>
				<?php endforeach; ?>					
			</ul>
<?php $content=ob_get_clean();?>

<?php include 'view/template/post/layout.php'; ?>