<h1><image class="center-image" src="image/iconLogin.png" width="30px" height="30px" /> - DATA USER</h1><hr/>
<br/>
    <div class="easyui-panel" data-options="collapsible:true" title="FORM DATA USER" style="width:1300; height:auto">
        <div style="padding:10px 10px 20px 10px">
        <table cellspacing=20>
        	<tr>
        	<td valign="top">
	       		<form id="formUser" name="formUser" >	        	
		            <table cellpadding="5">
		                <tr>
		                    <td>NIP:</td>
		                    <td><input class="easyui-textbox" style="width:200px" type="text" id="nip" name="nip" data-options="required:true"></input></td>
		                </tr>
		                <tr>
		                    <td>Nama User:</td>
		                    <td><input class="easyui-textbox" style="width:200px" type="text" id="nama" name="nama" data-options="required:true"></input></td>
		                </tr>
		                <tr>
		                    <td>Username:</td>
		                    <td><input class="easyui-textbox" style="width:200px" type="text" id="username" name="username" data-options="required:true"></input></td>
		                </tr>
		                <tr>
		                    <td>Password:</td>
		                    <td><input class="easyui-textbox" style="width:200px" type="text" id="password" name="password" data-options="required:true"></input></td>
		                </tr>	
		                <tr>
		                    <td>Jabatan:</td>
		                    <td><input class="easyui-combobox" id="jabatan" name="jabatan" style="width:120px" data-options="url:'data/jabatan.json', valueField:'jabatan', textField:'jabatan', panelHeight:'120px'" ></input></td>
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
							<th data-options="field:'nip',width:100, align:'center'">NIP</th>
							<th data-options="field:'nama',width:175,align:'left'">Nama</th>
							<th data-options="field:'username',width:175,align:'left'">Username</th>
							<th data-options="field:'password',width:100, align:'left'">Password</th>
							<th data-options="field:'jabatan',width:130, align:'left'">Jabatan</th>
							<th data-options="field:'level',width:60, align:'left'">Level</th>
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
					        <div data-options="name:'nip'">NIP</div>
					        <div data-options="name:'nama'">Nama</div>
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
            	url:'models/viewDataUser.php?field='+name+'&keywords='+value,
            	method:'get'
            });
        }
		var l = $('#loader');
		var s = $('#submit');
		var u = $('#update');
		var r = $('#reset');
		var f = $('#formUser');
		var d = $('#delete');
		var e = $('#edit');
		var sukses = $('.success');
		var error = $('.error');
        $(document).ready(function(){	
        	$('#datagrid').datagrid({
        		url:'models/viewDataUser.php',
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
						url: "models/inputDataUser.php",
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
						url: "models/updateDataUser.php",
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
				$.messager.confirm("confirm", "Apakah anda ingin menghapus data User ("+dg.nip+" : "+dg.nama+") ?",function(r){
					if(r){
						$.ajax({
							type: "GET",
							dataType: "json",
							url: "models/deleteDataUser.php?nip="+dg.nip,
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
						nip: dg.nip,
						nama: dg.nama,
						username: dg.username,
						password: dg.password,
						cabang: dg.cabang
					});
					$('#jabatan').combobox('setValue', dg.jabatan);
				}
			});
			r.click(function(){
				f.form('load',{
					nip: '',
					nama: '',
					username: '',
					password: '',
					jabatan: '',
					cabang: ''				
				});
				$('#jabatan').combobox('setValue', ' ');
			});			
		});
    </script>