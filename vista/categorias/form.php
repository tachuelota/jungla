<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>" id="frm">
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table width="50%" align="center" class="tabForm">
        <caption><h3><?php echo $this->titulo ?></h3></caption>
        <tr>
            <td><label>Codigo:</label></td>
            <td><input type="text" class="k-textbox" readonly="readonly" name="codigo" id="codigo"
                       value="<?php if(isset ($this->datos[0]['idcategoria']))echo $this->datos[0]['idcategoria']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Descripcion:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese descripcion" required name="descripcion"
                   id="" value="<?php if(isset ($this->datos[0]['descripcion']))echo $this->datos[0]['descripcion']?>"/>
            </td>
        </tr>
        <tr>
            <td><label>Nro.Elemento:</label></td>
            <td><input type="text" class="k-textbox" placeholder="Ingrese nro. elemento" required name="nro_elemento"
                   id="" value="<?php if(isset ($this->datos[0]['nro_elemento']))echo $this->datos[0]['nro_elemento']?>"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <p>
                    <button type="submit" class="k-button save">Guardar</button>
                    <a href="<?php echo BASE_URL ?>categorias" class="k-button">Cancelar</a>
                </p>
            </td>
        </tr>
    </table>
</form>