
<html>
<head>
</head>

<style>
body {
	background-image: url(http://i.imgur.com/KjfSAxM.png)
}
.tftextinput{
	margin: 0;
	padding: 5px 15px;
	font-family: Arial, Helvetica, sans-serif;
	font-size:17px;
	border:1px solid #0076a3; border-right:1px solid #0076a3;
	border-top-left-radius: 5px 5px;
	border-bottom-left-radius: 5px 5px;
	border-top-right-radius: 5px 5px;
	border-bottom-right-radius: 5px 5px;
}

</style>

<body>

    <!-- static for each page -->
    <div style="background-color: pink; margin: 10px; padding : 5px;  border: 1px solid black;">
        <Center><font size = "25">KU-RELATIONSHIP</font></Center><br>
		<div align="right" >
			<a href="?page=shopping"><img src="http://i.imgur.com/KePc1Ps.png"/></a>
			<a href="?page=inventory"><img src="http://i.imgur.com/FRzI8aj.png"/></a>
			<a href="?page=login"><img src="http://i.imgur.com/ivQ59CY.png"/></a>
			<a href="?page=signup"><img src="http://i.imgur.com/c9GPkX7.png"/></a>
		</div>
    </div>
    
	<div style="margin: 10px; padding : 5px">
	
		<div align="center">
			
			<form name="input" action="search" method="get" >
			 <select class = "tftextinput">
				<option value="volvo">Shirt</option>
				<option value="saab">Equipment</option>
				<option value="mercedes">Balls</option>
				<option value="audi">Forbidden stuffs</option>
			</select> 
			<input type="text" class = "tftextinput" name="user" size = "40" placeholder="Search for an item">
				<input type="image" src="http://i.imgur.com/YQMZRzI.png" alt="Submit Form" >
			</form> 
		</div>

	</div>
    
	<!-- for content -->
	<div id="content" style="background-color: gray; margin: 10px">
	<?php
	
		if (isset($_GET['page']))
		include_once $_GET['page'] .".php";
		
	
		
	?>
		
		
	</div>

</body>
</head>