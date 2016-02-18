<?php
	include "../controller/function.php";
	$cabang = isset($_GET['cabang']) ? strval($_GET['cabang']) : "";
	$begin = isset($_GET['begin']) ? strval($_GET['begin']) : "";
	$end = isset($_GET['end']) ? strval($_GET['end']) : "";
	$result = array();
	$stmt1 = "select count(*) as jml from penjualan where cabang = '$cabang' AND status = 'approve' AND tanggal_so BETWEEN '$begin' AND '$end' order by tanggal_so asc";
	$row = jmlData($stmt1);
	$result['total'] = $row["jml"];
	$stmt = "select * from penjualan where cabang = '$cabang' AND status = 'approve' AND tanggal_so BETWEEN '$begin' AND '$end' order by tanggal_so asc";
	$rows = array();
	foreach(tampilData($stmt) as $grid){
		array_push($rows, $grid);
	}
	$result['rows'] = $rows;
	echo json_encode($result);
?>