<?php
/*
PLugin Name: PluginDB
*/

session_start();

$dir = "exception";
$files = glob(dirname(__FILE__)."/".$dir."/*.php");

foreach ($files as $file) {
	include $file;
}

include "class/PluginDB.php";

function register_custom_menu_page() {
    add_menu_page('PluginDB', 'PluginDB', 'edit_posts', __FILE__, '_pluginDB_home', null, 6); 
    add_submenu_page(__FILE__, 'Ajouter', 'Ajouter', 'edit_posts', __FILE__.'/ajout', '_pluginDB_ajout'); 
    add_submenu_page(__FILE__, 'Catégorie / Type', 'Catégorie / Type', 'edit_posts', __FILE__.'/type', '_pluginDB_type'); 
}
add_action('admin_menu', 'register_custom_menu_page');

function _pluginDB_home(){
   include "views/home.php"; 
}

function _pluginDB_ajout(){
   include "views/ajout.php";
}

function _pluginDB_type(){
   include "views/type.php";
}