<?php if (isset($this->datos) && count($this->datos)) { ?>
<h3>Lista de Articulos</h3>
    <p>
        <select class="list" id="filtro">
            <option value="0">Titulo</option>
            <option value="1">Descripcion</option>
        </select>
        <input type="text" class="k-textbox" style="width: 50%" id="buscar">
        <button type="button" class="k-button" id="btn_buscar"><span class="k-icon k-i-search"></span></button>
        <a href="<?php echo BASE_URL?>articulos/nuevo" class="k-button">Nuevo</a>
    </p>
    <div id="grilla">
    <table border="1" class="tabgrilla">
        <tr>
            <th>Codigo</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    <?php for ($i = 0; $i < count($this->datos); $i++) { ?>
            <tr>
                <td><?php echo $this->datos[$i]['IDARTICULO'] ?></td>
                <td><?php echo $this->datos[$i]['TITULO'] ?></td>
                <td><?php echo $this->datos[$i]['DESCRIPCION'] ?></td>
                <td>
                    <?php if (isset ($this->datos[$i]['IMAGEN']) && ($this->datos[$i]['IMAGEN'] != " ")){?>
                    <a href="javascript:void()" onclick="window.open('<?php echo $_params['ruta_img']?>articulos/<?php echo $this->datos[$i]['IMAGEN'] ?>')" title="Clic para ver la imagen">
                        <img src="<?php echo $_params['ruta_img']?>articulos/thumb/thumb_<?php echo $this->datos[$i]['IMAGEN'] ?>" />
                    </a>
                    <?php } ?>
                </td>
                <td><?php echo $this->datos[$i]['TIPO'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo BASE_URL?>articulos/editar/<?php echo $this->datos[$i]['IDARTICULO'] ?>')" class="imgedit" ></a>
                    <a href="javascript:void(0)" onclick="eliminar('<?php echo BASE_URL?>articulos/eliminar/<?php echo $this->datos[$i]['IDARTICULO'] ?>')" class="imgdelete"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    <?php } else { ?>
        <p>No hay articulos</p>
        <a href="<?php echo BASE_URL?>almacenes/nuevo" class="k-button">Nuevo</a>
    <?php } ?>