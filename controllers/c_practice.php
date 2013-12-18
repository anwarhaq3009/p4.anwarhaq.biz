<?php

class practice_controller extends base_controller {



	public function test_db(){
	
	
	/* INSERT Practice
	$ssql = 'INSERT INTO users SET first_name = "Albert", last_name = "Einstin"';
	
	echo $ssql;
	*/
	/*UPDATE practice
	$ssql = 'UPDATE users SET email = "albert.einstin@gmail.com" WHERE first_name = "Albert" and  last_name = "Einstin"';
	
	echo $ssql;
	
	DB::instance(DB_NAME)->query($ssql);
	*/

/*
	$new_user = Array(
	'first_name' => 'Peter',
	'last_name' => 'Vargas',
	'email' => 'peter.vargas@xyz.com'
	);
	
	DB::instance(DB_NAME)->insert('users',$new_user);
	
	*/
	
	$_POST['first_name'] = 'Albert' ;
	
	$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	
	$ssql = 'SELECT email FROM users WHERE first_name = "'.$_POST['first_name'].'" ';
	
	echo DB::instance(DB_NAME)-> select_field($ssql);
	
	
	}
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function test1() {
						
		require(APP_PATH.'/libraries/image.php');
		
		/*
		Instantiate an Image object using the "new" keyword
		Whatever params we use when instantiating are passed to __construct 
		*/
		$imageObj = new Image('http://placekitten.com/500/500');

		/*
		Call the resize method on this object using the object operator (single arrow ->) 
		which is used to access methods and properties of an object
		*/
		$imageObj->resize(200,200);

		# Display the resized image
		$imageObj->display();

			
	}
	
		public function test2() {
		
		echo Time::now();
		
		}
} # eoc
