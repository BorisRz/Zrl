<?php
Class UserControllers
{
	function p_admin_action()
	{
		$post_Model= new User_Model();
		$posts =$post_Model->get_all_posts();
		global $test;
		require 'view/template/user/admin.php';
	}
	function p_show_action($id)
	{	$post_Model= new User_Model();
		$post=$post_Model->get_post_by_id($id);
		require 'view/template/user/show.php';
	}
	function p_add_action()
	{
		$post_Model=new User_Model();
		$post_Model->add_post();
		$posts =$post_Model->get_all_posts();
		//var_dump($posts);
		require 'view/template/user/admin.php';
	}
	function p_delete_action($id)
	{
		$post_Model=new User_Model();
		$post_Model->delete_post($id);
		$posts =$post_Model->get_all_posts();
		require"view/template/user/admin.php";
	}
}