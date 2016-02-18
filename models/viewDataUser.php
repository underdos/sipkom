<?php
	include "../controller/function.php";
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$rows = isset($_GET['rows']) ? intval($_GET['rows']) : 10;
	$filter = isset($_GET['field']) ? strval($_GET['field']) : "nip";
	$keywords = isset($_GET['keywords']) ? strval($_GET['keywords']) : "";
	$offset = ($page-1)*$rows;
	if(isset($filter)){
		$search = " where $filter like '%$keywords%'";
	}else{
		$search = "";
	}
	$result = array();
	$stmt1 = "select count(*) as jml from user".$search;
	$row = jmlData($stmt1);
	$result['total'] = $row["jml"];
	$stmt = "select * from user".$search." order by nama asc limit $offset, $rows";
	$rows = array();
	foreach(tampilData($stmt) as $grid){
		array_push($rows, $grid);
	}
	$result['rows'] = $rows;
	echo json_encode($result);
?>