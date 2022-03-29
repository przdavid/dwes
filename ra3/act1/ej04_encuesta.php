<?php
/**
 * Ejercicio 4. Encuesta.
 * Escribe un script que muestre un formulario que permita la votación de 10 items mediante
 * un radio button de 1 a 5. La respuesta al formulario mostrará el item mejor valorado.
 *
 * @author David Pérez Ruiz
 */ 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>Encuesta</title>
</head>
<body>
    <h1>Encuesta</h1>
    <p>
        Escribe un script que muestre un formulario que permita la votación de 10 items mediante
        un radio button de 1 a 5. La respuesta al formulario mostrará el item mejor valorado.
    </p>
    <?php
     // Mostrar formulario
     echo "<form action='' method='POST'>";
     for ($j = 1; $j <= 10; $j++) {
         echo "<label>Item$j:</label>";
         for ($k = 1; $k <= 5; $k++) {
             echo "<input type='radio' name='Item" . $j . "' value = '$k'";
             if(isset($_POST["Item".$j]) and $_POST["Item".$j] == $k) {
                 echo " checked";
             }
             echo ">";
         }
         echo "<br>";
     }
     echo "<input type=\"submit\" value=\"Enviar\" name=\"enviar\">";
     echo "</form>";

     // Mostrar resultado de la encuesta
     if (isset($_POST["enviar"])) {
         // Eliminar "enviar" del POST
         unset($_POST["enviar"]);

         // Comprobar si se han votado todos los items
         if(count($_POST) < 10) {
             echo "<p>Debe votar todos los items</p>";
         } else {
             $maxValue = max($_POST);
             echo "<h2>Items mejor valorados</h2>";
             foreach ($_POST as $key => $value) {
                 if($value == $maxValue) {
                     echo "<p>$key</p>";
                 }
             }
         }
     }
    ?>
</body>
</html>