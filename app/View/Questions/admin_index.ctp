<h1>This is the questions/ view!</h1>

<ul>
<?php foreach($posts as $post) { ?>

<li><?php echo $post['Post']['title']; ?></li>

<?php } ?>
</ul>
