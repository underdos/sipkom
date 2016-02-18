<h1><image class="center-image" src="image/icon produk1.png" width="30px" height="30px" /> - PENDATAAN PRODUK</h1><hr/>
<br/>
        <div class="easyui-panel" data-options="collapsible:true" title="FORM DATA PRODUK" style="width:1300; height:auto">
            <div style="padding:10px 10px 20px 10px">
            <table cellspacing=20>
                <tr>
                <td valign="top">
                    <form id="formProduk" name="formProduk" >             
                        <table cellpadding="5">
                           <tr>
                                <td>No Seri:</td>
                                <td><input class="easyui-textbox" style="width:200px" type="text" id="no_seri" name="no_seri" data-options="required:true"></input></td>
                            </tr>
                            <tr>
                                <td>Nama Produk:</td>
                                <td><input class="easyui-textbox" style="width:200px" type="text" id="nama_produk" name="nama_produk" data-options="required:true,"></input></td>
                            </tr>
                            <tr>
                                <td>Harga:</td>
                                <td><input class="easyui-textbox" style="width:120px"type="text" id="harga" name="harga" data-options="required:true"></input></td>
                            </tr>
                            <tr>
                                <td>Persentase:</td>
                                <td><input class="easyui-textbox" style="width:50px"type="text" id="persentase" name="persentase" data-options="required:true"></input></td>
                            </tr>
                            <tr>
                                <td colspan=2><hr/>
                                <div style="text-align:right;padding:5px">
                                    <image id="loader" class="center-image" width="50px" height="50px" src="image/loaders.gif" />
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
                    <table id="datagrid" class="easyui-datagrid" title="TABEL DATA PRODUK" style="width:750px;height:430px" data-options="url:'models/viewDataProduk.php', method:'get'" /></table>   
                     <div id="tb" style="padding:2px 5px;">
                        <a href="#" id="edit" class="easyui-linkbutton" iconCls="icon-edit" plain="true">Edit</a>
                        <a href="#" id="delete" class="easyui-linkbutton" iconCls="icon-cancel" plain="true">Delete</a>
                        <div style="float:right" >
                            <input class="easyui-searchbox" data-options="prompt:'Please Input Value',menu:'#mm', searcher:doSearch" style="width:300px"></input>
                            <div id="mm">
                                <div data-options="name:'no_seri'">No Seri</div>
                                <div data-options="name:'nama_produk'">Nama Produk</div>
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
                url:'models/viewDataProduk.php?field='+name+'&keywords='+value,
                method:'get'
            });
        }
        var l = $('#loader');
        var s = $('#submit');
        var u = $('#update');
        var r = $('#reset');
        var f = $('#formProduk');
        var d = $('#delete');
        var e = $('#edit');
        $(document).ready(function(){   
            $('#datagrid').datagrid({
                url:'models/viewDataProduk.php',
                method:'get',
                pagination:true,
                rownumbers:true,
                singleSelect:true,
                toolbar:'#tb',
                columns:[
                    [
                        {field:'no_seri', title:'No Seri', width:130, align:'center'},
                        {field:'nama_produk', title:'Nama Produk', width:300, align:'left'},
                        {field:'harga', title:'Harga', width:130, align:'right', formatter:function(value,rowData,rowIndex){return value + ""}},
                        {field:'persentase', title:'Persentase', width:130, align:'center'},
                    ]
                ]
            }); 
            s.click(function(){
                valid = f.form('enableValidation').form('validate');
                if(valid){
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "models/inputDataProduk.php",
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
                        url: "models/updateDataProduk.php",
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
                $.messager.confirm("confirm", "Apakah anda ingin menghapus data Produk ("+dg.no_seri+" : "+dg.nama_produk+") ?",function(r){
                    if(r){
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: "models/deleteDataProduk.php?no_seri="+dg.no_seri,
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
                        no_seri: dg.no_seri,
                        nama_produk: dg.nama_produk,
                        harga: dg.harga,
                        persentase: dg.persentase
                    });
                }
            }); 
            r.click(function(){
                f.form('load',{
                    no_seri: '',
                    nama_produk: '',
                    harga: '',
                    persentase: ''                  
                });
            });
        });
    </script>