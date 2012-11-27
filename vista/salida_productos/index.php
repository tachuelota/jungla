<?php if (isset($this->datos) && count($this->datos) ){ ?>
<h3>Salida de productos</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Producto</option>
            <option value="1">Empleado</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>salida_productos/registrar_salida" class="k-button">Registrar Salida</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla" id="tbl_empleado">
        <tr>
            <th>Empleado</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Fecha</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
        <?php if($this->datos[$i]['idtipo_movimiento'] != 1){ ?>
        <tr>
            <td><?php echo $this->datos[$i]['empleados_n'].' '.$this->datos[$i]['empleados_a'] ?></td>
            <td><?php echo $this->datos[$i]['producto'] ?></td>
            <td><?php echo $this->datos[$i]['cantidad'] ?></td>
            <td><?php echo $this->datos[$i]['fecha'] ?></td>
        </tr>
        <?php } ?>
    <?php } ?>
</table>
</div>

<?php } else{ ?>
    <p>No hay salida de productos</p>
    <a href="<?php echo BASE_URL?>salida_productos/registrar_salida" class="k-button">Registrar Salida</a>
<?php } ?>  
