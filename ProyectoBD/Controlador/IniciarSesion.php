<?php
session_start(); 
require_once("../Modelo/Usuario.php");
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$contrasena=hash('sha512',$contrasena); 
$modelo= new Usuario();
$verificarUsuario=$modelo->verificarUsuario($usuario,$contrasena);
if($verificarUsuario!=NULL){
    
    $userdata= array(
        'correo'=>$verificarUsuario[1],
        'nombre'=>$verificarUsuario[3]

    );
    $_SESSION['usuario']=$userdata;
    
        echo'<script> 
        window.location="../Vistas/usuario.php";
        </script>';
    

}else{
 $_SESSION['respuesta']=1;   
  echo'<script> 
        window.location="../Vistas/index.php";
        </script>';
}
 ?>
