<html>
<head>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
	<script src="js/jquery.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/bootstrap-dropdown.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
</head>

<style>
body {
	background-color: rgba(2, 2, 0, 0.5);
}
*{
	font-family: Lato;
}
</style>

<body>

    <!-- static for each page -->
			<nav class="navbar navbar-inverse" role="navigation">
			  	<div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="?page=index">Ku Realtionship</a>
				 	</div>
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      				<ul class="nav navbar-nav">
					        <?php if (isset($_GET['page']) && $_GET['page'] == "shopping") echo "<li class=\"active\">"; else echo "<li>"; ?><a href="?page=shopping">Shopping</a></li>
					        <?php if (isset($_GET['page']) && $_GET['page'] == "inventory") echo "<li class=\"active\">"; else echo "<li>"; ?><a href="?page=inventory">Inventory</a></li>
					        <?php if (isset($_GET['page']) && $_GET['page'] == "member") echo "<li class=\"active\">"; else echo "<li>"; ?><a href="?page=member">Member</a></li>
					    </div>
				</div>
			</nav>
			<div align = "center">
			 <img src="image/logo.png" alt="Ku Relationship" style="width:304px;height:228px">
    		</div>

	<!-- for content -->
	<div class="container">
	<?php
	
		if (isset($_GET['page']))
		include_once $_GET['page'] .".php";
		
		require_once('inc/ProductDao.php');
		echo "fuck";
		print_r( ProductDescription::GetProductDescription( 1 ) );
	?>
		
		
	</div>

</body>


</html>




