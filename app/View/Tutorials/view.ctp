
<?php

echo $this->Html->image($current_tutorial['Tutorial']['title_pic'], array('class'=>'post-image'));

echo '<div class="post">';

echo '<h1>'.$current_tutorial['Tutorial']['title'].'</h1>';
echo $this->Html->div('tutorial-meta', 'By: '.$this->Html->link($author['User']['nick'], array('controller'=>'users', 'action'=>'view',$author['User']['id'])).' | Published: '.$current_tutorial['Tutorial']['date']);
?>
<iframe src="http://www.facebook.com/plugins/like.php?app_id=120556718029035&amp;href=http%3A%2F%2Ffacebook.com%2Faishack&amp;send=false&amp;layout=standard&amp;width=600&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=verdana&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:600px; height:80px;" allowTransparency="true"></iframe>
<div class='post-divider'></div>
<?php
echo $this->Markdown->parse($current_tutorial['Tutorial']['content']);?>
<div class='post-divider'><span class="uplink">Back to top</span></div>
<iframe src="http://www.facebook.com/plugins/like.php?app_id=120556718029035&amp;href=http%3A%2F%2Ffacebook.com%2Faishack&amp;send=false&amp;layout=standard&amp;width=600&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=verdana&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:600px; height:80px;" allowtransparency="true"></iframe>
<?php
echo '</div>';
?>
