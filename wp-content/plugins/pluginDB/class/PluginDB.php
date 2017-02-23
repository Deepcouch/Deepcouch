<?php
global $wpdb;

class PluginDB {
	private $wpdb;
	private $checker;
	private $toInsert;
	private $uploadURI;
	private $uploadURL;
	private $uploadFolderName;

	public function __construct(){
		global $wpdb;
		$upload_dir = wp_upload_dir();
		$this->uploadURI = wp_upload_dir()["basedir"];
		$this->uploadURL = wp_upload_dir()["baseurl"];
		$this->uploadFolderName = "elements";
		$this->wpdb = $wpdb;
		$this->toInsert = array();
		$this->checkTypeForm();
		$this->checkCategoryForm();
		$this->checkAddForm();
	}


	public function getAllType(){
		$results = $this->wpdb->get_results("SELECT * FROM elements_type");
		return $results;
	}

	public function getAllCategory(){
		$results = $this->wpdb->get_results("SELECT * FROM elements_category");
		return $results;
	}

	public function getAllTypeName(){
		$results = $this->wpdb->get_results("SELECT type_name FROM elements_type");
		return $results;
	}

	public function getAllCategoryName(){
		$results = $this->wpdb->get_results("SELECT category_name FROM elements_category");
		return $results;
	}

	public function getElementsByType($slug){
		
		$slugInfo = $this->slugChecker($slug)[0];

		$elements = $this->wpdb->get_results("SELECT 
elements.id AS elem_id,
elements_meta.id AS meta_id,
elements.type AS elem_type_id,
elements_meta.meta_key AS meta_key,
elements_meta.meta_value AS meta_value
FROM elements LEFT JOIN elements_meta ON elements.id = elements_meta.element_id WHERE type = ".$slugInfo->id);
		return $elements;
	}

	private function checkTypeForm(){
		if(is_admin()){
			if(isset($_POST['type_form'])){
				$this->wpdb->insert(
					"elements_type",
					array(
						"type_name" => trim($_POST["type_name"]),
						"type_slug" => trim($_POST["type_slug"])
						),
					array(
						"%s",
						"%s"
						)
					);
			}	
		}
	}

	private function checkCategoryForm(){
		if(is_admin()){
			if(isset($_POST['category_form'])){
				$this->wpdb->insert(
					"elements_category",
					array(
						"category_name" => trim($_POST["category_name"]),
						"category_slug" => trim($_POST["category_slug"])
						),
					array(
						"%s",
						"%s"
						)
					);
			}	
		}
	}

	private function checkAddForm(){
		if(is_admin()){
			//var_dump($_POST);
			// var_dump($_FILES);

			do_action("pdb_before_checking_add_form");

			if(isset($_POST["add_type_slug"]) && $_POST["add_type_slug"] !== ""){
				if(!empty($this->slugChecker($_POST["add_type_slug"]))){
					$slugInfo = $this->slugChecker($_POST["add_type_slug"])[0];
					$toChecks = $this->getAddFormVerification($slugInfo->type_slug);
					
					$this->toInsert["type_id"] = $slugInfo->id;
					$this->initializeElement();
					foreach($toChecks as $key => $format){
						switch($format){
							case "%f":
								$url = $this->uploadFile($slugInfo->type_slug."_".$key);
								$this->toInsert[$slugInfo->type_slug."_".$key] =$url;
								break;
							case "%b":
								$date = $this->convertToTimestamp($_POST[$slugInfo->type_slug."_".$key]);
								$this->toInsert[$slugInfo->type_slug."_".$key] = $date;
								break;
							case "%s":
								$elem = trim(strtolower($_POST[$slugInfo->type_slug."_".$key]));
								$this->toInsert[$slugInfo->type_slug."_".$key] = $elem;
								break;
							case "%a"
								foreach ($_POST[$slugInfo->type_slug."_".$key] as $clef => $valeur) {
									$this->toInsert[$slugInfo->type_slug."_".str_replace("[]", "", $key)];
								}
						}
					}

					// var_dump($this->toInsert);
					$element_id = $this->toInsert["element_id"];
					unset($this->toInsert["type_id"]);
					unset($this->toInsert["element_id"]);
					foreach ($this->toInsert as $key => $value) {
						$query = "INSERT INTO elements_meta (element_id,meta_key,meta_value) VALUES ('"
						.$element_id."','"
						.$key."','"
						.$value."')";

						$this->wpdb->query($query);
					}
				}
			}
		}
	}


	public function initializeElement(){
		$query = "INSERT INTO elements (type) VALUES (".$this->toInsert["type_id"].")";
		$this->wpdb->query($query);
		$lastIdQuery = "SELECT LAST_INSERT_ID()";
		$results = $this->wpdb->get_results($lastIdQuery);
		$this->toInsert["element_id"] = $results[0]->{"LAST_INSERT_ID()"};

	}

	public function convertToTimestamp($date){
		$dTime = DateTime::createFromFormat("d-m-Y", $date);
		if($dTime != false){	
			return $dTime->getTimestamp();
		}
	}

	public function uploadFile($keyName){
		$file = $_FILES[$keyName];
		//var_dump($this->uploadURI);
		if(!is_dir($this->uploadURI)){
			mkdir($this->uploadURI);
		}

		if(!is_dir($this->uploadURI.DIRECTORY_SEPARATOR.$this->uploadFolderName)){
			mkdir($this->uploadURI.DIRECTORY_SEPARATOR.$this->uploadFolderName);
		}

		if(!is_dir($this->uploadURI.DIRECTORY_SEPARATOR.$this->uploadFolderName.DIRECTORY_SEPARATOR.$this->toInsert["element_id"])){
			mkdir($this->uploadURI.DIRECTORY_SEPARATOR.$this->uploadFolderName.DIRECTORY_SEPARATOR.$this->toInsert["element_id"]);
		}

		move_uploaded_file($file["tmp_name"], $this->uploadURI.DIRECTORY_SEPARATOR.$this->uploadFolderName.DIRECTORY_SEPARATOR.$this->toInsert["element_id"].DIRECTORY_SEPARATOR.$file["name"]);

		return $this->uploadURL.DIRECTORY_SEPARATOR.$this->uploadFolderName.DIRECTORY_SEPARATOR.$this->toInsert["element_id"].DIRECTORY_SEPARATOR.$file["name"];

	}

	public function slugChecker($slug){
		$slugChecker = $this->wpdb->get_results("SELECT * FROM elements_type WHERE type_slug ='".$slug."'");
		return $slugChecker;
	}

	public function setAddFormVerification($slug, $elem){
		if(is_admin()){
			if(!isset($_SESSION["elements_checker"])){
				$_SESSION["elements_checker"] = array();
			}
			if(!empty($this->slugChecker($slug))){
				$_SESSION["elements_checker"][$slug] = $elem;
			}

		}
	}

	public function getAddFormVerification($slug){
		return $_SESSION["elements_checker"][$slug];
	}

	public function getAllByType($slug){

		if(!empty($this->slugChecker($slug))){
			$slugInfo = $this->slugChecker($slug);
			$slugInfo = $slugInfo[0];

			$result = $this->wpdb->get_results("SELECT * FROM elements WHERE type =".$slugInfo->id);
			//var_dump($result);
		}
	}
}