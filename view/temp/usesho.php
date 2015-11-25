<?php $title = $post['title'];?>

<?php ob_start(); ?>
	<h2><?php echo $post['title'] ?></h2>
	<div class="date">Date- <?php echo $post['date'];//берет дату и время из перем. post  ?></div> 
	<div class="autor">Author- <?php echo $post['autor'];//берет имя автора  из перем. post ?></div>
	<div class="content"><?php echo $post['content'];//берет контент из перем. post ?></div>
<?php $content = ob_get_clean(); ?>
<?php include 'view/temp/lay.php' ?>