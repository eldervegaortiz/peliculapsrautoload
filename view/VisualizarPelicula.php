<?php
namespace View;

use Models\Plataforma;

class VisualizarPelicula
{
    public function mostrarCatalogo(Plataforma $plataforma)
    {
        echo "<h3>Catálogo de la Plataforma</h3>";
        echo "<p><strong>Total de películas registradas:</strong> " . Plataforma::obtenerTotalPeliculas() . "</p>";
        echo "<p><strong>Promedio general de calificaciones:</strong> " . $plataforma->obtenerPromedioCalificaciones() . " / 5.0</p>";
        echo "<hr>";

        foreach ($plataforma->obtenerPeliculas() as $pelicula) {
            echo $pelicula->mostrarInfo();
        }
    }

    public function mostrartitulo($titulo)
    {
        echo "<h2>== {$titulo} ==</h2>";
    }
}