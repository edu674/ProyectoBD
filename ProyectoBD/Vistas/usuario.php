<?php 
// session_start();
require "cabecero.php";
require_once("../Modelo/Usuario.php");
$data= new Usuario();
$cor=$_SESSION['usuario']['correo'];
$userdata=$data->buscarUsuario($cor);
 ?>
<main class="sidemenu">
<div class="row"> 
<div class="">
<?php 
require("navegacion.php");
 ?>	
</div>

<div class="col s10 offset-s2" id="contenidoUsuario">
 <h1 >Bienvenido <?php echo $userdata["Nombres"]."<br>".$userdata["Apellidos"]?>!</h1>
 <br>			
</div>
</div> <!-- div row -->
</main>

<?php require"footer.php"; ?>
<?php 
if(isset($_SESSION['respuesta'])){
   if($_SESSION['respuesta']==1){
   	unset($_SESSION['respuesta']);
   	echo "
   	<script>
     actulizarmsn();
   	</script>";
   }
}
 ?>
