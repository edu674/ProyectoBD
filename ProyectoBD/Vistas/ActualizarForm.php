<?php 
require("cabecero.php");
require("navegacion.php");
require_once("../Modelo/BaseDatos.php");
require_once("../Modelo/Crud.php");
$modelo=new Consultas();
$consultas=new Crud();
$id=$_GET['id'];
$res=$modelo->nombreTablas($_SESSION["tabla1"]); 
$key=$modelo->llaves($_SESSION["tabla1"]);
$busqueda=$consultas->Buscar($key["Column_name"],$_SESSION['tabla1'],$id);
$_SESSION['llave']=$key["Column_name"];
 ?>
<main class="contpadding">
	<div class="row">
		<div class="col s10 offset-s2" id="contenidoUsuario">
		</div>
	</div>

	<div class="row">
		<div class="col s9 push-s2 pull-s1" id="mainbody">
			<h4 align="center">Modifique solo los campos que desee actualizar</h4>
			<br><br>
			<form action="../Controlador/Actualizar.php" id="ActualizarCrud" method="post">
				<?php
				for ($i=0; $i <count($res); $i++) {  
				 ?>
				 <h5><?php echo $res[$i][0]; ?></h5>
				 <?php 
				 if($i==0){?>
				 <input disabled value="<?php echo $busqueda[0][$i]; ?>" name="<?php echo $res[$i][0]; ?>" type="text" class="validate">
				<?php } 
				else{
				?>
				<input  value="<?php echo $busqueda[0][$i]; ?>" name="<?php echo $res[$i][0]; ?>" type="text" class="validate">
			<?php } ?>
				<?php } 
				$_SESSION['valor']=$busqueda[0][0];
				?>
				<br><br>
                <a class="waves-effect waves-light btn red" onclick="EnviarPost('ActualizarCrud')">Enviar</a> 
		    </form>
		</div>
		
	</div>
	
</main>
 <?php 
require("footer.php");
  ?>