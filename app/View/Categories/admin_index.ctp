<h1>Used to list all categories</h1>

<table class="catlist">
<tr>
<th>Number</th><th>Name</th><th class="summary">Summary</th><th>Actions</th>
</tr>
<?php
    $count = 1;
    foreach($categories as $cat) {
        echo '<tr class="'.($count%2==0?'even':'odd').'">';
        echo '<td>'.$count.'</td>';
        echo '<td>';
        if($cat['Category']['icon']) {
            echo $this->Html->image($cat['Category']['icon'], array('alt' => $cat['Category']['name'], 'url'=>array('controller'=>'categories', 'action'=>'edit', 'admin'=>true, $cat['Category']['id'])));
        }
        echo $this->Html->link($cat['Category']['name'], array('controller'=>'categories', 'action'=>'edit', 'admin'=>true, $cat['Category']['id'])).'</td>';
        echo '<td>'.$this->Text->truncate($cat['Category']['description'], 100).'</td>';
        echo '<td>';
        echo $this->Html->link('Edit', array('controller'=>'categories', 'action'=>'edit', 'admin'=>true, $cat['Category']['id']));
        echo ' ';
        echo $this->Form->postlink('Delete', array('action'=>'delete', 'admin'=>true,  $cat['Category']['id']), array('confirm'=>'Are you sure you want to delete '.$cat['Category']['name'].'?'));
        echo '</td>';
        echo '</tr>';
        $count += 1;
    }
?>
</table>

<strong>Controls:</strong>
<?php 
    echo $this->Html->link('New Category', array('controller'=>'categories', 'action'=>'add', 'admin'=>true));
?>
