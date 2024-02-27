<?php
/* controladores */
require_once "controlador/plantillaControlador.php";
require_once "controlador/usuarioControlador.php";
require_once "controlador/pacienteControlador.php";


/*modelos*/
require_once "modelo/usuarioModelo.php";
require_once "modelo/pacienteModelo.php";

$plantilla=new ControladorPlantilla();
$plantilla->ctrPlantilla();
