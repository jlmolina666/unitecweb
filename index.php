<?php
session_start();
include("includes/header.php");
require_once("includes/conection.php");

if(isset($_SESSION["session_user"])){
    header("Location: intro.php");
}

if(isset($_POST["login"])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $consulta ="SELECT * FROM clientes WHERE email='".$username."' AND password='".$password."'";
        $res = $conn->query($consulta);
		$no= $res->rowCount();
        $res = $res->fetchAll(PDO::FETCH_ASSOC);
		
		if($no > 0){
			$_SESSION['session_email']=$username;
			header("Location: intro.php");
		} else {
			$mensaje= "Usuario y Contraseña incorrectos";
		}
        // foreach($res as $row){
            // $dbuser=$row['email'];
            // $dbpass=$row['password'];
            // $email=$row['email'];
            // if($username != $dbuser && $password != $dbpass){
                // //echo'<script type="text/javascript">alert("Usuario y Contraseña incorrectos");window.location.href="index.php";</script>';				
				// $mensaje= "Usuario y Contraseña incorrectos";
            // } else{
				// $_SESSION['session_user']=$username;
                // $_SESSION['session_email']=$email;
                // header("Location: intro.php");                
            // }
        // }
    }else{
        $mensaje= "Todos los campos son requeridos";
    }
}

if (!empty($mensaje)) {echo "<p class=\"error\">" . "Mensaje: ". $mensaje . "</p>";} 
?>
<div class="container mlogin">
<div id="login">
    <h1>Logeo<h1>
    <form name="frmLogin" id="frmLogin" action="" method="POST">
        <div>
            <label> Correo	</label>
            <input type="text" name="username" id="username" class="input" size="40">
        </div>
        <div>
            <label> Contraseña</label>
            <input type="password" name="password" id="password" class="input" size="20">
        </div>
        <div>
            <input type="submit" name="login" id="login" class="btn btn-primary" value="Iniciar Sesion">
        </div>
        <div>
            <p class="text-center regtext">No estas registrado? <a href="registrar.php">Registrate aquí</a></p>
        </div>
    </form>
</div>
</div>
<?php include("includes/footer.php");
?>





