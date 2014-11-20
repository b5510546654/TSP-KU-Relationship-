<?php
	if (!isset($_GET["id"])) {
		echo "
			<script type=\"text/javascript\">
				window.location = window.location.pathname;	
			</script>		
		";
	}
	
	require_once ('inc/Inventory.php');
	include_once ('inc/InventoryDao.php');
	$maxQuan = Inventory::getQuntity($_GET["id"]);
	
	echo "
			<script type=\"text/javascript\">
				var maxQuan = $maxQuan;
			</script>
	";

?>

<br>

<div class="row">
	<div class="col-md-2">
		<div class="btn-group btn-group-sm" style="width: 100%">
			<button type="button" id="dropdown" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width: 100%">
				<qq>Category</qq> <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" id="category-dropdown" role="menu" style="width: 100%">
				<li><a>Clothes</a></li>
			    <li><a>Equipments</a></li>
			    <li><a>Balls</a></li>
			    <li><a>Others</a></li>
			    <li><a>All</a></li>
			</ul>
		</div>      
	</div> 

	<div class="col-md-10">
		<div class="input-group input-group-sm">
			<input type="text" class="form-control" id="search-box">
			<span class="input-group-btn">
				<button id="search-button" class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"/></button>
			</span>
		</div>
	</div>	    
</div>

<br>

<div class="row">
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Product Information</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<div class="thumbnail">
							<img id="image" style="width: 100%; background-color: white; border-radius: 3px;" src="">
						</div>
					</div>
					<div class="col-md-6">
						<h3>Name: <span id="name"></span></h3>
						<h4>Brand: <span id="brand"></span></h4>
						<h6>Model Code: <span id="code"></span></h6>
						<br>
						<h5>Category: <span id="category"></span></h5>
						<br>
						<h5>Stock: <span id="quantity"></span></h5>
						<h5>Price: <span id="price"></span></h5>
						<div class="row">
							<div class="col-md-6">
								<div class="input-group" style="width: 100%">
								<button type="button" class="btn btn-primary" style="width: 100%" onclick="addToWish(<?php echo $_GET["id"]; ?>);">
									<span class="glyphicon glyphicon-heart"></span>Add to Wish
								</button>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="input-group">
									<input type="number" class="form-control" id="quan" value="1" min="0" max="<?php echo $maxQuan; ?>">
									<span class="input-group-btn">
										<button type="button" class="btn btn-success" id="add-button" onclick="addToCart(0);">ADD</button>
									</span>
								</div>
							</div>
						
						
						</div>
						
					</div>
				</div>
				<br>
				<h5>Tag: <span id="tag">Warning</span></h5>
				<br>
				<p id="description"></p>
				<br>
				<br>
				<div class="jumbotron">
					Comment & Like & Share
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Cart</h3>
			</div>
			<div class="panel-body">
				<table class="table">
					<tbody id="cart">
						<tr>
							<th>Product</th>
							<th>Q.</th>
							<th>U.P.</th>
							<th></th>
						</tr>
					</tbody>
				</table>
				
				<table class="table">
					<tr>
						<th>Total</th>
						<th id="total">&#3647;0</th>
					</tr>
				</table>
				
				<table class="table">
					<tr>
						<th><button type="button" class="btn btn-success" id="button-checkout" >Check Out</button></th>
						<th><button type="button" class="btn btn-danger" id="button-clear-cart" >Clear</button></th>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Confirm Clar Cart -->
<div class="modal fade" id="clear-cart-confirm">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Clear Cart</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure to clear cart item(s)?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger" id="button-confirm-clear-cart">Clear</button>
			</div>
		</div>
	</div>
</div>

<!-- Alert signin -->
<div class="modal fade" id="alert-signin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body">
				<p>Sign in to ADD product?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-primary" id="signin-button" onclick="postAndRedirectToSignin();">Yes</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var product;
	function aj() {
	$.ajax({
		url: 'forjscallphp.php',
		type: "POST",
		data: { "get_product_detail_by_id": <?php echo $_GET["id"]; ?> }
	}).done(function(response) {
		product = $.parseJSON(response);
// 		alert(response);
	    $("#name").html(product.name);
	    $("#code").html(product.code);
	    $("#price").html(product.price);
	    $("#description").html(product.description);
	    $("#image").attr("src", product.image);
	    $("#category").html(product.category);

	    var tags_str = "";
	    for (var i in product.tag) {
	    	tags_str += "&nbsp;<span class=\"label label-warning\">" + product.tag[i] + "</span>&nbsp;";
	    }
	    
	    $("#tag").html(tags_str);
	    $("#quantity").html(product.quantity);
	    $("#brand").html(product.brand);

	    <?php 
    		if (isset($_POST["pid"]))
    			echo "addToCart({$_POST["q"]});";
	    ?>
	});
	}

	var pid, pn, p, q, mq;
	function addToCart(quantity) {
		if ($("#quan").val() == 0)
			return;
		if (quantity == 0)
			quantity = Number($("#quan").val());
		var productId = product.id;
		var productName = product.name;
		var price = product.price;

		if ($.cookie("email") == undefined) {
			$("#alert-signin").modal({
				show: true
			});
			pid = productId; pn = productName; p = price; q = quantity; mq = <?php echo Inventory::getQuntity($_GET["id"]); ?>;
		}
		else {
			if ($.cookie("cartItems") == undefined) {
				var arr = [{id: productId, name: productName, quantity: quantity, unitprice: price}];
				
				$.cookie("cartItems", JSON.stringify(arr), { expires: 15 }); // in 15 days
			}
			else {
				block: {
					var arr = $.parseJSON($.cookie('cartItems'));
					for (var i = 0; i < arr.length; i++) {
						if (arr[i].id == productId) {
							if (arr[i].quantity + quantity >= maxQuan)
								arr[i].quantity = maxQuan;
							else
								arr[i].quantity += quantity;
							
							if (arr[i].quantity == 0) {
								arr.splice(i, 1);
							}
							break block;
						}
					}
					arr.push({id: productId, name: productName, quantity: quantity, unitprice: price});
				}
			
				$.cookie("cartItems", JSON.stringify(arr), { expires: 15 }); // in 15 days
			}
			
			var arr = $.parseJSON($.cookie('cartItems'));
			
			$("#cart").empty();
			$("#cart").append("\
				<tr>\
					<th>Product</th>\
					<th>Q.</th>\
					<th>U.P.</th>\
					<th></th>\
				</tr>\
			");
			var total = 0;
			for (var i = 0; i < arr.length; i++) {
				$("#cart").append(
						"<tr>" +
							"<th>" + arr[i].name + "</th>" +
							"<th>" + arr[i].quantity + "</th>" +
							"<th>" + arr[i].unitprice + "</th>" +
							"<th>" +
								"<span class=\"label alert-danger\" onclick=\"addToCart(-1);\");\">-</span>" +
								"<span class=\"label alert-success\" onclick=\"addToCart(1);\");\">+</span>" +
							"</th>" +
						"</tr>"
				);
				total += arr[i].quantity * arr[i].unitprice;
			}
			$("#total").text("\u0E3F" + total);
		}
	}

	$("#category-dropdown li").click(function() {
		$("#dropdown qq").text($(this).text());
	});

	$("#search-box").keypress(function(event) {
		// 13 means ENTER
		if (event.which == 13) {
			postAndRedirectToShopping();
		}
	});
	
	$("#search-button").click(function() {
		postAndRedirectToShopping();
	});

	$("#button-clear-cart").click(function() {
	    $("#clear-cart-confirm").modal({
		    show: true
		});
		$("#button-confirm-clear-cart").focus();
	});

	$("#button-confirm-clear-cart").click(function() {
		$.removeCookie("cartItems");
		
		$("#cart").empty();
		$("#cart").append("\
			<tr>\
				<th>Product</th>\
				<th>Q.</th>\
				<th>U.P.</th>\
			</tr>\
		");

		$("#total").text("\u0E3F0");
		
		$("#clear-cart-confirm").modal('hide');
	});

	$(document).ready(function() {
		if ($.cookie("cartItems") != undefined) {
			var arr = $.parseJSON($.cookie('cartItems'));
			var total = 0;
			for (var i = 0; i < arr.length; i++) {
				$("#cart").append(
					"<tr>" +
						"<th>" + arr[i].name.substring(0, 12) + "</th>" +
						"<th>" + arr[i].quantity + "</th>" +
						"<th>" + arr[i].unitprice + "</th>" +
						"<th>" +
							"<span class=\"label alert-danger\" onclick=\"addToCart(" + arr[i].id + ", '" + arr[i].name + "', " + arr[i].unitprice + ", -1)\");\">-</span>" +
							"<span class=\"label alert-success\" onclick=\"addToCart(" + arr[i].id + ", '" + arr[i].name + "', " + arr[i].unitprice + ", 1)\");\">+</span>" +
						"</th>" +
					"</tr>"
				);
				total += arr[i].quantity * arr[i].unitprice;
			}
			$("#total").text("\u0E3F" + total);
		}
		<?php 
				if (!isset($_POST["pid"]))
					echo "aj();";
		?>
	});

	function postAndRedirectToShopping() {
	    var postFormStr = "<form method='POST' action='" + window.location.pathname + "?page=shopping'>";
	    postFormStr += "<input type='hidden' name='search_redirect' value='value'></input>";
	    postFormStr += "<input type='hidden' name='str' value='" + $("#search-box").val() + "'></input>";
	    postFormStr += "<input type='hidden' name='cat' value='" + $("#dropdown qq").text() + "'></input>";
	    postFormStr += "</form>";

	    var formElement = $(postFormStr);

	    $('body').append(formElement);
	    $(formElement).submit();
	}
	
	$("input[type=number]").on("mousewheel", function(e) {
	    $(this).blur(); 
	});

	function addToWish(productId) {
		alert("Available later...");
	}

	function postAndRedirectToSignin() {
	    var postFormStr = "<form method='POST' action='" + window.location.pathname + "?page=member'>";
	    postFormStr += "<input type='hidden' name='back_to_location' value=\"?page=detail&id=" + pid + "\"></input>";
	    postFormStr += "<input type='hidden' name='pid' value='" + pid + "'></input>";
	    postFormStr += "<input type='hidden' name='pn' value='" + pn + "'></input>";
	    postFormStr += "<input type='hidden' name='p' value='" + p + "'></input>";
	    postFormStr += "<input type='hidden' name='q' value='" + q + "'></input>";
	    postFormStr += "<input type='hidden' name='mq' value='" + mq + "'></input>";
	    postFormStr += "</form>";

	    var formElement = $(postFormStr);

	    $('body').append(formElement);
	    $(formElement).submit();
	}

	function postAndRedirect() {
	    var postFormStr = "<form method='POST' action='" + window.location.pathname + "?page=member'>";
	    postFormStr += "<input type='hidden' name='back_to_location' value='?page=shopping'></input>";
	    postFormStr += "<input type='hidden' name='pid' value='" + pid + "'></input>";
	    postFormStr += "<input type='hidden' name='pn' value='" + pn + "'></input>";
	    postFormStr += "<input type='hidden' name='p' value='" + p + "'></input>";
	    postFormStr += "<input type='hidden' name='q' value='" + q + "'></input>";
	    postFormStr += "<input type='hidden' name='mq' value='" + mq + "'></input>";
	    postFormStr += "</form>";

	    var formElement = $(postFormStr);

	    $('body').append(formElement);
	    $(formElement).submit();
	}
	
</script>
						
<?php
	if ($maxQuan == 0) {
		echo "
			<script type=\"text/javascript\">
				$(document).ready(function() {
					$(\"#add-button\").attr(\"disabled\", \"disabled\");
				});
			</script>
		";
	}
?>

<?php 
	if (isset($_POST["pid"]))
		echo "
			<script type=\"text/javascript\">
				$(document).ready(function() {
					aj();
				});
			</script>
	";

?>



