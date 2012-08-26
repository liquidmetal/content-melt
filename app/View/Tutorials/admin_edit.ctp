<h1>Edit Tutorial</h1>

<?php echo $this->Form->create("Tutorial", array('action'=>'edit'));
echo $this->Form->input("title");
echo $this->Tinymce->input("Tutorial.content", array('label'=>'Content'), array('language'=>'en', 'relative_urls'=>false, 'height'=>360));
echo $this->Form->input('date');
echo $this->Form->input('category', array('type'=>'select', 'options'=>$categories));
echo $this->Form->input("is_featured");
echo $this->Form->input("is_new");
echo $this->Form->input("title_pic");
echo $this->Form->end("Update tutorial"); ?>
