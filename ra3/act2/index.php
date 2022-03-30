<?php
/**
 * Indexación de los ejercicios del RA3 ACT2 mediante un arrray.
 * 
 * @author David Pérez Ruiz
 */

 // Indexación de ejercicios
 $ejercicios = [
     ["id" => 1,
     "titulo" => "Países y capitales",
     "descripcion" => "Diseña y almacena en un array una lista de países junto con sus capitales.
     Muestra un formulario que permita al usuario introducir las capitales de los países presentados.
     En respuesta al formulario, la aplicación mostrará el número  de aciertos y fallos.
     <br>
     Incluye una opción que permita visualizar las opciones correctas.
     <br>
     Muestra una sopa de letras con 5 de las capitales almacenadas.",
     "enlace" => "ej01_capitales.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra3/act2/ej01_capitales.php"],
     ["id" => 2,
     "titulo" => "Comunidades autónomas",
     "descripcion" => "A partir de un array que almacena comunidades autónomas y provincias, escribe
     un programa que muestre aleatoriamente una comunidad autónoma y presente un formulario con un
     checkbox que permita seleccionar las provincias que pertenecen a la comunidad. En respuesta al
     formulario, la aplicación mostrará el número de aciertos y fallos.
     <br>
     Inclute una opción que permita visualizar las opciones correctas.",
     "enlace" => "ej02_provincias.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra3/act2/ej02_provincias.php"],
     ["id" => 3,
     "titulo" => "Notas académicas",
     "descripcion" => "A partir de un array que almacene los datos de la primera y segunda evaluación
     de los alumnos de 2º DAW, mostrar un menú de navegación que muestre la siguiente información:
        <ul>
            <li>Listado de alumnados con las notas de la primera y segunda evaluación, junto con su
            nota media</li>
            <li>Asignatura con mayor número de aprobados.</li>
            <li>Asignatura con mayor número de suspensos.</li>
            <li>Número de aprobados en cada asignatura.</li>
            <li>Generación de boletines de notas en función de la evaluación seleccionada en una
            lista desplegable.</li>
        </ul>",
     "enlace" => "ej03_notas.php",
     "github" => "https://github.com/przdavid/dwes/blob/main/ra3/act2/ej03_notas.php"]
    ];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>RA3 ACT2. Listado de ejercicios</title>
</head>
<body>
    <h1>RA3 ACT2. Listado de ejercicios</h1>
    <dl>
        <?php foreach ($ejercicios as $ej) { ?>
            <dt><?= $ej['id'] ?>. <a href='<?= $ej["enlace"] ?>' target='_blank'><?= $ej["titulo"] ?></a></dt>
            <dd><?= $ej["descripcion"]; ?></dd>
            <dd> <a href='<?= $ej["github"] ?>' target='_blank'>Código en github</a></dd>
        <?php } ?>
    </dl>
</body>
</html>