<?

require_once('Connect.php');
require_once('Header.php');
require_once('Nav.php');

$sqlerror = false;
$sql = "SELECT User_ID, Fname, Lname,Salary, j.Job_title as Jobtitle
		  FROM Employee e
		  LEFT OUTER JOIN Job j on e.Job = j.Job_short";

$stmt = sqlsrv_query( $conn, $sql);

if($stmt === false) {
	$sqlerrorarray = sqlsrv_errors();
	$sqlerror = $sqlerrorarray[0][2];
}
?>


<div class="container theme-showcase" role="main">
	
	<div class="page-header">
		<h1>Index</h1>
		<h4>Employees</h4>
		<h4 class="text-right"><a href="Employee.php?type=add"><button type="button" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Add </button></a></h4>

	</div>
	<div class="row">

		<? if($sqlerror){ ?>
			<div class="alert alert-danger" role="alert">
				<strong>Error!</strong> <?=$sqlerror?>
			</div>
		<? } ?>

		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Job title</th>
					<th>Salary</th>
					<th class="text-center">Actions</th>
				</tr>
				</thead>
				<tbody>
				<? while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC )) { ?>
					<tr>
						<td><?=$row['User_ID']?></td>
						<td><?=$row['Fname']?></td>
						<td><?=$row['Lname']?></td>
						<td><?=$row['Jobtitle']?></td>
						<td><?=$row['Salary'] ? '€' . round($row['Salary'], 2) : ''?></td>
						<td class="text-center">
							<a href="employeedetail.php?id=<?=$row['User_ID']?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a>
							<a href="employee.php?type=edit&id=<?=$row['User_ID']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						</td>
					</tr>

				<? } ?>

				</tbody>
			</table>
		</div>
	</div>

</div> <!-- /container -->

<? require_once('footer.php'); ?>
