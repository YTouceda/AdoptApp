<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="Public/css/style-header-footer.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script type="text/javascript" src="Public/js/ubicacion.js" defer></script>
        <script type="text/javascript" src="Public/js/script.js" defer></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <title>AdoptApp - Perdidos</title>
    </head>
    <body class="body-adoptapp">
        <?php
            require 'View/header.php';
        ?>
        <main>
            <div class="container">
                <div id="main-perdidos" class="row">
                    <div id="formulario-filtros" class="col-12">
                        <form id="form-filtro" class="form formulario row justify-content-md-center" action="perdidos" method="POST">
                            <div class="col">
                                <label class="col-form-label label-checkbox">Ubicación:</label>
                                <select name="ID_PROVINCIA[]" id="provincia" class="form form-control m-2">
                                    <option disabled="true" selected="true" value="">Seleccionar una Provincia</option>
                                    <option value="02">Ciudad Autónoma de Buenos Aires</option>
                                    <option value="06">Buenos Aires</option>
                                    <option value="10">Catamarca</option>
                                    <option value="14">Cordoba</option>
                                    <option value="18">Corrientes</option>
                                    <option value="22">Chaco</option>
                                    <option value="26">Chubut</option>
                                    <option value="30">Entre Rios</option>
                                    <option value="34">Formosa</option>
                                    <option value="38">Jujuy</option>
                                    <option value="42">La Pampa</option>
                                    <option value="46">La Rioja</option>
                                    <option value="50">Mendoza</option>
                                    <option value="54">Misiones</option>
                                    <option value="58">Neuquen</option>
                                    <option value="62">Rio Negro</option>
                                    <option value="66">Salta</option>
                                    <option value="74">San Luis</option>
                                    <option value="78">Santa Cruz</option>
                                    <option value="82">Santa Fe</option>
                                    <option value="86">Santiago Del Estero</option>
                                    <option value="94">Tierra Del Fuego</option>
                                </select>
                                <select name="ID_LOCALIDAD[]" id="localidades" class="form form-control m-2">
                                    <option disabled="true" selected="true" value="">Seleccionar una Localidad</option>
                                </select>
                                <input id="xlocalidad" type="hidden">
                            </div>
                            <div class="col">
                                <label for="tipo" class="col-form-label label-checkbox">Tipo de mascota:</label>
                                <div name="tipo" class="form-check form-check-inline checkbox">
                                    <input type="checkbox" id="perro" name="TIPO_ESPECIE_MASCOTA[]" value="Perro/a" class="form-check-input">
                                    <label for="perro" class="form-check-label"><i class="fas fa-dog"></i>- Perro/a</label><br>
                                    <input type="checkbox" id="gato" name="TIPO_ESPECIE_MASCOTA[]" value="Gato/a" class="form-check-input">
                                    <label for="gato" class="form-check-label"><i class="fas fa-cat"></i>- Gato/a</label><br>
                                </div>
                            </div>
                            <div class="col">
                                <label for="tamanio" class="col-form-label label-checkbox">Tamaño de mascota:</label>
                                <div id="tamanio" name="tamanio" class="form-check form-check-inline checkbox">
                                    <input type="checkbox" id="chico" name="TAMANIO_MASCOTA[]" value="Chico" class="form-check-input">
                                    <label for="chico" class="form-check-label">Chico/a</label><br>
                                    <input type="checkbox" id="mediano" name="TAMANIO_MASCOTA[]" value="Mediano" class="form-check-input">
                                    <label for="mediano" class="form-check-label">Mediano/a</label><br>
                                    <input type="checkbox" id="grande" name="TAMANIO_MASCOTA[]" value="Grande" class="form-check-input">
                                    <label for="grande" class="form-check-label">Grande</label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="sexo" class="col-form-label label-checkbox">Sexo de la mascota:</label>
                                <div name="sexo" class="form-check form-check-inline checkbox">
                                    <input type="checkbox" id="hembra" name="SEXO_MASCOTA[]" value="Hembra" class="form-check-input">
                                    <label for="hembra" class="form-check-label">Hembra</label><br>
                                    <input type="checkbox" id="macho" name="SEXO_MASCOTA[]" value="Macho" class="form-check-input">
                                    <label for="macho" class="form-check-label">Macho</label><br>
                                </div>
                            </div>
                            <div class="col">
                                <label for="edad" class="col-form-label label-checkbox">Edad de mascota:</label>
                                <div name="edad" class="form-check form-check-inline checkbox">
                                    <input type="checkbox" id="cachorro" name="EDAD_MASCOTA[]" value="Cachorro/a" class="form-check-input">
                                    <label for="cachorro" class="form-check-label">Cachorro/a</label><br>
                                    <input type="checkbox" id="adulto" name="EDAD_MASCOTA[]" value="Adulto/a" class="form-check-input">
                                    <label for="adulto" class="form-check-label">Adulto/a</label><br>
                                    <input type="checkbox" id="anciano" name="EDAD_MASCOTA[]" value="Anciano/a" class="form-check-input">
                                    <label for="anciano" class="form-check-label">Anciano/a</label>
                                </div>
                            </div>
                            <div class="col col-1 position-relative">
                                <input type="submit" id="boton" value="Filtrar" class="btn btn-success btn-filtrar position-absolute top-50 start-50 translate-middle">
                            </div>
                        </form>
                        <div id="seccion-btn-filtros-modal" class="col-sm-12">
                            <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modal_filtros">
                                <i class="fas fa-sliders-h"></i>
                                    Filtros
                            </button>
                            <div class="modal fade modal-style" id="modal_filtros" tabindex="-1" aria-labelledby="titulo_modal_filtro" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="titulo_modal_filtro">Filtros</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="formulario-filtros-modal" class="form">
                                                <form id="form-filtro-modal" class="form row g-3 formulario"  action="perdidos" method="POST">
                                                    <div class="row justify-content-md-center">
                                                        <div class="col col-12">
                                                            <label class="col-form-label label-checkbox">Ubicación:</label>
                                                            <select name="ID_PROVINCIA[]" id="provincia_modal" class="form form-control m-2">
                                                                <option disabled="true" selected="true" value="">Seleccionar una Provincia</option>
                                                                <option value="02">Ciudad Autónoma de Buenos Aires</option>
                                                                <option value="06">Buenos Aires</option>
                                                                <option value="10">Catamarca</option>
                                                                <option value="14">Cordoba</option>
                                                                <option value="18">Corrientes</option>
                                                                <option value="22">Chaco</option>
                                                                <option value="26">Chubut</option>
                                                                <option value="30">Entre Rios</option>
                                                                <option value="34">Formosa</option>
                                                                <option value="38">Jujuy</option>
                                                                <option value="42">La Pampa</option>
                                                                <option value="46">La Rioja</option>
                                                                <option value="50">Mendoza</option>
                                                                <option value="54">Misiones</option>
                                                                <option value="58">Neuquen</option>
                                                                <option value="62">Rio Negro</option>
                                                                <option value="66">Salta</option>
                                                                <option value="74">San Luis</option>
                                                                <option value="78">Santa Cruz</option>
                                                                <option value="82">Santa Fe</option>
                                                                <option value="86">Santiago Del Estero</option>
                                                                <option value="94">Tierra Del Fuego</option>
                                                            </select>
                                                            <select name="ID_LOCALIDAD[]" id="localidades_modal" class="form form-control m-2">
                                                                <option disabled="true" selected="true" value="">Seleccionar una Localidad</option>
                                                            </select>
                                                            <input id="xlocalidad_modal" type="hidden">
                                                        </div>
                                                        <div class="col  col-12">
                                                            <label for="tipo" class="col-12 col-form-label label-checkbox">Tipo de mascota:</label>
                                                            <div name="tipo" class="form-check form-check-inline checkbox">
                                                                <input type="checkbox" id="mdl-perro" name="TIPO_ESPECIE_MASCOTA[]" value="Perro/a" class="form-check-input">
                                                                <label for="mdl-perro" class="form-check-label"><i class="fas fa-dog"></i>- Perro/a</label>
                                                                <input type="checkbox" id="mdl-gato" name="TIPO_ESPECIE_MASCOTA[]" value="Gato/a" class="form-check-input">
                                                                <label for="mdl-gato" class="form-check-label"><i class="fas fa-cat"></i>- Gato/a</label>
                                                            </div>
                                                        </div>
                                                        <div class="col  col-12">
                                                            <label for="tamanio" class="col-12 col-form-label label-checkbox">Tamaño de mascota:</label>
                                                            <div name="tamanio" class="form-check form-check-inline checkbox">
                                                                <input type="checkbox" id="mdl-chico" name="TAMANIO_MASCOTA[]" value="Chico" class="form-check-input">
                                                                <label for="mdl-chico" class="form-check-label">Chico/a</label>
                                                                <input type="checkbox" id="mdl-mediano" name="TAMANIO_MASCOTA[]" value="Mediano" class="form-check-input">
                                                                <label for="mdl-mediano" class="form-check-label">Mediano/a</label>
                                                                <input type="checkbox" id="mdl-grande" name="TAMANIO_MASCOTA[]" value="Grande" class="form-check-input">
                                                                <label for="mdl-grande" class="form-check-label">Grande</label>
                                                            </div>
                                                        </div>
                                                        <div class="col  col-12">
                                                            <label for="sexo" class="col-12 col-form-label label-checkbox">Sexo de la mascota:</label>
                                                            <div name="sexo" class="form-check form-check-inline checkbox">
                                                                <input type="checkbox" id="mdl-hembra" name="SEXO_MASCOTA[]" value="Hembra" class="form-check-input">
                                                                <label for="mdl-hembra" class="form-check-label">Hembra</label>
                                                                <input type="checkbox" id="mdl-macho" name="SEXO_MASCOTA[]" value="Macho" class="form-check-input">
                                                                <label for="mdl-macho" class="form-check-label">Macho</label>
                                                            </div>
                                                        </div>
                                                        <div class="col  col-12">
                                                            <label for="edad" class="col-12 col-form-label label-checkbox">Edad de mascota:</label>
                                                            <div name="edad" class="form-check form-check-inline checkbox">
                                                                <input type="checkbox" id="mdl-cachorro" name="EDAD_MASCOTA[]" value="Cachorro/a" class="form-check-input">
                                                                <label for="mdl-cachorro" class="form-check-label">Cachorro/a</label>
                                                                <input type="checkbox" id="mdl-adulto" name="EDAD_MASCOTA[]" value="Adulto/a" class="form-check-input">
                                                                <label for="mdl-adulto" class="form-check-label">Adulto/a</label>
                                                                <input type="checkbox" id="mdl-anciano" name="EDAD_MASCOTA[]" value="Anciano/a" class="form-check-input">
                                                                <label for="mdl-anciano" class="form-check-label">Anciano/a</label>
                                                            </div>
                                                        </div>
                                                        <div class="col col-12 position-relative">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" id="btn-cancelar-filtrar-modal" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="btn-filtrar-modal" class="btn btn-primary btn-filtrar">Filtrar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-PE">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="text-decoration-none" href="<?php echo constant('URL').'perdidos?seccion=perdidos';?>"><button class="nav-link nav-style<?php if($this->seccion == 'perdidos'){echo ' active';}?>" id="perdidos-tab" data-bs-toggle="tab" data-bs-target="#perdidos" type="button" role="tab" aria-controls="perdidos" aria-selected="true">Perdidos</button></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="text-decoration-none" href="<?php echo constant('URL').'encontrados?seccion=encontrados';?>"><button class="nav-link nav-style<?php if($this->seccion == 'encontrados'){echo ' active';}?>" id="encontrados-tab" data-bs-toggle="tab" data-bs-target="#encontrados" type="button" role="tab" aria-controls="encontrados" aria-selected="false">Encontrados</button></a>
                            </li>
                        </ul>
                    </div>
                    <?php 
                    if($this->seccion == 'perdidos'){
                    ?>
                        <div id="perdidos" class="publicaciones">
                            <div class="tab-pane" role="tabpanel" aria-labelledby="perdidos-tab">
                                <div class="row">
                                <?php
                                    if(!empty($this->publicacion)){
                                        foreach($this->publicacion as $row){
                                            $mascota = new Mascota();
                                            $mascota = $row->getMascota();
                                ?>
                                    <div class="col-sm-12 col-md-6 m-md-0 p-md-3 col-lg-6 col-xl-4 px-2">
                                        <div class="card m-2 card_publicaciones">
                                            <a class="text-decoration-none text-black" href="<?php echo constant('URL'); ?>abrir_publicacion/?publicacion=<?php echo $row->getId_publicacion()?>">
                                                <img src="<?php echo constant('URL')."Public/public_media/".$mascota->getFotos_mascota(); ?>" class="text-center card-img-top card-imagen" alt="...">
                                                <div class="card-body">
                                                    <h4><?php echo $mascota->getNombre_mascota();?></h4>
                                                    <p max class="card-text">
                                                        <?php 
                                                        for( $i = 0; $i <= 70 ; $i++){
                                                            if($i < strlen($mascota->getDescripcion_mascota()))
                                                            echo $mascota->getDescripcion_mascota()[$i];
                                                        }?>...
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div id="nav-paginas" class="m-2">
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
                                    <h2 class="mt-3">Ups, no se encontraron publicaciones!</h2>
                                    <img src="<?php echo constant('URL'); ?>public\media\pagina_inexistente.png" class="w-50 ps-4" alt="">
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>
        <?php
            require 'View/footer.php';
        ?>
    </body>
</html>