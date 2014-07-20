<?php
//define('IN_PHPBB', true);
//$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './phpbb/';
//$phpEx = substr(strrchr(__FILE__, '.'), 1);
//include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
//$user->session_begin();
//$auth->acl($user->data);
//$user->setup();

$mysqli= new mysqli('localhost',"ructgasa_attune",",R%!f96(*pHD","ructgasa_attunement");

if($mysqli->connect_errno > 0) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();	
}
//echo "DEBUG: <p> Connection Successful!</p>";
?>
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
	<script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="/js/jquery.searchable.js"></script>
	<script>
		$(document).ready(function(){
		$(function(){
		$("#attuneTable").tablesorter();
		});
		});
	</script>
	<script type="text/javascript">
		$(function () {
			$( '#attuneTable' ).searchable({
				striped: true,
				oddRow: { 'background-color': '#f5f5f5' },
				evenRow: { 'background-color': '#fff' },
				searchType: 'fuzzy'
			});
			
			$( '#searchable-container' ).searchable({
				searchField: '#container-search',
				selector: '.row',
				childSelector: '.col-xs-4',
				show: function( elem ) {
					elem.slideDown(100);
				},
				hide: function( elem ) {
					elem.slideUp( 100 );
				}
			})
		});
</script>
</head>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<input type="search" id="search" value="" class="form-control" placeholder="Searching for something?">
			<div class="modal fade" role="dialog" tabindex="-1" id="formSubmit" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
							<h4 class="modal-title" id="myModalLabel">
								Submit Character Update
							</h4>
						</div>
						<div class="modal-body"></div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> <button type="submit" form="characterUpdate" class="btn btn-primary" id="submit">Save changes</button>
						</div>
						
					</div>
				</div>
			</div>
			<table class="table table-hover table-striped tablesorter" id="attuneTable">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Character Name
						</th>
						<th>
							Role
						</th>
						<th>
							Current Step
						</th>
					</tr>
				</thead>
				<tbody>
				
<?php
	$sql = "Select * from characters";

    $result = $mysqli->query($sql);

    if ($result === FALSE) die ("Could not execute statement: ".$sql."<br />");

    while ($row = mysqli_fetch_array($result)) // while there are rows
    {
       echo "<tr>\n";
       echo "  <td>" . $row['ID']."</td>\n";
       echo "  <td>" . $row['Name']."</td>\n";
	   echo "  <td>" . $row['Role']."</td>\n";
	   $result2 = $mysqli->query("SELECT Step FROM progresslist WHERE ID=".$row['Progress']);
	   $row2 = mysqli_fetch_array($result2);
	   echo "  <td>" . $row2['Step']."</td>\n";
       echo "</tr>\n";
    }
	$mysqli->close();
?>
				</tbody>
			</table>
			<div class="col-lg-4 col-lg-offset-4">
				<a data-target="#formSubmit" href="updater.html" class="btn btn-primary btn-lg" data-toggle="modal">Submit Character Update</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>