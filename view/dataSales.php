<h1><image class="center-image" src="image/icon sales1.png" width="30px" height="30px" /> - PENDATAAN SALES</h1><hr/>
<br/>
	    <div class="easyui-panel" data-options="collapsible:true" title="FORM DATA SALES" style="width:1300; height:auto">
	        <div style="padding:10px 10px 20px 10px">
	        <table cellspacing=20>
	        	<tr>
	        	<td valign="top">
		       		<form id="formSales" name="formSales" >	        	
			            <table cellpadding="5">
			                <tr>
			                    <td>NIS:</td>
			                    <td><input class="easyui-textbox" style="width:200px" type="text" id="nis" name="nis" data-options="required:true"></input></td>
			                </tr>
			                <tr>
			                    <td>Nama Sales:</td>
			                    <td><input class="easyui-textbox" style="width:200px" type="text" id="nama_sales" name="nama_sales" data-options="required:true"></input></td>
			                </tr>
			                <tr>
			                    <td>Alamat:</td>
			                    <td><input class="easyui-textbox" id="alamat" name="alamat" data-options="multiline:true,required:true" style="height:60px; width:200px"></input></td>
			                </tr>
			                <tr>
			                    <td>Telp:</td>
			                    <td><input class="easyui-textbox" style="width:200px" type="text" id="telp" name="telp" data-options="required:true"></input></td>
			                </tr>
			                <tr>
			                    <td>Cabang:</td>
			                    <td><input class="easyui-textbox" style="width:120px" type="text" id="cabang" name="cabang" data-options="required:true"></input></td>
			                </tr>
			                <tr>
			                	<td colspan=2><hr/>
								<div style="text-align:right;padding:5px">
									<image id="loader" class="center-image" width="50px" height="50px" src="image/loaders.gif" />
									<input type="button" id="submit" value="Save" class="easyui-linkbutton" style="padding:5px;"/>
									<input type="button" id="update" value="Update" class="easyui-linkbutton" style="padding:5px;"/>
									<input type="button" id="reset" value="Reset" class="easyui-linkbutton" style="padding:5px;"/>
									<br/><br/><br/>
									<div class="notif success">
									  <p align="left">&nbsp <img class="center-image" src="image/success.png" width="10px" height="10px" /> &nbsp Data Sales Berhasil Disimpan</p>
									</div>
									<div class="notif error">
									  <p align="left">&nbsp <img class="center-image" src="image/error.png" width="10px" height="10px" /> &nbsp Data Sales Gagal Disimpan</p>
									</div>
								</div>
								</td>
							</tr>
						</table>
					</form>
				</td>
				<td valign="top">
					<table id="datagrid" class="easyui-datagrid" title="TABEL DATA SALES" style="width:900px;height:430px" data-options="url:'models/viewDataSales.php', method:'get'">
						<thead>
							<tr>
								<th data-options="field:'nis',width:130, align:'center'">NIS</th>
								<th data-options="field:'nama_sales',width:200,align:'left'">Nama Sales</th>
								<th data-options="field:'alamat',width:320,align:'left'">Alamat</th>
								<th data-options="field:'telp',width:130, align:'left'">Telp/hp</th>
								<th data-options="field:'cabang',width:60, align:'center'">Cabang</th>
							</tr>
						</thead>
					</table>					
					</div>
				    <div id="tb" style="padding:2px 5px;">
				        <a href="#" id="edit" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Edit</a>
				        <a href="#" id="delete" class="easyui-linkbutton" iconCls="icon-cancel" plain="true">Delete</a>
						<div style="float:right" >
							<input class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm', searcher:doSearch" style="width:300px"></input>
					    	<div id="mm">
						        <div data-options="name:'nis'">NIS</div>
						        <div data-options="name:'nama_sales'">Nama Sales</div>
						        <div data-options="name:'alamat'">alamat</div>
						        <div data-options="name:'telp'">Telp</div>
						        <div data-options="name:'cabang'">Cabang</div>
	    					</div>
    					</div>
				    </div>					
				</td>
				</tr>
			</table>
	   	</div>
    <script language="JavaScript">
      	function doSearch(value,name){
            $('#datagrid').datagrid({
            	url:'models/viewDataSales.php?field='+name+'&keywords='+value,
            	method:'get'
            });
        }
		var l = $('#loader');
		var s = $('#submit');
		var u = $('#update');
		var r = $('#reset');
		var f = $('#formSales');
		var d = $('#delete');
		var e = $('#edit');
		var sukses = $('.success');
		var error = $('.error');
        $(document).ready(function(){	
        	$('#datagrid').datagrid({
        		url:'models/viewDataSales.php',
        		method:'get',
        		pagination:true,
        		rownumbers:true,
				singleSelect:true,
				toolbar:'#tb'
        	});	
			s.click(function(){
				valid = f.form('enableValidation').form('validate');
				if(valid){
					$.ajax({
						type: "POST",
						dataType: "json",
						url: "models/inputDataSales.php",
						data: f.serialize(), 
						beforeSend:function(){
							l.show();
						},
						error:function(respons){
							l.hide();
							$.messager.alert('info', respons.status);
						},
						success:function(respons){
							l.hide();
							$.messager.alert('info', respons.status);
							f.form('clear');
							$('.easyui-datagrid').datagrid('reload');
						}
					});					
				}
			});
			u.click(function(){
				valid = f.form('enableValidation').form('validate');
				if(valid){
					$.ajax({
						type: "POST",
						dataType: "json",
						url: "models/updateDataSales.php",
						data: f.serialize(), 
						beforeSend:function(){
							l.show();
						},
						error:function(respons){
							l.hide();
							$.messager.alert('info',respons.status);
						},
						success:function(respons){
							l.hide();
							$.messager.alert('info',respons.status);
							f.form('clear');
							$('.easyui-datagrid').datagrid('reload');
						}
					});					
				}
			});
			d.click(function(){
				var dg = $('#datagrid').datagrid('getSelected');
				$.messager.confirm("confirm", "Apakah anda ingin menghapus data Sales ("+dg.nis+" : "+dg.nama_sales+") ?",function(r){
					if(r){
						$.ajax({
							type: "GET",
							dataType: "json",
							url: "models/deleteDataSales.php?nis="+dg.nis,
							beforeSend:function(){
								l.show();
							},
							error:function(respons){
								l.hide();
								$.messager.alert('info', respons.status);
							},
							success:function(respons){
								l.hide();
								$.messager.alert('info', respons.status);
								$('.easyui-datagrid').datagrid('reload');
							}
						});
					}
				});
			});
			e.click(function(){
				var dg = $('#datagrid').datagrid('getSelected');
				if(dg){
					f.form('load',{
						nis: dg.nis,
						nama_sales: dg.nama_sales,
						alamat: dg.alamat,
						cabang: dg.cabang,
						telp: dg.telp
					});
				}
			});
			r.click(function(){
				f.form('load',{
					nis: '',
					nama_sales: '',
					alamat: '',
					cabang: '',
					telp: ''					
				});
			});			
		});
    </script>