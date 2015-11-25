<?php
	class UserCont {//класс controller
		public function Userlist_action(){
			$model=new UserModel();
			$users=$model->get_all_users();
			require 'view/temp/list.php';

		}
		public function show_action($id){
			$model=new UserModel();
			$user=$model->get_user_by_id($id);
			require 'view/temp/usersho.php';
		}
		public function user_action(){
			$uodel=new UserModel();
			$users=$model->get_all_users();
			require 'view/temp/user.php';
		}
		public function add_action(){
			$model=new UserModel();
			$model->add_user();
			$users=$model->get_all_user();
			require 'view/temp/user.php';
		}
		public function delete_action($id){
			$model=new UserModel();
			$model->delete_user($id);
			$users=$model->get_all_user();
			require 'view/temp/user.php';
		}
		
	}
	return $users;
?>