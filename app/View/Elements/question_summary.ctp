<?php

echo '<div class="question-summary">';
    echo '<div class="stats-container">';
    echo $this->Html->div('statsarrow', '');

    $stats = $this->Html->div('vote', '<span class="vote-count"><strong>0</strong></span><div class="votes">votes</div>');
    $stats.= $this->Html->div('answer', '<span class="answer-count"><strong>0</strong></span><div class="answers">answers</div>');
    echo $this->Html->div('stats', $stats);
    echo $this->Html->div('views', $question['views'].' views');
    echo '</div>';
    echo '<div class="summary">';
    echo $this->Html->tag('h3', $this->Html->link($question['title'], array('controller'=>'questions', 'action'=>'view', $question['id'])));
    echo $this->Html->div('question', $question['content']);
    echo '</div>';

    echo '<div class="tags">';
    foreach($tags as $tag) {
        echo $this->Html->link($tag['name'], array('controller'=>'questions', 'action'=>'tags', $tag['id']), array('class'=>'tag'));
    }
    echo '</div>';

    echo $this->element('user_details', array('user'=>$user));

    echo '</div>';

?>
