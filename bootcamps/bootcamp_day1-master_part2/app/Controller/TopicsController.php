<?php
App::uses('AppController', 'Controller');

class TopicsController extends AppController {

    public function index(){
    	$user = $this->Auth->user();
		$topics = $this->Topic->find('all', array(
			'conditions' => array('Topic.user_id' => $user['id'])));
		$this->set('topics', $topics);

	}

	public function add() {
		if($this->request->is('post')){
			$this->request->data['Topic']['category_id'] =1;
			$this->request->data['Topic']['user_id'] =1;

			$this->Topic->create();
			$this->Topic->save($this->request->data);
		}
		$categories = $this->Category->find('list');
		$this->set('categories',$categories)
		
	}

	public function edit() {

	}

	public function delete() {

	}
}
