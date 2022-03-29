<?php
/**
 * Ejercicio 2. Reescritura de contraseñas.
 * Escribe un script que muestre un formulario con dos inputs de tipo password y verifique
 * en el servidor que las entradas coinciden.
 * 
 * @author David Pérez Ruiz
 */

 // Inicializar variables
 if(isset($_POST["comprobar"])) {
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
 } else {
    $num1 = $num2 = "";
 }

 // Comprobar que las contraseñas han sido introducidas
 $pass1Incorrecta = $pass2Incorrecta = false;
 if(isset($_POST["comprobar"])) {
    if(empty($pass1)) {
        $pass1Incorrecta = true;
    }
    
    if(empty($pass2)) {
        $pass2Incorrecta = true;
    }
 }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>Reescritura de contraseñas</title>
</head>
<body>
    <h1>Reescritura de contraseñas</h1>
    <p>
        Escribe un script que muestre un formulario con dos inputs de tipo password y verifique
        en el servidor que las entradas coinciden.
    </p>
    <?php
     // Mostrar formulario
     echo "<form action=\"\" method=\"POST\">";
        echo "<label>Contraseña: </label>";
        echo "<input type=\"password\" name=\"pass1\" value=\"$pass1\">";
        if($pass1Incorrecta) {
            echo " Campo requerido";
        }
        echo "<br>";

        echo "<label>Repita la contraseña: </label>";
        echo "<input type=\"password\" name=\"pass2\" value=\"$pass2\">";
        if($pass2Incorrecta) {
            echo " Campo requerido";
        }
        echo "<br>";
        echo "<input type=\"submit\" value=\"Comprobar\" name=\"comprobar\">";
     echo "</form>";

     // Comprobar si coinciden las contraseñas
     if(isset($_POST["comprobar"]) and !$pass1Incorrecta and !$pass2Incorrecta) {
        if(strcmp($pass1, $pass2) == 0) {
            echo "<p style=\"color:green\">✔ Contraseña correcta</p>";
        } else {
            echo "<p style=\"color:red\">✖ Contraseña incorrecta</p>";
        }
     }
    ?>
</body>
</html>