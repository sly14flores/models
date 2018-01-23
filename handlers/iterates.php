<?php

$_POST = json_decode(file_get_contents('php://input'), true);

$table = $_POST['table'];

require_once '../db.php';
$con = new pdo_db();

$columns = $con->getData("SHOW COLUMNS FROM $table;");

$props = [];
foreach ($columns as $i => $value) {
	$props[] = array(
		"id"=>$value['Field'],"text"=>$value['Field']
	);
};

echo json_encode($props);

?>