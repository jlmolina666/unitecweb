<?php
session_start();
require_once("includes/conection.php");

if(!isset($_SESSION["session_email"])){
    header("Location: index.php");
} else {
    include("includes/header.php");
?>
<div class="container">
    <div id="welcome">
        <div class="row">
            <div class="col-8">
                <h2>Bienvenido <span><?php echo $_SESSION['session_email'];?>! </span></h2>
            </div>
            <div class="col-4">
                <p><a href="logout.php">Finaliza Sesion</a></p>
            </div>
        </div>
        <h1>Servicios Escolares</h1>
        <div class="row">            
            <div class="col-md">
                <div class="card border-success">
                    <div class="card-body">
                    </div>
                </div>
            </div>          
        </div>
    </div>
</div>  

<?php
    include("includes/footer.php");
} ?>