<?

require_once('Connect.php');
require_once('Header.php');
require_once('Nav.php');

$sqlerror = false;

if($_REQUEST['submitType'] == 'add'){

	$sql = "select max(User_ID) as value from employee";
	$stmt = sqlsrv_query( $conn, $sql, array($_REQUEST['Fname'], $_REQUEST['Lname'], $_REQUEST['Salary'], $_REQUEST['Email']));

	if($stmt === false) {
		$sqlerrorarray = sqlsrv_errors();
		$sqlerror = $sqlerrorarray[0][2];
	}

	$row = sqlsrv_fetch_array($stmt);

	$userid = $row['value'] + 1;

	$sql = "INSERT INTO Employee (User_ID, Fname, Lname, Salary, Email)
			VALUES (?, ?, ?, ?, ?)
		  	";
	$stmt = sqlsrv_query( $conn, $sql, array($userid, $_REQUEST['Fname'], $_REQUEST['Lname'], $_REQUEST['Salary'], $_REQUEST['Email']));

	if($stmt === false) {
		$sqlerrorarray = sqlsrv_errors();
		$sqlerror = $sqlerrorarray[0][2];
	}else{
		$_REQUEST['id'] = $userid;
		$_REQUEST['type'] = 'edit';
	}

}
else if($_REQUEST['submitType'] == 'edit'){

	$sql = "UPDATE Employee
			SET Fname = ?, Lname = ?, Salary =?, Email = ?
		  	WHERE User_ID = ?";

	$stmt = sqlsrv_query( $conn, $sql, array($_REQUEST['Fname'], $_REQUEST['Lname'], $_REQUEST['Salary'], $_REQUEST['Email'], intval($_REQUEST['id'])));

	if($stmt === false) {
		$sqlerrorarray = sqlsrv_errors();
		$sqlerror = $sqlerrorarray[0][2];
	}else{
		$_REQUEST['type'] = 'edit';
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

$row = sqlsrv_fetch_array($stmt);

?>


<div class="container theme-showcase" role="main">


	<div class="page-header">
		<h1>Employee</h1>
	</div>

	<? if($sqlerror){ ?>
		<div class="alert alert-danger" role="alert">
			<strong>Error!</strong> <?=$sqlerror?>
		</div>
	<? } else if($_REQUEST['submitType'] == 'edit'){ ?>
	<div class="alert alert-success" role="alert">
		<strong>Well done!</strong> You successfully updated an employee.
	</div>
	<? } else if($_REQUEST['submitType'] == 'add'){ ?>
		<div class="alert alert-info" role="alert">
			<strong>Well done!</strong> You successfully added an employee.
		</div>
	<? } ?>

	<div class="row">

		<div class="col-md-12">
			<form role="form">

				<input type="hidden" name="submitType" value="<?=$_REQUEST['type']?>">
				<input type="hidden" name="id" value="<?=$row['User_ID']?>">

				<div class="form-group col-md-6">
					<label for="Fname">First name</label>
					<input type="text" class="form-control" id="Fname" name="Fname" value="<?=$row['Fname']?>">
				</div>

				<div class="form-group col-md-6">
					<label for="Lname">Last name</label>
					<input type="text" class="form-control" id="Lname" name="Lname" value="<?=$row['Lname']?>">
				</div>

				<div class="form-group col-md-6">
					<label for="Salary">Salary</label>
					<input type="text" class="form-control" id="Salary" name="Salary" value="<?=round($row['Salary'], 2)?>">
				</div>

				<div class="form-group col-md-6">
					<label for="Email">Email</label>
					<input type="text" class="form-control" id="Email" name="Email" value="<?=$row['Email']?>">
				</div>

				<div class="form-group col-md-12">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</form>
		</div>
	</div>

</div>

<? require_once('footer.php'); ?>
