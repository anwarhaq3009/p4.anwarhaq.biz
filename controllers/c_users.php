<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
	
	#Set up the view
	$this->template->content = View::instance('v_users_signup');
	
	#Render the view
	echo $this->template;
	
    }

	
	public function p_signup() {
	
	$_POST['created'] = Time::now();
	$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
	
	
	DB::instance(DB_NAME)->insert_row('users',$_POST);
	#Send them to login page
	Router::redirect('/users/login');
	
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
		echo " You are logged in!! ";
	}
	#Fail
	else {
	
		echo "login failed";
	}
	}
	
	
	
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
			die('Members Only. <a href="/users/login">Login </a>');
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
