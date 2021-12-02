<?php 
require ("cabecero.php");
require("navegacion.php");
require("../Modelo/BaseDatos.php");
$consultas=new Consultas();

$tablas=$consultas->nombreTablas("usuario");
 ?>
<main class="contpadding">
	<div class="row">
		<div class="col s10 offset-s2" id="contenidoUsuario">
		</div>
	</div>
	<div class="row">
		<div class="col s10 push-s1 pull-s1" id="mainbody">
			<h1 align="center">Procedimiento Almacenado</h1>
			<br><br>
			<table class="responsive-table">
				<thead class="blue">
				<?php for ($i=0; $i <count($tablas) ; $i++) { 
			    ?>
			    <th><?php echo $tablas[$i][0] ?></th>
			<?php } ?>
				</thead>
				<tbody class="white">
					<tr>
					<?php 
					$procedure=$consultas->Procedure();
					for ($i=0; $i <count($procedure) ; $i++) { 
					for ($x=0; $x <count($tablas) ; $x++) { 
					 ?>
					 <td class="tbltxt"><?php echo $procedure[$i][$x] ?></td>
					<?php }
					echo"</tr>";

				} ?>
				</tbody>
				
			</table>
		</div>
	</div>
</main>
 <?php 
require("footer.php");
  ?>