<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Credit card</h3>
	</div>
	<div class="panel-body">
		<div>
		Name <input type="text" id="name" value="Poramate Homprakob"><br>
		Card Number<input type="text" id="number" value="1909253600008099"><br>
		EXP Date<input type="text" id="month" value="11">/<input type="text" id="year" value="15"><br>
		CVV<input type="password" id="cvv" value="199"><br>
		<input type="button" value="Confirm" id="button-confirm">
		<input type="button" value="Cancel">
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#button-confirm").click(function() {
		
		$.ajax({
			url: 'forjscallphp.php',
			type: "POST",
			data: {
				"confirm-payment" : "",
				"name" : $("#name").val(),
				"number" : $("#number").val(),
				"cvv" : $("#cvv").val(),
				"expMonth" : $("#month").val(),
				"expYear" : $("#year").val(),
				"customerid" : $.cookie("customerid"),
				"fee" : <?php echo $_POST["fee"]; ?>
			}
		}).done(function(response) {
		    alert(response);
		});
	});
</script>