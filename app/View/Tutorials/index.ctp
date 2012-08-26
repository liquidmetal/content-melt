<h1>Browse by title</h1>
<ul class='category-list'>
<?php
foreach($categories as $cat) {
    echo "<li>".$this->Html->link($cat['Category']['name'], array('controller'=>'categories', 'action'=>'view', $cat['Category']['id']))."</li>";
}
?>
</ul>

<?php

$odd=true;
echo '<div id="tutorial-list">';
foreach($tutorials as $tut) {
    echo '<div class="tut-listing">';
    echo $this->Html->image('/img/timthumb.php?w=200&h=100&src='.urlencode($tut['Tutorial']['title_pic']), array('class'=>'list-thumb'));
    echo '<div class="cat-icon"><a href="#">'.$this->Html->image('/img/timthumb.php?w=24&h=24&src='.$tut['Category']['icon'], array('width'=>24, 'height'=>24)).'</a></div>';
    echo '<h2>'.$this->Text->truncate($tut['Tutorial']['title'], 100).'</h2>';
    echo '<p class="tut-desc">A few lines about the tutorial goes over here. I will just write one line over here.'.$tut['Tutorial']['oneline'].'</p>';
    echo '<div class="links">';
    echo $this->Html->link('Questions', array('controller'=>'questions', 'action'=>'index'), array('class'=>'redbutton'));
    echo $this->Html->link('Tutorial', array('controller'=>'tutorials', 'action'=>'view', $tut['Tutorial']['id']), array('class'=>'redbutton'));
    echo '</div>';
    echo '</div>';

    $odd = !$odd;
}
echo '</div>';

?>
