<div class="episode elements-part">

	<div class="row">
		<div class="input-field col s4">
			<input type="text" name="episode_title">
			<label>Nom de la série</label>
		</div>
		<div class="input-field col s4">
			<input type="text" name="episode_name">
			<label>Nom de l'épisode</label>
		</div>
		<div class="input-field col s4">
			<input type="number" name="episode_duree">
			<label>Durée de l'épisode ( en minutes )</label>
		</div>
	</div>
	</div>
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
			"name" => "%s",
			"duree" => "%b"
		);
	$slug = "episode";
	$pluginDB->setAddFormVerification($slug,$elem);
?>