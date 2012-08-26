<?php

class UsersController extends AppController {
    var $name = "Users";

    public $components = array('Openid');

    function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->fields = array('username'=>'email', 'password'=>'password');
        $this->Auth->allow('register', 'auth');
    }

    public function index() {
        //$this->set('posts', $this->Post->find('all'));
    }

    public function view($userid) {
        $this->set('user', $this->User->find('first', array('conditions'=>array('User.id'=>$userid))));
    }

    public function register() {
        if($this->request->is('post')) {
            if($this->User->save($this->request->data)) {
                $this->Session->setFlash('You have been registered!');
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash('Unable to register. Please try later.');
            }
        }
    }

    public function login() {
        header('X-XRDS-Location: http://' . $_SERVER['SERVER_NAME'] . $this->webroot . 'users/xrds');

        $realm = 'http://'.$_SERVER['HTTP_HOST'];
        $returnTo = $realm.'/users/login';
        if($this->Openid->isOpenIDResponse()) {
            // Get an appropriate user based on the OpenID response
            $user = $this->handleOpenIDResponse($returnTo);
            if($this->Auth->login($user)) {
                $this->redirect($this->Auth->redirect());
            }
            else {
                $this->Session->setFlash("Your username/password combination was incorrect");
            }
        }
    }

    public function xrds() {
        $this->layout = 'xml/default';
        $this->response->header('Content-type: application/xrds+xml');
        $this->set('returnTo', Router::url($this->webroot, true));
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function auth() {
        if($this->request->is('get')) {
            $realm = 'http://'.$_SERVER['HTTP_HOST'];
            $returnTo = $realm . '/users/login';

            $this->makeOpenIDRequest($this->request['url']['openid_identifier'], $returnTo, $realm);
        }
    }

    private function makeOpenIDRequest($openid, $returnTo, $realm) {
        $axSchema = 'axschema.org';
        $attributes[] = Auth_OpenID_AX_AttrInfo::make('http://'.$axSchema.'/contact/email', 1, true, 'ax_email');

        $openidSchema = 'schema.openid.net';
        $attributes[] = Auth_OpenID_AX_AttrInfo::make('http://'.$openidSchema.'/contact/email', 1, true, 'email');

        $required = array('email');
        $optional = array('nickname');

        $this->Openid->authenticate($openid, $returnTo, $realm, array('sreg_required'=>$required, 'sreg_optional'=> $optional, 'ax'=>$attributes));
    }

    private function handleOpenIDResponse($returnTo) {
        $response = $this->Openid->getResponse($returnTo);

        if ($response->status == Auth_OpenID_SUCCESS) {
            $sregResponse = Auth_OpenID_SRegResponse::fromSuccessResponse($response);
            $axResponse = Auth_OpenID_AX_FetchResponse::fromSuccessResponse($response);
            $sregContents = $sregResponse->contents();
            if ($axResponse) {
                $email = $axResponse->get('http://axschema.org/contact/email');
                $email = $email[0];
                if(!$email) {
                    $email = $axResponse->get('http://schema.openid.org/contact/email');
                    $email = $email[0];
                }


                $user = $this->User->find('first', array('conditions'=>array('User.email'=>$email)));
                if(!$user) {
                    $this->User->create();
                    $user = array(
                        'email'=>$email,
                        'nick'=>'bleh',
                        'role'=>0,
                        'password'=>'123456789',
                        'about'=>NULL,
                        'id'=>$this->User->getInsertID()
                    );
                    $this->User->id = $this->User->getInsertID();
                    $this->User->save($user);
                    return $user;
                } else {
                    return $user['User'];
                }
            }
        } else if($response->status==Auth_OpenID_FAILURE)  {
            $this->Session->setFlash('The OpenID authentication failed.');
            return null;
        } else if($response->status==Auth_OpenID_CANCEL) {
            $this->Session->setFlash('The OpenID authentication was cancelled');
            return null;
        }
    }
}

?>
