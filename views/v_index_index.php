

<?php if($user): ?>
	<h1>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>
<?php else: ?>
	Welcome to Talk Blog. Please sign up or log in.
<?php endif; ?>


