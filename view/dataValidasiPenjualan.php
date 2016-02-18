<h1><image src="image/icon validasi so penjualan1.png" width="30px" height="30px" /> - VALIDASAI SO PENJUALAN</h1><hr/>
<br/>
    <table id="datagrid" class="easyui-datagrid" title="TABEL DATA PENJUALAN" style="width:100%;height:400px"
            data-options="url:'models/viewDataValidasiPenjualan.php',method:'get'">
    </table>
    <div id="tb" style="padding:2px 5px;">
    <a href="#" id="approve" class="easyui-linkbutton" iconCls="icon-edit" onClick="approve(this.id)" plain="true">Approve</a>
    <a href="#" id="disapprove" class="easyui-linkbutton" iconCls="icon-cancel" onClick="disapprove(this.id)" plain="true">Disapprove</a>
    <image id="loader" class="center-image" width="50px" height="50px" src="image/loaders.gif" />
    <div style="float:right" >
        <input class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm', searcher:doSearch" style="width:300px"></input>
        <div id="mm">
            <div data-options="name:'no_so'">No SO</div>
            <div data-options="name:'tanggal_so'">Tgl SO</div>
            <div data-options="name:'no_seri_produk'">No Seri</div>
            <div data-options="name:'no_nis_sales'">NIS</div>
            <div data-options="name:'nama_customer'">Customer</div>
            <div data-options="name:'alamat_customer'">Alamat</div>
            <div data-options="name:'telp_customer'">Telp</div>
            <div data-options="name:'cabang'">Cabang</div>
            <div data-options="name:'status'">Status</div>
        </div>
    </div>
<br/>
    <script language="JavaScript">
    	var l = $('#loader');
    	function doSearch(value,name){
        	$('#datagrid').datagrid({
                url:'models/viewDataValidasiPenjualan.php?status='+status+'&field='+name+'&keywords='+value,
                method:'get'
            });
        }
        function approve(status){
        	$(document).ready(function(){        	
		        var dg = $('#datagrid').datagrid('getSelected');
		       	$.messager.confirm("confirm", "Anda akan memberikan Approved untuk (SO : "+dg.no_so+" : Customer "+dg.nama_customer+"), Lanjutkan ?",function(r){
		            if(r){
		                $.ajax({
		                    type: "GET",
		                    dataType: "json",
		                    url: "models/validasiPenjualan.php?status="+status+"&no_so="+dg.no_so,
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
        }
        function disapprove(status){
	        var dg = $('#datagrid').datagrid('getSelected');
            $.messager.confirm("confirm", "Anda tidak memberikan Approved untuk (SO : "+dg.no_so+" : Customer "+dg.nama_customer+"), Lanjutkan ?",function(r){
	            if(r){
	                $.ajax({
	                    type: "GET",
	                    dataType: "json",
	                    url: "models/validasiPenjualan.php?status="+status+"&no_so="+dg.no_so,
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
        }
        $(document).ready(function(){   

            $('#datagrid').datagrid({
                url:'models/viewDataValidasiPenjualan.php',
                method:'get',
                pagination:true,
                rownumbers:true,
                singleSelect:true,
                toolbar:'#tb',
                columns:[
                    [
                        {field:'status', title:'Status', width:80, align:'center'},
                        {field:'no_so', title:'No SO', width:100, align:'center'},
                        {field:'tanggal_so', title:'Tanggal SO', width:100, align:'center'},
                        {field:'no_seri_produk', title:'No Seri', width:100, align:'center'},
                        {field:'no_nis_sales', title:'NIS', width:100, align:'center'},
                        {field:'quantity', title:'Qty', width:60, align:'center'},
                        {field:'nama_customer', title:'Nama Customer', width:200, align:'center'},
                        {field:'alamat_customer', title:'Alamat Customer', width:300, align:'center'},
                        {field:'telp_customer', title:'Telp', width:150, align:'center'},
                        {field:'cabang', title:'Cabang', width:60, align:'center'}                        
                    ]
                ]
            }); 
 		});
    </script>









