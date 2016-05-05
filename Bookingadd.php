<?

require_once('Connect.php');
require_once('Header.php');
require_once('Nav.php');

$sqlerror = false;


if($_REQUEST['book'] == 'true'){

	// order date
	$date = date('Y-m-d');

	$sql = "SELECT  TOP 1 Order_header_ID as value
  			FROM Order_header WHERE Order_header_ID NOT IN (SELECT Order_header from booking where Order_date = CAST(GETDATE() AS DATE))";
	$stmt = sqlsrv_query( $conn, $sql);

	if($stmt === false) {
		$sqlerrorarray = sqlsrv_errors();
		$sqlerror = $sqlerrorarray[0][2];
	}

	$row = sqlsrv_fetch_array($stmt);

	$header = $row['value'];

	$sql = "INSERT INTO Booking (Order_date, Order_header, Cancellation_insurance, Payed, Travel, Travel_start_date, Travel_end_date)
			VALUES (?, ?, ?, ?, ?, ?, ?)
		  	";

	$travel = explode(':', $_REQUEST['travel']);

	$stmt = sqlsrv_query( $conn, $sql, array($date, $header, $_REQUEST['insurrance'] ? 1 : 0, $_REQUEST['pay'] ? 1 : 0, $travel[0], $travel[1], $travel[2]));

	if($stmt === false) {
		$sqlerrorarray = sqlsrv_errors();
		$sqlerror = $sqlerrorarray[0][2];
	}

	if(!$sqlerror)
		header('Location: Bookingdetail.php?orderdate='.$date.'&orderheader='.$header);

}

$sql = "SELECT * FROM Available_travel";

$stmt = sqlsrv_query( $conn, $sql);

if($stmt === false) {
	$sqlerrorarray = sqlsrv_errors();
	$sqlerror = $sqlerrorarray[0][2];
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
			<form role="form">

				<input type="hidden" name="book" value="true">

				<div class="form-group col-md-6">
					<label for="travel">Available travels</label>
					<select class="form-control" id="travel" name="travel" >
						<? while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC )) { ?>
						<option value="<?=$row['Travel'].':'.date_format($row['Start_date'], "Y-m-d").':'.date_format($row['End_date'], "Y-m-d")?>"><?=$row['Travel'] . ', ' . date_format($row['Start_date'], "Y-m-d") . ' to ' . date_format($row['End_date'], "Y-m-d")?></option>
						<? } ?>

					</select>
				</div>

				<div class="form-group col-md-12">
					<input id="pay" type="checkbox" name="pay" value="1">
					<label for="pay">Pay now</label>

				</div>

				<div class="form-group col-md-12">
					<input id="insurrance" type="checkbox" name="insurrance" value="1">

					<label for="insurrance">Insurrance</label>
				</div>

				<div class="form-group col-md-12">
					<button type="submit" class="btn btn-default">Order</button>
				</div>
			</form>
		</div>
	</div>

</div>

<? require_once('footer.php'); ?>
