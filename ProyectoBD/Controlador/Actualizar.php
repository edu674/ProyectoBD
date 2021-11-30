<?php 
session_start();
require("../Modelo/Crud.php");
$crud=new Crud();
$nombre=array();
$valores=array();
$cadena=array();
$tabla=$_SESSION['tabla1'];
$key=$_SESSION['llave'];
$val=$_SESSION['valor'];
$contador=0;
foreach ($_POST as $indice => $valor) {
$cadena[$contador]=$indice."="."'".$valor."'";
$contador=$contador+1;
}
$cadena_nombres= implode(",", $cadena);
$actualizar=$crud->Actualizar($cadena_nombres,$tabla,$key,$val);
if($actualizar==true){
unset($_SESSION["tabla1"]);
unset($_SESSION["llave"]);
unset($_SESSION["valor"]);
$_SESSION['respuesta']=1;
echo'<script> 
        window.location="../Vistas/Actualizar.php";
        </script>';
}else{
$_SESSION['respuesta']=2;
echo'<script> 
        window.location="../Vistas/Actualizar.php";
        </script>';
}
?>