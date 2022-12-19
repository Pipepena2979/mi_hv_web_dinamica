<?php
 // Archivo Componente: conect.php
 // Proyecto: Página Web Mi hoja de vida personal
 // Este archivo contiene la librería de funciones mySQL para conectar con
 // la base de datos y para realizar operaciones sobre las diferentes tablas
 // que la conforman..
function Conectarse( $servidor , $usuario , $password , $basedatos ) {
 // --- aquí se realiza el intento de conexión con los datos suministrados
 if (!($link = mysqli_connect($servidor, $usuario, $password))) {
 echo "Error al conectar con el servidor de base de datos.<br/>";
 // --- En caso de error el proceso termina forzadamente.
 exit();
 }
 if (!mysqli_select_db($link, $basedatos))
 {
 echo "Error al conectar al acceder a la BD, (no existe la BD $basedatos).<br/>";
 // --- En caso de error el proceso termina forzadamente.
 exit();
 }
 else {
// --- si la conexión fue satisfactoria, se configura el CharSet UTF-8
 if (!mysqli_set_charset($link, "utf8"))
 {
 printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($link));
 exit();
 }
 }
 return $link;
}
?>