<?php

class QuestionsController extends AppController {
    public $uses = array('Post', 'Tag');

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('view');
    }

    public function index() {
        $questions = $this->Post->find('all', array('conditions'=>array('Post.is_question'=>true)));
        $tags = $this->Tag->find('all');

        $this->set('questions', $questions);
        $this->set('tags', $tags);
    }

    public function admin_index() {
    }
   
    public function ask() {
        if($this->request->is('post')) {
            $user = $this->Auth->user();

            $this->Post->create();
            $this->Post->set(array(
                'id'=>$this->Post->getInsertID(),
                'is_question'=>true,
                'title'=>$this->request->data['Question']['title'],
                'accepted_answer_id'=>NULL,
                'closed_date'=>NULL,
                'content'=>$this->request->data['Question']['content'],
                'user_id'=>$user['id'],
                'parent_id'=>NULL,
                'create_date'=>date('F j, Y, g:i a'),
                'edit_date'=>NULL
            ));
            $this->Post->save();
            $this->redirect(array('controller'=>'questions', 'action'=>'index'));
        }
    }

    public function view($id) {
        $question = $this->Post->find('first', array('conditions'=>array('Post.id'=>$id), 'recursive'=>2));

        $this->set('question', $question);
    }
}
?>
