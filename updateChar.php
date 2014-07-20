<html>
	<head>
	  <!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Bootstrap theme -->
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="theme.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
		<script src="http://malsup.github.com/jquery.form.js"></script> 
	</head>
	<body>
		<?php

		$mysqli= new mysqli('localhost',"ructgasa_attune",",R%!f96(*pHD","ructgasa_attunement");

		if($mysqli->connect_errno > 0) {
			echo "Failed to connect to MySQL: " . $mysqli->connect_error;
			exit();	
		}
		// Check if character already exists
		$sql = "SELECT Name FROM characters WHERE Name='".$_POST['characterName']."'";
		$result = $mysqli->query($sql) or trigger_error($mysqli->error." [$sql]");
		if ($result->num_rows > 0) {
			echo '<div class="container">
			<div class="jumbotron">
				<h1>Great Failure!</h1>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Character NOT UPDATED!</h3>
						</div>
						<div class="panel-body">
						Name already exists!<br/>
						Want to update existing record with this data?<br/>
						Name: '.$_POST['characterName'].'<br/>
						Role: '.$_POST['characterRole'].'<br/>
						Step: '.$_POST['attunementProgress'].'<br/>
						<form id="characterOverwrite" action="overwriteChar.php" method="post">
						<input type="hidden" name="characterName" value="'.$_POST['characterName'].'"/>
						<input type="hidden" name="characterRole" value="'.$_POST['characterRole'].'"/>
						<input type="hidden" name="attunementProgress" value="'.$_POST['attunementProgress'].'"/>
						<a href="index.php" class="btn btn-primary">No, go back!</a>
						<button form="characterOverwrite" type="submit" class="btn btn-danger" id="submit">Yes, overwrite it!</a>
						</form>
						</div>
					</div>
				</div>
			</div>';
			exit();
		}
		
		$sql = "INSERT INTO characters VALUES (null,'".$_POST['characterName']."','".$_POST['characterRole']."','".$_POST['attunementProgress']."')";
		if ($mysqli->query($sql) === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
		} else {
			$last_inserted_id = $mysqli->insert_id;
			$affected_rows = $mysqli->affected_rows;
		?>
		<div class="container">
			<div class="jumbotron">
				<h1>Great Success!</h1>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Character Updated!</h3>
						</div>
						<div class="panel-body">
						<?php
							echo "Name inserted: ".$_POST['characterName']."<br/>";
							echo "New Record ID: ".$last_inserted_id."<br/>";
							echo "Rows affected: ".$affected_rows."<br/>";
							}
							$mysqli->close();
						?>
						</div>
					</div>
					<a href="index.php" class="btn btn-primary">Go back!</a>
				</div>
			</div>
		</div>
	</body>
</html>