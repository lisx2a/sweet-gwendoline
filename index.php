<?php include("include.php"); ?>

<? include("_inc/ft.php"); ?>

<link rel="stylesheet" type="text/css" href="css/main.css">

<script type="text/javascript" src="jquery-1.4.4.min.js"></script>
<script type="text/javascript">
	$(function() {
		var fade1 = $(".splash");
		var fade2 = $("#fade2");
		fade1.hide();
		fade2.hide();

		$(window).load(function() {
			setTimeout(function() { fade1.fadeIn(500); }, 500);
			setTimeout(function() { fade2.fadeIn(700); }, 800);
		});

		$("#fade2").css("opacity", 0.8);
	});

</script>

<body class="splash" id="fade2">

<div class="splash">  
	<a href="collection.php"><img src="images/logo_landingpage.png" width="480px" /></a><h1>Sweet Gwendoline Clothing</h1>
</div>
<body>
