<?php
	include "../controller/function.php";
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$rows = isset($_GET['rows']) ? intval($_GET['rows']) : 10;
	$filter = isset($_GET['field']) ? strval($_GET['field']) : "no_so";
	$keywords = isset($_GET['keywords']) ? strval($_GET['keywords']) : "";
	$status = isset($_GET['status']) ? strval($_GET['status']) : "waiting";
	$offset = ($page-1)*$rows;
	if(isset($filter)){
		$search = " where status= '$status' AND $filter like '%$keywords%'";
	}else{
		$search = "";
	}
	$result = array();
	$stmt1 = "select count(*) as jml from penjualan".$search;
	$row = jmlData($stmt1);
	$result['total'] = $row["jml"];
	$stmt = "select * from penjualan".$search." order by no_so asc limit $offset, $rows";
	$rows = array();
	foreach(tampilData($stmt) as $grid){
		array_push($rows, $grid);
	}
	$result['rows'] = $rows;
	echo json_encode($result);
?>