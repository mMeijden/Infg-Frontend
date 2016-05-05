<?

require_once('Connect.php');
require_once('Header.php');
require_once('Nav.php');

$sqlerror = false;

$sql = "SELECT *
		  FROM Booking
		  WHERE Order_date = ? AND Order_header = ?";

$stmt = sqlsrv_query( $conn, $sql, array($_REQUEST['orderdate'], $_REQUEST['orderheader']));

if($stmt === false) {
	$sqlerrorarray = sqlsrv_errors();
	$sqlerror = $sqlerrorarray[0][2];
}else {
	$row = sqlsrv_fetch_array($stmt);
}
?>


<div class="container theme-showcase" role="main">


	<div class="page-header">
		<h1>Booking detail</h1>
	</div>

	<? if($sqlerror){ ?>
		<div class="alert alert-danger" role="alert">
			<strong>Error!</strong> <?=$sqlerror?>
		</div>
	<? } ?>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Order Date</th>
					<th>Order header</th>
					<th>Payed</th>
					<th>Cancellation Insurance</th>
					<th>Travel</th>
					<th>Start</th>
					<th>End</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td><?=date_format($row['Order_Date'], "Y-m-d")?></td>
						<td><?=$row['Order_header']?></td>
						<td><?=$row['Payed'] == 1 ? 'Yes' : 'No'?></td>
						<td><?=$row['Cancellation_insurance'] == 1 ? 'Yes' : 'No'?></td>
						<td><?=$row['Travel']?></td>
						<td><?=isset($row['Travel_start_date']) ? (date_format($row['Travel_start_date'], "Y-m-d")) : ''?> </td>
						<td><?=isset($row['Travel_start_date']) ? (date_format($row['Travel_end_date'], "Y-m-d")) : ''?></td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>

</div>

<? require_once('footer.php'); ?>
