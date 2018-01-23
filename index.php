<?php

require_once 'db.php';

$con = new pdo_db("students");

$q = $con->getData("show tables");

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Models for <?php echo $con->db_name; ?></title>
	<style style="text/css">
	
		body {
		  padding-top: 6rem;
		  padding-bottom: 3rem;
		  color: #5a5a5a;
		}
		
	</style>
  </head>
  <body ng-app="app" ng-controller="appCtrl">

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="javascript:;">[<?php echo $con->db_name; ?>] models</a>
      </nav>
    </header>

    <main role="main">
	
	  <div class="container">
		
		<div class="row">
			<div class="col-3">
				<form name="formHolder.model" novalidate autocomplete=false>
				  <div class="form-group">
					<label>Tables</label>
					<select name="table" ng-class="{'form-control': true, 'is-invalid': formHolder.model.table.$invalid && formHolder.model.table.$touched}" ng-model="views.table" ng-change="models.table(this)" required>
						<?php foreach ($q as $i => $_q) { ?>
						<option value="<?=$q[$i]['Tables_in_'.$con->db_name]?>"><?=$q[$i]['Tables_in_'.$con->db_name]?></option>
						<?php } ?>
					</select>
					<div class="invalid-feedback" ng-show="formHolder.model.table.$invalid && formHolder.model.table.$touched">Please select table.</div>
				  </div>
				  <div class="form-group">
					<label>Object Name</label>
					<input type="text" name="prefix" ng-class="{'form-control': true, 'is-invalid': formHolder.model.prefix.$invalid && formHolder.model.prefix.$touched}" ng-model="views.prefix" required>
					<div class="invalid-feedback" ng-show="formHolder.model.prefix.$invalid && formHolder.model.prefix.$touched">Please enter Object Name.</div>					
				  </div>
				  <div class="form-group">
					<label>CRUD Handler(s) Directory</label>
					<input type="text" class="form-control" ng-model="views.handler">
				  </div>
				  <div class="form-group">
					<label>[in] variable</label>
					<input type="text" class="form-control" ng-model="views.in_variable">
				  </div>
				  <div class="form-group">
					<label>[in] ID</label>
					<select class="form-control" ng-model="views.in_id" ng-options="i.text for i in iterates track by i.id"></select>					
				  </div>
				  <div class="form-group">
					<label>[in] Text</label>
					<select class="form-control" ng-model="views.in_text" ng-options="i.text for i in iterates track by i.id"></select>
				  </div>				  
				<button type="button" class="btn btn-default" ng-click="models.load(this)">Go!</button>				  
				</form>			
			</div>			
			<div class="col" id="structures">
				
			</div>
		</div>
		
        <hr class="featurette-divider">

      </div>


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 sly@limited</p>
      </footer>
    </main>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="angular/angular.min.js"></script>
    <script src="angular/ui-bootstrap-tpls-2.5.0.min.js"></script>
	<script type="text/javascript" src="modules/models.js"></script>
	<script type="text/javascript" src="controllers/models.js"></script>
  </body>
</html>