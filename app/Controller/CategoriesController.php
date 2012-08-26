<?php

class CategoriesController extends AppController {

    public function isAuthorized($user) {
        return (bool)($user['role']==1);
    }

    public function admin_index() {
        $this->set('categories', $this->Category->find('all'));
    }

    public function admin_add() {
        if($this->request->is('post')) {
            if($this->Category->save($this->request->data)) {
                $this->Session->setFlash('Created the new category.');
                $this->redirect(array('action' => 'index', 'admin'=>true));
            } else {
                $this->Session->setFlash('Unable to create a new category');
            }
        }
    }

    public function admin_edit($id) {
        $this->Category->id = $id;
        if($this->request->is('get')) {
            $this->request->data = $this->Category->read();
        } else {
            if($this->Category->save($this->request->data)) {
                $this->Session->setFlash('Category updated');
                $this->redirect(array('action'=>'index', 'admin'=>true));
            } else {
                $this->Session->setFlash('Unable to update category');
            }
        }
    }

    public function admin_delete($id) {
        if($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if($this->Category->delete($id)) {
            $this->Session->setFlash('The category was deleted');
            $this->redirect(array('action'=>'index', 'admin'=>true));
        }
    }

    public function admin_view() {
    }
}
?>
