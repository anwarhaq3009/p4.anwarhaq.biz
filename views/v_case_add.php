	    <link rel='stylesheet' id='admin-css'  href='admin.css' type='text/css' media='all' />
    <link rel='stylesheet' id='colors-fresh-css'  href='colors-fresh.css' type='text/css' media='all' />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
    $(function(){
        $( "#datepicker" ).datepicker();
        $("#icon").click(function() { 
            $("#datepicker").datepicker( "show" );
        })
    });
    </script>
	
	
<form method='POST' action='/case/case_add' >

	
	<fieldset>
	
					<legend>New Case</legend>
					<p>
					
	<?php
						echo '<select id="company_id" name="company_id"  for="dept"  class="options">';
						echo '<option value="">Select Company </option>';
						$result=mysql_query("SELECT distinct company.company_id, company.company_name FROM company, users where company.company_id = users.company_id");
						while ($row=mysql_fetch_assoc($result)) {
						$com = $row['company_id'];
						$com1 = $row['company_name'];
						echo "<option value='$com' >$com1</option>";
						}
	?>
	
			
<textarea  name="description" id="description" rows="10" cols="100" placeholder="Please enter brief description for case."></textarea>
						
	<?php
						echo '<select id="company_id" name="dept_id"  for="dept"  class="options">';
						echo '<option value="">Select Department </option>';
						$result=mysql_query("SELECT distinct dept.dept_id, dept.dept_name FROM dept, users where dept.company_id = users.company_id");
						while ($row=mysql_fetch_assoc($result)) {
						$dept = $row['dept_id'];
						$dept1 = $row['dept_name'];
						echo "<option value='$dept' >$dept1</option>";
						}
	?>

<BR>
			
	 <input type="text" id="datepicker" name='target_dt' size='9' value="" placeholder="Target Date"/>  
    <img src='../images/Calendar.gif' id='icon' height='25px' width='25px'/ >

	<BR>
		<br>
	
		<select id="priority" name="priority"  for="case"  class="options" >
		  <option value="None">None</option>
		  <option value="High">High</option>
		  <option value="Medium">Medium</option>
		  <option value="Low">Low</option>
		</select>

	Completed:
			<select id="completed" name="completed"  for="case"  class="options" >
		  <option value="N">No</option>
  <option value="Y">Yes</option>
</select>

<BR>
    <input type='submit' value='Save Case'>
				</fieldset>
</form> 
