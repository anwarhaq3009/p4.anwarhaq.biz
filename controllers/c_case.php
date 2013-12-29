<?php
class case_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Please login as an Administrator.");
        }
    }

    public function add() {

        # Setup view
        $this->template->content = View::instance("v_case_add");
        $this->template->title   = "New Case";

        # Render template
        echo $this->template;

    }

    public function case_add() {

        # Associate this post with this user
        $_POST['cr_by']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  		= Time::now();
        $_POST['modified'] 		= Time::now();
		$_POST['dept_id'] 		= $_POST['dept_id'];
		$_POST['company_id']	= $_POST['company_id'];
		$_POST['priority'] 		= $_POST['priority'];
		$_POST['description'] 	= $_POST['description'];
		$_POST['target_dt'] 	= $_POST['target_dt'];
		$_POST['completed'] 	= $_POST['completed'];
		
        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('cases', $_POST);
        
        # Quick and dirty feedback
        echo "Case has been added. <a href='/case/add'>Add another</a><BR>";
		echo "<a href='/'>Go Home</a>";

    }
	
	    public function search() {

        # Setup view
        $this->template->content = View::instance("v_case_search");
        $this->template->title   = "Search Case";

        # Render template
        echo $this->template;

    }
	
	  public function casesearch() {
    # Set up the View
		$this->template->content = View::instance('v_case_index');
		$this->template->title   = "Searched Cases";


	# Associate this post with this user
 
		$_POST['dept_id'] 		= $_POST['dept_id'];
		$_POST['company_id']	= $_POST['company_id'];
		$_POST['case_id'] 		= $_POST['case_id'];



		
		
		    # Query
    $ssql = 'SELECT
            company.company_name,
            dept.dept_name,
            cases.case_id ,
            cases.description,
            cases.target_dt,
            cases.priority,
			cases.created,
			users.first_Name,
			users.last_Name,
			users.email
        FROM cases, dept, company, users
        WHERE cases.company_id = users.company_id
        AND cases.dept_id = dept.dept_id
		AND dept.company_id = company.company_id
        AND cases.company_id = company.company_id
		AND  CASE "'.$_POST['company_id'].'"
         WHEN "'.$_POST['company_id'].'" = "comp"
         THEN "A"="A"
         ELSE (cases.company_id = "'.$_POST['company_id'].'") 
		END	  
		AND  CASE "'.$_POST['dept_id'].'"
         WHEN "'.$_POST['dept_id'].'" = "dept"
         THEN "B"="B"
         ELSE (cases.dept_id = "'.$_POST['dept_id'].'") 
		END	 
		
		Order By cases.case_id

		';


    # Run the query, store the results in the variable $posts
    $posts = DB::instance(DB_NAME)->select_rows($ssql);

	    # Pass data to the View
    $this->template->content->posts = $posts;

    # Render the View
   echo $this->template;
    }
	
	


	
	public function users() {

    # Set up the View
    $this->template->content = View::instance("v_posts_users");
    $this->template->title   = "Users";

    # Build the query to get all the users
    $ssql = "SELECT *
        FROM users";

    # Execute the query to get all the users. 
    # Store the result array in the variable $users
    $users = DB::instance(DB_NAME)->select_rows($ssql);

    # Build the query to figure out what connections does this user already have? 
    # I.e. who are they following
    $ssql = "SELECT * 
        FROM users_users
        WHERE user_id = ".$this->user->user_id;

    # Execute this query with the select_array method
    # select_array will return our results in an array and use the "users_id_followed" field as the index.
    # This will come in handy when we get to the view
    # Store our results (an array) in the variable $connections
    $connections = DB::instance(DB_NAME)->select_array($ssql, 'user_id_followed');

    # Pass data (users and connections) to the view
    $this->template->content->users       = $users;
    $this->template->content->connections = $connections;

    # Render the view
    echo $this->template;
	}
	
	

	
}