    $(function(){
        var obj= new estilos_vistas();
        obj.kendo_grilla();
        $( "#buscar" ).focus();
        
        function buscar(){
            $.post('/jungla/membresia/buscador','descripcion='+$("#buscar").val()+'&filtro='+$("#filtro").val(),function(datos){
                HTML = '<table border="1" class="tabgrilla">'+
                        '<tr>'+
                            '<th>Codigo</th>'+
                            '<th>Descripcion</th>'+
                            '<th>Acciones</th>'+
                        '</tr>';

                for(var i=0;i<datos.length;i++){
                    HTML = HTML + '<tr>';
                    HTML = HTML + '<td>'+datos[i].IDMEMBRESIA+'</td>';
                    HTML = HTML + '<td>'+datos[i].DESCRIPCION+'</td>';
                    var editar='/jungla/membresia/editar/'+datos[i].IDMEMBRESIA; 
                    var eliminar='/jungla/membresia/eliminar/'+datos[i].IDMEMBRESIA;   
                    HTML = HTML + '<td> <a href="javascript:void(0)" onclick="editar(\''+editar+'\')" class="imgedit"></a>';
                    HTML = HTML + '<a href="javascript:void(0)" onclick="eliminar(\''+eliminar+'\')" class="imgdelete"></a>';
                    HTML = HTML + '</td>';
                    HTML = HTML + '</tr>';
                }
                HTML = HTML + '</table>'
                $("#grilla").html(HTML);
                var obj= new estilos_vistas();
                obj.kendo_grilla();
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
        
    });