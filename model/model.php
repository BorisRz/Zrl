<?php

function open_database_connection()
{
	$link = mysql_connect('localhost', 'Anton', '123');
	mysql_select_db('Anton', $link);
	mysql_query('SET NAMES utf8');

	return $link;
}
function close_database_connection($link)
{
	mysql_close($link);
}

function get_all_posts()
{
	$link= open_database_connection();
	$result = mysql_query('SELECT id,title FROM post', $link);
	while ($row = mysql_fetch_assoc($result))
	{
		$posts[]= $row;
	}
	close_database_connection($link);
	return $posts;
}
function get_post_by_id($id)
{
	$link = open_database_connection();
	$sql="SELECT `title`,`content`,`autor`,`date` FROM post WHERE id='$id'";
	$result =mysql_query($sql, $link);
	$row =mysql_fetch_assoc($result);
	$post =$row;
	close_database_connection($link);

	return $post;
}
function add_post()
{

	if(!empty($_REQUEST['add_autor'])
		AND !empty($_REQUEST['add_date'])
			AND !empty($_REQUEST['add_title'])
				AND !empty($_REQUEST['add_content']))
	{
		$add_autor=$_REQUEST['add_autor'];
		$add_date=$_REQUEST['add_date'];
		$add_title=$_REQUEST['add_title'];
		$add_content=$_REQUEST['add_content'];

		$sql="INSERT INTO post(`date`,autor,title,content)
		VALUES ('$add_date','$add_autor','$add_title','$add_content')";
		$link = open_database_connection();
			mysql_query($sql, $link) OR die("Запрос не выполненн" .mysql_error());
		close_database_connection($link);
	}
	else
	{
		echo "Пропущена";
	}

}
function delete_post($id)
{
	$link= open_database_connection();	
	$sql="DELETE FROM `post` WHERE id='$id' ";
	mysql_query($sql, $link) OR die("Запрос не выполненн" .mysql_error());
	close_database_connection($link);
	return;	

}
function edit_post($id)
{

	

	/*$link = open_database_connection();
	$sql="SELECT `title`,`content`,`autor`,`date` FROM post WHERE id='$id'";
	$result =mysql_query($sql, $link);
	$row =mysql_fetch_assoc($result);
	$post =$row;
	close_database_connection($link);
	return $post;*/
}