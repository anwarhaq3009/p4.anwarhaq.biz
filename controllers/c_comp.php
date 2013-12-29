<?php
class comp_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Please login as an Administrator.");
        }
    }

    public function add() {

        # Setup view
        $this->template->content = View::instance("v_comp_add");
        $this->template->title   = "New Company";

        # Render template
        echo $this->template;

    }

    public function comp_add() {

        # Associate this post with this user
        $_POST['cr_by']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();
		$_POST['company_id'] = $_POST['company_id'];
		$_POST['company_name'] = $_POST['company_name'];
		
		
        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('company', $_POST);
        
        # Quick and dirty feedback
        echo "Company has been added. <a href='/comp/add'>Add another</a><BR>";
		echo "<a href='/'>Go Home</a>";
    }
	

	
}