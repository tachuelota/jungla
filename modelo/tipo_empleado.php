<?php

class tipo_empleado {

    public $idtipo_empleado;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idtipo_empleado)){
            $this->idtipo_empleado=0;
        }
        $datos = array($this->idtipo_empleado);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_tipo_empleado", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

}

?>
