<?

require_once('Connect.php');
require_once('Header.php');
require_once('Nav.php');

$sql = "SELECT *
		  FROM Booking";

$stmt = sqlsrv_query( $conn, $sql);

if($stmt === false) {
	exit( print_r( sqlsrv_errors(), true));
}


?>


<div class="container theme-showcase" role="main">


	<div class="page-header">
		<h1>Booking</h1>
		<h4 class="text-right"><a href="Bookingadd.php"><button type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add </button></a></h4>

	</div>
	<div class="row">

		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Order date</th>
					<th>Order header</th>
					<th>Payed</th>
					<th>Cancellation Insurance</th>
					<th class="text-center">Actions</th>
				</tr>
				</thead>
				<tbody>
				<? while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC )) { ?>
				<tr>
					<td><?=date_format($row['Order_Date'], "Y-m-d")?></td>
					<td><?=$row['Order_header']?></td>
					<td><?=$row['Payed']?></td>
					<td><?=$row['Cancellation_insurance']?></td>
					<td class="text-center"><a href="Bookingdetail.php?orderdate=<?=date_format($row['Order_Date'], "Y-m-d")?>&orderheader=<?=$row['Order_header']?>"> View <i class="fa fa-arrow-right" aria-hidden="true"></i> </a></td>
				</tr>
				<? } ?>


				</tbody>
			</table>
		</div>
	</div>

</div> <!-- /container -->

<? require_once('footer.php'); ?>
