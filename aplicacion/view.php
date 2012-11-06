<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author pedro
 */
class view {

    //put your code here
    private $_controlador;
    private $_menu;
    //parametro request = es el parametro del ccontrolador
    public function __construct(request $peticion, $menu) {
        //guardamos el nombre del controlador
        $this->_controlador = $peticion->get_controlador();
        $this->_menu=$menu;
    }

    public function renderizar($vista, $item = false) {
        //aqui podemos poner el menu
        //creamos la ruta de la vista
        
        $ruta_vista = ROOT . 'vista' . DS . $this->_controlador . DS . $vista.'.php';
        
        
        //die($ruta_vista);
        //comprobamos si el archivo existe y es legible
        //die($ruta_vista);
        if (is_readable($ruta_vista)) {
            //enviamos parametros como css, js
            //archivos propios del template
            /* $_layoutParams= array(
              'ruta_css'=> BASE_URL.'vistas/layout/'.DEFAULT_LAYOUT.'/css/',
              'ruta_img'=> BASE_URL.'vistas/layout/'.DEFAULT_LAYOUT.'/img/',
              'ruta_js'=> BASE_URL.'vistas/layout/'.DEFAULT_LAYOUT.'/js/',
              'menu'=> $menu
              ); */

            //incluimos los layout
            include_once ROOT . DS . 'cabecera.php';
            include_once ROOT. DS . 'menu.php';
            new menu($this->_menu);
            include_once $ruta_vista;
            include_once ROOT . DS . 'pie.php';
            //incluimos la vista
        } else {
            throw new Exception('Error de vista');
        }
    }
    
        public function renderizar_webservice($vista, $item = false) {
        //aqui podemos poner el menu
        //creamos la ruta de la vista
        
        $ruta_vista = $ruta_vista = ROOT . 'vista' . DS . $this->_controlador . DS . $vista.'.php';
        //comprobamos si el archivo existe y es legible
        if (is_readable($ruta_vista)) {
            //incluimos los layout
            include_once $ruta_vista;
            //incluimos la vista
        } else {
            throw new Exception('Error de vista');
        }
    }
    
    public function renderiza_web($vista, $item = false) {
        $ruta_vista = ROOT . 'vista' . DS . $this->_controlador . DS . $vista.'.php';
        if (is_readable($ruta_vista)) {
            include_once ROOT . 'vista' . DS . $this->_controlador . DS . 'cabecera.php';
            include_once $ruta_vista;
            include_once ROOT . 'vista' . DS . $this->_controlador . DS . 'pie.php';
            //incluimos la vista
        } else {
            throw new Exception('Error de vista');
        }
    }

}

?>
