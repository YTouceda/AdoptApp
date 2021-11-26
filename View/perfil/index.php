<?php
if($this->usuario->puede('Ingresar al perfil')){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/header.js" defer></script>
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/notificaciones.js" defer></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-header-footer.css">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-perfil.css">
        <title>AdoptApp - Perfil</title>
    </head>
    <body class="body-adoptapp">
        <header>
            <?php
                require 'View/header.php';
            ?>
        </header>
        <main class="main container">
            <div class="row cuerpo py-5">
                <div class="col-12">
                    <ul class="nav nav-tabs  justify-content-center mt-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="<?php echo constant('URL'); ?>perfil" class="text-decoration-none"><button class="nav-link nav-style active" id="home-tab" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Perfil</button></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="<?php echo constant('URL'); ?>mis_publicaciones" class="text-decoration-none"><button class="nav-link nav-style" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Mis Publicaciones</button></a>
                        </li>
                    </ul>
                </div>
                <div class="mx-1 mx-xl-5 px-0 px-lg-5 col-12">
                    <div class="mx-1 mx-xl-5 px-0 px-lg-5 tab-content " id="myTabContent">
                        <div class="mx-1 mx-xl-5 px-0 px-lg-5 tab-pane fade show active" id="pills-DatPersonal">
                            <div class="my-5 mx-1 mx-xl-5 px-0 px-lg-5 row mt-5"> 
                                <div class="col-12">
                                    <div id="foto_container" class="col-12">
                                        <div class="row">
                                            <label for="foto" class="col-form-label">Foto de perfil:</label><br>
                                        </div>
                                        <input type="image" class="d-inline-block col-form-control h-50 w-25" src="<?php echo $this->usuario->getFoto()?>" name="Foto" id="Foto">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="nombre" scope="row">Nombre de usuario:</th>
                                                <td><p id="nombreId"><?php echo $this->usuario->getNombre();?></p></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email:</th>
                                                <td><p id="emailId"><?php echo $this->usuario->getEmail();?></p></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Telefono de contacto:</th>
                                                <td><p id="telefonoId"><?php echo $this->usuario->getNumero();?></p></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <a class="text-decoration-none" href="<?php echo constant('URL'); ?>editar_perfil"><button type="submit" id="boton-editPerfil" class="btn btn-warning input_perfil">Editar perfil</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php 
            require 'View/footer.php';
        ?>
	</body>
</html>
<?php
}else{
    if($this->usuario->getEstado_bloqueo()!= NULL){
        header('Location:errores?mensaje=0');
    }
    else{
        header('Location:publicaciones');
    }
}
?>