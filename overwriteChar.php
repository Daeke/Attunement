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
		$sql = "UPDATE characters SET Role='".$_POST['characterRole']."',Progress='".$_POST['attunementProgress']."' WHERE Name='".$_POST['characterName']."'";
		if ($mysqli->query($sql) === false) {
			trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $mysqli->error, E_USER_ERROR);
			exit();
		}
		$mysqli->close();
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
						Character succesfully updated!
						</div>
					</div>
					<a href="index.php" class="btn btn-primary">Go back!</a>
				</div>
			</div>
		</div>
	</body>
</html>