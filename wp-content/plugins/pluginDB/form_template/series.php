<div class="series elements-part">

	<div class="row">
		<div class="input-field col s4">
			<input type="text" name="series_title">
			<label>Titre de la série</label>
		</div>
		<div class="input-field col s4">
			<input type="text" name="series_realisateur">
			<label>Nom du réalisateur</label>
		</div>
		<div class="input-field col s4">
			<input type="number" name="series_duree">
			<label>Durée d'épisode ( en minutes )</label>
		</div>
	</div>

	<div class="row">
		<div class="input-field input col s12">
			<input type="text" name="series_acteur[]" class="acteur">
			<label>Noms des acteurs</label>
            <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
		</div>
	</div>

<?php 
$all = $pluginDB->getAllByType("acteur");
?>
</div>
<script>

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input"); //Fields wrapper
    var add_button      = $(".btn-floating"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<input class="input" type="text" name="acteur[]" class="acteur">'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
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
			"realisateur" => "%s",
			"duree" => "%b",
			"acteur" => "%a"
		);
	$slug = "series";
	$pluginDB->setAddFormVerification($slug,$elem);
?>