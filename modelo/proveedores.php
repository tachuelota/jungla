<?php

class proveedores {

    public $idproveedor;
    public $razon_social;
    public $representante;
    public $ruc;
    public $telefono;
    public $direccion;
    public $email;
    public $idubigeo;
    public $ubigeo;

    public function inserta() {
        $datos = array($this->idproveedor, $this->razon_social, $this->representante, $this->ruc, 
            $this->telefono, $this->direccion, $this->email, $this->idubigeo);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_proveedores", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idproveedor, $this->razon_social, $this->representante, $this->ruc, 
            $this->telefono, $this->direccion, $this->email, $this->idubigeo);
        $r = consulta::procedimientoAlmacenado("pa_inserta_actualiza_proveedores", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->razon_social)){
            $this->razon_social='';
        }
        if(is_null($this->representante)){
            $this->representante='';
        }
        if(is_null($this->ruc)){
            $this->ruc='';
        }
        if(is_null($this->ubigeo)){
            $this->ubigeo='';
        }
        $datos = array($this->idproveedor, $this->razon_social, $this->representante, $this->ruc, $this->ubigeo);
        $r = consulta::procedimientoAlmacenado("pa_selecciona_proveedores", $datos);
        if ($r[1] == '') {
            $stmt = $r[0];
        } else {
            die($r[1]);
        }
        $r = null;
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchall();
    }
    
    public function elimina() {
        $datos = array($this->idproveedor);
        $r = consulta::procedimientoAlmacenado("pa_elimina_promociones", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

}

?>
