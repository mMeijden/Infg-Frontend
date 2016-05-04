<?
$conn = sqlsrv_connect('JEROEN-LAPTOP10', array("Database" => "OutdoorParadiseNew", "CharacterSet" => "UTF-8"));
if( $conn === false ) {
	exit(json_encode(sqlsrv_errors()));
}
