		
<form method='POST' action='/dept/dept_add' >

	
	<fieldset>
	
					<legend>New Department</legend>
					<p>
					
	<?php
						echo '<select id="company_id" name="company_id"  for="dept"  class="options">';
						echo '<option value="">Select Company </option>';
						$result=mysql_query("SELECT company_id, company_name FROM company");
						while ($row=mysql_fetch_assoc($result)) {
						$com = $row['company_id'];
						$com1 = $row['company_name'];
						echo "<option value='$com' >$com1</option>";
						}
	?>
						<input class="field" type="text" name="dept_id" id="dept" value="" size="23" placeholder="Enter company ID#" />	
						<input class="field" type="text" name="dept_name" id="dept" value="" size="23" placeholder="Enter Company Name" />
										

    <br><br>
    <input type='submit' value='Save Department'>
				</fieldset>
</form> 
