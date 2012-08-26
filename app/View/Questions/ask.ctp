<?php

echo $this->Form->create("Question");
echo $this->Form->input("title");
echo $this->Tinymce->input("Question.content", array('label'=>'Content'), array('language'=>'en', 'height'=>360, 'relative_urls'=>false));
echo $this->Form->end("Ask");

?>
