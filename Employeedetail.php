<?

require_once('Connect.php');
require_once('Header.php');
require_once('Nav.php');

$sqlerror = false;

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
		<h1>Employee detail</h1>
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
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Salary</th>
					<th>Manager</th>
					<th>Job_short</th>
					<th>Job_title</th>
					<th>Min_salary</th>
					<th>Max_salary</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td><?=$row['User_ID']?></td>
						<td><?=$row['Fname']?></td>
						<td><?=$row['Lname']?></td>
						<td><?=$row['Email']?></td>
						<td><?=round($row['Salary'], 2)?></td>
						<td><?=$row['Manager']?></td>
						<td><?=$row['Job_short']?></td>
						<td><?=$row['Job_title']?></td>
						<td><?=round($row['Min_salary'], 2)?></td>
						<td><?=round($row['Max_salary'], 2)?></td>
					</tr>

				</tbody>
			</table>
		</div>
	</div>

</div>

<? require_once('footer.php'); ?>
