<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Ventas</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Nro Comprobante</option>
            <option value="1">Cliente</option>
            <option value="2">Empleado</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>ventas/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Tipo de Transaccion</th>
            <th>Nro.Comprobante</th>
            <th>Cliente</th>
            <th>Fecha de Venta</th>
            <th>Empleado</th>
            <th>Acciones</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['idventa'] ?></td>
                <td><?php echo $this->datos[$i]['tipo'] ?></td>
                <td><?php echo $this->datos[$i]['nro_documento'] ?></td>
                <td><?php echo $this->datos[$i]['cliente'] ?></td>
                <td><?php echo $this->datos[$i]['fecha_venta'] ?></td>
                <td><?php echo $this->datos[$i]['empleado'] ?></td>
                <td>
                    <a href="javascript:void(0)" class="imgview" onclick="ver('<?php echo $this->datos[$i]['idventa'] ?>')"></a>  
                </td>
            </tr>
        <?php } ?>
</table>
    </div>
    <?php } else { ?>
        <p>No hay ventas</p>
        <p><a href="<?php echo BASE_URL?>ventas/nuevo" class="k-button">Nuevo</a></p>
    <?php } ?>
<div id="vtna_ver_venta"></div>
<div id="fondooscuro"></div>