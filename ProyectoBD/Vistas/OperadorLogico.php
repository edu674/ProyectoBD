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
 			<h1 align="center">And</h1>
 			<div class="col s10 push-s1 pull-s1">
	          <form rol="form" method="post" id="like">
          <div class="col s6">    
			    <h6>Seleccione la primer tabla: </h6>
          <select  name="tabla1">
                    <option value="" disabled selected>selecciona una tabla</option>
                    <?php 
                    for ($i=0; $i < count($res) ; $i++) {
                     ?>
                    <option value="<?php echo ($res[$i][0]);?>"><?php echo ($res[$i][0]);?></option>
                          <?php } ?>
                </select>
          </div>
          <div class="col s6">      
                <h6>Ingrese el valor a buscar</h6>
                <input  name="valor" type="text" class="validate">
          </div>       
                <br><br>

          <div class="col s6">           
                <h6>Seleccione la segunda tabla: </h6>     
          <select  name="tabla2">
                    <option value="" disabled selected>selecciona una tabla</option>
                    <?php 
                    for ($i=0; $i < count($res) ; $i++) {
                     ?>
                    <option value="<?php echo ($res[$i][0]);?>"><?php echo ($res[$i][0]);?></option>
                          <?php } ?>
                </select>
          </div>
          <div class="col s6">
                <h6>Ingrese el valor a buscar</h6>
                <input  name="valor2" type="text" class="validate">          
          </div>
                <a class="waves-effect waves-light btn" onclick="EnviarPost('like')">And</a>
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
            if (isset($_POST["tabla1"]) && isset($_POST["valor"]) && isset($_POST["tabla2"]) && isset($_POST["valor2"])) {
 	          $and=$modelo->And("cliente",$_POST['tabla1'],$_POST['valor'],$_POST['tabla2'],$_POST['valor2']);
            ?>
            <tr>
 						<?php  for ($i=0; $i <count($and); $i++) { 
 					    for ($x=0; $x <count($res); $x++) { 
 					    ?>
 						<td><?php echo $and[$i][$x];?></td>
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

<script>
  function error(){
    M.toast({
        html: 'Error no hay registros coincidentes', 
        classes:"red rounded",
    })
  }
</script>