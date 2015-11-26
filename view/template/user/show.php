<?php $isikukood =$post['isikukood']; ?>

<?php ob_start() ?>
	<h2><?php echo $post['isikukood'];?></h2>

	<div class="firstname"> Имя : <?php echo $post['firstname']; ?> </div>
	<div class="lastname"> Фамилия : <?php echo $post['lastname'];?> </div>

<?php $content=ob_get_clean(); ?>

<?php include 'view/template/user/layout.php'; ?>