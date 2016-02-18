<h1><image src="image/icon laporan komisi1.png" width="30px" height="30px" /> - LAPORAN KOMISI SALES</h1><hr/>
<br/>   
     <div class="easyui-panel" data-options="collapsible:true" title="LAPORAN KOMISI SALES" style="width:1300; height:450px">
        <table cellspacing=20>
            <tr>
            <td valign="top">
                <form id="formKomSales" name="formKomSales" action="models/repLapKomSales.php" method="get" target="_blank">
                    <table cellpadding="5" style="width:350">
                        <tr>
                            <td>PERIODE KOMISI :</td>
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
                                <input type="button" id="submit" onClick="viewDataKomSales()" value="View" class="easyui-linkbutton" style="padding:5px;"/>
                                <input type="submit" id="print" value="Print" class="easyui-linkbutton" style="padding:5px;"/>
                                <input type="button" id="reset" value="Reset" class="easyui-linkbutton" style="padding:5px;"/>
                                </div>
                            </td>
                        </tr>
                     </table>
                </form>
            </td>
            <td valign="top">
                <table id="datagrid" class="easyui-datagrid" title="TABEL KOMISI SALES" style="width:880px;height:auto;max-height:400px"
                        data-options="url:'models/viewDataPenjualan.php',method:'get'">
                </table>
            </td>
        </table> 
    </div>
	<br/>
    <script language="JavaScript">
        $(document).ready(function(){   
            $('#datagrid').datagrid({
                url:'models/viewLapKomSales.php',
                method:'get',
                rownumbers:true,
                showFooter:true,
                singleSelect:true,
                columns:[
                    [
                        {field:'nis', title:'NIS', width:110, align:'center'},
                        {field:'nama', title:'Nama Sales', width:300, align:'center'},
                        {field:'total_so', title:'Jumlah SO', width:100, align:'center'},
                        {field:'komisi', title:'Komisi', width:150, align:'center'},
                    ]
                ]
            }); 
            $('#reset').click(function(){
                $('#formKomSales').form('load',{
                    tanggal_so_begin : '',
                    tanggal_so_end : '',
                    cabang : ''
                });
            });
        });   
        function viewDataKomSales(){
            var tanggal_so_begin = $('#tanggal_so_begin').datebox('getValue');
            var tanggal_so_end = $('#tanggal_so_end').datebox('getValue');
            var cabang = $('#cabang').textbox('getValue');
            //alert(tanggal_so_begin+tanggal_so_end+cabang);
            $('#datagrid').datagrid({
                showFooter:true,                
                url:'models/viewLapKomSales.php?begin='+tanggal_so_begin+'&end='+tanggal_so_end+'&cabang='+cabang,
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