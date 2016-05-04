<?

require_once('Connect.php');
require_once('Header.php');
require_once('Nav.php');

$sqlerror = false;
if(isset($_REQUEST['update'])){

	$sql = "UPDATE Employee
			SET Fname = ?, Lname = ?, Salary =?
		  	WHERE User_ID = ?";

	$stmt = sqlsrv_query( $conn, $sql, array($_REQUEST['Fname'], $_REQUEST['Lname'], $_REQUEST['Salary'], intval($_REQUEST['id'])));

	if($stmt === false) {
		$sqlerrorarray = sqlsrv_errors();
		$sqlerror = $sqlerrorarray[0][2];
	}
}

$sql = "SELECT TOP 1 *
		  FROM Employee e
		  LEFT OUTER JOIN Job j on e.Job = j.Job_short
		  WHERE User_ID = ?";

$stmt = sqlsrv_query( $conn, $sql, array(intval($_REQUEST['id'])));

if($stmt === false) {
	$sqlerrorarray = sqlsrv_errors();
	$sqlerror = $sqlerrorarray[0][2];
}

$emp = sqlsrv_fetch_array($stmt);

?>


<div class="container theme-showcase" role="main">


	<div class="page-header">
		<h1>Employees</h1>
	</div>

	<? if($sqlerror){ ?>
		<div class="alert alert-danger" role="alert">
			<strong>Error!</strong> <?=$sqlerror?>.
		</div>
	<? } else if(isset($_REQUEST['update'])){ ?>
	<div class="alert alert-success" role="alert">
		<strong>Well done!</strong> You successfully updated an employee.
	</div>
	<? } ?>

	<div class="row">

		<div class="col-md-12">
			<form role="form">

				<input type="hidden" name="update" value="1">
				<input type="hidden" name="id" value="<?=$emp['User_ID']?>">

				<div class="form-group col-md-6">
					<label for="Fname">First name</label>
					<input type="text" class="form-control" id="Fname" name="Fname" value="<?=$emp['Fname']?>">
				</div>

				<div class="form-group col-md-6">
					<label for="Lname">Last name</label>
					<input type="text" class="form-control" id="Lname" name="Lname" value="<?=$emp['Lname']?>">
				</div>

				<div class="form-group col-md-6">
					<label for="Salary">Salary</label>
					<input type="text" class="form-control" id="Salary" name="Salary" value="<?=round($emp['Salary'], 2)?>">
				</div>


				<div class="form-group col-md-12">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</form>
		</div>
	</div>

</div>

<? require_once('footer.php'); ?>
