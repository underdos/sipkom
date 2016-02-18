<h1><image src="image/icon laporan so penjualan1.png" width="30px" height="30px" /> - LAPORAN SO PENJUALAN</h1><hr/>
<br/>   
     <div class="easyui-panel" data-options="collapsible:true" title="FORM PENARIKAN DATA SO PENJUALAN" style="width:1300; height:auto">
        <div >
            <table cellspacing=20>
                <tr>
                <td valign="top">
                    <form id="formLapPenjualan" name="formLapPenjualan" action="models/repLapSOPenjualan.php" method="get" target="_blank">
                        <table cellpadding="5" style="width:350">
                            <tr>
                                <td>Tanggal SO :</td>
                            </tr>
                            <tr>
                                <td>
                                    from 
                                    <input class="easyui-datebox" data-options="formatter:myformatter, parser:myparser, requrired:true" style="width:130px" type="text" id="tanggal_so_begin" name="tanggal_so_begin" ></input>
                                     to 
                                    <input class="easyui-datebox" data-options="formatter:myformatter, parser:myparser, requrired:true" style="width:130px" type="text" id="tanggal_so_end" name="tanggal_so_end" ></input> 
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>                           
                            <tr>
                                <td>Cabang : <input class="easyui-textbox" style="width:120px" type="text" id="cabang" name="cabang" data-options="required:true"></input></td>
                            </tr>

                            <tr>
                                <td colspan=2><hr/>
                                    <div style="text-align:right;padding:5px">
                                    <input type="button" id="submit" onClick="viewDataPenjualan()" value="View" class="easyui-linkbutton" style="padding:5px;"/>
                                    <input type="submit" id="print" value="Print" class="easyui-linkbutton" style="padding:5px;"/>
                                    <input type="button" id="reset" value="Reset" class="easyui-linkbutton" style="padding:5px;"/>
                                    </div>
                                </td>
                            </tr>
                         </table>
                    </form>
                </td>
                <td valign="top">
                    <table id="datagrid" class="easyui-datagrid" title="TABEL DATA SO PENJUALAN" style="width:880px;height:400px"
                            data-options="url:'models/viewDataPenjualan.php',method:'get'">
                    </table>
                </td>
            </table>
        </div>   
    </div>
	<br/>
    <script language="JavaScript">
        $(document).ready(function(){ 
            $('#datagrid').datagrid({
                url:'models/viewLapSOPenjualan.php',
                method:'get',
                rownumbers:true,
                singleSelect:true,
                toolbar:'#tb',
                columns:[
                    [
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
            $('#reset').click(function(){
                $('#formLapPenjualan').form('load',{
                    tanggal_so_begin : '',
                    tanggal_so_end : '',
                    cabang : ''
                });
            });
        });          
        function viewDataPenjualan(){
            var tanggal_so_begin = $('#tanggal_so_begin').datebox('getValue');
            var tanggal_so_end = $('#tanggal_so_end').datebox('getValue');
            var cabang = $('#cabang').textbox('getValue');
            //alert(tanggal_so_begin+tanggal_so_end+cabang);
            $('#datagrid').datagrid({
                url:'models/viewLapSOPenjualan.php?begin='+tanggal_so_begin+'&end='+tanggal_so_end+'&cabang='+cabang,
                method:'get'
            });
        }
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