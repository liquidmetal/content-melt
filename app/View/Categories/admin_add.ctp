<h1>Admin page for creating a new tutorial</h1>

<?php echo $this->Form->create("Category", array('action'=>'add'));
echo $this->Form->input("name");
echo $this->Tinymce->input("Category.description", array('label'=>'description'), array('language'=>'en'));
echo $this->Form->end("New Category"); ?>
