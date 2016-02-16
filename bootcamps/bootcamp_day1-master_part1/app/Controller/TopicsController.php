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
		
	}

	public function edit() {

	}

	public function delete() {

	}
}
