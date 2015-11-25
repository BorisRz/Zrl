<?php
	class UserCont {//класс controller
		public function list_action(){
			$usmodel=new UseModel();
			$users=$usmodel->get_all_users();
			require 'view/temp/list.php';

		}
		public function show_action($id){
			$usmodel=new UseModel();
			$user=$usmodel->get_user_by_id($id);
			require 'view/temp/usersho.php';
		}
		public function user_action(){
			$usmodel=new UseModel();
			$users=$usmodel->get_all_users();
			require 'view/temp/user.php';
		}
		public function add_action(){
			$usmodel=new UseModel();
			$usmodel->add_user();
			$users=$usmodel->get_all_user();
			require 'view/temp/user.php';
		}
		public function delete_action($id){
			$usmodel=new UseModel();
			$usmodel->delete_user($id);
			$users=$usmodel->get_all_user();
			require 'view/temp/user.php';
		}
		
	}
	return $users;
?>