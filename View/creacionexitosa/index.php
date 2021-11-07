<!DOCTYPE html>
<html>
    <head>
        <title>AdoptApp - Creacion exitosa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/sweetalert2/6.0.1/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant ('URL'); ?>Public/css/style-CrearPublicacion.css">
        <script type="text/javascript" src="<?php echo constant ('URL'); ?>Public/script/formval.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-header-footer.css">
    </head>
    <body>
        <header>
        <?php
            require 'View/header.php';
        ?>
        </header>
        <div class="row">
        
        <div class="alert alert-success col-7 text-centered alert-dismissible container m-50" role="alert">Publicación creada exitosamente<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        
        </div>
        <div class="row">
            
        <<button type="button" id="goinicio" class="mx-auto btn btn-primary col-4" onclick="location.href='<?php echo constant('URL'); ?>'">Ir al inicio</button>
        <footer>
            <?php
                require 'View/footer.php';
            ?>
        </div>
        </footer>
    </body>
    
</html>





