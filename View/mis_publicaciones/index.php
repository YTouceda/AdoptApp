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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-header-footer.css">
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/script.js" defer></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-perfil.css">
        <title>AdoptApp - Mis Publicaciones</title>
    </head>
    <body>
        <header>
            <?php
                require 'View/header.php';
            ?>
        </header>
        <main class="main container">
            <div class="row cuerpo">
                <div class="col-12">
                    <ul class="nav nav-tabs  justify-content-center mt-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="<?php echo constant('URL'); ?>perfil"" class="text-decoration-none"><button class="nav-link nav-style" id="Perfil-tab" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Perfil</button></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="<?php echo constant('URL'); ?>mis_publicaciones"" class="text-decoration-none"><button class="nav-link nav-style active" id="Mis-publicaciones-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="Mis_publicaciones" aria-selected="false">Mis Publicaciones</button></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <?php
                            if("user" == "rescatista"){
                            ?>
                                <a href="<?php echo constant('URL'); ?>rescatista" class="text-decoration-none"><button class="nav-link nav-style" id="Rescatista-tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="Rescatista" aria-selected="false">Rescatista</button></a>
                            <?php
                            }
                            ?>    
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <div id="pills-MisPublicaciones">
                        <div id="mis-publicaciones">
                            <div id="titulo">
                                <h1 id="titulo_mis_publicaciones">Mis Publicaciones:</h1>
                            </div>
                            <?php
                            if(!empty($this->mascotas)){
                                foreach($this->mascotas as $row){
                                    $mascota = new Mascota();
                                    $mascota = $row;
                            ?>
                                    <div class="card mb-3 card_mis_publicaciones">
                                        <a class="text-decoration-none text-black" href="<?php echo constant('URL'); ?>mi_publicacion/?publicacion=<?php echo $mascota->id_mascota?>">
                                            <div class="g-0 row row-cols-1 row-cols-sm-2 g-xs-3">
                                                <div class="col-md-2">
                                                    <img src="<?php echo constant('URL')."Public/public_media/".$mascota->fotos_mascota;?>" class="img-fluid rounded-start card-imagen-mp h-100 w-100" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $mascota->nombre_mascota?></h5>
                                                        <p class="card-text">
                                                            <?php 
                                                            for( $i = 0; $i <=350 ; $i++){
                                                                if($i < strlen($mascota->descripcion_mascota)){
                                                                    echo $mascota->descripcion_mascota[$i];
                                                                }
                                                                else if($i == strlen($mascota->descripcion_mascota)){
                                                                    echo "...";
                                                                }
                                                            }
                                                            ?>
                                                        </p>
                                                        <p class="card-text"><small class="text-muted"><?php echo $mascota->fecha_publicado?></small></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div id="nav-paginas" class="m-2 bottom-0">
                        <nav aria-label="Page navigation example">
                            <ul id="navegacion-entre-paginas" class="pagination justify-content-center">
                                <li class="page-item<?php if($this->pagina == 1){echo ' disabled';}?>">
                                <a class="page-link" href="<?php echo '?pagina='.($this->pagina-1);?>">Anterior</a>
                                </li>
                                <?php
                                for($i = 1 ; $i <= $this->total_paginas ; $i++){
                                ?>
                                <li class="page-item"><a class="page-link" href="<?php echo '?pagina='.$i?>"><?php echo $i?></a></li>
                                <?php
                                }
                                ?>
                                <li class="page-item<?php if($this->pagina == $this->total_paginas){echo ' disabled';}?>">
                                <a class="page-link" href="<?php echo '?pagina='.($this->pagina+1);?>">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php
                    }else{
                    ?>
                        <div class="text-center">
                            <h2>Ups no se encontraron publicaciones.</h2>
                        </div>
                    <?php
                    }
                    ?>
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
    header('Location:adopciones');
}
?>