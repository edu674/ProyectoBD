<?php 
session_start();
require("../Modelo/Crud.php");
$crud=new Crud();
$nombre=array();
$valores=array();
$tabla=$_SESSION['tabla'];
$contador=0;
foreach ($_POST as $indice => $valor) {
$nombre[$contador]=$indice;
$valores[$contador]="'".$valor."'";
$contador=$contador+1;
}
$cadena_nombres= implode(",", $nombre);
$cadena_valores= implode(",", $valores);
$agregar=$crud->Agregar($cadena_nombres,$cadena_valores,$tabla);
if($agregar==true){
unset($_SESSION["tabla"]);
$_SESSION['respuesta']=1;
echo'<script> 
        window.location="../Vistas/Agregar.php";
        </script>';
}else{
$_SESSION['respuesta']=2;
echo'<script> 
        window.location="../Vistas/Agregar.php";
        </script>';
}
?>