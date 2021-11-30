<?php
session_start(); 
    require_once("../Modelo/Usuario.php");
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$correo=$_POST['correo'];
	$contrasena=$_POST['contrasena'];
	$contrasena2=$_POST['contrasena2'];
	$registar=new Usuario();
    $res=$registar->verificarCorreo($correo);
    if (strcmp($contrasena,$contrasena2)==0) {
    if ($res>0) {	
    	$_SESSION['validar']=1;
    	echo'<script> 
		window.location.href="../Vistas/formularioRegistro.php";
		</script>';
    }else{
    $contrasena=hash('sha512',$contrasena);	
    $registar->AgregarUsuario($correo,$contrasena,$nombres,$apellidos);
    $userdata=array(
    	'correo'=>$correo,
    	'nombre'=>$nombres,
    );
    $_SESSION['usuario']=$userdata;
    echo'<script> 
		window.location="../Vistas/usuario.php";
		</script>';
    }
 }else{
 	$_SESSION['validar']=2;
 	echo'<script> 
		window.location.href="../Vistas/formularioRegistro.php";
		</script>';
 }
?>
