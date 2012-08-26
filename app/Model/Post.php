<?php

class Post extends AppModel {
    public $belongsTo = array('User');
    public $hasAndBelongsToMany = array('Tag');

    public $hasMany = array('Answers'=>array('className'=>'Post', 'foreignKey'=>'parent_id', 'conditions'=>array('Answers.is_question'=>0)), 'Comment');
}

?>
