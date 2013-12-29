
	<style>
		.field_set_outer { border:1px solid black }
		.field_set_inner { border:1px solid red }
		legend {
		  padding: 0.2em 0.5em;
		  border:1px solid green;
		  color:green;
		  font-size:90%;
		  text-align:right;
		  }
	  </style>
  

<?php foreach($posts as $post): ?>


		<fieldset class="field_set_outer">
	
					<legend> Case :<?=$post['case_id']?></legend>
					<p>
				<article>

					<p> Case ID:<?=$post['case_id']?> </p> 	<p> Priority:<?=$post['priority']?> </p>  <p> Target Date:<?=$post['target_dt']?> </p> 	<p> Created On:<?=$post['created']?> </p> 
					<p> Company Name: <?=$post['company_name']?> </p><p> Department Name:<?=$post['dept_name']?> </p>
					<fieldset class="field_set_inner">
					
									<legend> Description </legend>
									<p>
					<p> <?=$post['description']?></p>
				</fieldset>


				</article>

		</fieldset>
<?php endforeach; ?>

