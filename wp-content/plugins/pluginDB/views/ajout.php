<?php
	include "head.php";
?>

<div class="container">
	
	<div class="row">
		<form action="" method ="post" class="col s12" enctype="multipart/form-data">
			<div class="row">
				<div class="input-field col s12">
					<select class="type_selector">
				      <option value="" disabled selected>Choose your option</option>
				      <?php
				      	foreach( $pluginDB->getAllType() as $type){
				      ?>
				     	<option value="<?php echo $type->type_slug; ?>"> <?php echo ucfirst($type->type_name) ?> </option>
				      <?php
				      	}
				      ?>

				    </select>
					<label>Choix du type</label>
				</div>
			</div>
			
<?php
	$dir = "form_template";
	$files = glob(dirname(__FILE__)."//..//".$dir."/*.php");
	foreach ($files as $file) {
		include $file;
	}
?>	
			<input type="hidden" name="add_type_slug" value="" id="add_type_slug">
			<div class="row">
				<div class="input-field col s12">
					<button class="btn waves-effect waves-light" type="submit" name="action">Envoyer
					    <i class="material-icons right">send</i>
					</button>
				</div>
			</div>

		</form>
	</div>
</div>

<script>
	var data = {

	}
	var response = function (response){
		console.log(response);
	}
	var url = "https://jsonplaceholder.typicode.com/users";
	jQuery.get(url,data).done(response);

	jQuery(document).ready(function() {
    jQuery('select').material_select();

    jQuery("div.select-wrapper.type_selector ul li").click(function(){

    	 var toSearch = jQuery("div.select-wrapper.type_selector ul li.active.selected span").html();
    	 var option = jQuery('div.select-wrapper.type_selector select option:contains("'+toSearch+'")');
    	 option = option[0].value;
    	 var activeElement = jQuery(".elements-part.active");
    	 activeElement.removeClass("active");
    	 activeElement.addClass("hidden");
    	 jQuery("."+option).removeClass("hidden");
    	 jQuery("."+option).addClass("active");
    	 jQuery("#add_type_slug")[0].value = option;
    });
});
</script>

<script>
	jQuery('.elements-part').each(function(){
		jQuery(this).addClass("hidden");
	})
</script>

<?php
include "foot.php";
?>
