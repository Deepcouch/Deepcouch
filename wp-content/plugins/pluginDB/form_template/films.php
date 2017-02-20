<div class="films elements-part">

	<div class="row">
		<div class="input-field col s4">
			<input type="text" name="films_title">
			<label>Titre du film</label>
		</div>
		<div class="input-field col s4">
			<input type="text" name="films_realisateur">
			<label>Nom du réalisateur</label>
		</div>
		<div class="input-field col s4">
			<input type="number" name="films_duree">
			<label>Durée du film ( en minutes )</label>
		</div>
	</div>

	<div class="row">
		<div class="input-field col s12">
			<input type="text" name="acteur" class="acteur">
			<label>Acteur</label>
		</div>
	</div>

<?php 
$all = $pluginDB->getAllByType("acteur");
?>
</div>
<script>
	 //  jQuery('input.acteur').autocomplete({
  //   data: 
  //   {

  //   },
  //   limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
  // });
</script>
<?php 
	$elem = array(
			"title" => "%s",
			"realisateur" => "%d",
			"duree" => "%d",
			"acteur" => "%a"
		);
	$slug = "films";
	$pluginDB->setAddFormVerification($slug,$elem);
?>