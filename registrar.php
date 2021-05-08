<?php
session_start();
include("includes/header.php");
require_once("includes/conection.php");

if(isset($_POST["registrar"])){
    if(!empty($_POST["nombre"]) && !empty($_POST["apepat"]) && !empty($_POST["apemat"]) && !empty($_POST["genero"]) && !empty($_POST["edad"]) && !empty($_POST["edocivil"]) && !empty($_POST["interes"]) && !empty($_POST["mail"]) && !empty($_POST["passwordreg"])){
        $bnombre = $_POST["nombre"];
        $bapepat = $_POST["apepat"];
        $bapemat = $_POST["apemat"];
		$bgenero = $_POST["genero"];
		$bedad = $_POST["edad"];
		$bedocivil = $_POST["edocivil"];
		$binteres = $_POST["interes"];
		$binteres2 = $_POST["interes2"];
        $bmail = $_POST["mail"];        
        $bpasswordreg = $_POST["passwordreg"];
        $query ="SELECT email FROM clientes WHERE email='".$bmail."'";        
        $res = $conn -> query($query);
        $res = $res->fetchColumn();
        if($res == $bmail){
            $mensaje=  "El usuario ya existe";
        }else{            
            $sql="INSERT INTO clientes (nombre, apepat, apemat, genero, edad, edo_civil, email, password, opt1, opt2, date_created)
            VALUES ('$bnombre', '$bapepat', '$bapemat', '$bgenero', '$bedad', '$bedocivil', '$bmail', '$bpasswordreg', '$binteres', '$binteres2', now())";
            $result =$conn->query($sql);
			$_SESSION['session_email']=$bmail;
			header("Location: intro.php");
        }
    }else{
        $mensaje=  "Hay algun campo vacío";
    }
}

if (!empty($mensaje)) {echo "<p class=\"error\">" . "Mensaje: ". $mensaje . "</p>";} 
?>
<div class="container">
    <h1>Registrar<h1>
    <form name="frmLogin" id="frmLogin" action="registrar.php" method="POST">
		<div class="row">
			<div class="col-12">
				<label> Nombre</label>
				<input type="text" name="nombre" id="nombre" class="form-control" size="20" required>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<label> Apellido Paterno</label>
				<input type="text" name="apepat" id="apepat" class="form-control" size="20" required>
			</div>				
			<div class="col-6">
				<label> Apellido Materno</label>
				<input type="text" name="apemat" id="apemat" class="form-control" size="20" required>
			</div>
        </div>
		<div class="row">
			<div class="col-4">
				<label> Genero</label>
				<select name="genero"  id="genero" class="form-control" required>
				<option value="">Seleccione</option>
				<?php 				
				$query="SELECT id, movimiento FROM catalogo WHERE relacion in (1) and enable =1 ORDER BY id asc";                                    
				$resg = $conn->query($query);
				$resg = $resg->fetchAll(PDO::FETCH_ASSOC);
					foreach($resg as $row){
						echo '<option value="'.utf8_encode($row['id']).'">'.utf8_encode($row['movimiento']).'</option>'; } ?>
				</select>
			</div>				
			<div class="col-4">
				<label> Edad</label>
				<input type="text" name="edad" id="edad" class="form-control" size="20" required>
			</div>
			<div class="col-4">
				<label> Edo Civil</label>
				<select name="edocivil"  id="edocivil" class="form-control" required>
				<option value="">Seleccione</option>
				<?php 				
				$query="SELECT id, movimiento FROM catalogo WHERE relacion in (2) and enable =1 ORDER BY id asc";                                    
				$resg = $conn->query($query);
				$resg = $resg->fetchAll(PDO::FETCH_ASSOC);
					foreach($resg as $row){
						echo '<option value="'.utf8_encode($row['id']).'">'.utf8_encode($row['movimiento']).'</option>'; } ?>
				</select>
			</div>
        </div>
		<div class="row">
			<div class="col-12">
				<label> Estudio de interes</label>
				<select name="interes"  id="interes" class="form-control" onChange="pagoOnChange(this)" required>
				<option value="">Seleccione</option>
				<?php 				
				$query="SELECT id, movimiento FROM catalogo WHERE relacion in (3) and enable =1 ORDER BY id asc";                                    
				$resg = $conn->query($query);
				$resg = $resg->fetchAll(PDO::FETCH_ASSOC);
					foreach($resg as $row){
						echo '<option value="'.utf8_encode($row['id']).'">'.utf8_encode($row['movimiento']).'</option>'; } ?>
				</select>
			</div>
		</div>
		<div class="row divOculto" id="div1">
			<div class="col-12">
				<label> Elija la opcion de interes</label>
				<select name="interes2"  id="interes2" class="form-control" >
				<option value="0">Seleccione</option>
				</select>
			</div>
		</div>
        <div class="row">
			<div class="col-6">
				<label> Email</label>
				<input type="text" name="mail" id="mail" class="form-control" size="50" required>
			</div>
			<div class="col-6">
				<label> Contraseña</label>
				<input type="password" name="passwordreg" id="passwordreg" class="form-control" size="20" required>
			</div>
		</div>
        <div>
            <input type="submit" name="registrar" id="registrar" class="btn btn-warning" value="Registrar">
        </div>
        <div>
            <p class="text-center regtext">Ya tiens cuenta? <a href="index.php">Entra aquí</a></p>
        </div>
    </form>
</div>
<?php include("includes/footer.php");
?>