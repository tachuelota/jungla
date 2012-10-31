<script type="text/javascript">
    $(function() {    
    $( "#descripcion" ).focus(); 
    $( "#saveform" ).click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required();      
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});
</script>
<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center" class="tabForm">
        <caption><h3><?php echo $this->titulo ?></h3></caption>
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idservicio']))echo $this->datos[0]['idservicio']?>"/></td>
        </tr>
        <tr>
            <td><label>Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese servicio" required name="descripcion" onkeypress="return soloLetras(event)"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php echo BASE_URL ?>servicios" class="k-button">Cancelar</a></p>
            </td>
        </tr>
    </table>
</form>
<style type="text/css">
  .tildado{
    width:300px;
  }
</style>
<script type="text/javascript">
  $(function(){
      $('input[type="radio"]').on('click',function(){
       $('input[type="radio"].tildado').removeClass('tildado');
        $(this).addClass('tildado');
    });
  });
  </script>
        <p><label for="radio1">Opcion 1</label><input type="radio" id="radio1" name="radiogrupo" /></p>
        <p><label for="radio2">Opcion 2</label><input type="radio" id="radio2" name="radiogrupo" /></p>