$(document).ready(function(){
    $("#fecha_compra").kendoDatePicker({
       format: "dd-MM-yyyy"
    });
    $("#nro_comprobante").focus();
    $("#tbl_busca_proveedor").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    $("#tbl_busca_productos").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    $("#tbl_detalle_compra").kendoGrid();
    if($("#tipo_transaccion :selected").val()==2){
        $("#celda_credito").show();
    }else{
        $("#celda_credito").hide();
    }
    $("#tipo_transaccion").change(function(){
        if($(this).val()==2){
            $("#celda_credito").show();
        }else{
            $("#celda_credito").hide();
        }
    });
    a=0;
    imp=0;
    $("#tbl_detalle_compra tr").each(function(){
        if(!isNaN(parseFloat($("#tbl_detalle_compra tr:eq("+a+") td:eq(5)").html()))){
            imp += parseFloat($("#tbl_detalle_compra tr:eq("+a+") td:eq(5)").html());
        }
        a++;
    });
    $("#importe").val(imp);
    tot= (1 + parseFloat($("#igv").val())) * parseFloat($("#importe").val());
    tot=tot.toFixed(2);
    $("#total").val(tot);
    //ventana de busqueda de proveedores
    $("#btn_vtna_proveedores").click(function(){
        buscar_proveedor();
        $("#vtna_busca_proveedor").fadeIn(300);
        $("#fondooscuro").fadeIn(300);
        $("#txt_buscar_proveedor").focus();
    }); 
    function salir(){
        $("#vtna_busca_proveedor").fadeOut(300);
        $("#txt_buscar_productos").val('');
        $("#vtna_busca_productos").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
     $(".cancela_prov").click(function(){
         salir();
    });
    document.onkeydown = function(evt) {
        evt = evt || window.event;
        if (evt.keyCode == 27) {
            salir();
        }
    };
        
    
    $("#txt_buscar_proveedor").keypress(function(event){
       if(event.which == 13){
           buscar_proveedor();
       } 
    });
    
    $("#btn_buscar_proveedor").click(function(){
        buscar_proveedor();
        $("#txt_buscar_proveedor").focus();
    });
    
    function buscar_proveedor(){
        $.post('/jungla/proveedores/buscador','cadena='+$("#txt_buscar_proveedor").val()+'&filtro='+$("#filtro_proveedor").val(),function(datos){
            HTML = '<table border="1" class="tabgrilla" id="tbl_busca_proveedor" width="500px">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Razon Social</th>'+
                            '<th>Representante</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].IDPROVEEDOR+'</td>';
                HTML = HTML + '<td>'+datos[i].RAZON_SOCIAL+'</td>';
                HTML = HTML + '<td>'+datos[i].REPRESENTANTE+'</td>';
                id=datos[i].IDPROVEEDOR;
                proveedor=datos[i].RAZON_SOCIAL;
                HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar(\''+id+'\',\''+proveedor+'\')" class="imgselect"></a></td>';
                HTML = HTML + '</tr>';
            }
            HTML += '</table>';
            $("#grilla_proveedores").html(HTML);
            $("#tbl_busca_proveedor").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true
                });
            
        },'json');        
    }
    //ventana de busqueda de productos
    $("#btn_vtna_productos").click(function(){
            buscar_producto();
            $("#vtna_busca_productos").fadeIn(300);
            $("#fondooscuro").fadeIn(300);
            $("#txt_buscar_productos").focus();
    });
    
     $(".cancela_prod").click(function(){
            salir();
        });
    document.onkeydown = function(evt) {
        evt = evt || window.event;
        if (evt.keyCode == 27) {
            salir();
        }
    };
    
    $("#txt_buscar_productos").keypress(function(event){
       if(event.which == 13){
           buscar_producto();
       } 
    });
    
    $("#btn_buscar_producto").click(function(){
        buscar_producto();
        $("#txt_buscar_productos").focus();
    });
    
    function buscar_producto(){
        $.post('/jungla/productos/buscador','cadena='+$("#txt_buscar_productos").val()+'&filtro='+$("#filtro_productos").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla" id="tbl_busca_productos">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Unidad Medida</th>'+
                            '<th>Seleccionar</th>'+
                        '</tr>';
            for(var i=0;i<datos.length;i++){
                
                HTML = HTML + '<tr>';
                HTML = HTML + '<td>'+datos[i].IDPRODUCTO+'</td>';
                HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                HTML = HTML + '<td>'+datos[i].UM+'</td>';
                id=datos[i].IDPRODUCTO;
                producto=datos[i].DESCRIPCION;
                um=datos[i].UM;
                HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_productos(\''+id+'\',\''+producto+'\',\''+um+'\')" class="imgselect"></a></td>';
                HTML = HTML + '</tr>';
            }            
            HTML = HTML + '</table>'
                $("#grilla_productos").html(HTML);
                $("#tbl_busca_productos").kendoGrid({
                    dataSource: {
                        pageSize: 7
                    },
                    pageable: true
                });
        },'json');        
    }
    
    //asignacion de productos al detalle
    item = $("#tbl_detalle_compra tr:last td:eq(0)").html();
    importe = parseFloat($("#importe").val());
    $("#asignar_producto").click(function(){
        idc=$("#codigo").val();
        idp=$("#idproducto").val();
        pro=$("#producto").val();
        um=$("#unidad_medida").val();
        c=$("#cantidad").val();
        pre=$("#precio").val();
        igv = parseFloat($("#igv").val());
        error=false;
        msg='';
        if(pro == ""){
            alert("Seleccione un producto");
        }
        else{
            if(c == "" || c == 0){
                alert("Ingrese cantidad");
                $(".cantidad").focus();
            }
            else{
                if(pre == ""){
                    alert("Ingrese precio");
                    $(".precio").focus();
                }
                else{
                    x=0;
                    $("#tbl_detalle_compra tr").each(function(){
                        id_p=$("#tbl_detalle_compra tr:eq("+x+") td:eq(1) :hidden").val();
                        if(id_p==idp){
                            error=true;
                            msg='este producto ya fue seleccionado';
                        }
                        x++;
                    });

                    if(error){
                        alert(msg);
                    }else{
                        $.post('/jungla/compras/insertar_detalle_compra','idcompra='+idc+'&idprodutos='+idp+'&cantidad='+c+'&precio='+pre);
                        item++;
                        html = '<tr>';
                        html +='<td>'+item+'</td>';
                        html +='<td><input type="hidden" value="'+idp+'" name="idprodutos[]"/>'+pro+'</td>';
                        html +='<td>'+um+'</td>';
                        html +='<td>'+c+'</td>';
                        html +='<td>'+pre+'</td>';
                        st=pre*c;
                        html +='<td>'+st+'</td>';
                        html +='<td><a href="javascript:void(0)" class="imgdelete eliminar"></a></td>';
                        html +='</tr>';

                        importe += st;
                        t = importe + igv * (importe);
                        $("#importe").val(importe);
                        $("#total").val(t);

                        $("#tbl_detalle_compra").append(html);
                        $("#unidad_medida").val('');
                        $("#producto").val('');
                        $(".cantidad").val('');
                        $(".precio").val('');
                        $("#txt_buscar_productos").val('');
                    }
                }
            }
        }
    });

    $("#igv").blur(function(){
        if($(this).val()==''){
            igv=0;
        }else{
            igv=$("#igv").val();
        }
        t = importe + igv * (importe);
        $("#total").val(t);
    });
    
    $("#igv").keypress(function(event){
        if(event.which == 13){
            $("#igv").blur();
            event.preventDefault();
        }
    });
    
    $(".eliminar").live('click', function() {
       i = $(this).parent().parent().index();
       idc=$("#codigo").val();
       idp=$("#tbl_detalle_compra tr:eq("+i+") td:eq(1) .producto").val();
       $.post('/jungla/compras/eliminar_detalle_compra','idcompra='+idc+'&idprodutos='+idp);
       importe=importe-$("#tbl_detalle_compra tr:eq("+i+") td:eq(5)").html();
       $("#tbl_detalle_compra tr:eq("+i+")").remove();
       item=0;       
       x=0;
       $("#tbl_detalle_compra tr").each(function(){
           item++;
           $("#tbl_detalle_compra tr:eq("+x+") td:eq(0)").html(item);
           x++;
       });
       $("#importe").val(importe);
       $("#igv").blur();
   });
   
});
function seleccionar(id,proveedor){
    $("#idproveedor").val(id);
    $("#proveedor").val(proveedor);
    $("#vtna_busca_proveedor").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}

function seleccionar_productos(id,producto,um){
    $("#idproducto").val(id);
    $("#producto").val(producto);
    $("#unidad_medida").val(um);
    $("#vtna_busca_productos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
}