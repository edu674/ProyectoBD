<?php 
require("cabecero.php");
require("navegacion.php");
require_once("../Modelo/BaseDatos.php");
require_once("../Modelo/Crud.php");
$modelo=new Consultas();
$consultas=new Crud();
$busqueda=$consultas->BuscarTdo("cliente");
$res=$modelo->nombreTablas("cliente");
 ?>
 <main class="contpadding">
 	<div class="row">
	<div class="col s10 offset-s2" id="contenidoUsuario">
	</div>
	</div>

 	<div class="row">
 		<div class="col s10 push-s1 pull-s1" id="mainbody">
 			<h1 align="center">Like</h1>
 			<div class="col s10 push-s1 pull-s1">
	          <form rol="form" method="post" id="like">
			    <h6>Seleccione la tabla: </h6>
			    <select  name="tabla1">
                    <option value="" disabled selected>selecciona una tabla</option>
                    <?php 
                    for ($i=0; $i < count($res)-1 ; $i++) {
                     ?>
                    <option value="<?php echo ($res[$i][0]);?>"><?php echo ($res[$i][0]);?></option>
                          <?php } ?>
                </select>
                <br>
                <h6>Ingrese el valor a buscar</h6>
                <input  name="valor" type="text" class="validate">
                <br> 
                <a class="waves-effect waves-light btn" onclick="EnviarPost('like')">like</a>
            </form>
            <br><br>
 			<table class="responsive-table">
 				<thead class="blue">
 					<?php for ($i=0; $i <count($res) ; $i++) { 
 				    ?>
 					<th><?php echo $res[$i][0] ?></th>
 				<?php } ?>
 				</thead>
 				<tbody class="white">
 					<?php 
            if (isset($_POST["tabla1"]) && isset($_POST["valor"])) {
 	          $like=$modelo->Like("cliente",$_POST['tabla1'],$_POST['valor']);
            ?>
            <tr>
 						<?php  for ($i=0; $i <count($like); $i++) { 
 					    for ($x=0; $x <count($res); $x++) { 
 					    ?>
 						<td><?php echo $like[$i][$x];?></td>
 					<?php }
      echo "</tr>"; 
 				}
 				?>

 				<?php
          }else{
        ?>
 					<tr>
 						<?php  for ($i=0; $i <count($busqueda); $i++) { 
 					    for ($x=0; $x <count($res); $x++) { 
 					    ?>
 						<td><?php echo $busqueda[$i][$x];?></td>
 					<?php }
                    echo "</tr>"; 
 				}
 				} 
 				?>

 				</tbody>
 			</table>
 		</div>
 	</div>
 </main>
<?php   
require("footer.php");
  ?> 
<!-- <script>
  function set(){
  setInterval(function(){ EnviarPost('like'); }, 500);
}
</script> -->
