<?php
echo $this->Html->image('http://www.gravatar.com/avatar/' . md5(strtolower($user['User']['email'])).'&s=120');
echo $user['User']['nick']; ?>
