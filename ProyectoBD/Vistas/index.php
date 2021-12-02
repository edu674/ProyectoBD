<?php 
require("cabecero.php");
 ?>
<main style="min-height: 500px;">
	<div class="row">
        <div class="col s10 push-s1 pull-s1" >
            <img src="../img/logo.png" class="imglogo">
            <br>
            <h2 align="center" class="subtitulo">"Tu mejor opcion para el trabajo temporal"</h2>
            <h2 align="center">Descripción:</h2>
            <h6>El siguiente programa es una herramienta para poder manipular la base de datos de la empresa mito,
            la cual cuenta con algunas principales características tales como, la creación, la modificación, y la eliminación de datos, tal cual como un CRUD convencional, con implementación además de otras herramientas tales como la  unión de tablas (inner join), manejo de operadores lógicos, operadores de comparación además del uso de un procedimiento almacenado previamente ya creado dentro de la base de datos</h6>
            <h2 align="center">¿A quien va Dirigido?</h2>
            <h6>El programa esta dirigido a la parte de administracion de quien manipulara el sistema, pues este al contar con un entorno amigable podra ejecutar consultas de SQL sin la necesidad de tener conocimientos en la creacion y manejo de Scripts SQL por lo que lo hace apto para cualquier persona encargada de la manipulacion de datos dentro de la base de datos </h6>

        </div>
    </div>
</main>
<?php 
require("footer.php");
 ?>

<?php 
if(isset($_SESSION['respuesta'])){
   if($_SESSION['respuesta']==1){
    unset($_SESSION['respuesta']);
    echo "
    <script>
     verificarUsuario()
    </script>";
   }
}
 ?>