<?php
include "head.php";
?>
<div class="container">

	<div class="row">
		<div class="col s7">
			<div class="row">
				<div class="col s12">
					<div class="card blue">

					    <div class="card-tabs">
					      <ul class="tabs tabs-fixed-width tabs-transparent">
					        <li class="tab"><a href="#category">Category</a></li>
					        <li class="tab"><a class="active" href="#type">Type</a></li>
					      </ul>
					    </div>
					    <div class="card-content grey lighten-4">
					      <div class="row" id="category">
						      	<div class="col s12">
							      	<ul class="collection ">
							      	<?php
							      		$categories = $pluginDB->getAllCategoryName();
							      		
							      		foreach ($categories as $category) {
							      	?>

								        <li class="collection-item"><div><?php echo $category->category_name?><a href="#!" class="secondary-content"><i class="material-icons">edit</i></a></div></li>
							      	<?php
							      		}
							      	?>
								    </ul>
							    </div>
					      </div>
					      <div class="row" id="type">
						      	<div class="col s12">
							      	<ul class="collection ">
							      	<?php
							      		$types = $pluginDB->getAllTypeName();
							      		
							      		foreach ($types as $type) {
							      	?>

								        <li class="collection-item"><div><?php echo $type->type_name?><a href="#!" class="secondary-content"><i class="material-icons">edit</i></a></div></li>
							      	<?php
							      		}
							      	?>
								    </ul>
							    </div>
					      </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col s5">
			<div class="row">

				<div class="card blue">
					<div class="card-content white-text">
						<p>Ajouter un type</p>
					</div>
					<div class="card-content grey lighten-4">
						<div class="row">
							<form method="post" action="" class="col s12">
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name = "type_name" id="type_name" >
										<label for="type_name">Type Name</label>
									</div>
									<div class="input-field col s12">
										<input type="text" name = "type_slug" id="type_slug" >
										<label for="type_slug">Type Slug</label>
									</div>
									<input type="hidden" name="type_form" value="type_form">
								</div>

								<div class="row">
									<div class="input-field col s12">
										<button class="btn waves-effect waves-light" type="submit" name="action">Envoyer
										    <i class="material-icons right">edit</i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>


			<div class="row">
			
				<div class="card blue">
					<div class="card-content white-text">
						<p>Ajouter une catégorie</p>
					</div>
					<div class="card-content grey lighten-4">
						<div class="row">
							<form action="" method="post" class="col s12">
								<div class="row">
									<div class="input-field col s12">
										<input type="text" name = "category_name" id="category_name" >
										<label for="category_name"> Category Name</label>
									</div>
									<div class="input-field col s12">
										<input type="text" name = "category_slug" id="category_slug" >
										<label for="category_slug"> Category Slug</label>
									</div>

									<input type="hidden" name="category_form" value="category_form">
								</div>

								<div class="row">
									<div class="input-field col s12">
										<button class="btn waves-effect waves-light" type="submit" name="action">Envoyer
										    <i class="material-icons right">edit</i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<?php
include "foot.php";
?>