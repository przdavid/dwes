<?php
/**
 * Indexación de los ejercicios mediante un arrray.
 * 
 * @author David Pérez Ruiz
 */

 // Indexación de ejercicios
 $ejercicios = [
     ["id" => 1,
     "titulo" => "Número aleatorio",
     "descripcion" => "Escribe un script que muestre al usuario un número aleatorio comprendido entre
     dos números que han sido solicitados previamente mediante un formulario.",
     "enlace" => "ej01_numAleatorio.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra3/act1/ej01_numAleatorio.php"],
     ["id" => 2,
     "titulo" => "Reescritura de contraseñas",
     "descripcion" => "Escribe un script que muestre un formulario con dos inputs de tipo password y
     verifique en el servidor que las entradas coinciden.",
     "enlace" => "ej02_password.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra3/act1/ej02_password.php"],
     ["id" => 3,
     "titulo" => "Operaciones aritméticas",
     "descripcion" => "Escribe un script que muestre al usuario un formulario con una operación aritmética
     básica, generada aleatoriamente. Una vez completado el formulario, el script indicará si la operación
     se realizó correctamente.",
     "enlace" => "ej03_operaciones.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra3/act1/ej03_operaciones.php"],
     ["id" => 4,
     "titulo" => "Encuesta",
     "descripcion" => "Escribe un script que muestre un formulario que permita la votación de 10 items
     mediante un radio button de 1 a 5. La respuesta al formulario mostrará el item mejor valorado.",
     "enlace" => "ej04_encuesta.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra3/act1/ej04_encuesta.php"],
     ["id" => 5,
     "titulo" => "Figuras geométricas",
     "descripcion" => "Escribe un script que muestre una figura geométrica utilizndo el formato svg.
     Para ello, el script mostrará un formulario con un radio button con las figuras disponibles:
     círculo, rectángulo, cuadrado y un cuadro de texto para seleccionar el color. En función de la
     figura elegida, el script solicitará los datos necesarios para su visualización.",
     "enlace" => "ej05_figuraGeo.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra3/act1/ej05_figuraGeo.php"]
    ];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA3. Listado de ejercicios</title>
</head>
<body>
    <h1>RA3. Listado de ejercicios</h1>
    <dl>
        <?php foreach ($ejercicios as $ej) { ?>
            <dt><?= $ej['id'] ?>. <a href='<?= $ej["enlace"] ?>' target='_blank'><?= $ej["titulo"] ?></a></dt>
            <dd><?= $ej["descripcion"]; ?></dd>
            <dd> <a href='<?= $ej["github"] ?>' target='_blank'>Código en github</a></dd>
        <?php } ?>
</body>
</html>