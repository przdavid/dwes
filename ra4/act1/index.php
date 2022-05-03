<?php
/**
 * Indexación de los ejercicios del RA4 ACT1 mediante un arrray.
 * 
 * @author David Pérez Ruiz
 */

 // Indexación de ejercicios
 $ejercicios = [
     ["id" => 1,
     "titulo" => "Desarrollo de un sistema de test online para una autoescuela",
     "descripcion" => "Los test se encuentran almacenados en un array asociativo dentro de un directorio de
     configuración. Cada test utiliza un directorio para almacenar las fotos que necesita. El nombre de la
     carpeta es la concatenación de la cadena img y el número de test. Por ejemplo, para el test 1 las imágenes
     se guardan en el directorio img1. El nombre de cada foto coincide con el número de pregunta.
     <ul>
        <li>Incorpora el array de test desde el directorio de configuración.</li>
        <li>Genera dinámicamente un formulario para que los alumn@s puedan realizar el test.</li>
        <li>El sistema debe detectar si existe imagen asociada a la pregunta para mostrarla.</li>
        <li>Procesa el formulario de manera que la aplicación informe del número de aciertos y utilice un
        código de colores para indicar si se ha superado el examen. El test se considera superado si no se
        han cometido más de dos errores.</li>
        <li>Cuando el alumn@ conecta con la aplicación el sistema le indicará el último test realizado y
        mostrará el siguiente para su realización.</li>
        <li>Incorpora a la aplicación un botón que permita al alumn@ empezar a realizar los test desde el
        principio.</li>
        <li>Aplica criterios de usabilidad en el diseño.</li>
     </ul>",
     "enlace" => "ej01_testAutoescuela.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra4/act1/ej01_testAutoescuela.php"],
     ["id" => 2,
     "titulo" => "Puzles infantiles",
     "descripcion" => "Se debe crear una aplicación que permita resolver puzles infantiles de tres piezas. Se
     adjunta fichas de ejemplo, pero es necesario que personalices las fichas del rompecabezas. Aplica criterios
     de usabilidad en el diseño de la aplicación intentando conseguir la mejor experiencia de usuario.",
     "enlace" => "ej02_puzle.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra4/act1/ej02_puzle.php"]
    ];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>RA4 ACT1. Listado de ejercicios</title>
</head>
<body>
    <h1>RA4 ACT1. Listado de ejercicios</h1>
    <dl>
        <?php foreach ($ejercicios as $ej) { ?>
            <dt><?= $ej['id'] ?>. <a href='<?= $ej["enlace"] ?>' target='_blank'><?= $ej["titulo"] ?></a></dt>
            <dd><?= $ej["descripcion"]; ?></dd>
            <dd> <a href='<?= $ej["github"] ?>' target='_blank'>Código en github</a></dd>
        <?php } ?>
    </dl>
</body>
</html>