<?php 
require "../Configuraciones/conexion.php";
 class Consultas{	

 public function nombreColumnas(){
       global $conexion;
       global $nombrebd;
       $sql=mysqli_query($conexion,"SELECT table_name AS nombre
       FROM information_schema.tables WHERE table_schema = '$nombrebd'");
       $resultado=mysqli_fetch_all($sql);
       return $resultado;
  }

 public function nombreTablas($var1){
    global $conexion;
    $sql=mysqli_query($conexion,"SHOW COLUMNS FROM ".$var1);
    $resultado=mysqli_fetch_all($sql);
    return $resultado;
    }

 public function llaves($var1){
    global $conexion;
    $sql=mysqli_query($conexion,"SHOW KEYS FROM $var1 WHERE Key_name = 'PRIMARY' ");
    $resultado=mysqli_fetch_array($sql);
    return $resultado;

    }     

 }


 ?>
