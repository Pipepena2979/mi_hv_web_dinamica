<!DOCTYPE html>
<html lang="es">
   <?php
   include("cabecera.php");
   ?>
<body>
   <?php
   include("menu.php");
   ?>
<main>
    <link rel="stylesheet" href="css/contacto.css">
    <hr>
    <form  action="" method="POST">
        <h2>Formulario</h2>
        <fieldset>
        <legend>Datos Personales</legend>
        <p>Nombre: <input type="text" name="nombre"/> 
           Teléfono: <input type="text" name="Telefono" size="25"/>
           Edad:<input type="text" name="Edad" size="25"/></p>
        <p>Dirección: <input type="text" name="direccion" size="50" value="calle o plaza, número y piso."/></p>
        <p>e-mail: <input type="text" name="e-mail" size="35" value=" @ "/></p>
        <p>Fecha de Nacimiento: <input type="fch" name="Fecha" value="AA/MM/DD"/></p>
        <label>Sexo</label>
              <br></br>
              <div class="opciones-radio"> 
              <div class="form-group">
                 <span class="opcion-radio"> 
                  <input type="radio" value="M" id="Masculino" name="genero" checked> 
                  
                  <label for="Masculino">Masculino</label> </span> 
                  
                  <span class="opcion-radio"> 
                  <input type="radio" value="F" id="Femenino" name="genero">
                  <label for="Femenino">Femenino</label> </span> <span class="opcion-radio"> 
                  <input type="radio" value="O" id="Otro" name="genero"> 
                  <label for="Otro">Otro</label> </span> </div> </div>
        </fieldset>	
        <fieldset>
        <legend>Nivel de estudios e intereses</legend><br>     
         <div class="opciones-radio"> 
         <div class="form-group">
            <span class="opcion-radio"> 
             <input type="radio" value="Certificado Escolar" id="Certificado Escolar" name="tipo_estudio" checked> 
             
             <label for="Certificado Escolar">Certificado Escolar</label> </span> 
             
             <span class="opcion-radio"> 
             <input type="radio" value="Graduado en E.S.O." id="Graduado en E.S.O." name="tipo_estudio">
             <label for="Graduado en E.S.O.">Graduado en E.S.O.</label> </span> <span class="opcion-radio"> 
               <input type="radio" value="Diplomado" id="Diplomado" name="tipo_estudio">
             <label for="Diplomado">Diplomado</label> </span> <span class="opcion-radio"> 
               <input type="radio" value="Licenciado o Doctorado" id="Licenciado o Doctorado" name="tipo_estudio">
             <label for="Licenciado o Doctorado">Licenciado o Doctorado</label> </span> <span class="opcion-radio">
             <input type="radio" value="Bachiller-Formacion Profesional" id="Bachiller-Formacion Profesional" name="tipo_estudio"> 
             <label for="Bachiller-Formacion Profesional">Bachiller-Formacion Profesional</label> </span> </div> </div>
            </div>
        </fieldset>
        <fieldset>
        <legend>Datos sobre la Pagina Web</legend>
        <p>Frecuencia con  la que visitaria la Pagina Web:</p>
        <p><select name="frecuencia">
             <option>Semanal</option>
             <option>Quincenal</option>
             <option>Mensual</option>
             <option>Bimensual</option>
           </select></p>
        <p>Puedes mandar cualquier modificacion, que quieras hacerle a la pagina web. Nosotros lo valoraremos
           para que pueda ser modificada, si es posible.</p>
        <p>Enviar Modificación: <input type="file" name="artículo"/> </p>		
                
        <p>Si deseas mandar simplemente una opinion o comentario escribelo aquí.<br/>
        <textarea name="comentario" rows="5" cols="50" placeholder="Escribe aqui tu comentario" ></textarea></p>
        </fieldset>
        <fieldset>
        <legend>Comenzar de Nuevo</legend>
        <p>Borrar todos los datos del formulario y volver a empezar:
           <input type="reset" value="Borrar todo"/>
        </p>
        </fieldset>
        <fieldset>
        <legend>Enviar</legend>
        <input name="submit" type="submit" value="Enviar"/>
        </fieldset>
        </form>
</main>
<?php 
    if (isset($_POST["submit"])){
        $nombre=$_POST["nombre"];
        $telefono=$_POST["Telefono"];
        $edad=$_POST["Edad"];
        $direccion=$_POST["direccion"];
        $correo=$_POST["e-mail"];
        $FechaNa=$_POST["Fecha"];
        $genero=$_POST["genero"];
        $estudios=$_POST["tipo_estudio"];
        $mensaje=$_POST["comentario"];

        

         include("./include/conect.php");
                $LinkBD=Conectarse("sql203.epizy.com" , "epiz_33093588" , "AZmzXcPGWfmkD" ,"epiz_33093588_web_personal_APRENDIZ");
                $ScriptSQL = "INSERT INTO contacto (Nombre,Telefono,Edad,Direccion,Email,Fecha_Nacimiento,Sexo,N_Estudios,Comentario) VALUES('$nombre','$telefono',$edad,'$direccion','$correo','$FechaNa','$genero','$estudios','$mensaje')"; 
                if ($DatosGlosario = mysqli_query($LinkBD, $ScriptSQL )) {
                    echo"<script>alert('Registro exitoso');</script>";
    }else {
        echo"Hubo errores al leer los datos";
        }
     mysqli_close($LinkBD);}
    
    
    include("piedepagina.php");
    ?>
</body>

</html>