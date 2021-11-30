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

 public function union($llave,$tabla1,$tabla2){    
    global $conexion;
    $sql=mysqli_query($conexion,"SELECT * FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.$llave=$tabla2.$llave");
    if($sql){
        $resultado=mysqli_fetch_all($sql);
        $_SESSION['bandera']=1;
    }else{
    $llave2=$this->llaves($tabla2);
    if ($llave2!=null) {
    $llave2=$llave2["Column_name"];
    }
    $sql=mysqli_query($conexion,"SELECT * FROM $tabla2 INNER JOIN $tabla1 ON $tabla2.$llave2=$tabla1.$llave2");
    if($sql){
     $resultado=mysqli_fetch_all($sql);
    $_SESSION['bandera']=2;
    }else{
     $resultado=null;
    }
    }
    return $resultado;

    }        

 }


 ?>
