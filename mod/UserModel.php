<?php 
	class UserModel{
		private $dbh;
		private $user ="root";
		private $pass ="12345";
		private $db ="Chistyakov B.";
		private $charset ="UTF8";
		private $host ="localhost";

		function UserModel()
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

		public function get_all_users(){
			$sql='SELECT * FROM users';
			$stmt=$this->dbh->query($sql);

			$user = array();
			while ($row =$stmt-> fetch()){
				$users[]=$row;
			}
			return $users;
		}

		public function get_user_by_id($id){ 
			$sql="SELECT `firstname`,`lastname`,`isikukood` FROM users WHERE id=?";//запрос в sql
			$stmt = $this->dbh->prepare($sql);//подготавливает места для перменных
			$stmt->execute([$id]);//присваевает соответсвующие значение перменных в соответсвующие(подготоваленные)места
			foreach ($stmt as $value){
				$user=$value;
			}
			return $user;
		}
		public function add_user(){
			if(empty($_REQUEST['add_firstname']) || 
				empty($_REQUEST['add_lastname']) || 
				empty($_REQUEST['add_isikukood'])){
					echo "Поле пропущенно!";
				return false;

			}
			$add_firstname = $_REQUEST['add_firstname'];
			$add_lastname = $_REQUEST['add_lastname'];
			$add_isikukood = $_REQUEST['add_isikukood'];
			$sql = "INSERT INTO users(`autor`,`date`,`title`,`content`) 
			VALUE (?,?,?)";
			$stmt=$this->dbh->prepare($sql);
			$stmt->execute(array($add_firstname,$add_lastname,$add_isikukood));
			/*$link = open_database_connection();
			mysql_query($sql,$link);
			close_database_conection($link);*/
			return $result;
		}
		public function delete_user($id){
			$sql="DELETE FROM `users` WHERE id=? ";
			$stmt = $this->dbh->prepare($sql);
			$stmt->execute([$id]);
			return;
		}
	}
?>