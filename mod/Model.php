<?php 
	class Model{
		private $dbh;
		private $user ="root";
		private $pass ="12345";
		private $db ="Chistyakov B.";
		private $charset ="UTF8";
		private $host ="localhost";

		function Model()
		{
			$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset"; 
			$opt = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			);
			try{
				$this->dbh = new PDO($dsn, $this->user, $this->pass, $opt);
			}
			catch(Exception $e){
				echo"error!";
			}
		}

		public function get_all_posts(){
			$sql='SELECT id, title FROM post';
			$stmt=$this->dbh->query($sql);

			$posts = array();
			while ($row =$stmt-> fetch()){
				$posts[]=$row;
			}
			return $posts;
		}

		public function get_post_by_id($id){ 
			$sql="SELECT `autor`,`date`,`title`,`content` FROM post WHERE id=?";//запрос в sql
			$stmt = $this->dbh->prepare($sql);//подготавливает места для перменных
			$stmt->execute([$id]);//присваевает соответсвующие значение перменных в соответсвующие(подготоваленные)места
			foreach ($stmt as $value){
				$post=$value;
			}
			return $post;
		}
		public function add_post(){
			if(empty($_REQUEST['add_autor']) || 
				empty($_REQUEST['add_date']) || 
				empty($_REQUEST['add_title']) || 
				empty($_REQUEST['add_content'])){
					echo "Поле пропущенно!";
				return false;

			}
			$add_autor = $_REQUEST['add_autor'];
			$add_date = $_REQUEST['add_date'];
			$add_title = $_REQUEST['add_title'];
			$add_content = $_REQUEST['add_content'];
			$sql = "INSERT INTO post(`autor`,`date`,`title`,`content`) 
			VALUE (?,?,?,?)";
			$stmt=$this->dbh->prepare($sql);
			$stmt->execute(array($add_autor,$add_date,$add_title,$add_content));
			/*$link = open_database_connection();
			mysql_query($sql,$link);
			close_database_conection($link);*/
			return $result;
		}
		public function delete_post($id){
			$sql="DELETE FROM `post` WHERE id=? ";
			$stmt = $this->dbh->prepare($sql);
			$stmt->execute([$id]);
			return;
		}
	}
?>