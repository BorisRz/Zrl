<?php
Class User_Model
{
	private $dbh;
	private $user ="root";
	private $pass ="12345";
	private $db ="Chistyakov B.";
	private $charset ="UTF8";
	private $host ="localhost";

	function User_Model()
	{
		$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
		$opt = array(
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		try
		{
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $opt);
		}
		catch(Exception $e)
		{
			echo"error!";
		}
	}
	public function get_all_posts()
	{
		$sql='SELECT * FROM user';

		$stmt=$this->dbh->query($sql);

		$posts = array();
		while ($row =$stmt-> fetch())
		{
			$posts[]=$row;
		}
		return $posts;
	}

	public function get_post_by_id($id)
	{
		$sql="SELECT * FROM user WHERE id=?";//запрос в sql
		$stmt = $this->dbh->prepare($sql);//подготавливает места для перменных
		$stmt->execute(array($id));//присваевает соответсвующие значение перменных в соответсвующие(подготоваленные)места
		$post = $stmt->fetch();
		return $post;		
	}

	public function add_post()
	{

		if(!empty($_REQUEST['add_firstname']) // Имя
			AND !empty($_REQUEST['add_lastname']) //Фамилия
				AND !empty($_REQUEST['add_isikukood']))// ИД-код
		{
			$add_firstname=$_REQUEST['add_firstname'];
			$add_lastname=$_REQUEST['add_lastname'];
			$add_isikukood=$_REQUEST['add_isikukood'];

			$sql = "INSERT INTO user(`firstname`,`lastname`,`isikukood`)
			VALUE (?,?,?)";
			$stmt=$this->dbh->prepare($sql);
			$stmt->execute(array($add_firstname,$add_lastname,$add_isikukood));
			return true;
		}
		else
		{
			echo "Пропущена";
		}


	}
	public function delete_post($id)
	{
		
		$sql = "DELETE FROM `user` WHERE id = ?";
		$stmt=$this->dbh->prepare($sql);
		$stmt->execute([$id]);		
		return;
	}
	/*public function update_post_by_id()
	{
		$id=$_REQUEST['id'];		
		$update_autor=$_REQUEST['update_autor'];
		$update_date=$_REQUEST['update_date'];
		$update_title=$_REQUEST['update_title'];
		$update_content=$_REQUEST['update_content'];
		$sql ="UPDATE `post` SET `date`=?,`autor`=?,`title`=?,`content`=? WHERE `id`=?";
		//$sql = "INSERT INTO post(`date`,`autor`,`title`,`content`)
		//VALUE (?,?,?,?)";
		$stmt=$this->dbh->prepare($sql);
		$stmt->execute(array($update_date,$update_autor,$update_title,$update_content,$id));
	}*/
}

?>