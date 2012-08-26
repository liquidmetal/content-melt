<h1>Admin page for creating a new tutorial</h1>

<?php echo $this->Form->create("Tutorial");
echo $this->Form->input("title");
echo $this->Tinymce->input("Tutorial.content", array('label'=>'Content'), array('language'=>'en', 'height'=>360, 'relative_urls'=>false));
echo $this->Form->input('date');
echo $this->Form->input('category', array('type'=>'select', 'options'=>$categories));
echo $this->Form->input("is_featured");
echo $this->Form->input("is_new");
echo $this->Form->input("title_pic");
echo $this->Form->end("Save Tutorial"); ?>
