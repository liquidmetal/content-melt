<h1>Try and register the user</h1>
<?php
echo $this->Form->create("User");
echo $this->Form->input("email");
echo $this->Form->input("password");
echo $this->Form->input("password_confirmation", array('type'=>'password'));
echo $this->Form->input("nick");
echo $this->Form->end("Register");
?>
