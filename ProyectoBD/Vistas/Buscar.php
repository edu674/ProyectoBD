<?php 
require("cabecero.php");
require_once"../Modelo/BaseDatos.php";
require("../Modelo/Crud.php");
require "../Configuraciones/conexion.php";
$modelo=new Consultas();
$crud=new Crud();
$res=$modelo->nombreColumnas();
require("navegacion.php"); 
 ?>

<main class="contpadding">
 <div class="row">
     <div class="col s10 offset-s2" id="contenidoUsuario">  
     </div>
 </div>
	<!-- <div class="container"> -->       
	<div class="row">
        <div class="col s9 push-s2 pull-s1" id="mainbody">
		<h1 align="center">Buscar</h1> 
        <div class="col s12">

	<form rol="form" method="post">
			<h6>Seleccione la tabla: </h6>
			<select  name="tabla1" onchange="this.form.submit()">
            <option value="" disabled selected>selecciona una tabla</option>
            <?php 
            for ($i=0; $i < count($res)-1 ; $i++) {
             ?>
            <option value="<?php echo ($res[$i][0]);?>"><?php echo ($res[$i][0]);?></option>
            <?php } ?>
            </select>
      </form>	
		</div>
	<!-- </div> -->

<!-- pinta el segundo select donde se seleccionara el dato a buscar de las tablas -->
    <?php 
  if (isset($_POST["tabla1"])) {
     $name=$_POST["tabla1"];
     $_SESSION['tabla']=$_POST["tabla1"];
     $columns=$modelo->nombreTablas($name);
     ?>   
<div class="col s12">
   <form rol="form" method="post">
   	<h6>Seleccione la tabla: </h6>
     <select  name="tabla2" onchange="this.form.submit()">
     <option value="" disabled selected>selecciona una tabla</option>
     <?php 
     for ($i=0; $i < count($columns) ; $i++) {
      ?>
     <option value="<?php echo ($columns[$i][0]);?>"><?php echo ($columns[$i][0]);?></option>
     <?php } ?>
     </select>
   </form>
</div>

<!-- pinta en pantalla el text input para colocar el dato a buscar -->
    <?php  
    }
    if(isset($_POST['tabla2'])){
    	$_SESSION["tabla2"]=$_POST["tabla2"];
    ?>
    <div class="col s12">
    	<form rol="form" method="post" id="Buscar">
    	<h6>Ingrese el <?php echo $_POST['tabla2'] ?> que desea buscar</h6>
    	<input placeholder="Dato a buscar" name="Buscar" id="Buscar" type="text" class="validate">
    	</form>
    	<a class="btn red" onclick="EnviarPost('Buscar')">Buscar</a>
    </div>
<!-- pinta en manera de tabla el resultado obtenido de la busqueda -->

<?php }
  if (isset($_POST["Buscar"])) {
  $busqueda=$crud->Buscar($_SESSION['tabla2'],$_SESSION['tabla'],$_POST["Buscar"]);
  $columns=$modelo->nombreTablas($_SESSION['tabla']);
  if ($busqueda!=NULL) {
 ?>
   <div class="col s12">
    <br><br>
   	<table class="responsive-table">
   		<thead class="blue">
            <tr>
   			<?php  for ($i=0; $i < count($columns) ; $i++) {
   			?>
   			<th class="contable"><h6 align="center"><?php echo $columns[$i][0];?></h6></th>
   		<?php } ?>
        </tr>

   		</thead>
   		<tbody class="white">
   			<tr>
   				<?php for ($i=0; $i < count($busqueda) ; $i++) { 
                    for ($x=0; $x <count($columns) ; $x++) { 
   				 ?>
   				<td class="contable"><h6 align="center"><?php echo $busqueda[$i][$x]?></h6></td>
   			<?php }
            echo"</tr>";
        }
   			?>
   		</tbody>
   	</table>
    <br><br>
   </div>
<?php
unset($_SESSION["tabla2"]);
unset($_SESSION["tabla"]); 
}
else{
unset($_SESSION["tabla2"]);
unset($_SESSION["tabla"]);
    echo"
      <script>
      busquedaerror()
      </script>
    ";
}

 }?>
</div>

</div>
<!-- </div> -->	
</main>

<?php 
require("footer.php");
 ?>