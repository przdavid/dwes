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

// Sesión
session_start();
if (isset($_SESSION["SopaLetras"])) {
    $sopa = $_SESSION["SopaLetras"];
    $capitalesSopa = $_SESSION["CapitalesSopa"];
}

// Constantes
define("NUMFILAS", 20);
define("NUMCOLUMNAS", 20);


// Variables del formulario de países y capitales
$paisCapital = [
    "Venezuela" => "Caracas",
    "Ecuador" => "Quito",
    "Brasil" => "Brasilia",
    "Noruega" => "Oslo",
    "Suecia" => "Estocolmo",
    "Italia" => "Roma",
    "Grecia" => "Atenas",
    "Portugal" => "Lisboa",
    "Reino Unido" => "Londres",
    "España" => "Madrid",
    "Japón" => "Tokio",
    "Marruecos" => "Rabat",
    "Argelia" => "Argel",
    "Australia" => "Canberra",
    "Fiyi" => "Suva"
];
$numAciertos = $numFallos = 0;

// Variables de la sopa de letras
$capitales = array_values($paisCapital);
$capitales = array_flip($capitales);
$capitales = array_change_key_case($capitales, CASE_UPPER);

if(!isset($_SESSION["CapitalesSopa"])) {
    $capitalesSopa = array_rand($capitales, 5);
    $_SESSION["CapitalesSopa"] = $capitalesSopa;
}

$arrayDirecciones = ["↓" => [1, 0], "↑" => [-1, 0],
"→" => [0, 1], "←" => [0, -1],
"↖" => [-1, -1], "↗" => [-1, 1],
"↘" => [1, 1], "↙" => [1, -1]];

if (!isset($_SESSION["SopaLetras"])) {
    $sopa = [];
    for ($f = 0; $f < NUMFILAS; $f++) {
        for ($c = 0; $c < NUMCOLUMNAS; $c++) {
            $sopa[$f][$c] = "";
        }
    }

    for ($e = 0; $e < count($capitalesSopa); $e++) {
        $capital = $capitalesSopa[$e];

        do {
            $casillaValida = true;
            $filaInicial = mt_rand(0, 19);
            $columnaInicial = mt_rand(0, 19);
            $direccion = array_rand($arrayDirecciones);
            $direccionFila = $arrayDirecciones[$direccion][0];
            $direccionColumna = $arrayDirecciones[$direccion][1];

            $filaFinal = $filaInicial + (strlen($capital) * $direccionFila) + (($direccionFila > 0 ? -1 : $direccionFila < 0) ? +1 : 0);
            $columnaFinal = $columnaInicial + (strlen($capital) * $direccionColumna) + (($direccionColumna > 0 ? -1 : $direccionColumna < 0) ? +1 : 0);

            if ($filaFinal > NUMFILAS or $columnaFinal > NUMCOLUMNAS or $filaFinal < 0 or $columnaFinal < 0) {
                $casillaValida = false;
            }

            if ($casillaValida) {
                $f = $filaInicial;
                $c = $columnaInicial;

                for ($i = 0; $i < strlen($capital); $i++) {
                    if ((strcmp($sopa[$f][$c], "") != 0) and (strcmp($sopa[$f][$c], $capital[$i]) != 0)) {
                        $casillaValida = false;
                    }
                
                    $f += $direccionFila;
                    $c += $direccionColumna;
                }
            }
        } while (!$casillaValida);

        $f = $filaInicial;
        $c = $columnaInicial;

        for ($i = 0; $i < strlen($capital); $i++) {
            $sopa[$f][$c] = $capital[$i];
            
            $f += $direccionFila;
            $c += $direccionColumna;
        }
    }

    $abecedario = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N",
 "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
    for ($x = 0; $x < NUMFILAS; $x++) {
        for ($y = 0; $y < NUMCOLUMNAS; $y++) {
            if (strcmp($sopa[$x][$y], "") == 0) {
                $sopa[$x][$y] = $abecedario[array_rand($abecedario)];
            }
        }
    }

    $_SESSION["SopaLetras"] = $sopa;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
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
        .sopa {
            display: grid;
            grid-template-columns: repeat(10, 50px);
            grid-template-rows: repeat(10, 50px);
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
    <h2>Sopa de letras</h2>
    <div>
        Capitales a buscar:
        <ul>
            <?php foreach ($capitalesSopa as $capital) { ?>
                <li><?= $capital ?></li>
            <?php } ?>
        </ul>
    </div>
    <div>
        <?php
            echo "<table border=1>";
            for($i = 0; $i < NUMFILAS; $i++) {
                echo "<tr>";
                for($j = 0; $j < NUMCOLUMNAS; $j++) {
                    echo "<td>" . $sopa[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>