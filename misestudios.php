<!DOCTYPE html>
<html lang="es">
<?php
 // --- Importamos el componente <header> definido en el archivo cabecera.php
 include("cabecera.php");
 // --- Importamos el componente <nav> definido en el archivo menu.php
 include("menu.php");
 // --- Importamos los métodos de ayuda para seguimiento y otras herramientas
 // de conversión de datos
 include("./include/herramientas.php");
 // --- Importamos los metodos encargados de la conexión y gestión con la base de datos
 include("./include/conect.php");
?> 
    <main>
    <hr>
    <?php
    $LinkBD=Conectarse("sql203.epizy.com" , "epiz_33093588" , "AZmzXcPGWfmkD" , "epiz_33093588_web_personal_APRENDIZ");
    $ScriptSQL = "SELECT * FROM estudios";
    if ($DatosEstudio = mysqli_query($LinkBD, $ScriptSQL )) {
        // -- Iniciamos la publicación de los datos, mostrando la cabecera de la tabla.
        // en este caso, un solo renglón con el título "Estudios Realizados"
        echo "<table width='700' border='1' class='tabla' align='center'>";
        echo "<tr><td colspan='3' class='titulotabla'>Estudios Realizados</td></tr>";
        echo "<tr class='titulotabla'></tr></table>";
        echo "<br>"; 
        // -- inicio ciclo repetitivo que recorre la matriz de $DatosEstudio procesando
 // línea por línea los datos serán distribuidos en las diferentes celdas
 // de la tabla (plantilla prediseñada)
 while($fila = mysqli_fetch_array($DatosEstudio)){
    write_to_console($fila);
    // -- write_estado_var($fila);
    // -- analizamos si el estudio a mostrar tiene horas reportadas.
    // esto para evaluar si se debe mostrar o no este campo en la tabla
    if (is_null($fila['cantidad_horas'])) {
    $Horas = 0;
    $HorasColspan = "colspan='2'";
    }
    else {
    $Horas = $fila['cantidad_horas'];
    $HorasColspan = "";
    }
    // -- A continuación renderizamos la plantilla de ESTUDIOS con la información
    // de cada registro...
    echo "<table width='700' border='1' class='tabla' align='center' >";
 echo "<tr class='listado'>";
 echo "<td><div class='labelTab1'>Tipo de estudio cursado<br></div>" .
$fila['tipo_estudio'] . "</td>";
 echo "<td colspan='2' ><div class='labelTab1'>Nombre<br></div>" .
$fila['nombre_estudio'] . "</td>";
 echo "</tr>";
 echo "<td colspan='3' ><div class='labelTab1'>Institución Educativa<br></div>" .
$fila['institucion_educ'] . "</td>";
 echo "</tr>";
 echo "<td $HorasColspan><div class='labelTab1'>Ciudad<br></div>" .
$fila['ciudad'] . "</td>";
 echo "<td><div class='labelTab1'>Fecha de finalización<br></div>" .
$fila['fecha_graduacion'] . "</td>";
 if ($Horas>0) echo "<td><div class='labelTab1'>Horas<br></div>$Horas</td>";
 echo "</tr>";
 echo "</table><br>";
 } // --- aquí finaliza el ciclo while
 // -- liberar el conjunto de resultados
 mysqli_free_result($DatosEstudio);
 }
 else {
 printf("Hubo errores al leer los datos");
 }
 //Cerrar la conexión con el servidor de bases de datos:
 mysqli_close($LinkBD);        
    ?> 
    </main>
        <?php
    include("piedepagina.php");
    ?>
</body>
</html>