<?php
include "controller/function.php";
session_start();
session_destroy();
?>			
<DOCTYPE html>
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
		<div id="windowApp" class="easyui-window" title="&nbsp SISTEM INFORMASI PENGHITUNGAN KOMISI SALES PT LUXINDO RAYA" data-options="iconCls:'icon-large-chart',maximized:true" style="width:100%;height:100%;padding:10px;">
			<div id="login">
			<center>
			<image src="image/iconLogin.png" width="200px" height="190px"/>
			<form id="flogin" method="POST" action="models/loginHandler.php"><br/>
				<input type="text" name="username" class="easyui-textbox" data-options="iconCls:'icon-man', prompt:'Username', required:true" style="height:30px; width:300px" autofocus /><br/><br/>
				<input type="password" name="password" class="easyui-textbox" data-options="iconCls:'icon-lock', prompt:'Password', required:true" style="height:30px; width:300px" /><br/><br/>
				<a onCLick="flogin.submit()" class="easyui-linkbutton" data-options="iconCls:'icon-redo'" style="height:30px; width:100px">LOGIN</a>
			</form>
			</center>
			</div>
		</div>
	</body>
</html>