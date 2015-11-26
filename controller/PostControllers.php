<?php
Class PostControllers
{
	function list_action()
	{
		$post_Model= new Post_Model();
		$posts =$post_Model->get_all_posts();
		require 'view/template/post/list.php';
	}
	function show_action($id)
	{	$post_Model= new Post_Model();
		$post=$post_Model->get_post_by_id($id);

		require 'view/template/post/show.php';
	}
	function admin_action()
	{
		$post_Model= new Post_Model();
		$posts =$post_Model->get_all_posts();
		global $test;
		require 'view/template/post/admin.php';
	}
	function add_action()
	{
		$post_Model=new Post_Model();
		$post_Model->add_post();
		$posts =$post_Model->get_all_posts();
		//var_dump($posts);
		require 'view/template/post/admin.php';
	}
	function delete_action($id)
	{
		$post_Model=new Post_Model();
		$post_Model->delete_post($id);
		$posts =$post_Model->get_all_posts();
		require"view/template/post/admin.php";
	}
	function about_action()
	{
		$posts=get_all_posts();
		require"view/template/post/bout.php";
	}
	function showedit_action($id)
	{
		$post_Model=new Post_Model();
		//$post_Model->edit_post($id);
		$post=$post_Model->get_post_by_id($id);
		require"view/template/post/edit.php";

	}
	function update_action()
	{
		$post_Model=new Post_Model();
		$post_Model->update_post_by_id();
		$posts =$post_Model->get_all_posts();
		require"view/template/post/admin.php";
	}

}