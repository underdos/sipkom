<h1><image src="image/icon slip komisi1.png" width="30px" height="30px" /> - CETAK SLIP KOMISI</h1><hr/>
<br/>   
     <div class="easyui-panel" data-options="collapsible:true" title="FORM CETAK SLIP KOMISI SALES" style="width:400; height:350px" >
        <table cellspacing=20>
            <tr>
                <td valign="top">
                    <form id="formSlipKomisi" name="formSlipKomisi" action="models/repCetakSlipKomisi.php" method="get" target="_blank" >
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
                                    <input type="submit" id="print" value="Print" class="easyui-linkbutton" style="padding:5px;"/>
                                    <input type="button" id="reset" value="Reset" class="easyui-linkbutton" style="padding:5px;"/>
                                    </div>
                                </td>
                            </tr>
                         </table>
                    </form>
                </td>
            </tr>
         </table>
    </div>
<script language="JavaScript">
$(document).ready(function(){   
    $('#reset').click(function(){
        $('#formSlipKomisi').form('load',{
            tanggal_so_begin : '',
            tanggal_so_end : '',
            cabang : ''
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