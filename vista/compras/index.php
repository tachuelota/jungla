<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Compras</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nro.Comprobante</option>
            <option value="1">Proveedor</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>compras/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Nro.Comprobante</th>
            <th>Proveedor</th>
            <th>Fecha de Compra</th>
            <th>Importe</th>
            <th>IGV</th>
            <th>Total</th>
            <th>Tipo de Transaccion</th>
            <th>Acciones</th>
        </tr>
<?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['IDCOMPRA'] ?></td>
                <td><?php echo $this->datos[$i]['NRO_COMPROBANTE'] ?></td>
                <td><?php echo $this->datos[$i]['PROVEEDOR'] ?></td>
                <td><?php echo $this->datos[$i]['C_FECHA_COMPRA'] ?></td>
                <td><?php echo $this->datos[$i]['IMPORTE'] ?></td>
                <td><?php echo $this->datos[$i]['IGV'] ?></td>
                <td><?php echo $this->datos[$i]['IMPORTE'] * ($this->datos[$i]['IGV'] + 1) ?></td>
                <td><?php echo $this->datos[$i]['TIPO'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>compras/editar/<?php echo $this->datos[$i]['IDCOMPRA'] ?>')" class="imgedit"></a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>compras/eliminar/<?php echo $this->datos[$i]['IDCOMPRA'] ?>')" class="imgdelete"></a>
                    <a href="javascript:void(0)" onclick="ver('<?php echo $this->datos[$i]['IDCOMPRA'] ?>')" class="imgview"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay compras</p>
        <a href="<?php echo BASE_URL?>compras/nuevo" class="k-button">Nuevo</a>
    <?php } ?>
<div id="vtna_ver_compra"></div>
<div id="fondooscuro"></div>