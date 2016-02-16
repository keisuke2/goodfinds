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
				'created'=>'2015'
				),
				array(
				'id'=>2,
				'user_name'=>'subaru',
				'title'=>'タイトル2',
				'content'=>'内容2',
				'created'=>'2016'

				)

			);



		$this->set('userdata',$userdata);
		//表示されない「

	}

	public function detail() {

	}

}


