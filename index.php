<DOCTYPE html>
<?php
	session_start();
	include "controller/function.php";
	if(ceklogin()){
		redirect('login.php');
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="framework/themes/gray/easyui.css" >
		<link rel="stylesheet" type="text/css" href="framework/themes/icon.css" >
		<link rel="stylesheet" type="text/css" href="framework/demo/demo.css" >
		<link rel="stylesheet" type="text/css" href="css/sipkom.css" >
		<script type="text/javascript" src="framework/jquery.min.js"></script>
		<script type="text/javascript" src="framework/jquery.easyui.min.js"></script>
	</head>
	<body>
		<div id="windowApp" class="easyui-window" title="&nbsp SISTEM INFORMASI PENGHITUNGAN KOMISI SALES PT LUXINDO RAYA - User_Logged_As [ <?php echo $_SESSION['nama'];?> ] [ <?php echo $_SESSION['jabatan'];?> ]" data-options="iconCls:'icon-large-chart',maximized:true" style="width:100%;height:100%;padding:10px;">
		</div>		
		<script type="text/javascript">
			var level = <?php echo $_SESSION['level'] ?>;
			$(document).ready(function(){
				$('#windowApp').window('refresh','view/home.php');
			});
		</script>
	</body>
</html>