<?php
/**
 * Ejercicio 5. Figuras geométricas.
 * Escribe un script que muestre una figura geométrica utilizndo el formato svg. Para
 * ello, el script mostrará un formulario con un radio button con las figuras disponibles:
 * círculo, rectángulo, cuadrado y un cuadro de texto para seleccionar el color. En función
 * de la figura elegida, el script solicitará los datos necesarios para su visualización.
 *
 * @author David Pérez Ruiz
 */

$arrayFiguras = ["Círculo", "Rectángulo", "Cuadrado"];
$arrayColores = ["Rojo", "Naranja", "Amarillo", "Verde", "Azul", "Morado", "Negro", "Rosa"];

 if (isset($_POST["enviar"]) or isset($_POST["enviar2"])) {
     // Comprobar color
     $colorFigura = $_POST["color"];

     // Comprobar figura
     $figuraValida = false;
     if (isset($_POST["figura"]) and $_POST["figura"] != "") {
         $figuraValida = true;
     }

     // Comprobar datos de la figura
     $figura = $_POST["figura"];
     $datosFiguraCorrectos = false;
     switch ($figura) {
        case 'Círculo':
            $radio = $_POST["radio"];
            $width = $height = $radio*2;
            if ($radio > 0) {
                $datosFiguraCorrectos = true;
            }
            break;
        case 'Rectángulo':
            $width = $_POST["base"];
            $height = $_POST["altura"];
            if ($width > 0 and $height > 0) {
                $datosFiguraCorrectos = true;
            }
            break;
        case 'Cuadrado':
            $width = $height = $_POST["lado"];
            if ($width > 0) {
                $datosFiguraCorrectos = true;
            }
            break;
     }

     // Traducir color
     $color = $_POST["color"];
             switch ($color) {
             case 'Rojo':
                 $valueColor = 'red';
                 break;
             case 'Naranja':
                 $valueColor = 'orange';
                 break;
             case 'Amarillo':
                $valueColor = 'yellow';
                break;
             case 'Verde':
                $valueColor = 'green';
                break;
             case 'Azul':
                $valueColor = 'blue';
                break;
             case 'Morado':
                $valueColor = 'violet';
                break;
             case 'Negro':
                $valueColor = 'black';
                break;
             case 'Rosa':
                $valueColor = 'pink';
                break;
            }
 }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Pérez Ruiz">
    <title>Figuras geométricas</title>
</head>
<body>
    <h1>Figuras geométricas</h1>
    <p>
        Escribe un script que muestre una figura geométrica utilizndo el formato svg. Para
        ello, el script mostrará un formulario con un radio button con las figuras disponibles:
        círculo, rectángulo, cuadrado y un cuadro de texto para seleccionar el color. En función
        de la figura elegida, el script solicitará los datos necesarios para su visualización.
    </p>
    <form action="" method="post">
        <?php foreach ($arrayFiguras as $fig) {?>
            <div>
                <label for='<?=$fig?>'><?=$fig?></label>
                <input type='radio' name='figura' id='<?=$fig?>' value='<?=$fig?>'
                <?php if ($figura == $fig) echo " checked"; ?>>
            </div>
        <?php }?>
        <div>
            <?php if(!$figuraValida and isset($_POST["enviar"])) {?>
            Selecciona una figura.
            <?php }?>
        </div>
        <div>
            <select name="color" id="color" >
            <?php foreach ($arrayColores as $col) {?>
                <option value='<?=$col?>'
                <?php if($_POST['color'] == $col) echo " selected"; ?>
                ><?=$col?></option>
            <?php }?>
            </select>
        </div>
        <div>
            <?php switch ($figura) {
                case 'Círculo':?>
                    <div>
                        <label for="radio">Radio</label>
                        <input type="number" name='radio' id='radio' value='<?=$_POST['radio']?>'>
                    </div>
                    <?php 
                    break;
                case 'Rectángulo':?>
                    <div>
                        <label for="base">Base</label>
                        <input type="number" name='base' id='base' value='<?=$_POST['base']?>'>
                    </div>
                    <div>
                        <label for="altura">Altura</label>
                        <input type="number" name='altura' id='altura' value='<?=$_POST['altura']?>'>
                    </div>
                    <?php
                    break;
                case 'Cuadrado':?>
                    <div>
                        <label for="lado">Lado</label>
                        <input type="number" name='lado' id='lado' value='<?=$_POST['lado']?>'>
                    </div>
                    <?php
                    break;
            }?>
        </div>
        <div>
            <?php if(!$datosFiguraCorrectos and isset($_POST["enviar2"])) { ?>
            Datos no válidos. Todos los datos deben de ser mayores que 0.
            <?php } ?>
        </div>
        <div>
            <?php if(isset($_POST["enviar"]) and $figuraValida) { ?>
            <input type='submit' value='Enviar' name='enviar2'>
            <?php } else { ?>
            <input type='submit' value='Enviar' name='enviar'>
            <?php } ?>            
        </div>
    </form>
    <svg width='<?= $width ?>' height='<?= $height ?>'>
    <?php switch ($figura) {
                case 'Círculo':?>
                    <circle cx='<?= $radio ?>' cy='<?= $radio ?>' r='<?= $radio ?>' fill='<?= $valueColor ?>'>
                    <?php 
                    break;
                case 'Rectángulo':
                case 'Cuadrado':?>
                    <rect x='0' y='0' width='<?= $width ?>' height='<?= $height ?>' fill='<?= $valueColor ?>'>
                    <?php
                    break;
            }?>
    </svg>
</body>
</html>