<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <h3><?php echo $this->titulo ?></h3>
    <div id="tabla">
    <table align="center" class="tabForm">
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['IDUNIDAD_MEDIDA']))echo $this->datos[0]['IDUNIDAD_MEDIDA']?>"/></td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
        <tr>
            <td><label for="descripcion">Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese unidad de medida" required name="descripcion" onkeypress="return soloLetras(event)"
                       id="descripcion" value="<?php if(isset ($this->datos[0]['DESCRIPCION']))echo $this->datos[0]['DESCRIPCION']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="descripcion"></div>
            </td>
        </tr>
        <tr>
            <td><label for="abreviatura">Abreviatura:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese abreviatura" name="abreviatura" required
                       id="abreviatura" value="<?php if(isset ($this->datos[0]['ABREVIATURA']))echo $this->datos[0]['ABREVIATURA']?>"/></td>
            <td>
                <div class="k-invalid-msg msgerror" data-for="abreviatura"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p><button type="submit" class="k-button" id="saveform">Guardar</button>
                <a href="<?php BASE_URL ?>unidad_medida" class="k-button cancel">Cancelar</a></p>
            </td>
            <td>
                <div class="msgerror"></div>
            </td>
        </tr>
    </table>
    </div>
</form>