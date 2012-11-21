<?php

class caja_controlador extends controller{
    
    private $_caja;

    public function __construct() {
        parent::__construct();
        $this->_caja = $this->cargar_modelo('caja');
    }

    public function index(){
        $datos=  $this->_caja->selecciona();
//        echo '<pre>';
//                print_r($datos);exit;
        if($datos[0]['estado']==1){
            $this->_vista->lbl_boton = 'Cerrar';
            $this->_vista->action = 'cerrar/'.$datos[0]['idcaja'];
        }else{
            if(new DateTime($datos[0]['fecha'])==new DateTime(date("d-m-Y"))){
                $this->_vista->lbl_boton = 'Reaperturar';
                $this->_vista->action = 'reaperturar/'.$datos[0]['idcaja'];
            }else{
                $this->_vista->lbl_boton = 'Aperturar';
                $this->_vista->action = 'aperturar';
            }
        }
        $this->_vista->datos=$datos;
        $this->_vista->renderizar('index');
    }
    
    public function aperturar(){
        $this->_caja->estado=1;
        $this->_caja->fecha=date("d-m-Y");
        $this->_caja->idempleado=session::get('idempleado');
        $this->_caja->inserta();
        $this->index();
    }
    
    public function reaperturar($id){
        $this->_caja->idcaja=$id;
        $this->_caja->estado=1;
        $this->_caja->actualiza();
        $this->redireccionar('caja');
    }
    
    public function cerrar($id){
        $this->_caja->idcaja=$id;
        $this->_caja->estado=0;
        $this->_caja->actualiza();
        $this->redireccionar('caja');
    }
  
}

?>
