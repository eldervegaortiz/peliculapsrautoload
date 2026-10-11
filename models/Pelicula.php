<?php
namespace Models;

class Pelicula
{
    private string $titulo;
    private string $genero;
    private int $duracionMinutos;
    private float $calificacion;

    public function __construct(string $titulo, string $genero, int $duracionMinutos, float $calificacion)
    {
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->duracionMinutos = $duracionMinutos;
        $this->setCalificacion($calificacion);
    }

    public function getTitulo(): string { return $this->titulo; }
    public function getGenero(): string { return $this->genero; }
    public function getDuracionMinutos(): int { return $this->duracionMinutos; }
    public function getCalificacion(): float { return $this->calificacion; }

    public function setCalificacion(float $calificacion): void
    {
        if ($calificacion >= 1.0 && $calificacion <= 5.0) {
            $this->calificacion = $calificacion;
        } else {
            $this->calificacion = 3.0;
        }
    }

    public static function convertirHorasAMinutos(float $horas): int
    {
        return (int)($horas * 60);
    }

    public function esRecomendada(): bool
    {
        return $this->calificacion >= 4.0;
    }

    public function mostrarInfo(): string
    {
        if ($this->calificacion >= 4.0) {
            $mensajeCalificacion = "buenísima";
        } elseif ($this->calificacion >= 3.0) {
            $mensajeCalificacion = "más o menos";
        } else {
            $mensajeCalificacion = "malisima";
        }

        $horasFormato = number_format($this->duracionMinutos / 60, 1);

        return "
        <strong>Título:</strong> {$this->titulo} <br>
        <strong>Género:</strong> {$this->genero} <br>
        <strong>Duración:</strong> {$this->duracionMinutos} mins ({$horasFormato} hrs) <br>
        <strong>Calificación:</strong> {$this->calificacion} / 5.0 - {$mensajeCalificacion}
        <hr>";
    }
}