<h1>This is the questions/ view!</h1>
<?php echo $this->Html->link('Ask Question', array('controller'=>'questions', 'action'=>'ask'), array('class'=>'redbutton'));

foreach($questions as $question) {
    echo $this->element('question_summary', array('question'=>$question['Post'], 'user'=>$question['User'], 'tags'=>$question['Tag']));
    #echo '<div class="question-summary">';
    #echo '<div class="stats-container">';
    #echo $this->Html->div('statsarrow', '');

    #$stats = $this->Html->div('vote', '<span class="vote-count"><strong>0</strong></span><div class="votes">votes</div>');
    #$stats.= $this->Html->div('answer', '<span class="answer-count"><strong>0</strong></span><div class="answers">answers</div>');
    #echo $this->Html->div('stats', $stats);
    #echo $this->Html->div('views', '2 views');
    #echo '</div>';
    #echo '<div class="summary">';
    #echo $this->Html->tag('h3', $this->Html->link($question['Post']['title'], array('controller'=>'questions', 'action'=>'view', $question['Post']['id'])));
    #echo $this->Html->div('question', $question['Post']['content']);

    #echo $question['User']['nick'];
    #echo '</div>';

    #echo $this->Html->div('tags', 'These are the tags');

    #echo $this->element('user_details', array('user'=>$question['User']));

    #echo '</div>';
}

?>
