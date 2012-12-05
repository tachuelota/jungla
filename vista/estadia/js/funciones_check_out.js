$(document).ready(function(){
    $("#tbl_busca_productos").kendoGrid({
        dataSource: {
            pageSize: 7
        },
        pageable: true
    });
    $("#tbl_detalle_venta").kendoGrid();
    $("#vtna_busca_clientes").hide();
    $("#vtna_busca_clientes_juridicos").hide();
    
    //ventana de busqueda de clientes
    $("#btn_vtna_clientes").click(function(){
        buscar_cliente();
        if($("#tipo_comprobante").val()==55){
            $("#vtna_busca_clientes").fadeIn(300);
            $("#txt_buscar_clientes").focus();
        }else{
            $("#vtna_busca_clientes_juridicos").fadeIn(300);
            $("#txt_buscar_clientes_juridicos").focus();
        }
        $("#fondooscuro").fadeIn(300);
    });
    
     $(".cancela_cli").click(function(){
        salir();
    });
    
    $("#txt_buscar_clientes").keypress(function(event){
       if(event.which == 13){
           buscar_cliente();
       } 
    });
    
    $("#btn_buscar_cliente").click(function(){
        buscar_cliente();
        $("#txt_buscar_clientes").focus();
    });
    
    function buscar_cliente(){
        if($("#tipo_comprobante").val()==55){
            $.post('/sisjungla/clientes/buscador','cadena='+$("#txt_buscar_clientes").val()+'&filtro='+$("#filtro_clientes").val(),function(datos){
                    HTML = '<table border="1" class="tabgrilla" id="tbl_busca_clientes">'+
                            '<tr>'+
                                '<th>Codigo</th>'+
                                '<th>Nombre/Razon Social</th>'+
                                '<th>DNI/RUC</th>'+
                                '<th>Direccion</th>'+
                                '<th>Seleccionar</th>'+
                            '</tr>';
                for(var i=0;i<datos.length;i++){
                    id=datos[i].idcliente;
                    if(datos[i].apellidos != null){
                        cliente=datos[i].nombres+' '+datos[i].apellidos;
                    }else{
                        cliente=datos[i].nombres;
                    }
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+id+'</td>';
                    HTML = HTML + '<td>'+cliente+'</td>';
                    HTML = HTML + '<td>'+datos[i].documento+'</td>';
                    HTML = HTML + '<td>'+datos[i].direccion+'</td>';
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_cliente(\''+id+'\',\''+cliente+'\')" class="imgselect"></a></td>';
                    HTML = HTML + '</tr>';
                }            
                HTML = HTML + '</table>'
                    $("#grilla_clientes").html(HTML);
                    $("#tbl_busca_clientes").kendoGrid({
                        dataSource: {
                            pageSize: 7
                        },
                        pageable: true
                    });
            },'json');        
        }else{
            $.post('/sisjungla/clientes/buscador','cadena='+$("#txt_buscar_clientes_juridicos").val()+'&filtro='+$("#filtro_clientes_juridicos").val(),function(datos){
                    HTML = '<table border="1" class="tabgrilla" id="tbl_busca_clientes_juridicos">'+
                            '<tr>'+
                                '<th>Codigo</th>'+
                                '<th>Razon Social</th>'+
                                '<th>RUC</th>'+
                                '<th>Direccion</th>'+
                                '<th>Seleccionar</th>'+
                            '</tr>';
                for(var i=0;i<datos.length;i++){
                    id=datos[i].idcliente;
                    cliente=datos[i].nombres;
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+id+'</td>';
                    HTML = HTML + '<td>'+cliente+'</td>';
                    HTML = HTML + '<td>'+datos[i].documento+'</td>';
                    HTML = HTML + '<td>'+datos[i].direccion+'</td>';
                    HTML = HTML + '<td><a href="javascript:void(0)" onclick="seleccionar_cliente(\''+id+'\',\''+cliente+'\')" class="imgselect"></a></td>';
                    HTML = HTML + '</tr>';
                }            
                HTML = HTML + '</table>'
                    $("#grilla_clientes_juridicos").html(HTML);
                    $("#tbl_busca_clientes_juridicos").kendoGrid({
                        dataSource: {
                            pageSize: 7
                        },
                        pageable: true
                    });
            },'json');
        }
    }
    
    //ventana de busqueda de productos
    function salir(){
        $("#txt_buscar_productos").val('');
        $("#vtna_busca_productos").fadeOut(300);
        $("#txt_buscar_paquetes").val('');
        $("#vtna_busca_paquetes").fadeOut(300);
        $("#txt_buscar_clientes").val('');
        $("#vtna_busca_clientes").fadeOut(300);
        $("#txt_buscar_clientes_juridicos").val('');
        $("#vtna_busca_clientes_juridicos").fadeOut(300);
        $("#fondooscuro").fadeOut(300);
    }
    importe = parseFloat($("#importe").val());
    $("#descuento").blur(function(){
        $("#igv").blur();
    });
    
    $("#descuento").keypress(function(event){
        if(event.which == 13){
            $("#igv").blur();
            event.preventDefault();
        }
    });
    
    $("#igv").blur(function(){
        if($(this).val()==''){
            igv=0;
        }else{
            igv=$("#igv").val();
        }
        if($("#descuento").val()==''){
            desc=0;
        }else{
            desc= $("#descuento").val();
        }
        t = importe + igv * (importe) - desc;
        $("#total").val(t);
    });
    
    $("#igv").keypress(function(event){
        if(event.which == 13){
            $("#igv").blur();
            event.preventDefault();
        }
    });
});

function seleccionar_cliente(id,cliente){
    $("#idcliente").val(id);
    $("#cliente").val(cliente);
    $("#vtna_busca_clientes").fadeOut(300);
    $("#vtna_busca_clientes_juridicos").fadeOut(300);
    $("#fondooscuro").fadeOut(300);
    
}

function validarVenta(){
    des = $( "#tipo_transaccion" ).val();
    fv = $( "#fecha_vencimiento" ).val();
    id = $( "#intervalo_dias" ).val();
    if(des == 2){
        if(fv == ""){
            alert("Seleccione fecha de vencimiento");
            return false;
        }
        else{
            if(id == ""){
                alert("Seleccione intervalo de dias");
                return false;
            }
            else return true;
        }
    }
    else return true;
}