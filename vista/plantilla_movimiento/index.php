<?php if (isset($this->datos) && count($this->datos)) { ?>
<p><h3>Lista de la Plantilla Movimiento</h3></p>
    <p>
        <select class="list" id="filtro">
            <option value="0">Descripcion</option>
            <option value="1">Cuenta</option>
            <option value="2">Concepto Movimiento</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>plantilla_movimiento/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Cuenta</th>
            <th>Concepto Movimiento</th>
            <th>Debe/Haber</th>
            <th>Acciones</th>
        </tr>

        <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['IDPLANTILLA_MOVIMIENTO'] ?></td>
                <td><?php echo $this->datos[$i]['DESCRIPCION'] ?></td>
                <td><?php echo $this->datos[$i]['XNRO_CUENTA'].':'.$this->datos[$i]['CUENTA'] ?></td>
                <td><?php echo $this->datos[$i]['CONCEPTO'] ?></td>
                <td><?php echo $this->datos[$i]['DEBE_HABER'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>plantilla_movimiento/editar/<?php echo $this->datos[$i]['IDPLANTILLA_MOVIMIENTO'] ?>')" class="imgedit"></a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>plantilla_movimiento/eliminar/<?php echo $this->datos[$i]['IDPLANTILLA_MOVIMIENTO'] ?>')" class="imgdelete"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay Plantillas Movimientos</p>
        <a href="<?php echo BASE_URL?>plantilla_movimiento/nuevo" class="k-button">Nuevo</a>
    <?php } ?>