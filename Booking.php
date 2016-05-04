<?

require_once('Connect.php');
require_once('Header.php');
require_once('Nav.php');

$sql = "INSERT INTO Country (name, language) VALUES (?, ?)";
$params = array("Netherlands", "NL");

//$stmt = sqlsrv_query( $conn, $sql, $params);

//if($stmt === false) {
//	exit( print_r( sqlsrv_errors(), true));
//}



?>


<div class="container theme-showcase" role="main">


	<div class="page-header">
		<h1>Booking</h1>
	</div>
	<div class="row">

		<div class="col-md-6">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Username</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>1</td>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Jacob</td>
					<td>Thornton</td>
					<td>@fat</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Larry</td>
					<td>the Bird</td>
					<td>@twitter</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>

</div> <!-- /container -->

<? require_once('footer.php'); ?>
