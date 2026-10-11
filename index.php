<?php
require_once __DIR__ . '/vendor/autoload.php';

use View\ConsultaPelicula;
use View\VisualizarPelicula;
use Controller\ControladorPelicula;

// 1. Mostrar formulario clásico
$consulta = new ConsultaPelicula();
$consulta->consultar();

// 2. Ejecutar controlador y mostrar resultados con Autoload PSR-4
$vista = new VisualizarPelicula();
$controlador = new ControladorPelicula($vista);
$controlador->desarrollar();