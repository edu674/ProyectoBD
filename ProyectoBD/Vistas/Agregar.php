<?php 
require("cabecero.php");
require_once"../Modelo/BaseDatos.php";
$modelo=new Consultas();
$res=$modelo->nombreColumnas();
 require("navegacion.php"); 
 ?>
<main class="contpadding">
   <div class="row">
    <div class="col s10 offset-s2" id="contenidoUsuario">
    </div>
</div>
   <div class="row">
   <div  class="col s9 push-s2 pull-s1" id="mainbody">
	<!-- <div class="container"> -->
   <h1 align="center">Agregar</h1>   
		<div class="s9 push-s2 pull-s1">
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
	</div>
	<?php 
  if ($_POST) {
     $name=$_POST["tabla1"];
     $_SESSION['tabla']=$_POST["tabla1"];
     $columns=$modelo->nombreTablas($name);
     // var_dump($columns);
     ?>
     	<div class="row">
     		<form action="../Controlador/Agregar.php" id="AgregarCrud" method="post">
     			<div class="col s9 push-s2 pull-s1">
            <?php for ($i=0; $i <count($columns); $i++) { 
     			?>	
			    <h5><?php echo $columns[$i][0]; ?></h5>
			    <input placeholder="<?php echo $columns[$i][0]; ?>" name="<?php echo $columns[$i][0]; ?>" type="text" class="validate">
		    <?php } ?>
          <br><br>
          <a class="waves-effect waves-light btn red" onclick="EnviarPost('AgregarCrud')">Enviar</a> 
          </div>
		</form>
     	</div>
     <?php  
    }else{
    }
    ?>

      
<!-- 	</div> -->	
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
     agregarcrud()
    </script>";
   }else{
   unset($_SESSION['respuesta']);
   echo "
    <script>
     agrregarcruderror()
    </script>";
   }
}
 ?>
