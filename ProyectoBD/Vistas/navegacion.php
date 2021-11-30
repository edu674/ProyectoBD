<head>
   <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   
   <!-- iconos google-->    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Raleway:500,600&display=swap" rel="stylesheet">
    
    <!-- CSS Estilos -->
    <link rel="stylesheet" href="../Css/estilos.css">
</head>
<div class="navegacion">
	<ul>
		<li class="lista">
			<a> 
				<span class="material-icons"  onclick="slide()">menu</span>
			</a>		
		</li>
		<li class="lista">
			<a onclick="Crud()">
				<span class="material-icons tooltipped" data-position="right" data-tooltip="CRUD">settings</span>
				<span class="titulo">CRUD</span>
			</a>		
		</li>

		<li class="lista">
			<a>
				<span class="material-icons tooltipped" data-position="right" data-tooltip="Operador Lógico">swap_horiz</span>
				<span class="titulo">Operador Lógico</span>
			</a>
		</li>

		<li class="lista">
			<a>
				<span class="material-icons tooltipped" data-position="right" data-tooltip="Operador Comparacion">compare_arrows</span>
				<span class="titulo ">Operador Comparacion</span>
			</a>
		</li>

		<li class="lista">
			<a href="InnerJoin.php">
				<span class="material-icons tooltipped" data-position="right" data-tooltip="Inner Join">join_inner</span>
				<span class="titulo" >Inner Join</span>
			</a>
		</li>

		<li class="lista">
			<a>
				<span class="material-icons tooltipped" data-position="right" data-tooltip="CRUD Procedimiento Almacenado">memory</span>
				<span class="titulo ">Procedimiento Almacenado</span>
			</a>
		</li>
		<li class="lista">
			<a href="#modal2" class=" modal-trigger transparent">
				<span class="material-icons tooltipped" data-position="right" data-tooltip="Cerrar Sesion">logout</span>
				<span class="titulo " >Cerrar Sesion</span>
			</a>
		</li>
	</ul>
</div> <!-- div navegacion -->

  <div id="modal2" class="modal modallogout">
  	<form action="../Controlador/CerrarSesion.php" method="post" id="CerrarSesion">
    <div class="modal-content center red white-text">
      <h4>Seguro que desea salir?</h4>
    </div>
    <div class="modal-content center">
      <a class="waves-effect waves-light btn-large " width="50%" onclick="EnviarPost('CerrarSesion')"> SI</a>
      <a  href="" class="waves-effect waves-light btn-large " width="50%">NO</a>
    </div>
  </form>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../Js/main.js"></script>