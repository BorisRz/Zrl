<?php

	require_once 'control/Cla_cont.php';
	$Cla_cont=new Cla_cont();
	require_once 'control/UserCont.php';
	

	echo "<br>uri=".$_SERVER['REQUEST_URI'];
	$s=explode('?',$_SERVER['REQUEST_URI']); // запрос в веб-браузер
	$uri=$s[0];
	
	if($uri=='/Zrl/' OR $uri=='/Zrl/index.php') 
		{
			$Cla_cont->list_action();
			$UserCont=new UseModel();
			$UserCont-> list_action();			
		}

	elseif ($uri=='/Zrl/index.php/show' && isset($_GET['id'])) 
		{
			$Cla_cont->show_action($_GET['id']);
		}	
	elseif ($uri=='/Zrl/index.php/admin') 
		{
			$Cla_cont->admin_action();
		}
	elseif ($uri=='/Zrl/index.php/add') 
		{
			$Cla_cont->add_action();
		}

	elseif ($uri == '/Zrl/index.php/delete')
		{
			$Cla_cont->delete_action($_GET['id']);
		}
	elseif ($uri=='/Zrl/index.php/about') 
		{
			$Cla_cont->about_action();
		}
	elseif ($uri=='/Zrl/index.php/user') 
		{
			$UserCont=new UseModel();
			$UserCount->user_action();
		}