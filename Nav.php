<?php
/**
 * Created by PhpStorm.
 * User: speej
 * Date: 4-5-2016
 * Time: 17:08
 */

$uri = explode('/', substr($_SERVER['REQUEST_URI'], 1));
$page = preg_replace('/.php/', '', $uri[1]);

?>


<body role="document">

<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Outdoor Paradise</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?=$page == 'index' ? 'class="active"' : ''?>><a href="index.php">Home</a></li>
				<li <?=$page == 'booking' ? 'class="active"' : ''?>><a href="booking.php">Booking</a></li>
				<li <?=$page == 'employee' ? 'class="active"' : ''?>><a href="employee.php">Contact</a></li>

			</ul>
		</div>
	</div>
</nav>
