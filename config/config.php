<?php

error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);

$dbservertype='mysql';

$servername='localhost';

$dbusername='anwarhaq_p4';
$dbpassword='p4casems';

$dbname='anwarhaq_p4_anwarhaq_biz';

connecttodb($servername,$dbname,$dbusername,$dbpassword);
function connecttodb($servername,$dbname,$dbuser,$dbpassword)
{
global $link;
$link=mysql_connect ("$servername","$dbuser","$dbpassword");
if(!$link){die("Could not connect to MySQL");}
mysql_select_db("$dbname",$link) or die ("could not open db".mysql_error());
}

/* 
When setting configurations, remember that any app is also impacted by the configurations found in /core/config/config.php;
Most of the core configs can be overwritten here on the app level.

For example there's a constant in core config set for TIME_FORMAT

	if(!defined('TIME_FORMAT')) define('TIME_FORMAT', 'F j, Y g:ia'); 

If you want a different default time format for this app, set it below

	define('TIME_FORMAT', 'M j Y'); 

*/

# What is the name of this app?
#define('APP_NAME', 'Talk-Blog');  
	define('APP_NAME', 'Case Management System');  

# When email is sent out from the server, where should it come from?
# Ideally, this should match the domain name
	define('APP_EMAIL', 'anwarhaq.uss@anwarhaq.biz'); 

/* 
A email designated to receive messages from the server. Examples:
 	* When there's a MySQL error on the live server it will send it to this email
 	* If you're BCCing yourself on outgoing emails you may want them to go there
 	* Logs, cron results, errors, etc.
 	
 	Some might want this to be the same as the APP_EMAIL, others might want to create a designated gmail address for it
*/ 	
	define('SYSTEM_EMAIL', 'anwarhaq.us@gmail.com'); 

# Default DB name for this app
	define('DB_NAME', 'anwarhaq_p4_anwarhaq_biz'); 
	#define('DB_NAME', 'p4.anwarhaq.biz'); 

# Timezone
	define('TIMEZONE', 'America/New_York');
	define('TIME_FORMAT', 'F j, Y g:ia');

# If your app is going to have outgoing emails, you should fill in your SMTP settings
# For this you could use gmail SMTP or something like http://sendgrid.com/
	#define('SMTP_HOST', 'www.gmail.com');
	#define('SMTP_USERNAME', 'anwarhaq.us');
	#define('SMTP_PASSWORD', '');

# For extra security, you might want to set different salts than what the core uses
	define('PASSWORD_SALT', 'abcdefghijklmnopqrstuvwxyz');
	define('TOKEN_SALT', '123456789abcabcabc');