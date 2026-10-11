<?php
namespace Controller;

use Models\Pelicula;
use Models\Plataforma;
use View\VisualizarPelicula;

class ControladorPelicula
{
    private $vista;

    public function __construct(VisualizarPelicula $vista)
    {
        $this->vista = $vista;
    }

    public function desarrollar()
    {
        $cinePlus = new Plataforma("CinePlus");

        // Películas iniciales de prueba
        $cinePlus->agregarPelicula(new Pelicula("Inception", "Ciencia Ficción", 148, 4.8));
        $cinePlus->agregarPelicula(new Pelicula("The Matrix", "Acción", 136, 4.7));

        if (isset($_POST["agregar"])) {
            $titulo = $_POST["titulo"] ?? '';
            $genero = $_POST["genero"] ?? '';
            $duracion = (int)($_POST["duracion"] ?? 0);
            $calificacion = (float)($_POST["calificacion"] ?? 3.0);

            if (!empty($titulo) && $duracion > 0) {
                $nuevaPelicula = new Pelicula($titulo, $genero, $duracion, $calificacion);
                $cinePlus->agregarPelicula($nuevaPelicula);
            }
        }

        $this->vista->mostrartitulo("RESULTADO DE CATÁLOGO");
        $this->vista->mostrarCatalogo($cinePlus);
    }
}