<?php

class Category extends AppModel {
    public $name = "Category";
    public $displayField = "name";

    public $validate = array(
        'name' => array(
            'nonempty' => array(
                'rule'=>array('notEmpty'),
                'message'=>'Please enter a name for the category',
                'required'=>'true'),
            'uniqueness' => array(
                'rule'=>array('isUnique'),
                'message'=>'This category already exists.',
                'required'=>'true')
            )
    );
}

?>
