<div class="easyui-panel" style="padding:5px;width:100%">	
	<a href="index.php" id="home" class="easyui-linkbutton" data-options="plain:true">HOME</a>
	<a href="#" class="easyui-menubutton" data-options="menu:'#mm1'">PENDATAAN</a>
	<a href="#" class="easyui-menubutton" data-options="menu:'#mm2'">PENJUALAN</a>
	<a href="#" class="easyui-menubutton" data-options="menu:'#mm3'">LAPORAN</a>
	<a href="#" class="easyui-menubutton" data-options="menu:'#mm4'">PENGATURAN</a>
	<a href="login.php" class="easyui-linkbutton" data-options="plain:true">LOGOUT</a>
</div>
<div id="mm1" style="width:150px;">
	<div id="dataSales" data-options="iconCls:'icon-large-smartart'">Data Sales</div>
	<div class="menu-sep"></div>
	<div id="dataProduk" data-options="iconCls:'icon-large-smartart'">Data Produk</div>
</div>
<div id="mm2" style="width:200px;">
	<div id="dataPenjualan" data-options="iconCls:'icon-add'">Input SO Penjualan</div>
	<div class="menu-sep"></div>
	<div id="validasiPenjualan" data-options="iconCls:'icon-large-smartart'">Validasi SO Penjualan</div>
</div>
<div id="mm3" style="width:200px;">
	<div id="laporanPenjualan" data-options="iconCls:'icon-large-smartart'">Lap. SO Penjualan</div>
	<div class="menu-sep"></div>
	<div id="laporanKomisiSales" data-options="iconCls:'icon-large-smartart'">Lap. Komisi Sales</div>
	<div class="menu-sep"></div>
	<div id="cetakSlipKomisi" data-options="iconCls:'icon-large-smartart'">Cetak Slip Komisi Sales</div>
</div>
<div id="mm4">
	<div id="dataUser" data-options="iconCls:'icon-large-smartart'">Data User</div>
</div><br/>
<div id="contentApp" class="easyui-panel" style="width:100%;height:91%;padding:10px;">
<h3>MENU UTAMA</h3><hr/>
<center><br/><br/><br/>
<table cellpadding="10px">
	<tr>
		<td><img id="iconDataSales" class="icon" src="image/icon sales1.png" width="130px" height="130px" onMouseover="this.src='image/icon sales2.png'" onMouseout="this.src='image/icon sales1.png'"/></td>
		<td></td>
		<td><img id="iconDataPenjualan" class="icon" src="image/icon so penjualan1.png" width="150px" height="150px" onMouseover="this.src='image/icon so penjualan2.png'" onMouseout="this.src='image/icon so penjualan1.png'"/></td>
		<td></td>
		<td><img id="iconLapSOPenjualan" class="icon" src="image/icon laporan so penjualan1.png" width="150px" height="150px" onMouseover="this.src='image/icon laporan so penjualan2.png'" onMouseout="this.src='image/icon laporan so penjualan1.png'"/></td>
		<td></td>	
		<td><img id="iconSlipKomisi" class="icon" src="image/icon slip komisi1.png" width="150px" height="150px" onMouseover="this.src='image/icon slip komisi2.png'" onMouseout="this.src='image/icon slip komisi1.png'"/></td>
		<td></td>			
	</tr>
	<tr>
		<td><h1>PENDATAAN SALES</h1></td>
		<td></td>
		<td><h1>INPUT SO PENJUALAN</h1></td> 	
		<td></td>
		<td><h1>LAPORAN SO PENJUALAN</h1></td>
		<td></td>
		<td><h1>CETAK SLIP KOMISI</h1></td>
	</tr>
	<tr>
		<td><img id="iconDataProduk" class="icon" src="image/icon produk1.png" width="130px" height="130px" onMouseover="this.src='image/icon produk2.png'" onMouseout="this.src='image/icon produk1.png'"/></td>
		<td></td>
		<td><img id="iconValidasiPenjualan" class="icon" src="image/icon validasi so penjualan1.png" width="150px" height="150px" onMouseover="this.src='image/icon validasi so penjualan2.png'" onMouseout="this.src='image/icon validasi so penjualan1.png'"/></td>
		<td></td>	
		<td><img id="iconLaporanKomisi" class="icon" src="image/icon laporan komisi1.png" width="150px" height="150px" onMouseover="this.src='image/icon laporan komisi2.png'" onMouseout="this.src='image/icon laporan komisi1.png'"/></td>
		<td></td>	
		<td><img id="iconPengaturan" class="icon" src="image/icon pengaturan1.png" width="150px" height="150px" onMouseover="this.src='image/icon pengaturan2.png'" onMouseout="this.src='image/icon pengaturan1.png'"/></td>
		<td></td>			
	</tr>
	<tr>
		<td><h1>PENDATAAN PRODUK</h1></td>
		<td></td>
		<td><h1>VALIDASI SO PENJUALAN</h1></td>
		<td></td>
		<td><h1>LAPORAN KOMISI SALES</h1></td>
		<td></td>
		<td align="center"><h1>PENGATURAN</h1></td>
	</tr>
</table>
</center>
</div>
<script languange="JavaScript">
	$(document).ready(function(){
		$('#dataProduk, #iconDataProduk').click(function(){
			if(level ==1 || level ==2){
				$('#contentApp').panel('refresh','view/dataProduk.php');				
			}else{
				$.messager.alert("Warning.!","Anda Tidak memiliki izin mengakses Menu ini");
			}
		});
		$('#dataSales,#iconDataSales').click(function(){
			if(level ==1 || level ==4 || level == 5){
				$('#contentApp').panel('refresh','view/dataSales.php');
			}else{
				$.messager.alert("Warning.!","Anda Tidak memiliki izin mengakses Menu ini");
			}	
		});
		$('#dataPenjualan, #iconDataPenjualan').click(function(){
			if(level ==1 || level == 5){			
				$('#contentApp').panel('refresh','view/dataPenjualan.php');
			}else{
				$.messager.alert("Warning.!","Anda Tidak memiliki izin mengakses Menu ini");
			}				
		});
		$('#validasiPenjualan, #iconValidasiPenjualan').click(function(){
			if(level ==1 || level ==3){
				$('#contentApp').panel('refresh','view/dataValidasiPenjualan.php');
			}else{
				$.messager.alert("Warning.!","Anda Tidak memiliki izin mengakses Menu ini");
			}			
		});
		$('#laporanPenjualan, #iconLapSOPenjualan').click(function(){
			if(level ==1 || level ==4 || level == 5){
				$('#contentApp').panel('refresh','view/lapSoPenjualan.php');
			}else{
				$.messager.alert("Warning.!","Anda Tidak memiliki izin mengakses Menu ini");
			}
		});
		$('#laporanKomisiSales, #iconLaporanKomisi').click(function(){
			if(level ==1 || level == 2 || level == 4){
				$('#contentApp').panel('refresh','view/lapKomSales.php');
			}else{
				$.messager.alert("Warning.!","Anda Tidak memiliki izin mengakses Menu ini");
			}
		});		
		$('#cetakSlipKomisi, #iconSlipKomisi').click(function(){
			if(level ==1 || level == 5){
				$('#contentApp').panel('refresh','view/cetakSlipKomSales.php');
			}else{
				$.messager.alert("Warning.!","Anda Tidak memiliki izin mengakses Menu ini");
			}			
		});		
		$('#dataUser, #iconPengaturan').click(function(){
			if(level ==1){
				$('#contentApp').panel('refresh','view/dataUser.php');
			}else{
				$.messager.alert("Warning.!","Anda Tidak memiliki izin mengakses Menu ini");
			}				
		});					
	});
</script>