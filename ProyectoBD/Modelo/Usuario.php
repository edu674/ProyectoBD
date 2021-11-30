<?php 
require "../Configuraciones/conexion.php";
 class Usuario{	
 	public function AgregarUsuario($correo,$contraseña,$nombres,$apellidos){
  global $conexion;       
 	$query=  $conexion -> query("INSERT INTO `usuario`(`id_Usuario`, `Correo_Electronico`, `Contraseña`, `Nombres`, `Apellidos`) VALUES (null,'$correo','$contraseña','$nombres','$apellidos')") or die($conexion -> error);
  return $query;
 	}
  public function verificarCorreo($correo){
    global $conexion;
    $sql="SELECT Correo_Electronico FROM usuario WHERE Correo_Electronico='$correo'";
    $query=mysqli_query($conexion,$sql);
    $query=mysqli_num_rows($query);
    return $query;
  }

  public function verificarUsuario($correo,$contrasena){
    global $conexion;
    $sql="SELECT *  FROM `usuario` WHERE Correo_Electronico='$correo' and Contraseña='$contrasena'";
    $query=mysqli_query($conexion,$sql);
    $query=mysqli_fetch_row($query);
    return $query;
  }

  public function buscarUsuario($correo){
    global $conexion;       
    $query=  $conexion -> query("SELECT * FROM `usuario` WHERE Correo_Electronico='$correo'") or die($conexion -> error);
    $sql=mysqli_fetch_array($query);
    return $sql;
      } 

 }


 ?>
