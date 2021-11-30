<?php 
require("cabecero.php");
require("navegacion.php"); 
require_once("../Modelo/BaseDatos.php");
$modelo= new Consultas();
$res=$modelo->nombreColumnas();
 ?>
<main class="contpadding">
	<div class="row">
		<div class="col s10 offset-s2" id="contenidoUsuario">
		</div>
	</div>

<div class="row">
	<div class="col s9 push-s2 pull-s1" id="mainbody">
		<h1 align="center">Inner Join</h1>
		<form rol="form"method="post">
			<h6>Ingrese la primera tabla</h6>
			<select name="tabla1">
				<option value="" disabled selected>selecciona una tabla</option>
				    <?php 
                    for ($i=0; $i < count($res)-1 ; $i++) {
                    ?>
                   <option value="<?php echo ($res[$i][0]);?>"><?php echo ($res[$i][0]);?></option>
                   <?php } ?>
			</select>
            <br><br>
			<h6>Ingrese la segunda tabla</h6>
			<select name="tabla2">
				<option value="" disabled selected>selecciona una tabla</option>
				    <?php 
                    for ($i=0; $i < count($res)-1 ; $i++) {
                    ?>
                   <option value="<?php echo ($res[$i][0]);?>"><?php echo ($res[$i][0]);?></option>
                   <?php } ?>
			</select>
			<button class="btn waves-effect waves-light" type="submit" name="" onclick="enviar()">Enviar</button> 
		</form>


<?php 
if (isset($_POST['tabla1']) || isset($_POST['tabla2'])) {
$tabla1=$_POST['tabla1'];
$tabla2=$_POST['tabla2'];
$llaves=$modelo->llaves($tabla1);
$llave="";
if ($llaves!=null) {
   $llave=$llaves["Column_name"];
}
$union=$modelo->union($llave,$tabla1,$tabla2);
$res=$modelo->nombreTablas($tabla1);
$res2=$modelo->nombreTablas($tabla2);
if (isset($_SESSION['bandera'])) {
if ($_SESSION['bandera']==1) {
	unset($_SESSION['bandera']);
   $columna=$res;
   $columna2=$res2;
}else{
	unset($_SESSION['bandera']);
    $columna=$res2;
    $columna2=$res;
}
}
 ?>
 <br><br><br>
    <?php if ($union!=null) {
         ?>
     <table class="responsive-table">
        <thead class="blue">
            <tr>
                <?php for ($i=0; $i <count($columna) ; $i++) { 
                ?>
                <th class="contable"><?php echo $columna[$i][0]?></th>
            <?php } ?>

            <?php for ($i=0; $i <count($columna2) ; $i++) { 
                ?>
                <th class="contable"><?php echo $columna2[$i][0]?></th>
            <?php } ?>
            </tr>
        </thead>
        <tbody class="white">
            <tr>
                <?php
                for ($i=0; $i <count($union) ; $i++) {
                for ($x=0; $x <count($res)+count($res2) ; $x++) {   
                ?>
                <td class="contable"><?php echo $union[$i][$x]?></td>

            <?php }
            echo"</tr>";
        }?>
            
        </tbody>
    </table>
    <?php }else{
    echo"<script>errorinnerjoin()</script>";
    } ?>

<?php } ?>
</div> <!-- mainbody -->
</div> <!-- class row -->
</main>
 <?php 
require("footer.php");
  ?>