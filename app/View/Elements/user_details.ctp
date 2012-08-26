<?php

$gravatar=$this->Html->div('gravatar', $this->Html->image('http://www.gravatar.com/avatar/'.md5    (strtolower($user['email'])).'?s=32&d=identicon', array('url'=>array('controller'=>'users', 'action'=>'view', $user['id']))));
$info=$this->Html->div('user', $this->Html->link($user['nick'], array('controller'=>'users', 'action'=>'view', $user['id'])));
$stats=$this->Html->div('stats', '<strong>'.$user['score'].'</strong>');
echo $this->Html->div('user-details', $gravatar.$info.$stats);

?>
