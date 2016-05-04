<?

require_once('Connect.php');
require_once('Header.php');
require_once('Nav.php');

$sql = "SELECT User_ID, Fname, Lname,Salary, j.Job_title as Jobtitle
		  FROM Employee e
		  LEFT OUTER JOIN Job j on e.Job = j.Job_short";

//{"User_ID":28,"Fname":"Albert","Lname":"Wang","Salary":"68400.0000","Jobtitle":"Accounting Manager"}

$stmt = sqlsrv_query( $conn, $sql);

if($stmt === false) {
	exit( print_r( sqlsrv_errors(), true));
}
?>


<div class="container theme-showcase" role="main">
	
	<div class="page-header">
		<h1>Index</h1>
		<h4>Employees</h4>
	</div>
	<div class="row">

		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Job title</th>
					<th>Salary</th>
					<th class="text-center">Edit</th>
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
						<td class="text-center"><a href="employee.php?id=<?=$row['User_ID']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
					</tr>

				<? } ?>

				</tbody>
			</table>
		</div>
	</div>

</div> <!-- /container -->

<? require_once('footer.php'); ?>
