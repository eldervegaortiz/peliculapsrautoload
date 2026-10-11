<?php
namespace Models;

class Plataforma
{
    private string $nombre;
    private array $peliculas = [];
    private static int $totalPeliculasCreadas = 0;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function agregarPelicula(Pelicula $pelicula): void
    {
        $this->peliculas[] = $pelicula;
        self::$totalPeliculasCreadas++;
    }

    public function obtenerPeliculas(): array
    {
        return $this->peliculas;
    }

    public static function obtenerTotalPeliculas(): int
    {
        return self::$totalPeliculasCreadas;
    }

    public function obtenerPromedioCalificaciones(): float
    {
        if (count($this->peliculas) === 0) return 0.0;
        
        $suma = 0;
        foreach ($this->peliculas as $pelicula) {
            $suma += $pelicula->getCalificacion();
        }
        return round($suma / count($this->peliculas), 2);
    }
}