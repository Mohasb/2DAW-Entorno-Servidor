    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formularios</title>
    </head>

    <body>
        <!-- Se envian los valores por GET a la página muestra.php -->
        <form action="muestra.php" method="GET">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">
            <br>
            <label for="deporte">Deporte:</label>
            <select name="deporte">
                <option value="Fútbol">Fútbol</option>
                <option value="Baloncesto">Baloncesto</option>
                <option value="Tenis">Tenis</option>
            </select>
            <br>
            <label for="genero">Genero:</label>
            <input type="radio" name="genero" value="Hombre">Hombre
            <input type="radio" name="genero" value="Mujer">Mujer
            <br>
            <input type="submit" value="Añadir atleta">
        </form>
    </body>

    </html>