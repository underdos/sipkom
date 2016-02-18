<h1><image src="image/icon so penjualan1.png" width="30px" height="30px" /> - INPUT PENJUALAN</h1><hr/>
<br/>   
     <div class="easyui-panel" data-options="collapsible:true" title="FORM DATA PENJUALAN" style="width:1300; height:auto">
        <div >
            <table cellspacing=20>
                <tr>
                <td valign="top">
                    <form id="formPenjualan" name="formPenjualan" method="post">
                        <table cellpadding="5" style="width:350">
                            <tr>
                                <td>No SO:</td>
                                <td><input class="easyui-textbox" style="width:200px" type="text" id="no_so" name="no_so" data-options="required:true"></input></td>
                            </tr>
                            <tr>
                                <td>Tanggal SO:</td>
                                <td><input class="easyui-datebox" data-options="formatter:myformatter, parser:myparser, requrired:true" style="width:200px" type="text" id="tanggal_so" name="tanggal_so" ></input></td>
                            </tr>
                            <tr>
                                <td>No Seri Produk:</td>
                                <td><input class="easyui-textbox" style="width:200px" type="text" id="no_seri_produk" name="no_seri_produk" data-options="required:true"></input></td>
                            </tr>
                            <tr>
                                <td>NIS</td>
                                <td><input class="easyui-textbox" style="width:200px" type="text" id"no_nis_sales" name="no_nis_sales" data-options="required:true"></input></td> 
                            </tr>
                            <tr>
                                <td>Quantity:</td>
                                <td><input class="easyui-textbox" style="width:200px" type="text" id="quantity" name="quantity" data-options="required:true"></input></td>
                            </tr>
                            <tr>
                                <td>Nama Customer:</td>
                                <td><input class="easyui-textbox" style="width:200px" type="text" id"nama_customer" name="nama_customer" data-options="required:true"></input></td>  
                            </tr>
                            <tr>
                                <td>Alamat Customer:</td>
                                <td><input class="easyui-textbox" style="height:60px; width:200px" type="text" id="alamat_customer" name="alamat_customer" data-options="required:true, multiline:true"></input></td>
                            </tr>
                            <tr>
                                <td>Telp Customer:</td>
                                <td><input class="easyui-textbox" style="width:200px" type="text" id="telp_customer" name="telp_customer" data-options="required:true"></input></td>
                            </tr>
                            <tr>
                                <td>Cabang:</td>
                                <td><input class="easyui-textbox" style="width:120px"type="text" id="cabang" name="cabang" data-options="required:true"></input></td>
                            </tr>
                            <tr>
                                <td colspan=2><hr/>
                                    <div style="text-align:right;padding:5px">
                                    <input type="button" id="submit" value="Save" class="easyui-linkbutton" style="padding:5px;"/>
                                    <input type="button" id="update" value="Update" class="easyui-linkbutton" style="padding:5px;"/>
                                    <input type="button" id="reset" value="Reset" class="easyui-linkbutton" style="padding:5px;"/>
                                    </div>
                                </td>
                            </tr>
                         </table>
                    </form>
                </td>
                <td valign="top">
                    <table id="datagrid" class="easyui-datagrid" title="TABEL DATA PENJUALAN" style="width:880px;height:400px"
                            data-options="url:'models/viewDataPenjualan.php',method:'get'">
                    </table>
                    <div id="tb" style="padding:2px 5px;">
                    <a href="#" id="edit" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Edit</a>
                    <a href="#" id="delete" class="easyui-linkbutton" iconCls="icon-cancel" plain="true">Delete</a>
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
                </td>
            </table>
        </div>   
    </div>
	<br/>
    <script language="JavaScript">
        function doSearch(value,name){
            $('#datagrid').datagrid({
                url:'models/viewDataPenjualan.php?field='+name+'&keywords='+value,
                method:'get'
            });
        }
        var l = $('#loader');
        var s = $('#submit');
        var u = $('#update');
        var r = $('#reset');
        var f = $('#formPenjualan');
        var d = $('#delete');
        var e = $('#edit');
        $(document).ready(function(){   
            $('#datagrid').datagrid({
                url:'models/viewDataPenjualan.php',
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
            s.click(function(){
                valid = f.form('enableValidation').form('validate');
                if(valid){
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "models/inputDataPenjualan.php",
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
                        url: "models/updateDataPenjualan.php",
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
                $.messager.confirm("confirm", "Apakah anda ingin menghapus data Penjualan (SO : "+dg.no_so+" : Customer "+dg.nama_customer+") ?",function(r){
                    if(r){
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "models/deleteDataPenjualan.php?no_so="+dg.no_so,
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
                    //$.messager.alert("debug", dg.no_so+dg.tanggal_so+dg.no_seri_produk+dg.no_nis_sales+dg.quantity+dg.nama_customer+dg.alamat_customer+dg.telp_customer+dg.cabang);
                    f.form('load',{
                        no_so: dg.no_so,
                        tanggal_so: dg.tanggal_so,
                        no_seri_produk: dg.no_seri_produk,
                        no_nis_sales: dg.no_nis_sales,
                        quantity: dg.quantity,
                        nama_customer: dg.nama_customer,
                        alamat_customer: dg.alamat_customer,
                        telp_customer: dg.telp_customer,
                        cabang: dg.cabang
                    });
                }
            }); 
            r.click(function(){
                f.form('load',{
                    no_so: '',
                    tanggal_so: '',
                    no_seri_produk: '',
                    no_nis_sales: '',
                    quantity: '',
                    nama_customer: '',
                    alamat_customer: '',
                    telp_customer: '',
                    cabang: ''                
                });
            });    
        });
        function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
    </script>