<?php
namespace View;

class ConsultaPelicula
{
    public function consultar()
    {
        echo '
        <h2>CinePlus - Registro de Películas</h2>
        <form method="post">

            <label for="titulo">Título:</label><br>
            <input type="text" name="titulo" id="titulo" required>
            <br><br>

            <label for="genero">Género:</label><br>
            <input type="text" name="genero" id="genero" required>
            <br><br>

            <label for="duracion">Duración en minutos:</label><br>
            <input type="number" name="duracion" id="duracion" min="1" required>
            <br><br>

            <label for="calificacion">Calificación de usuarios (1 a 5):</label><br>
            <input type="number" step="0.1" min="1" max="5" name="calificacion" id="calificacion" required>
            <br><br>

            <input type="submit" name="agregar" value="Registrar Película">

        </form>
        <hr>';
    }
}