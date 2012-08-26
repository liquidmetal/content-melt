<?php 
    
    echo "<div class='question'>";
    echo $this->Html->div('vote', 'Vote here');
    
    $q = $this->Html->tag('h1', $question['Post']['title']);
    $q.= $this->Html->div('content', $question['Post']['content']);

    $t = '';
    foreach($question['Tag'] as $tag) {
       $t.= $this->Html->link($tag['name'], array('controller'=>'questions', 'action'=>'tag', $tag['id']), array('class'=>'tag'));
    }
    $q.= $this->Html->div('post-tags', $t);
    $q.= $this->Html->div('controls', 'link | edit');
    $q.= $this->element('user_details', array('user'=>$question['User']));

    echo $this->Html->div('question-content', $q);
   
    $c = '';
    foreach($question['Comment'] as $comment) {
        $c.= $this->Html->div('comment', $comment['content'].' - '.$this->Html->link($comment['User']['nick'], array('controller'=>'users', 'action'=>'view', $comment['User']['id'])));
        
    }

    echo $this->Html->div('comments', $c);
    echo "</div>";
    
?>
