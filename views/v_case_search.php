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
	
	
<form method='POST' action='/case/casesearch' >

	
	<fieldset>
	
					<legend>New Case</legend>
					<p>
					
	<?php
						echo '<select id="company_id" name="company_id"  for="dept"  class="options">';
						echo '<option value="dept">Select Company </option>';
						$result=mysql_query("SELECT distinct company.company_id, company.company_name FROM company, users where company.company_id = users.company_id");
						while ($row=mysql_fetch_assoc($result)) {
						$com = $row['company_id'];
						$com1 = $row['company_name'];
						echo "<option value='$com' >$com1</option>";
						}
	?>
	
	<BR>
			
	 <input type="hidden" id="" name='case_id' size='9' value="" placeholder="Case ID"/>  

	<BR>				
	<?php
						echo '<select id="company_id" name="dept_id"  for="dept"  class="options">';
						echo '<option value="comp">Select Department </option>';
						$result=mysql_query("SELECT distinct dept.dept_id, dept.dept_name FROM dept, users where dept.company_id = users.company_id");
						while ($row=mysql_fetch_assoc($result)) {
						$dept = $row['dept_id'];
						$dept1 = $row['dept_name'];
						echo "<option value='$dept' >$dept1</option>";
						}
	?>


	 <input type="hidden" id="" name='case_id' size='9' value="" placeholder="Case ID"/>  



<BR>
<BR>
<BR>
    <input type='submit' value='Search Case'>
				</fieldset>
</form> 
