<?php 
require("cabecero.php");
 ?>
<main>
	<div class="container">
	<div class="row">
	<form action="../Controlador/usuario.php" method="post">	
		<div class="col s12">
			<h3 align="center"> Formulario de registro</h3>
		</div>
		<div class="col s12">
			<h5>Nombre de usuario: </h5>
			<input placeholder="Nombre de Usuario" name="nombres" id="nombres" type="text" class="validate">
		</div>
		<div class="col s12">
			<h5>Apellidos: </h5>
			<input placeholder="Nombre de Usuario" name="apellidos" id="apellidos" type="text" class="validate">
		</div>
		<div class="col s12">
			<h5>Correo Electronico:</h5>
			<input placeholder="usuario@mail.com" name="correo" id="correo" type="email" class="validate">
		</div>
		<div class="col s12">
			<h5>Contraseña</h5>
			<input placeholder="contraseña" name="contrasena" type="password" class="validate">
		</div>
		<div class="col s12">
			<h5>Confirmar Contraseña:</h5>
			<input placeholder="contraseña" name="contrasena2" type="password" class="validate">
		</div>
		<div  class="col s12">
			<button class="btn waves-effect waves-light bt-color red" type="submit" name="action" onclick="datos()">Enviar
                <i class="material-icons right">send</i>
            </button>
		</div>
	</form>			
	</div>
	</div>
</main>
<?php 
require("footer.php");
?>

<?php 
if(isset($_SESSION['validar'])){
if ($_SESSION['validar']==1) {	
unset($_SESSION['validar']);
echo "<script>
 mensajeError();
 </script>";
}
else {	
unset($_SESSION['validar']);
echo "<script>
contraseña();
 </script>";
}
}
 ?>