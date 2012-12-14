<h3><?php echo $this->titulo?></h3>
<p><a type="button" class="k-button" href="<?php echo $this->btn_action ?>">Amortizar</a></p>
<table border="1" class="tabgrilla" widht="50%">
    <tr>
        <th>Nro Cuota</th>
        <th>Fecha de Pago</th>
        <th>Monto de Cuota</th>
        <th>Monto Pagado</th>
        <th>Estado</th>
    </tr>
    <?php for($i=0;$i<count($this->datos);$i++){ ?>
    <tr>
        <td><?php echo $this->datos[$i]['NRO_COBRO']?></td>
        <td><?php echo $this->datos[$i]['FECHA_COBRO']?></td>
        <td><?php echo $this->datos[$i]['MONTO_CUOTA']?></td>
        <td><?php echo $this->datos[$i]['MONTO_COBRADO']?></td>
        <td>
            <?php 
            if($this->datos[$i]['MONTO_CUOTA'] ==$this->datos[$i]['MONTO_COBRADO']){
                echo 'cancelado';
            }else{
                if(new DateTime($this->datos[$i]['FECHA_PAGO'],new DateTimeZone('America/Lima'))>new DateTime(date("M d Y"),new DateTimeZone('America/Lima')) && $this->datos[$i]['MONTO_CUOTA'] > $this->datos[$i]['MONTO_COBRADO']){
                    echo 'normal';
                }else{
                    echo 'vencido';
                }
            }
            ?>
        </td>
    </tr>
    <?php } ?>
</table>
<p><a href="<?php echo BASE_URL?>cobros" class="k-button">Aceptar</a></p>

