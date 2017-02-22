<div class="acteur elements-part">
	
	<div class="row">
		<div class="input-field col s4">
			<input type="text" name="acteur_lastname">
			<label>Nom</label>
		</div>
		<div class="input-field col s4">
			<input type="text" name="acteur_firstname">
			<label>Prénom</label>
		</div>
		<div class="input-field col s4">
			<input type="date" name="acteur_birthday" class="birthday">
			<label>Date d'anniversaire</label>
		</div>
		<div class="row">
		    <div class="file-field input-field col s12">
		      <div class="btn">
		        <span>Photo de profil</span>
		        <input type="file" name="acteur_file">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" type="text">
		      </div>
		    </div> 
		</div>
	</div>

	


</div>

<script>
	jQuery('.birthday').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100, // Creates a dropdown of 15 years to control year
    format: 'dd-mm-yyyy'
  });
        
</script>

<?php 
	$elem = array(
			"firstname" => "%s",
			"lastname" => "%s",
			"birthday" => "%b",
			"file" => "%f"
		);
	$slug = "acteur";
	$pluginDB->setAddFormVerification($slug,$elem);
?>

