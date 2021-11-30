<?php 
require "../Configuraciones/conexion.php";
 class Crud{
 public function Agregar($cadena_nombres,$cadena_valores,$tabla){
   global $conexion;
   $sql=mysqli_query($conexion,"INSERT INTO $tabla ($cadena_nombres) VALUES ($cadena_valores)");
   return $sql;
 }

 public	function Buscar($datoBuscar,$tabla,$valor){
  global $conexion;
   $sql=mysqli_query($conexion,"SELECT * FROM $tabla WHERE $datoBuscar='$valor'");
   $resultado=mysqli_fetch_all($sql);
   return $resultado;
 }

  public  function BuscarTdo($tabla){
  global $conexion;
   $sql=mysqli_query($conexion,"SELECT * FROM $tabla");
   $resultado=mysqli_fetch_all($sql);
   return $resultado;
 }

 public function Actualizar($cadena,$tabla,$primarykey,$valor){
   global $conexion;
   $sql=mysqli_query($conexion,"UPDATE `$tabla` SET $cadena WHERE $primarykey='$valor'");
   return $sql;
 }

  public function Eliminar($tabla,$primarykey,$valor){
   global $conexion;
   $sql=mysqli_query($conexion,"DELETE FROM `$tabla` WHERE $primarykey='$valor'");
   return $sql;
 }

  

 }


 ?>
