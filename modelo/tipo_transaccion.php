<?php

class tipo_transaccion extends Main{

    public $idtipo_transaccion;
    public $descripcion;

    public function selecciona() {
        if(is_null($this->idtipo_transaccion)){
            $this->idtipo_transaccion=0;
        }
        if(is_null($this->descripcion)){
            $this->descripcion='';
        }
        $datos = array($this->idtipo_transaccion, $this->descripcion);
        $r = $this->get_consulta("pa_selecciona_tipo_transaccion", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null; 
         if (conexion::$_servidor == 'oci') {
            oci_fetch_all($stmt, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
            return $data;
        } else {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);       
            return $stmt->fetchall();
        };
    }

    public function elimina() {
        $datos = array($this->idtipo_transaccion);
        $r = $this->get_consulta("pa_elimina_tipo_transaccion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function inserta() {
        $datos = array($this->idtipo_transaccion, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_tipo_transaccion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idtipo_transaccion, $this->descripcion);
        $r = $this->get_consulta("pa_inserta_actualiza_tipo_transaccion", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>