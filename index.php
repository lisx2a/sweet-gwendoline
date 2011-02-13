<?php include("_inc/splash_hd.php"); ?>

<script type="text/javascript" src="jquery-1.4.4.min.js"></script>
<script type="text/javascript">
	$(function() {
		//var fade1 = $(".fade1");
		var fade2 = $("div.splash");
		fade1.hide();
		fade2.hide();

		$(window).load(function() {
			//setTimeout(function() { fade1.fadeIn(800); }, 500);
			setTimeout(function() { fade2.fadeIn(700); }, 800);
		});

	});

</script>

<body class="splash">
<div class="splash">  
	<a href="collection.php"><img src="images/logo_landingpage.png" width="480px" /></a><h1>Sweet Gwendoline Clothing</h1>
</div>
</body>
</html>
