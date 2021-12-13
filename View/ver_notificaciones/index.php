<?php
if($this->usuario->puede('Ver notificaciones')){
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
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/ubicacion.js" defer></script>
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/header.js" defer></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-header-footer.css">
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/notificaciones.js" defer></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <title>AdoptApp - Publicaciones</title>
    </head>
    <body class="body-adoptapp">
        <header id="header">
            <?php
                require 'View/header.php';
            ?>
        </header>
        <main class="main container">
            <div id="notificacion_list_com" class="notificaciones_completas mx-auto px-auto">

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
    if($this->usuario->getEstado_bloqueo()!= NULL){
        header('Location:errores?mensaje=0');
    }
    else{
        header('Location:publicaciones');
    }
}
?>