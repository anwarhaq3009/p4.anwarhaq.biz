

<?php if($user): ?>
	<h1 align = "center">Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>
	<p align = "center"> Please choose your option for required task. </p>
<?php else: ?>
	<h1 align = "center"> </h1>
<?php endif; ?>


