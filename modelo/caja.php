<?php

class caja {

    public $idcaja;
    public $estado;
    public $fecha;
    public $saldo;
    public $idempleado;
    public $empleado;
    public $aumenta;
    
    public function selecciona() {
        if(is_null($this->idcaja)){
            $this->idcaja=0;
        }
        if(is_null($this->empleado)){
            $this->empleado='';
        }
        $datos = array($this->idcaja, $this->empleado);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_caja", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    
    public function inserta() {
        $datos = array(0, $this->estado, $this->fecha, $this->idempleado);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_caja", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        if(is_null($this->saldo)){
            $datos = array($this->idcaja, $this->estado, $this->fecha, $this->idempleado);
            $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_caja", $datos);
        }else{
            $datos = array($this->idcaja, $this->saldo, $this->aumenta);
            $r = consulta::procedimientoAlmacenado("pa_actualizar_saldo_caja", $datos);
        }
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
