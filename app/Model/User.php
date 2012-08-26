<?php

class User extends AppModel {
    public $name = "User";
    public $displayField = "nick";

/*    public $validate = array(
        'email' => array(
            'valid email' => array(
                'rule'=>array('email'),
                'message'=>'Please enter a valid email address.',
                'required'=>'true'),
            'uniqueness' => array(
                'rule'=>array('isUnique'),
                'message'=>'The email is already registered. Forgot password?',
                'required'=>'true')
            ),
        'nick' => array(
            'nonempty' => array(
               'rule'=>array('notEmpty'),
                'message'=>'You need to specify a nick',
                'required'=>'true'),
            'uniqueness'=>array(
                'rule'=>array('isUnique'),
                'message'=>'The nick is already taken',
                'required'=>'true')
            ),
        'password' => array(
            'nonempty' => array(
                'rule'=>array('notEmpty'),
                'message'=>'You need to specify a password',
                'required'=>'true'),
            'length' => array(
                'rule'=>array('minLength', 8),
                'message'=>'The password needs to be at least 8 characters'),
            'match passwords' => array(
                'rule'=>array('matchPasswords'),
                'message'=>'Your passwords do not match')
            ),
        'password_confirmation' => array(
            'nonempty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please confirm your password',
                'required'=>'true')
            )
    );*/

    // This hashes the password before writing it to the database
    public function beforeSave() {
        if(isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }

    // A custom rule
    public function matchPasswords($data) {
        if ($data['password'] == $this->data['User']['password_confirmation'])
            return true;

        $this->invalidate('password_confirmation', 'Your passwords do not match');
        return false;
    }
}
?>
