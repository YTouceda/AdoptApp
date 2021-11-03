

<?php 

include("con_db.php");


if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1) {
	    $nombre = trim($_POST['name']);
	    $email = trim($_POST['email']);
	    $telefono = trim($_POST['telefono']);
		$provincia = trim($_POST['provincia']);
		$ciudad = trim($_POST['ciudad']);
		$descripcion = trim($_POST['descripcion']);
	    $consulta = "INSERT INTO usuarioreg(nombre, email, telefono, provincia, ciudad, descripcion) VALUES ('$nombre','$email','$telefono','$provincia', '$ciudad', '$descripcion')";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}else{?> 
	<h3 class="bad">¡nooo!</h3>
   <?php }

?>