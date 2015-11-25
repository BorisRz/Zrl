<?php 
function list_action(){  // запуск функции
	$posts=get_all_posts();
	require 'view/temp/list.php';
}
function show_action($id){
	$post=get_post_by_id($id);
	//var_dump($post);
	require 'view/temp/sho.php';
}
function admin_action(){
	$posts=get_all_posts();
	require 'view/temp/adm.php';
}
function add_action(){
	add_post();
	$posts=get_all_posts();
	require 'view/temp/adm.php';
}
function delete_action($id){
	delete_post($id);
	$posts=get_all_posts();
	require 'view/temp/adm.php';
}
function about_action(){
	$posts=get_all_posts();
	require 'view/temp/about.php';
}
function edit_action($id){
	$edipo=get_post_by_id($id);
	$posts=get_all_posts();
	require 'view/temp/adm.php';
}