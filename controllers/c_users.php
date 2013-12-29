<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        echo "This is the index page";
    }
/*
    public function signup() {
	
	#Set up the view
	$this->template->content = View::instance('v_users_signup');
	
	#Render the view
	echo $this->template;
	
    }
*/
	
	public function p_signup() {
	
	$_POST['created'] = Time::now();
	$_POST['orig_pwd'] = $_POST['password'];
	$_POST['company_id'] = $_POST['company_id'];
	$_POST['dept_id'] = $_POST['dept_id'];
	$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
	
	
	DB::instance(DB_NAME)->insert_row('users',$_POST);
	#Send them to login page
	Router::redirect('/');
	}
	
	
    public function login() {
		
		$this->template->content = View::instance('v_users_login');
		echo $this->template;
    }

	public function p_login() {

	$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	
	
	$ssql = 'SELECT token FROM users 
	         WHERE email = "'.$_POST['email'].'"
			 and password = "'.$_POST['password'].'"';
			
	
	$token = DB::instance(DB_NAME)->select_field($ssql);
	#Success
	if($token) {
	
		setcookie('token',$token,strtotime('+1 year'),'/');
		Router::redirect('/');
		echo " You are logged in!! <a href='/'>Go Home</a>";
		
		
	}
	#Fail
	else {
	
		echo "login failed";
	}
	}
	
	    public function forget() {
		
		$this->template->content = View::instance('v_forget_login');
		echo $this->template;
	
    }	
		
		
	public function p_forget() {
	
	$email=$_POST['email'];
	$email=mysql_real_escape_string($email);

	$status = "OK";
	$msg="";
			//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
			// You can supress the error message by un commenting the above line
			if (!stristr($email,"@") OR !stristr($email,".")) {
				$msg="Your email address is not correct<BR>"; 
				$status= "NOTOK";
				}

			echo "<br><br>";

			if($status=="OK"){  // validation passed now we will check the tables

			$query="SELECT email,user_id,orig_pwd FROM users WHERE email = '$email'";

			$st=mysql_query($query);
			 $recs=mysql_num_rows($st);
			$row=mysql_fetch_object($st);
			$em=$row->email;// email is stored to a variable
			 if ($recs == 0) { // No records returned, so no email address in our table
			// let us show the error message
			 echo "<center><font face='Verdana' size='2' color=red><b>No Password</b><br>
			 Sorry Your address is not there in our database . You can signup and login to use our site. 
			<BR><BR><a href='signup.php'> Sign UP </a> </center>"; 
			exit;}

			// formating the mail posting
			// headers here 
					$headers4 ="admin@anwarhaq.biz";  // Change this address within quotes to your address
			$headers="Reply-to: $email\n";
			$headers.= "From: $headers4\n"; 
			$headers.= "Errors-to: $headers4\n"; 
			$headers.= "Content-Type: text/html; charset=iso-8859-1\n".$headers;// for html mail 


			// mail funciton will return true if it is successful
			 if (1==1)
			 //if(mail("$em","Your Request for login details", "This is in response to your request for login detailst at site_name \n \n Login ID: $row->user_id \n 
			//Password: $row->orig_pwd \n\n Thank You \n \n siteadmin","$headers"))

			{echo "<center><b>THANK YOU</b> <br>Your password is posted to your emil address . 
				   Please check your mail after some time. <a href='/users/login'> Go Home. </a> </center>";
				   
			}

			else{// there is a system problem in sending mail
			 echo " <center>There is some system problem in sending login details to your address. 
			Please contact site-admin. <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center>";}
				} 

				else {// Validation failed so show the error message
			echo "<center>$msg 
			<br><br><input type='button' value='Retry' onClick='history.go(-1)'></center>";}

			} // End of the main Submit conditional.

	
    public function logout() {

	#generating new token for security so that a hacker cannot copy the existing token.
	
	$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
	
	$data = Array('token' => $new_token);
	
	DB::instance(DB_NAME)->update('users',$data,'WHERE user_id='.$this->user->user_id);
	
	setcookie('token', '',strtotime('-1 year'), '/');
	
	Router::redirect('/');
    }

    public function profile($user_name = NULL) {
		
		
		
		if (!$this->user) {
			//Router::redirect('/');
			die('Members Only. <a href="/">Login </a>');
		}
		
		#Set up the view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title = "Profile";

		#array for head
		$client_files_head = Array(
		'/css/profile.css'
		);
		
		$this->template->client_files_head =  Utils::load_client_files($client_files_head);
		
		#array for body
		$client_files_body = Array(
		'/js/profile.js'
		);
		
		$this->template->client_files_body =  Utils::load_client_files($client_files_body);
		

		#Pass the data to the view	
		$this->template->content -> user_name = $user_name;

		
		#Display the view
		echo $this->template;
}

} # end of the class
