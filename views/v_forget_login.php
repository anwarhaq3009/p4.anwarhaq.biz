

<h1>Reset Your Password</h1>
<p>Enter your email address below and your password will be reset.</p>

<form method='POST' action='/users/p_forget'>

	<fieldset>

		<p><b>Email Address:</b> 
		<input type="text" name="email" size="20? maxlength="40? value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></p>

	</fieldset>

	<div align="center"> <input type="submit" name="submit" value="Reset My Password" /></div>
	<input type="hidden" name="submitted" value="TRUE" />

</form>


