<?php
function open_database_connection()
	{
		$link=mysql_connect('localhost','root','12345'); // вход в б/д
		mysql_select_db('Chistyakov B.',$link); // выбор б/д
		mysql_query('SET NAMES utf8'); // кодировка символов
		return $link; // возврать запроса
	}

function close_database_conection($link)
	{
		mysql_close($link);
	}
function get_all_posts()
	{
		$link =open_database_connection();
		$result=mysql_query('SELECT id, title FROM post',$link);
		while ($row=mysql_fetch_assoc($result))
			{
				$posts[]=$row;
			}
		close_database_conection($link);
		return $posts;
	}

function get_post_by_id($id){
		$link = open_database_connection();
		$sql = "SELECT `title`, `autor`, `content`, `date` FROM post WHERE id='$id'";
		$result = mysql_query($sql,$link);
		var_dump($result);
		$row = mysql_fetch_assoc($result);
		$post = $row;
		close_database_conection($link);
		var_dump($post);
		return $post;
	}
function add_post(){
	$add_autor = $_REQUEST['add_autor'];
	$add_date = $_REQUEST['add_date'];
	$add_title = $_REQUEST['add_title'];
	$add_content = $_REQUEST['add_content'];
	$sql = "INSERT INTO post(`date`,`autor`,`title`,`content`) 
	VALUE ('$add_date','$add_autor','$add_title','$add_content')";
	$link = open_database_connection();
	mysql_query($sql,$link);
	close_database_conection($link);
	return;
}
function delete_post($id){
	$link= open_database_connection(); 
	$sql="DELETE FROM `post` WHERE id='$id' ";
	mysql_query($sql, $link) OR die("Запрос выданый вами пошол в комноту для раздумий".mysql_error());
	close_database_conection($link);
	return;
}