<!DOCTYPE html>
<html>
<head>
	<title>Talk-Blog</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
	<style>
	li
	{
	display:inline;
	}
	</style>
   <link rel="stylesheet" href="../css/menu.css" type="text/css">

   
</head>

<body>	
<ul id="nav">
	<nav>
		<menu>
		<?php if($user): ?>
		<li> <a href='/posts/add'> Add Post </a></li>
		<li> <a href='/posts/'> View Post </a></li>
		<li> <a href='/posts/users'> Follow Users </a></li>
		<li> <a href='/users/logout'> Logout </a></li>
		<?php else: ?>
		<li> <a href='/users/signup'> Sign Up </a></li>
		<li> <a href='/users/login'> Log in </a></li>
		<?php endif; ?>
		<BR>
<BR>
<BR><BR>
<BR>
		</menu>

</ul>


	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>