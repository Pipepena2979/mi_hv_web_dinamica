<?php
//--- Esta función permite escribir en consola cualquier tipo de dato.
// Incluyendo el contenido completo de los diferentes tipos de matrices.
// En la primera línea escribe el nombre de la variable y luego el contenido.
function write_to_console($data) {
 $console = 'console.log("' . getVariableName($data) . ' (' . gettype($data) . ')");';
 $console = sprintf('<script>%s</script>', $console);
 echo $console;
 $console = 'console.log(' . json_encode($data) . ');';
 $console = sprintf('<script>%s</script>', $console);
 echo $console;
}
// Función que returna el nombre de la variable
function getVariableName($var) {
 foreach($GLOBALS as $varName => $value) {
 if ($value === $var) {
 return $varName;
 }
 }
 return;
}
?> 