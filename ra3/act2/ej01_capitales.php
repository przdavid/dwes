<?php
/**
 * Ejercicio 1. Países y capitales.
 * Diseña y almacena en un array una lista de países junto con sus capitales.
 * Muestra un formulario que permita al usuario introducir las capitales de los países presentados.
 * En respuesta al formulario, la aplicación mostrará el número de aciertos y fallos.
 *
 * Incluye una opción que permita visualizar las opciones correctas.
 *
 * Muestra una sopa de letras con 5 de las capitales almacenadas
 *
 * @author David Pérez Ruiz
 */

 // Array de países y capitales
 $paisCapital = [
     "Canadá" => "Ottawa",
     "Colombia" => "Bogotá",
     "Venezuela" => "Caracas",
     "Argentina" => "Buenos Aires",
     "Ecuador" => "Quito",
     "Brasil" => "Brasilia",
     "Noruega" => "Oslo",
     "Suecia" => "Estocolmo",
     "Alemania" => "Berlín",
     "Italia" => "Roma",
     "Grecia" => "Atenas",
     "Rusia" => "Moscú",
     "Portugal" => "Lisboa",
     "Francia" => "París",
     "Reino Unido" => "Londres",
     "España" => "Madrid",
     "India" => "Nueva Delhi",
     "Tailandia" => "Bangkok",
     "Malasia" => "Kuala Lumpur",
     "China" => "Pekín",
     "Japón" => "Tokio",
     "Mongolia" => "Ulán Bator",
     "Nueva Zelanda" => "Wellington",
     "Marruecos" => "Rabat",
     "Mozambique" => "Maputo",
     "Egipto" => "El Cairo",
     "Argelia" => "Argel",
     "Madagascar" => "Antananarivo",
     "Australia" => "Canberra",
     "Fiyi" => "Suva"
 ];

 $numAciertos = $numFallos = 0;
?>

<style>
    .casilla {
        display: flex;
        margin-block: 5px;
    }
    .pais {
        inline-size: 120px;
    }
    .respuesta {
        margin-inline: 10px;
    }
    #correcto {
        color: green;
    }
    #incorrecto {
        color: red;
    }
    .solucion {
        color: orange;
    }
</style>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>Países y capitales</title>
</head>
<body>
    <h1>Países y capitales</h1>
    <p>
        Diseña y almacena en un array una lista de países junto con sus capitales.
        Muestra un formulario que permita al usuario introducir las capitales de los países presentados.
        En respuesta al formulario, la aplicación mostrará el número  de aciertos y fallos.
        <br>
        Incluye una opción que permita visualizar las opciones correctas.
        <br>
        Muestra una sopa de letras con 5 de las capitales almacenadas
    </p>
    <form action="" method="POST">
        <?php foreach ($paisCapital as $pais => $capital) { ?>
            <div class="casilla">
                <div class="pais">
                    <label for='<?=$pais?>'><?=$pais?></label>
                </div>
                <div class="capital">
                    <?php $respuesta = $_POST[$pais . "Capital"]; ?>
                    <input type="text" name="<?= $pais . "Capital" ?>" id="<?= $pais ?>" value="<?= $respuesta ?>"
                    <?php if (isset($_POST["comprobar"]) or isset($_POST["mostrar"])) { ?>
                        readonly
                    <?php } ?>>
                </div>
                <?php if (isset($_POST["comprobar"]) or isset($_POST["mostrar"])) { ?>
                    <span class="respuesta">
                        <?php if (strcmp(strtolower($respuesta), strtolower($paisCapital[$pais])) == 0) { 
                            $numAciertos++; ?>
                            <div id="correcto">✓</div>
                        <?php } else {
                            $numFallos++; ?>
                            <div id="incorrecto">✗</div>
                        <?php } ?>
                    </span>
                <?php } ?>
                <?php if (isset($_POST["mostrar"])) { ?>
                    <?php if (strcmp(strtolower($respuesta), strtolower($paisCapital[$pais])) != 0) { ?>
                        <span class="solucion">
                            <?= $paisCapital[$pais] ?>
                        </span>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>
        <div>
            <input type="submit" value="Comprobar" name="comprobar"
                <?php if (isset($_POST["comprobar"]) or isset($_POST["mostrar"])) { ?>
                    disabled
                <?php } ?>>
            <?php if (isset($_POST["comprobar"]) or isset($_POST["mostrar"])) { ?>
            <input type="submit" value="Mostrar correctas" name="mostrar"
                <?php if (isset($_POST["mostrar"])) { ?>
                    disabled
                <?php } ?>>
            <?php } ?>
        </div>
    </form>
    <?php if (isset($_POST["comprobar"]) or isset($_POST["mostrar"])) { ?>
        <ul>
            <li id="correcto">Número de aciertos: <?= $numAciertos ?> </li>
            <li id="incorrecto">Número de fallos: <?= $numFallos ?> </li>
        </ul>
    <?php } ?>
</body>
</html>