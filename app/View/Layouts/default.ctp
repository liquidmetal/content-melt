<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Blah CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset();
		echo $this->Html->meta('icon');

        echo $this->Html->css('baseline.compress');
        echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="branding">
                <div id="logo"></div>
                <div id="topnav">
                    <ul>
                    <li><?php echo $this->Html->link("Home", '/', ($this->name=="Pages" && $this->getVar("page")=="home")?array('class'=>'current'):array()); ?></li>
                    <li><?php echo $this->Html->link('Tutorials', '/tutorials/', $this->name=="Tutorials"?array('class'=>'current'):array()); ?></li>
                    <li><?php echo $this->Html->link('Questions', '/questions/', $this->name=="Questions"?array('class'=>'current'):array()); ?></li>
                    <li><?php echo $this->Html->link('Blog', '/blog/', $this->name=="Blog"?array("class"=>'current'):array()); ?></li>
                    <li><?php echo $this->Html->link('About', '/pages/about/', ($this->name=="Pages" && $this->getVar("page")=="about")?array("class"=>"current"):array()); ?></li>
                    <li><form id="searchform" method="get" action="/"><div><input id="s" name="s" type="text" value="Type and hit enter to search" onfocus="if (this.value=='Type and hit enter to search') {this.value = ''; }" onblur="if (this.value=='') {this.value='Type and hit enter to search';}" size="32" tabindex="1" /><input id="searchsubmit" name="searchsubmit" type="submit" value="Search" tabindex="2" /></div></form></li>
                    </ul>
                </div>
            </div>
            <div id="secondary">
                <div id="crumbs"><?php // TODO Generate bread crumb navigation ?></div>
                <div id="user">
                    <?php
                        if($logged_in) { ?>
                            <strong><?php echo $this->Html->link($current_user['nick'], array('controller'=>'users', 'action'=>'view', $current_user['id'])); ?></strong>&nbsp;|&nbsp;<?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); ?>
                         <?php } else {
                            echo $this->Html->link("Login", array('controller'=>'users', 'action'=>'login'));
                        } ?>
                    
                </div>
            </div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash();
                  echo $this->Session->flash('auth'); ?>
            <div id="main">
                <div id="container">
    			<?php echo $this->fetch('content'); ?>
                </div>
            </div>
            <div id="sidebar">
                <?php 
                    echo "Display the standard sidebar here";

                    if(isset($current_user) && $current_user['role']==1)
                    {
                        switch($this->name) {
                            case 'Tutorials':
                            case 'Categories':
                                echo "<div id='admin-tut'>";
                                echo "<div class='title'>Tutorial Admin</div>";
                                echo "<ul>";
                                echo '<li>'.$this->Html->link('New Tutorial', array('controller'=>'tutorials', 'action'=>'add', 'admin'=>true)).'</li>';
                                echo '<li>'.$this->Html->link('List tutorials', array('controller'=>'tutorials', 'action'=>'index', 'admin'=>true)).'</li>';
                                echo '<li>'.$this->Html->link('Manage categories', array('controller'=>'categories', 'action'=>'index', 'admin'=>true)).'</li>';
                                echo "</ul>";
                                echo "</div>";
                                break;
                        }
                    }
                ?>
            </div>
            <div id="clearer"></div>
		</div>
		<div id="footer">
            <div id="subsidiary">
                <div id="first">
                    <h3>Recent questions</h3>
                </div>
                <div id="second">
                    <h3>More on AI Shack</h3>
                </div>
                <div id="third"><h3>About me</h3><img src="/img/me.jpg"><p>My name is Utkarsh Sinha, and I'm an undergraduate student, pursuing B.E. Computer Science + M.Sc. Mathematics.
Here, I help you understand ideas in Artificial Intelligence, using a not so techy and mathematical language. And in the process, learn more about Artificial Intelligence myself.</p>
<p><a href="/about">Read more at the about page</a></p></div>
            </div>
            <div id="siteinfo">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?></div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
