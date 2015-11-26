<?php
$controllers=new PostControllers();

echo "<br> uri=".$_SERVER['REQUEST_URI'];

$s=explode('?',$_SERVER['REQUEST_URI']);
$uri=$s[0];
$uri=rtrim($uri,'/');
if($uri == '/Zrl' OR $uri == '/Zrl/index.php')
{
	$controllers->list_action();
}
elseif ($uri=='/Zrl/index.php/show' && isset($_GET['id'])) 
{
	$controllers->show_action($_GET['id']);
}
elseif ($uri=='/Zrl/index.php/admin') 
{
	$controllers->admin_action();
}
elseif ($uri=='/Zrl/index.php/add') 
{
	$controllers->add_action();
}
elseif ($uri=='/Zrl/index.php/delete') 
{
	$controllers->delete_action($_GET['id']);
}
elseif ($uri=='/Zrl/index.php/about') 
{
	about_action();
}
elseif ($uri=='/Zrl/index.php/edit') 
{
	$controllers->showedit_action($_REQUEST['id']);
}
elseif ($uri=='/Zrl/index.php/update') 
{
	$controllers->update_action();
}
$controllers=new UserControllers();
if($uri=='/Zrl/index.php/user/admin') 
{
	$controllers->p_admin_action();
}
elseif ($uri=='/Zrl/index.php/user/show' && isset($_GET['id'])) 
{
	$controllers->p_show_action($_GET['id']);
}
elseif ($uri=='/Zrl/index.php/user/add') 
{
	$controllers->p_add_action();
}
elseif ($uri=='/Zrl/index.php/user/delete') 
{
	$controllers->p_delete_action($_GET['id']);
}