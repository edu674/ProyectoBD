<?php 
session_start();
require("../Modelo/Crud.php");
$crud=new Crud();
$tabla=$_SESSION['tabla1'];
$valor=$_GET['id'];
$llave=$_SESSION['llave'];
$eliminar=$crud->Eliminar($tabla,$llave,$valor);
if($eliminar==true){
unset($_SESSION["tabla1"]);
unset($_SESSION["id"]);
unset($_SESSION['llave']);
$_SESSION['respuesta']=1;
echo'<script> 
        window.location="../Vistas/Eliminar.php";
        </script>';
}else{
$_SESSION['respuesta']=2;
echo'<script> 
        window.location="../Vistas/Eliminar.php";
        </script>';
}
?>