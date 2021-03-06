<?php

class proveedores extends Main{

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
        $datos = array(0, $this->razon_social, $this->representante, $this->ruc, 
            $this->telefono, $this->direccion, $this->email, $this->idubigeo);
        $r = $this->get_consulta("pa_inserta_act_proveedores", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function actualiza() {
        $datos = array($this->idproveedor, $this->razon_social, $this->representante, $this->ruc, 
            $this->telefono, $this->direccion, $this->email, $this->idubigeo);
        $r = $this->get_consulta("pa_inserta_act_proveedores", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }

    public function selecciona() {
        if(is_null($this->idproveedor)){
            $this->idproveedor=0;
        }
        if(is_null($this->razon_social)){
            $this->razon_social='';
        }
        if(is_null($this->representante)){
            $this->representante='';
        }
        if(is_null($this->ruc)){
            $this->ruc='';
        }
        $datos = array($this->idproveedor, $this->razon_social, $this->representante, $this->ruc);
        $r = $this->get_consulta("pa_selecciona_proveedores", $datos);
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
        $datos = array($this->idproveedor);
        $r = $this->get_consulta("pa_elimina_proveedores", $datos);
        $error = $r[1];
        $r = null;
        return $error;
    }
    
    public function selecciona_ruc($ruc) {
        $datos = array($ruc);
        $r = $this->get_consulta("pa_valida_ruc", $datos);
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

}

?>
