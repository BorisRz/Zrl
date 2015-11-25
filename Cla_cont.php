<?php
	class Cla_cont {//класс controller
		public function list_action(){
			$model=new Model();
			$posts=$model->get_all_posts();
			require 'view/temp/list.php';

		}
		public function show_action($id){
			$model=new Model();
			$post=$model->get_post_by_id($id);
			require 'view/temp/sho.php';
		}
		public function admin_action(){
			$model=new Model();
			$posts=$model->get_all_posts();
			require 'view/temp/adm.php';
		}
		public function add_action(){
			$model=new Model();
			$model->add_post();
			$posts=$model->get_all_posts();
			require 'view/temp/adm.php';
		}
		public function delete_action($id){
			$model=new Model();
			$model->delete_post($id);
			$posts=$model->get_all_posts();
			require 'view/temp/adm.php';
		}
		public function about_action(){
			$posts=get_all_posts();
			require 'view/temp/about.php';
		}
		public function edit_action(){
			$edipo=get_post_by_id($id);
			$posts=get_all_posts();
			require 'view/temp/adm.php';
		}
	}
	return $posts;
?>