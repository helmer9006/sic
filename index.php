<?php

//<!-- LLAMADO A CONTROLADORES Y MODELOS-->

require_once "controladores/plantilla.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/historial.controlador.php";
require_once "controladores/inventario.controlador.php";
require_once "controladores/tickets.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/areas.controlador.php";
require_once "controladores/marcas.controlador.php";
require_once "controladores/dependencias.controlador.php";
require_once "controladores/tipos-tickets.controlador.php";
require_once "controladores/tipos-equipos.controlador.php";

require_once "modelos/categorias.modelo.php";
require_once "modelos/historial.modelo.php";
require_once "modelos/inventario.modelo.php";
require_once "modelos/tickets.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/areas.modelo.php";
require_once "modelos/marcas.modelo.php";
require_once "modelos/dependencias.modelo.php";
require_once "modelos/tipos-tickets.modelo.php";
require_once "modelos/tipos-equipos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
