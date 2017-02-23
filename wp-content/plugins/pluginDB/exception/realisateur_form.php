<?php

function exceptionForRealisateur(){
	var_dump($_POST);
	echo "realisateur exception";
	die();
}

add_action("pbd_before_checking_add_form","exceptionForRealisateur");

