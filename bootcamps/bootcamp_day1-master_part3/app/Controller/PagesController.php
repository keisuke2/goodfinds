<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {


	public function index() {

		$userdata=array(
			array(
				'id'=>1,
				'user_name'=>'subaru',
				'title'=>'タイトル1',
				'content'=>'内容1',
				),
				array(
				'id'=>2,
				'user_name'=>'subaru',
				'title'=>'タイトル2',
				'content'=>'内容2',
				)

			);



		$this->set('topics',$topics);
		//表示されない「

	}

	public function detail() {

	}

	

	public function category_list()
	{
		$categories = $this->Category->getCategoryList();
		$this->set('categories',$categories);


	}

}


