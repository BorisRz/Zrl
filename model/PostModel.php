<?php
Class Post_Model
{
	private $dbh;
	private $user ="root";
	private $pass ="12345";
	private $db ="Chistyakov B.";
	private $charset ="UTF8";
	private $host ="localhost";

	function Post_Model()
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
		$sql='SELECT * FROM post';

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
		$sql="SELECT * FROM post WHERE id=?";//запрос в sql
		$stmt = $this->dbh->prepare($sql);//подготавливает места для перменных
		$stmt->execute(array($id));//присваевает соответсвующие значение перменных в соответсвующие(подготоваленные)места
		$post = $stmt->fetch();
		return $post;		
	}

	public function add_post()
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

			$sql = "INSERT INTO post(`date`,`autor`,`title`,`content`)
			VALUE (?,?,?,?)";
			$stmt=$this->dbh->prepare($sql);
			$stmt->execute(array($add_date,$add_autor,$add_title,$add_content));
			return true;
		}
		else
		{
			echo "Пропущена";
		}


	}
	public function delete_post($id)
	{
		
		$sql = "DELETE FROM `post` WHERE id = ?";
		$stmt=$this->dbh->prepare($sql);
		$stmt->execute([$id]);		
		return;
	}
	public function update_post_by_id()
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
	}
}

?>