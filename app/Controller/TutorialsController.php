<?php

class TutorialsController extends AppController {
    public $uses = array('Category', 'Tutorial', 'User');
    public $helpers = array('Markdown');

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow(array('view'));
    }

    public function isAuthorized($user) {
        if(isset($this->request->params['admin'])) {
            return (bool)($user['role']==1);
        }
        else        
            return true;
    }

    public function index() {
        $categories = $this->Category->find('all');
        $tutorials = $this->Tutorial->find('all', array('fields'=>array('Tutorial.id', 'Tutorial.title', 'Tutorial.title_pic', 'Tutorial.is_featured', 'Tutorial.is_new', 'Tutorial.status', 'Tutorial.oneline', 'Category.name', 'Category.icon'), 'order'=>'Tutorial.date DESC'));

        $this->set('categories', $categories);
        $this->set('tutorials', $tutorials);
    }

    public function admin_index() {
        $tutorials = $this->Tutorial->find('all',
                        array('fields'=>array('Tutorial.id', 'Tutorial.title', 'Tutorial.is_featured', 'Tutorial.is_new', 'Category.name', 'Tutorial.date'), 'order'=>'Tutorial.date DESC'));

        $this->set('tutorials', $tutorials);
    }

    public function admin_add() {
        if($this->request->is('post')) {
            // Try saving it
            $user = $this->Auth->user();

            $this->Tutorial->set('user_id', $user['id']);
            if($this->Tutorial->save($this->request->data)) {
                $this->Session->setFlash('The tutorial was saved');
                $this->redirect(array('action' => 'index', 'admin'=>true));
            } else {
                $this->Session->setFlash('Unable to save the tutorial.');
            }
        }
        else
        {
            // We're just getting started with adding data
            $this->set('categories', $this->Category->find('list'));
        }
    }

    public function view($id) {
        $tut = $this->Tutorial->find('first', array('conditions'=>array('Tutorial.id' => $id)));
        $author = $this->User->find('first', array('conditions'=>array('User.id' => $tut['Tutorial']['user_id'])));
        #$author = $tut['User']['id'];

        $this->set('current_tutorial', $tut);
        $this->set('author', $author);
    }

    public function admin_edit($id) {
        $this->Tutorial->id = $id;
        if($this->request->is('get')) {
            $this->request->data = $this->Tutorial->read();
            $this->set('categories', $this->Category->find('list'));
        } else {
            if($this->Tutorial->save($this->request->data)) {
                $this->Session->setFlash('Tutorial updated');
                $this->redirect(array('action'=>'index', 'admin'=>true));
            } else {
                $this->Session->setFlash('Unable to update tutorial');
            }
        }
    }
}
?>
