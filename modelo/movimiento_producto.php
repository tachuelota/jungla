<?php

class movimiento_producto {

    public $idcompra;
    public $idproducto;
    public $idtipo_movimiento;
//    public $idventa;
    public $cantidad;
    public $idempleado;
    public $idmovimiento_producto;
    public $fecha;
    

    public function inserta() {
        if(is_null($this->idcompra)){
            $this->idcompra=0;
        }
        if(is_null($this->idproducto)){
            $this->idproducto=0;
        }
        $datos = array($this->idcompra, $this->idproducto, $this->idtipo_movimiento, $this->cantidad,
                $this->idempleado, 0, $this->fecha);
//        echo '<pre>';
//                print_r($datos);exit;
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_movimiento_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idcompra, $this->idproducto, $this->idtipo_movimiento, $this->cantidad,
                $this->idempleado, $this->idmovimiento_producto, $this->fecha);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_movimiento_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idmovimiento_producto)){
            $this->idmovimiento_producto=0;
        }
        $datos = array($this->idmovimiento_producto);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_movimiento_producto", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        return $stmt->fetchall();
    }

    public function elimina() {
        $datos = array($this->idmovimiento_producto);
        $r = consulta::procedimientoAlmacenado("pa_elimina_movimiento_producto", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
