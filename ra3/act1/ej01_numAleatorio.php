<?php
/**
 * Ejercicio 1. Número aleatorio.
 * Escribe un script que muestre al usuario un número aleatorio comprendido entre dos números
 * que han sido solicitados previamente mediante un formulario.
 * 
 * @author David Pérez Ruiz
 */

 // Inicializar variables
 // Almacenar números
 if(isset($_POST["generar"])) {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
 } else {
    $num1 = $num2 = 0;
 }

 // Comprobar que los números han sido introducidos
 $num1Incorrecto = $num2Incorrecto = false;

 if(empty($num1) and $num1 != 0) {
    $num1Incorrecto = true;
 }

 if(empty($num2) and $num2 != 0) {
    $num2Incorrecto = true;
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>Numero aleatorio</title>
</head>
<body>
    <h1>Número aleatorio</h1>
    <p>
        Escribe un script que muestre al usuario un número aleatorio comprendido entre dos números
        que han sido solicitados previamente mediante un formulario.
    </p>
    <?php
     // Mostrar formulario
     echo "<form action=\"\" method=\"POST\">";
        echo "<label>Mínimo: </label>";
        echo "<input type=\"number\" name=\"num1\" value=\"$num1\">";
        if($num1Incorrecto) {
            echo " Campo requerido";
        }
        echo "<br>";

        echo "<label>Máximo: </label>";
        echo "<input type=\"number\" name=\"num2\" value=\"$num2\">";
        if($num2Incorrecto) {
            echo " Campo requerido";
        }
        echo "<br>";
        echo "<input type=\"submit\" value=\"Generar\" name=\"generar\">";
     echo "</form>";

     // Generar número aleatorio y mostrarlo
     if(isset($_POST["generar"]) and !$num1Incorrecto and !$num2Incorrecto) {
        // Si el mínimo es mayor que el máximo muestra un error
        if($num1 > $num2) {
            echo "<p>Error: el límite mínimo no puede ser mayor que el límite máximo.</p>";
        } else {
            $numAleatorio = mt_rand($num1, $num2);
            echo "<p>$numAleatorio</p>";
        }
     }
    ?>
</body>
</html>