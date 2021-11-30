<?php 
require("cabecero.php");
require("navegacion.php");
require_once("../Modelo/BaseDatos.php");
require_once("../Modelo/Crud.php");
$modelo=new Consultas();
$res=$modelo->nombreColumnas();
$consultas=new Crud();
 ?>

<main class="contpadding">
	<div class="row">
		<div class="col s10 offset-s2" id="contenidoUsuario">
		</div>
	</div>

	<div class="row">
		<div class="col s10 push-s1 pull-s1" id="mainbody">
			<h1 align="center">Actualizar</h1>
			<div class="col s10 push-s1 pull-s1">
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


            <?php 
            if(isset($_POST['tabla1'])){
            $buscar=$consultas->BuscarTdo($_POST["tabla1"]);
            $nombretablas=$modelo->nombreTablas($_POST["tabla1"]);
            $_SESSION["tabla1"]=$_POST['tabla1'];
            ?>
            <br><br>
            <table class="responsive-table">
            	<thead class="blue">
            		<tr>
            			<?php for ($i=0; $i <count($nombretablas) ; $i++) { 
            			?>
            			<th class="contable"><h6 align="center"><?php echo $nombretablas[$i][0]?></h6></th>
            		<?php } ?>
            		  <th class="contable"><h6 align="center">Actualizar</h6></th>
            		</tr>
            	</thead>
            	<tbody class="white">
            		<tr>
            			<?php for ($i=0; $i <count($buscar) ; $i++) { 
            				for ($x=0; $x <count($nombretablas) ; $x++) { 
            			 ?>
            			<td class="contable"><h6 align="center"><?php echo $buscar[$i][$x] ?></h6></td>
            		<?php }?>
            		<td class="contable"><a href="ActualizarForm.php?id=<?php echo $buscar[$i][0] ?>" class="btn red">Actualizar</a></td>
            		</tr>
            	<?php  } ?>

            <?php } ?>
            		
            	</tbody>
            </table>
            <br><br>
   
			</div> <!-- class col s12 -->
		</div> <!-- mainbody -->
	</div> <!-- class row -->
	
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
     actualizarcrud()
    </script>";
   }else{
  unset($_SESSION['respuesta']);
   echo "
    <script>
     actualizarcruderror()
    </script>";
   }
}
  