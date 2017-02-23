<div class="realisateur elements-part">

	<div class="row">
		<div class="col s4">
				<label for=""> Déja acteur ?</label>
			  <div class="switch">
			    <label>
			      Non
			      <input type="checkbox" name="realisateur_is_acteur" class="realisateur_is_acteur">
			      <span class="lever"></span>
			      Oui
			    </label>
			  </div>
		</div>
		<div class="col s8">
			<div class="switch_on" style="display:none">
				 <div class="row">
				    <div class="col s12">
				      <div class="row">
				        <div class="input-field col s12">
				          <i class="material-icons prefix">textsms</i>
				          <input type="text" id="autocomplete-input" class="autocomplete">
				          <label for="autocomplete-input">Autocomplete</label>
				        </div>
				      </div>
				    </div>
				  </div>
			</div>
		</div>
	</div>
	<div class="switch_off" >
		<div class="row">
			<div class="input-field col s4">
				<input type="text" name="realisateur_lastname">
				<label>Nom</label>
			</div>
			<div class="input-field col s4">
				<input type="text" name="realisateur_firstname">
				<label>Prénom</label>
			</div>
			<div class="input-field col s4">
				<input type="date" name="realisateur_birthday" class="birthday">
				<label>Date d'anniversaire</label>
			</div>
			<div class="row">
			    <div class="file-field input-field col s12">
			      <div class="btn">
			        <span>Photo de profil</span>
			        <input type="file" name="realisateur_file">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
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
    jQuery(".realisateur_is_acteur").change(function(){
    	
    	if(jQuery(this)[0].checked){
    		jQuery(".switch_on")[0].style.display = "";
    		jQuery(".switch_off")[0].style.display = "none";
    	}else{
    		jQuery(".switch_off")[0].style.display = "";
    		jQuery(".switch_on")[0].style.display = "none";
    	}
    });

    jQuery("#autocomplete-input").focus(function(){
    	jQuery(document).ready(function($) {

		var data = {
			'action': 'get_element_by_type',
			'type': 'acteur'
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			var parsedResponse = JSON.parse(response);
			console.log(parsedResponse);
			var transition = [];
			var final = new Array();
			parsedResponse.forEach(function (elem){
				if(elem.meta_id != null && elem.meta_key != null && elem.meta_value !== null){
					if( typeof(transition[elem.elem_id]) == "undefined"){
						transition[elem.elem_id] = {};
						transition[elem.elem_id].id = elem.elem_id;
					}

					if( typeof(transition[elem.elem_id]["meta_id"]) == "undefined"){
						transition[elem.elem_id]["meta_id"] = elem.meta_id;
					}

					transition[elem.elem_id][elem.meta_key] = elem.meta_value;
					final = transition.filter(function(elem){ return elem != undefined}).join();
				}
			});
			var position = document.querySelector("#autocomplete-input").getBoundingClientRect();
			var domElem = document.createElement("ul");
			domElem.classList.add("custom_dropdown");
			domElem.style.position ="absolute";
			domElem.style.top = (position.top + position.height) +"px";
			domElem.style.left = (position.left) +"px";
			domElem.style.width = (position.width) +"px";
			domElem.style.minHeight = (position.width) +"px";
			domElem.style.background="#fff";
			console.log(transition);
			transition.forEach(function(elem){
				var li = document.createElement('li');
				var p = document.createElement('p');
				p.innerHTML = elem.acteur_firstname +" "+elem.acteur_lastname;

				li.appendChild(p);
				domElem.appendChild(li);
			});
			document.body.appendChild(domElem);
		});
	});
    });
</script>

<?php 
	$elem = array(
			"firstname" => "%s",
			"lastname" => "%s",
			"birthday" => "%b",
			"file" => "%f"
		);
	$slug = "realisateur";
	$pluginDB->setAddFormVerification($slug,$elem);
?>

