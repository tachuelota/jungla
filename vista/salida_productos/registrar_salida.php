<form method="post" action="<?php if(isset ($this->action))echo $this->action ?>">
    <h3><?php echo $this->titulo ?></h3>
    <input type="hidden" name="guardar" id="guardar" value="1"/>
    <table>
        <tr>
            <td><label>Motivo:</label></td>
            <td>
                <select class="combo" placeholder="Selecciona" id="motivo">
                    <option></option>
                    <option value="2">Pedido</option>
                    <option value="3">Perdida</option>
                </select>
            </td>
            <td><label>Producto:</label></td>
            <td>
                <input type="hidden" id="idproducto" value=""/>
                <input type="text" class="k-textbox" placeholder="Busque producto" readonly="readonly"  id="producto" 
            </td>
            <td>
                <button type="button" class="k-button" id="btn_vtna_productos"><span class="k-icon k-i-search"></span></button>
            </td>
        </tr>
        <tr>
            <td><label>Unidad de Medida:</label></td>
            <td>
                <input type="text" class="k-textbox" id="unidad_medida" placeholder="Unidad Medida" readonly="readonly"/>
            </td>
            <td><label>Cantidad:</label></td>
            <td colspan="2">
                <input type="text" class="cantidad" placeholder="Ingrese cantidad" id="cantidad" />
            </td>
        </tr
        <tr>
            <td colspan="5" align="center"><input type="button" class="k-button" value="Agregar" id="asignar_producto"/></td>
        </tr>
        <tr>
            <td colspan="5">
                <table border="1" class="tabgrilla" id="tbl_detalle_salida_producto">
                    <tr>
                        <th>Item</th>
                        <th>Motivo</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Unidad de Medida</th>
                        <th>Accion</th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="5" align="center">
                <p>
                    <button type="submit" class="k-button">Guardar</button>
                    <a href="<?php echo BASE_URL ?>salida_productos" class="k-button cancel">Cancelar</a>
                </p>
            </td>
        </tr>
    </table>
</form>


<div id="vtna_busca_productos">
    <h3>Lista de Productos</h3>
    <p>
        <select class="combo" id="filtro_productos">
            <option value="0">Descripcion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 40%" id="txt_buscar_productos">
        <button type="button" class="k-button" id="btn_buscar_producto"><span class="k-icon k-i-search"></span></button>
        <a class="k-button cancela_prod cancel">Cancelar</a>
    </p>
    <div id="grilla_productos">
    <table border="1" class="tabgrilla" id="tbl_busca_productos">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Unidad Medida</th>
            <th>Selecciona</th>
        </tr>
        <?php for ($i = 0; $i < count($this->datos_productos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos_productos[$i]['idproducto'] ?></td>
                <td><?php echo $this->datos_productos[$i]['descripcion'] ?></td>
                <td><?php echo $this->datos_productos[$i]['um'] ?></td>
                <td><a href="javascript:void(0)" onclick="seleccionar_productos('<?php echo $this->datos_productos[$i]['idproducto'] ?>','<?php echo utf8_encode($this->datos_productos[$i]['descripcion']) ?>','<?php echo $this->datos_productos[0]['um']?>')" class="imgselect"></a></td>
            </tr>
        <?php } ?>
    </table>
    </div>
</div>
<div id="fondooscuro"></div>
    