    $(function(){
        $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 5
                    },
                    pageable: true,
                    columns: [{field:"Codigo", width:6},
                        {field:"RazonSocial", width:10},
                        {field:"Representante", width:10},
                        {field:"RUC", width:10},
                        {field:"Direccion", width:10},
                        {field:"Telefono", width:10},
                        {field:"Email", width:10},
                        {field:"Acciones", width:8}]
                });
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/sisjungla/proveedores/buscador','cadena='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Razon Social</th>'+
                            '<th>Representante</th>'+
                            '<th>RUC</th>'+
                            '<th>Direccion</th>'+
                            '<th>Telefono</th>'+
                            '<th>Email</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].idproveedor+'</td>';
                    HTML = HTML + '<td>'+datos[i].razon_social+'</td>';
                    HTML = HTML + '<td>'+datos[i].representante+'</td>';
                    HTML = HTML + '<td>'+datos[i].ruc+'</td>';
                    HTML = HTML + '<td>'+datos[i].direccion+'</td>';
                    HTML = HTML + '<td>'+datos[i].telefono+'</td>';
                    HTML = HTML + '<td>'+datos[i].email+'</td>';
                    var editar='/sisjungla/proveedores/editar/'+datos[i].idproveedor; 
                    var eliminar='/sisjungla/proveedores/eliminar/'+datos[i].idproveedor;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" class="imgview"></a>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                $(".tabgrilla").kendoGrid({
                    dataSource: {
                        pageSize: 5
                    },
                    pageable: true,
                    columns: [{field:"Codigo", width:6},
                        {field:"RazonSocial", width:10},
                        {field:"Representante", width:10},
                        {field:"RUC", width:10},
                        {field:"Direccion", width:10},
                        {field:"Telefono", width:10},
                        {field:"Email", width:10},
                        {field:"Acciones", width:8}]
                });
            },'json');
        }
        $("#buscar").keypress(function(event){
           if(event.which == 13){
               buscar();
           } 
        });
        
        $("#btn_buscar").click(function(){
            buscar();
            $("#buscar").focus();
        });
       
       //ver proveedores
       $("#vtna_ver_proveedor").hide();
       $("#aceptar").live('click',function(){
           $("#vtna_ver_proveedor").hide("slow");
       });
       $(".ver").click(function(){
           i = $(this).parent().parent().index();
           idp=$("#tbl_proveedores tr:eq("+i+") td:eq(0)").html();
           $.post('/sisjungla/proveedores/ver','idproveedor='+idp,function(datos){
               html= '<h3>Datos del Proveedor "'+datos[0]['razon_social']+'"</h3>';
               html+='<table>';
               html+= '<tr>';
               html+= '<td>Razon Social:</td>';
               html+= '<td>'+datos[0]['razon_social']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Representante:</td>';
               html+= '<td>'+datos[0]['representante']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Ruc:</td>';
               html+= '<td>'+datos[0]['ruc']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Telefono:</td>';
               html+= '<td>'+datos[0]['telefono']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<tr>';
               html+= '<td>Ciudad:</td>';
               html+= '<td>'+datos[0]['ubigeo']+'</td>';
               html+= '</tr>';
               html+= '<td>Direccion:</td>';
               html+= '<td>'+datos[0]['direccion']+'</td>';
               html+= '</tr>';
               html+= '<tr>';
               html+= '<td>Email:</td>';
               html+= '<td>'+datos[0]['email']+'</td>';
               html+= '</tr>';
               html+= '</table>';
               html+= '<p><input type="button" class="k-button" value="Aceptar" id="aceptar"/></p>';
               $("#vtna_ver_proveedor").html(html);
               $("#vtna_ver_proveedor").show();
           },'json');
       });
       
    });