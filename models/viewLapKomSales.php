<?php
	include "../controller/function.php";
	$cabang = isset($_GET['cabang']) ? strval($_GET['cabang']) : "";
	$begin = isset($_GET['begin']) ? strval($_GET['begin']) : "";
	$end = isset($_GET['end']) ? strval($_GET['end']) : "";
	$result = array();
	$stmt1 = "select count(*) as jml from komisi where cabang = '$cabang' AND tanggal_so BETWEEN '$begin' AND '$end' order by tanggal_so asc";
	$row = jmlData($stmt1);
	$result['total'] = $row["jml"];
	$stmt = "select no_nis_sales as nis, nama_sales as nama, count(*) as total_so, sum(komisi) as komisi from komisi where cabang = '$cabang' AND tanggal_so BETWEEN '$begin' AND '$end' group by no_nis_sales";
	$stmt1 = "select sum(komisi) as total from komisi where cabang = '$cabang' AND tanggal_so BETWEEN '$begin' AND '$end'";
	foreach(tampilData($stmt1) as $total);
	$rows = array();
	foreach(tampilData($stmt) as $grid){
		array_push($rows, $grid);
	}
	$result['rows'] = $rows;
	$footer['nama'] = "Total";
	$footer['komisi'] = $total['total'];
	$result['footer'] = [$footer];
	echo json_encode($result);
?>