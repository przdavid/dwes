<?php
/**
 * Ejercicio 3. Operaciones aritméticas.
 * Escribe un script que muestre al usuario un formulario con una operación aritmética
 * básica, generada aleatoriamente. Una vez completado el formulario, el script indicará
 * si la operación se realizó correctamente.
 *
 * @author David Pérez Ruiz
 */

 // Inicializar variables
 
 $num1 = mt_rand(1, 9);
 $num2 = mt_rand(1, 9);
 switch (mt_rand(1, 4)) {
    case 1:
        $operando = "+";
    break;
    case 2:
        $operando = "-";
    break;
    case 3:
        $operando = "x";
    break;
    case 4:
        $operando = "/";
    break;
 }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>Operaciones aritméticas</title>
</head>
<body>
    <h1>Operaciones aritméticas</h1>
    <p>
        Escribe un script que muestre al usuario un formulario con una operación aritmética
        básica, generada aleatoriamente. Una vez completado el formulario, el script indicará
        si la operación se realizó correctamente.
    </p>
    <?php
     // Mostrar formulario
     echo "<form action=\"\" method=\"POST\">";
        echo "<input type='hidden' name='num1' value='$num1' readonly>";
        echo $num1;
        echo "<input type='hidden' name='operando' value='$operando' readonly>";
        echo " $operando ";
        echo "<input type='hidden' name='num2' value='$num2' readonly>";
        echo $num2;
        echo " = ";
        echo "<input type=\"number\" step='0.01' name=\"respuesta\" value=\"$respuesta\">";
        if (strcmp($operando, "/") == 0) {
            echo " Redondear a 2 decimales";
        }
        echo "<br>";
        echo "<input type=\"submit\" value=\"Calcular\" name=\"calcular\">";
     echo "</form>";
     
     // Mostrar el mensaje de que el cálculo es o no correcto
     if (isset($_POST["calcular"])) {
         $num1 = $_POST["num1"];
         $num2 = $_POST["num2"];
         $respuesta = $_POST["respuesta"];
         switch ($_POST["operando"]) {
            case "+":
                $resultado = $num1 + $num2;
                break;
            case "-":
                $resultado = $num1 - $num2;
                break;
            case "x":
                $resultado = $num1 * $num2;
                break;
            case "/":
                $resultado = $num1 / $num2;
                round($resultado, 2);
                break;
        }

         if ($respuesta == $resultado) {
             echo '<p style="background-color:green; color:white">¡Respuesta correcta!</p>';
         } else {
             echo '<p style="background-color:red; color:white">Respuesta incorrecta.</p>';
         }
     }
    ?>
</body>
</html>