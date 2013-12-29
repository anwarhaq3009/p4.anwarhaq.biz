<!DOCTYPE html>

<html>

<head>
  	<title>Case Management System</title>
	
		<?php if(isset($client_files_head)) echo $client_files_head; ?>

  	<meta name="description" content="Demo of a Sliding Login Panel using jQuery 1.3.2" />
  	<meta name="keywords" content="jquery, sliding, toggle, slideUp, slideDown, login, login form, register" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	

	<!-- stylesheets -->
  	<link rel="stylesheet" href="../css/panelstyle.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="../css/panelslide.css" type="text/css" media="screen" />
    <!-- jQuery - the core -->
	<script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="../js/slide.js" type="text/javascript"></script>
	
</head>

<body>

	<?php if($user): ?>	
	
	<?php
	$u="";
    $u=$user->first_name;
   ?>

   
			<?php if (strtolower($u) === 'administrator') { ?>
				<ul id="navi">
						<menu>
						<li> <a href='/comp/add'> Add Comapny </a></li> 
						<li> <a href='/dept/add'> Add Department </a></li>						
						<li> <a href='/case/add'> Add Case </a></li> 
						<li> <a href='/case/search'> Search Case </a></li>
						<li> <a href='/users/logout'> Logout </a></li>
						<li> <a href='/'> Home </a></li>
						</menu>
						<BR><BR><BR><BR><BR>
				</ul>
				
				
			<?php } elseif ($u != '' && strtolower($u) != 'administrator') { ?>
				<ul id="navi">
						<menu>
						<li> <a href='/case/add'> Add Case </a></li> 
						<li> <a href='/case/search'> Search Case </a></li>
						<li> <a href='/users/logout'> Logout </a></li>
						<li> <a href='/'> Home </a></li>
						</menu>
						<BR><BR><BR><BR><BR>
				</ul>
			<?php } ?>
	<?php else: ?>
	
	<!-- Panel -->
	<div id="toppanel">
		<div id="panel">
			<div class="content clearfix">
				<div class="left">
					<h1>Case Management System</h1>
				</div>
				<div class="left">
					<!-- Login Form -->
					<form class="clearfix" action="/users/p_login" method="post">
						<h1>Member Login</h1>
						<label class="grey" for="log">Email:</label>
						<input class="field" type="text" name="email" id="log" value="" size="23" />
						<label class="grey" for="pwd">Password:</label>
						<input class="field" type="password" name="password" id="pwd" size="23" />
						<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
						<div class="clear"></div>
						<input type="submit"  value="Login" class="bt_login" />
						<a class="lost-pwd" href="/users/forget">Lost your password?</a>
					</form>
				</div>
				<div class="left right">			
					<!-- Register Form -->
					<form action="/users/p_signup" method="post">
						<h1>Not a member yet? Sign Up!</h1>	
				
						<?php
						echo '<select id="company" name="company_id"  for="signup"  class="options">';
						echo '<option value="">Select Company </option>';
						$result=mysql_query("SELECT company_id, company_name FROM company");
						while ($row=mysql_fetch_assoc($result)) {
						$com = $row['company_id'];
						$com1 = $row['company_name'];
						echo "<option value='$com' >$com1</option>";
						}
						?>

						<input class="field" type="text" name="first_name" id="signup" value="" size="23" placeholder="Enter First Name" />	
						<input class="field" type="text" name="last_name" id="signup" value="" size="23" placeholder="Enter Last Name" />
						<input class="field" type="text" name="email" id="email" size="23" placeholder="Enter Email" />
						<input class="field" type="password" name="password" id="email" size="23" placeholder="Enter Password" />
						<?php
						echo '<select id="department" name="dept_id"  class="options">';
						echo '<option value="">Select Department </option>';
						$result1=mysql_query("SELECT dept_id, dept_name FROM dept");
						while ($row1=mysql_fetch_assoc($result1)) {
						$dp = $row1['dept_id'];
						$dp1 = $row1['dept_name'];
						echo "<option value='$dp' >$dp1</option>";
						}
						?>
						<label>Please enter your credentials and press Register.</label
						<BR>
						<input type="submit"  value="Register" class="bt_register" />
					</form>
				</div>
				
			</div>
	</div> <!-- /login -->	

		<!-- The tab on top -->	
		<div class="tab">
			<ul class="login">
				<li class="left">&nbsp;</li>
				<li>Hello Guest!</li>
				<li class="sep">|</li>
				<li id="toggle">
					<a id="open" class="open" href="#">Log In | Register</a>
					<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
				</li>
				<li class="right">&nbsp;</li>
			</ul> 
		</div> <!-- / top -->
		
	</div> <!--panel -->




		<div id="container">
			<div id="content" style="padding-top:100px;">
				<h1>Case Management System</h1>
				<h2>Enterprise level solution to manage company's issue trail.</h2>	
				<p>This is a basic application prototype to provide user frienfly support to create and maintain the issue logs for any business environment. </p>
				
				<p class="highlight">"<strong>Log In | Register</strong>" will be done on main page by sliding down the panel from top. This dynamic panel drop has been created by using jquery.</p>
					
				<p class="highlight">"<strong>Security</strong>" has been implemented in order to secure the data and case details. Only Administrator of the application can create all companies and their associated departments for which this application will maintain the cases.</p>
	
			</div><!-- / content -->		
		</div><!-- / container -->
		
	<?php endif; ?>
			
			
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
	

			
</body>
</html>
