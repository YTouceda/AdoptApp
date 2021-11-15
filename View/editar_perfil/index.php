<?php
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-header-footer.css">
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/script.js" defer></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <script src="<?php echo constant('URL'); ?>Public/js/validar_editar_perfil.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.css">
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/header.js" defer></script>
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/notificaciones.js" defer></script>
        <title>AdoptApp - Perfil</title>
    </head>
    <body class="body-adoptapp">
        <header>
            <?php
                require 'View/header.php';
            ?>
        </header>
        <main class="main container">
            <div class="cuerpo mx-1 mx-lg-5 px-0 px-lg-5 py-5">
                <div class="col-12 px-0 px-lg-5 py-5">
                    <form id="form_editar" class="mx-1 mx-lg-5 px-0 px-lg-5 needs-validation" novalidate action="<?php echo constant('URL'); ?>editar_perfil/Guardar_cambios" method="POST" enctype="multipart/form-data">
                        <div class="text-center mx-1 mx-lg-5 px-0 px-lg-5">
                            <div id="foto_container" class="col-12">
                                <div class="row">
                                    <label for="foto" class="col-form-label">Foto de perfil:</label><br>
                                </div>
                                <img type="image" class="d-inline-block col-form-control h-50 w-25" src="<?php echo $this->user->getFoto()?>" name="Foto" id="Foto">
                            </div>
                            <?php
                            if("mvp" == "producto"){
                            ?>
                            <div class="col-12 pb-2">
                                <input type="file" id="add_new_photo" class="form-control input_perfil add_photo" name="images_nueva">
                                <div id="errorImagen" class="invalid-feedback pt-2">
                                    Imagen inválida.
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div>
                            <input type="hidden" name="Id" id="Id" value="<?php echo $this->user->getId()?>" require>
                        </div>
                        <div class="mx-1 mx-lg-5 px-0 px-lg-5">
                            <label for="nombre" class="form-label pt-2">Nombre de usuario:</label>
                            <input id="Nombre" name="Nombre" type="text" class="form form-control col-12" value="<?php echo $this->user->getNombre();?>" require>
                            <div id="error_nombre" class="invalid-feedback">
                                No ingresó el nombre de usuario.
                            </div>
                        </div>
                        <div class="mx-1 mx-lg-5 px-0 px-lg-5">
                            <label for="email" class="form-label pt-2">Email:</label>
                            <input id="Email" name="Email" type="text" class="form form-control col-12" value="<?php echo $this->user->getEmail();?>" require>
                            <div id="error_email" class="invalid-feedback">
                                Ingrese un email valido.
                            </div>
                        </div>
                        <div class="mx-1 mx-lg-5 px-0 px-lg-5">
                            <label for="numero" class="form-label pt-2">Telefono de contacto</label>
                            <input id="Numero" name="Numero" type="text" class="form form-control col-12" value="<?php echo $this->user->getNumero();?>" require>
                            <div id="error_numero" class="invalid-feedback">
                                No ingresó un numero de contacto válido.
                            </div>
                        </div>
                        <div class="col-12 text-center pt-5">
                            <a href="<?php echo constant('URL'); ?>perfil"><button id="btn_cancelar" type="button" class="btn btn-danger mx-1 mx-lg-2">Cancelar cambios</button></a>
                            <button id="btn_guardar" type="button" class="btn btn-success mx-1 mx-lg-2">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer>
        <?php 
            require 'View/footer.php';
        ?>
        </footer>
	</body>
</html>
<?php
}else{
    header('Location:adopciones');
}
?>