<?php
if($this->usuario->puede('Visualizar publicaciones')){
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
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/notificaciones.js" defer></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-header-footer.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.js"></script>
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
            <div id="main-adopciones" class="row">
                <div id="formulario-filtros" class="col-12">
                    <form id="form-filtro" class="form formulario row justify-content-md-center" action="<?php echo 'publicaciones';?>" method="GET">
                        <input type="hidden" name="seccion" value="<?php echo $this->seccion;?>">
                        <div class="col">
                            <label class="col-form-label label-checkbox">Ubicación:</label>
                            <select name="ID_PROVINCIA[]" id="provincia" class="form form-control m-2">
                                <option disabled="true" selected="true" value="">Seleccionar una Provincia</option>
                                <option value="02" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "02") echo "selected"; }?>>Ciudad Autónoma de Buenos Aires</option>
                                <option value="06" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "06") echo "selected"; }?>>Buenos Aires</option>
                                <option value="10" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "10") echo "selected"; }?>>Catamarca</option>
                                <option value="14" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "14") echo "selected"; }?>>Cordoba</option>
                                <option value="18" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "18") echo "selected"; }?>>Corrientes</option>
                                <option value="22" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "22") echo "selected"; }?>>Chaco</option>
                                <option value="26" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "26") echo "selected"; }?>>Chubut</option>
                                <option value="30" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "30") echo "selected"; }?>>Entre Rios</option>
                                <option value="34" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "34") echo "selected"; }?>>Formosa</option>
                                <option value="38" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "38") echo "selected"; }?>>Jujuy</option>
                                <option value="42" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "42") echo "selected"; }?>>La Pampa</option>
                                <option value="46" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "46") echo "selected"; }?>>La Rioja</option>
                                <option value="50" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "50") echo "selected"; }?>>Mendoza</option>
                                <option value="54" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "54") echo "selected"; }?>>Misiones</option>
                                <option value="58" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "58") echo "selected"; }?>>Neuquen</option>
                                <option value="62" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "62") echo "selected"; }?>>Rio Negro</option>
                                <option value="66" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "66") echo "selected"; }?>>Salta</option>
                                <option value="74" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "74") echo "selected"; }?>>San Luis</option>
                                <option value="78" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "78") echo "selected"; }?>>Santa Cruz</option>
                                <option value="82" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "82") echo "selected"; }?>>Santa Fe</option>
                                <option value="86" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "86") echo "selected"; }?>>Santiago Del Estero</option>
                                <option value="94" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "94") echo "selected"; }?>>Tierra Del Fuego</option>
                            </select>
                            <select name="ID_LOCALIDAD[]" id="localidades" class="form form-control m-2">
                                <option disabled="true" selected="true" value="">Seleccionar una Localidad</option>
                            </select>
                            <input id="xlocalidad" type="hidden" <?php if(isset($_GET["ID_LOCALIDAD"]))echo "value='".$_GET["ID_LOCALIDAD"][0]."'";?>>
                        </div>
                        <div class="col">
                            <label for="tipo" class="col-form-label label-checkbox">Tipo de mascota:</label>
                            <div name="tipo" class="form-check form-check-inline checkbox">
                                <input type="checkbox" id="perro" name="TIPO_ESPECIE_MASCOTA[]" value="Perro/a" class="form-check-input" <?php if(isset($_GET["TIPO_ESPECIE_MASCOTA"])){for($i=0;$i<count($_GET["TIPO_ESPECIE_MASCOTA"]);$i++){if($_GET["TIPO_ESPECIE_MASCOTA"][$i] == "Perro/a")echo "checked";}}?>>
                                <label for="perro" class="form-check-label"><i class="fas fa-dog"></i>- Perro/a</label><br>
                                <input type="checkbox" id="gato" name="TIPO_ESPECIE_MASCOTA[]" value="Gato/a" class="form-check-input" <?php if(isset($_GET["TIPO_ESPECIE_MASCOTA"])){for($i=0;$i<count($_GET["TIPO_ESPECIE_MASCOTA"]);$i++){if($_GET["TIPO_ESPECIE_MASCOTA"][$i] == "Gato/a")echo "checked";}}?>>
                                <label for="gato" class="form-check-label"><i class="fas fa-cat"></i>- Gato/a</label><br>
                            </div>
                        </div>
                        <div class="col">
                            <label for="tamanio" class="col-form-label label-checkbox">Tamaño de mascota:</label>
                            <div id="tamanio" name="tamanio" class="form-check form-check-inline checkbox">
                                <input type="checkbox" id="chico" name="TAMANIO_MASCOTA[]" value="Chico" class="form-check-input" <?php if(isset($_GET["TAMANIO_MASCOTA"])){for($i=0;$i<count($_GET["TAMANIO_MASCOTA"]);$i++){if($_GET["TAMANIO_MASCOTA"][$i] == "Chico")echo "checked";}}?>>
                                <label for="chico" class="form-check-label">Chico/a</label><br>
                                <input type="checkbox" id="mediano" name="TAMANIO_MASCOTA[]" value="Mediano" class="form-check-input" <?php if(isset($_GET["TAMANIO_MASCOTA"])){for($i=0;$i<count($_GET["TAMANIO_MASCOTA"]);$i++){if($_GET["TAMANIO_MASCOTA"][$i] == "Mediano")echo "checked";}}?>>
                                <label for="mediano" class="form-check-label">Mediano/a</label><br>
                                <input type="checkbox" id="grande" name="TAMANIO_MASCOTA[]" value="Grande" class="form-check-input" <?php if(isset($_GET["TAMANIO_MASCOTA"])){for($i=0;$i<count($_GET["TAMANIO_MASCOTA"]);$i++){if($_GET["TAMANIO_MASCOTA"][$i] == "Grande")echo "checked";}}?>>
                                <label for="grande" class="form-check-label">Grande</label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="sexo" class="col-form-label label-checkbox">Sexo de la mascota:</label>
                            <div name="sexo" class="form-check form-check-inline checkbox">
                                <input type="checkbox" id="hembra" name="SEXO_MASCOTA[]" value="Hembra" class="form-check-input" <?php if(isset($_GET["SEXO_MASCOTA"])){for($i=0;$i<count($_GET["SEXO_MASCOTA"]);$i++){if($_GET["SEXO_MASCOTA"][$i] == "Hembra")echo "checked";}}?>>
                                <label for="hembra" class="form-check-label">Hembra</label><br>
                                <input type="checkbox" id="macho" name="SEXO_MASCOTA[]" value="Macho" class="form-check-input" <?php if(isset($_GET["SEXO_MASCOTA"])){for($i=0;$i<count($_GET["SEXO_MASCOTA"]);$i++){if($_GET["SEXO_MASCOTA"][$i] == "Macho")echo "checked";}}?>>
                                <label for="macho" class="form-check-label">Macho</label><br>
                            </div>
                        </div>
                        <div class="col">
                            <label for="edad" class="col-form-label label-checkbox">Edad de mascota:</label>
                            <div name="edad" class="form-check form-check-inline checkbox">
                                <input type="checkbox" id="cachorro" name="EDAD_MASCOTA[]" value="Cachorro/a" class="form-check-input" <?php if(isset($_GET["EDAD_MASCOTA"])){for($i=0;$i<count($_GET["EDAD_MASCOTA"]);$i++){if($_GET["EDAD_MASCOTA"][$i] == "Cachorro/a")echo "checked";}}?>>
                                <label for="cachorro" class="form-check-label">Cachorro/a</label><br>
                                <input type="checkbox" id="adulto" name="EDAD_MASCOTA[]" value="Adulto/a" class="form-check-input" <?php if(isset($_GET["EDAD_MASCOTA"])){for($i=0;$i<count($_GET["EDAD_MASCOTA"]);$i++){if($_GET["EDAD_MASCOTA"][$i] == "Adulto/a")echo "checked";}}?>>
                                <label for="adulto" class="form-check-label">Adulto/a</label><br>
                                <input type="checkbox" id="anciano" name="EDAD_MASCOTA[]" value="Anciano/a" class="form-check-input" <?php if(isset($_GET["EDAD_MASCOTA"])){for($i=0;$i<count($_GET["EDAD_MASCOTA"]);$i++){if($_GET["EDAD_MASCOTA"][$i] == "Anciano/a")echo "checked";}}?>>
                                <label for="anciano" class="form-check-label">Anciano/a</label>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="m-3 text-center">
                                <?php if(isset($_GET['ID_PROVINCIA'])||isset($_GET['ID_LOCALIDAD'])||isset($_GET['TIPO_ESPECIE_MASCOTA'])||isset($_GET['TAMANIO_MASCOTA'])||isset($_GET['SEXO_MASCOTA'])||isset($_GET['EDAD_MASCOTA'])){
                                ?>
                                    <a href="<?php echo constant('URL').'publicaciones?seccion='.$this->seccion;?>"><input type="button" id="boton2" value="Quitar Filtros" class="btn btn-secondary mx-2"></a>
                                    <input type="submit" id="boton" value="Filtrar" class="btn btn-success mx-2 px-4">
                                <?php
                                }else{
                                ?>
                                    <input type="submit" id="boton" value="Filtrar" class="btn btn-success mx-2 px-5">
                                <?php
                                }
                                ?>
                            </div>
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
                                            <form id="form-filtro-modal" class="form formulario row justify-content-md-center" action="<?php echo 'publicaciones';?>" method="GET">
                                                <input type="hidden" name="seccion" value="<?php echo $this->seccion;?>">
                                                <div class="row justify-content-md-center">
                                                    <div class="col col-12">
                                                        <label class="col-form-label label-checkbox">Ubicación:</label>
                                                        <select name="ID_PROVINCIA[]" id="provincia_modal" class="form form-control m-2">
                                                            <option disabled="true" selected="true" value="">Seleccionar una Provincia</option>
                                                            <option value="02" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "02") echo "selected"; }?>>Ciudad Autónoma de Buenos Aires</option>
                                                            <option value="06" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "06") echo "selected"; }?>>Buenos Aires</option>
                                                            <option value="10" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "10") echo "selected"; }?>>Catamarca</option>
                                                            <option value="14" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "14") echo "selected"; }?>>Cordoba</option>
                                                            <option value="18" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "18") echo "selected"; }?>>Corrientes</option>
                                                            <option value="22" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "22") echo "selected"; }?>>Chaco</option>
                                                            <option value="26" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "26") echo "selected"; }?>>Chubut</option>
                                                            <option value="30" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "30") echo "selected"; }?>>Entre Rios</option>
                                                            <option value="34" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "34") echo "selected"; }?>>Formosa</option>
                                                            <option value="38" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "38") echo "selected"; }?>>Jujuy</option>
                                                            <option value="42" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "42") echo "selected"; }?>>La Pampa</option>
                                                            <option value="46" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "46") echo "selected"; }?>>La Rioja</option>
                                                            <option value="50" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "50") echo "selected"; }?>>Mendoza</option>
                                                            <option value="54" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "54") echo "selected"; }?>>Misiones</option>
                                                            <option value="58" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "58") echo "selected"; }?>>Neuquen</option>
                                                            <option value="62" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "62") echo "selected"; }?>>Rio Negro</option>
                                                            <option value="66" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "66") echo "selected"; }?>>Salta</option>
                                                            <option value="74" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "74") echo "selected"; }?>>San Luis</option>
                                                            <option value="78" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "78") echo "selected"; }?>>Santa Cruz</option>
                                                            <option value="82" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "82") echo "selected"; }?>>Santa Fe</option>
                                                            <option value="86" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "86") echo "selected"; }?>>Santiago Del Estero</option>
                                                            <option value="94" <?php if(isset($_GET["ID_PROVINCIA"])){if($_GET["ID_PROVINCIA"][0] == "94") echo "selected"; }?>>Tierra Del Fuego</option>
                                                        </select>
                                                        <select name="ID_LOCALIDAD[]" id="localidades_modal" class="form form-control m-2">
                                                            <option disabled="true" selected="true" value="">Seleccionar una Localidad</option>
                                                        </select>
                                                        <input id="xlocalidad_modal" type="hidden" <?php if(isset($_GET["ID_LOCALIDAD"]))echo "value='".$_GET["ID_LOCALIDAD"][0]."'";?>>
                                                    </div>
                                                    <div class="col  col-12">
                                                        <label for="tipo" class="col-12 col-form-label label-checkbox">Tipo de mascota:</label>
                                                        <div name="tipo" class="form-check form-check-inline checkbox">
                                                            <input type="checkbox" id="mdl-perro" name="TIPO_ESPECIE_MASCOTA[]" value="Perro/a" class="form-check-input" <?php if(isset($_GET["TIPO_ESPECIE_MASCOTA"])){for($i=0;$i<count($_GET["TIPO_ESPECIE_MASCOTA"]);$i++){if($_GET["TIPO_ESPECIE_MASCOTA"][$i] == "Perro/a")echo "checked";}}?>>
                                                            <label for="mdl-perro" class="form-check-label"><i class="fas fa-dog"></i>- Perro/a</label>
                                                            <input type="checkbox" id="mdl-gato" name="TIPO_ESPECIE_MASCOTA[]" value="Gato/a" class="form-check-input" <?php if(isset($_GET["TIPO_ESPECIE_MASCOTA"])){for($i=0;$i<count($_GET["TIPO_ESPECIE_MASCOTA"]);$i++){if($_GET["TIPO_ESPECIE_MASCOTA"][$i] == "Gato/a")echo "checked";}}?>>
                                                            <label for="mdl-gato" class="form-check-label"><i class="fas fa-cat"></i>- Gato/a</label>
                                                        </div>
                                                    </div>
                                                    <div class="col  col-12">
                                                        <label for="tamanio" class="col-12 col-form-label label-checkbox">Tamaño de mascota:</label>
                                                        <div name="tamanio" class="form-check form-check-inline checkbox">
                                                            <input type="checkbox" id="mdl-chico" name="TAMANIO_MASCOTA[]" value="Chico" class="form-check-input" <?php if(isset($_GET["TAMANIO_MASCOTA"])){for($i=0;$i<count($_GET["TAMANIO_MASCOTA"]);$i++){if($_GET["TAMANIO_MASCOTA"][$i] == "Chico")echo "checked";}}?>>
                                                            <label for="mdl-chico" class="form-check-label">Chico/a</label>
                                                            <input type="checkbox" id="mdl-mediano" name="TAMANIO_MASCOTA[]" value="Mediano" class="form-check-input" <?php if(isset($_GET["TAMANIO_MASCOTA"])){for($i=0;$i<count($_GET["TAMANIO_MASCOTA"]);$i++){if($_GET["TAMANIO_MASCOTA"][$i] == "Mediano")echo "checked";}}?>>
                                                            <label for="mdl-mediano" class="form-check-label">Mediano/a</label>
                                                            <input type="checkbox" id="mdl-grande" name="TAMANIO_MASCOTA[]" value="Grande" class="form-check-input" <?php if(isset($_GET["TAMANIO_MASCOTA"])){for($i=0;$i<count($_GET["TAMANIO_MASCOTA"]);$i++){if($_GET["TAMANIO_MASCOTA"][$i] == "Grande")echo "checked";}}?>>
                                                            <label for="mdl-grande" class="form-check-label">Grande</label>
                                                        </div>
                                                    </div>
                                                    <div class="col  col-12">
                                                        <label for="sexo" class="col-12 col-form-label label-checkbox">Sexo de la mascota:</label>
                                                        <div name="sexo" class="form-check form-check-inline checkbox">
                                                            <input type="checkbox" id="mdl-hembra" name="SEXO_MASCOTA[]" value="Hembra" class="form-check-input" <?php if(isset($_GET["SEXO_MASCOTA"])){for($i=0;$i<count($_GET["SEXO_MASCOTA"]);$i++){if($_GET["SEXO_MASCOTA"][$i] == "Hembra")echo "checked";}}?>>
                                                            <label for="mdl-hembra" class="form-check-label">Hembra</label>
                                                            <input type="checkbox" id="mdl-macho" name="SEXO_MASCOTA[]" value="Macho" class="form-check-input" <?php if(isset($_GET["SEXO_MASCOTA"])){for($i=0;$i<count($_GET["SEXO_MASCOTA"]);$i++){if($_GET["SEXO_MASCOTA"][$i] == "Macho")echo "checked";}}?>>
                                                            <label for="mdl-macho" class="form-check-label">Macho</label>
                                                        </div>
                                                    </div>
                                                    <div class="col  col-12">
                                                        <label for="edad" class="col-12 col-form-label label-checkbox">Edad de mascota:</label>
                                                        <div name="edad" class="form-check form-check-inline checkbox">
                                                            <input type="checkbox" id="mdl-cachorro" name="EDAD_MASCOTA[]" value="Cachorro/a" class="form-check-input" <?php if(isset($_GET["EDAD_MASCOTA"])){for($i=0;$i<count($_GET["EDAD_MASCOTA"]);$i++){if($_GET["EDAD_MASCOTA"][$i] == "Cachorro/a")echo "checked";}}?>>
                                                            <label for="mdl-cachorro" class="form-check-label">Cachorro/a</label>
                                                            <input type="checkbox" id="mdl-adulto" name="EDAD_MASCOTA[]" value="Adulto/a" class="form-check-input" <?php if(isset($_GET["EDAD_MASCOTA"])){for($i=0;$i<count($_GET["EDAD_MASCOTA"]);$i++){if($_GET["EDAD_MASCOTA"][$i] == "Adulto/a")echo "checked";}}?>>
                                                            <label for="mdl-adulto" class="form-check-label">Adulto/a</label>
                                                            <input type="checkbox" id="mdl-anciano" name="EDAD_MASCOTA[]" value="Anciano/a" class="form-check-input" <?php if(isset($_GET["EDAD_MASCOTA"])){for($i=0;$i<count($_GET["EDAD_MASCOTA"]);$i++){if($_GET["EDAD_MASCOTA"][$i] == "Anciano/a")echo "checked";}}?>>
                                                            <label for="mdl-anciano" class="form-check-label">Anciano/a</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                        <?php if(isset($_GET['ID_PROVINCIA'])||isset($_GET['ID_LOCALIDAD'])||isset($_GET['TIPO_ESPECIE_MASCOTA'])||isset($_GET['TAMANIO_MASCOTA'])||isset($_GET['SEXO_MASCOTA'])||isset($_GET['EDAD_MASCOTA'])){
                                                        ?>
                                                            <a href="<?php echo constant('URL').'publicaciones?seccion='.$this->seccion;?>"><input type="button" id="boton2" value="Quitar Filtros" class="btn btn-secondary mx-2"></a>
                                                            <input type="submit" id="boton" value="Filtrar" class="btn btn-success mx-2 px-4">
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <input type="submit" id="boton" value="Filtrar" class="btn btn-success mx-2 px-5">
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if($this->seccion == "Perdido" || $this->seccion == "Encontrado"){
                ?>
                    <div class="nav-PE">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="text-decoration-none" href="<?php echo constant('URL').'publicaciones?seccion=Perdido';?>"><button class="px-4 nav-link nav-style<?php if($this->seccion == 'perdidos'){echo ' active';}?>" id="perdidos-tab">Mascotas perdidas</button></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="text-decoration-none" href="<?php echo constant('URL').'publicaciones?seccion=Encontrado';?>"><button class="px-4 nav-link nav-style<?php if($this->seccion == 'encontrados'){echo ' active';}?>" id="encontrados-tab">Mascotas encontradas</button></a>
                            </li>
                        </ul>
                    </div>
                <?php
                }
                ?>
                <div id="publicaciones_adopcion" class="col-12 publicaciones">
                    <div class="row">
                        <?php
                        if(!empty($this->publicacion)){
                            foreach($this->publicacion as $row){
                                $mascota = new Mascota();
                                $mascota = $row->getMascota();
                        ?>
                                <div class="col-sm-12 col-md-6 m-md-0 p-md-3 col-lg-6 col-xl-4 px-2">
                                    <div class="card m-2 card_publicaciones">
                                        <a class="text-decoration-none text-black" href="<?php echo constant('URL'); ?>abrir_publicacion?publicacion=<?php echo $row->getId_publicacion()?>">
                                            <img src="<?php echo constant('URL')."Public/public_media/".$mascota->getFotos_mascota();?>" class="text-center card-img-top card-imagen">
                                            <div class="card-body">
                                                <h4><?php echo $mascota->getNombre_mascota()?></h4>
                                                <p class="card-text">
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
                                <a class="page-link" href="<?php echo 'publicaciones?seccion='.$this->seccion.'&pagina='.($this->pagina-1);
                                    if(isset($_GET["ID_PROVINCIA"]))for($x=0;$x<sizeof($_GET["ID_PROVINCIA"]);$x++){ echo "&ID_PROVINCIA%5B%5D=".$_GET["ID_PROVINCIA"][$x];} 
                                    if(isset($_GET["ID_LOCALIDAD"]))for($x=0;$x<sizeof($_GET["ID_LOCALIDAD"]);$x++){ echo "&ID_LOCALIDAD%5B%5D=".$_GET["ID_LOCALIDAD"][$x];} 
                                    if(isset($_GET["TIPO_ESPECIE_MASCOTA"]))for($x=0;$x<sizeof($_GET["TIPO_ESPECIE_MASCOTA"]);$x++){ echo "&TIPO_ESPECIE_MASCOTA%5B%5D=".$_GET["TIPO_ESPECIE_MASCOTA"][$x];} 
                                    if(isset($_GET["TAMANIO_MASCOTA"]))for($x=0;$x<sizeof($_GET["TAMANIO_MASCOTA"]);$x++){ echo "&TAMANIO_MASCOTA%5B%5D=".$_GET["TAMANIO_MASCOTA"][$x];} 
                                    if(isset($_GET["SEXO_MASCOTA"]))for($x=0;$x<sizeof($_GET["SEXO_MASCOTA"]);$x++){ echo "&SEXO_MASCOTA%5B%5D=".$_GET["SEXO_MASCOTA"][$x];} 
                                    if(isset($_GET["EDAD_MASCOTA"]))for($x=0;$x<sizeof($_GET["EDAD_MASCOTA"]);$x++){ echo "&EDAD_MASCOTA%5B%5D=".$_GET["EDAD_MASCOTA"][$x];}
                                ?>">Anterior</a>
                                </li>
                                <?php
                                    for($i = 1 ; $i <= $this->total_paginas ; $i++){
                                ?>
                                        <li class='page-item'><a class='page-link' href='<?php echo 'publicaciones?seccion='.$this->seccion.'&pagina='.$i;
                                            if(isset($_GET["ID_PROVINCIA"]))for($x=0;$x<sizeof($_GET["ID_PROVINCIA"]);$x++){ echo "&ID_PROVINCIA%5B%5D=".$_GET["ID_PROVINCIA"][$x];} 
                                            if(isset($_GET["ID_LOCALIDAD"]))for($x=0;$x<sizeof($_GET["ID_LOCALIDAD"]);$x++){ echo "&ID_LOCALIDAD%5B%5D=".$_GET["ID_LOCALIDAD"][$x];} 
                                            if(isset($_GET["TIPO_ESPECIE_MASCOTA"]))for($x=0;$x<sizeof($_GET["TIPO_ESPECIE_MASCOTA"]);$x++){ echo "&TIPO_ESPECIE_MASCOTA%5B%5D=".$_GET["TIPO_ESPECIE_MASCOTA"][$x];} 
                                            if(isset($_GET["TAMANIO_MASCOTA"]))for($x=0;$x<sizeof($_GET["TAMANIO_MASCOTA"]);$x++){ echo "&TAMANIO_MASCOTA%5B%5D=".$_GET["TAMANIO_MASCOTA"][$x];} 
                                            if(isset($_GET["SEXO_MASCOTA"]))for($x=0;$x<sizeof($_GET["SEXO_MASCOTA"]);$x++){ echo "&SEXO_MASCOTA%5B%5D=".$_GET["SEXO_MASCOTA"][$x];} 
                                            if(isset($_GET["EDAD_MASCOTA"]))for($x=0;$x<sizeof($_GET["EDAD_MASCOTA"]);$x++){ echo "&EDAD_MASCOTA%5B%5D=".$_GET["EDAD_MASCOTA"][$x];}
                                        ?>'><?php echo $i?></a></li>
                                <?php
                                    }
                                ?>
                                <li class="page-item<?php if($this->pagina == $this->total_paginas){echo ' disabled';}?>">
                                <a class="page-link" href="<?php echo 'publicaciones?seccion='.$this->seccion.'&pagina='.($this->pagina+1);
                                    if(isset($_GET["ID_PROVINCIA"]))for($x=0;$x<sizeof($_GET["ID_PROVINCIA"]);$x++){ echo "&ID_PROVINCIA%5B%5D=".$_GET["ID_PROVINCIA"][$x];} 
                                    if(isset($_GET["ID_LOCALIDAD"]))for($x=0;$x<sizeof($_GET["ID_LOCALIDAD"]);$x++){ echo "&ID_LOCALIDAD%5B%5D=".$_GET["ID_LOCALIDAD"][$x];} 
                                    if(isset($_GET["TIPO_ESPECIE_MASCOTA"]))for($x=0;$x<sizeof($_GET["TIPO_ESPECIE_MASCOTA"]);$x++){ echo "&TIPO_ESPECIE_MASCOTA%5B%5D=".$_GET["TIPO_ESPECIE_MASCOTA"][$x];} 
                                    if(isset($_GET["TAMANIO_MASCOTA"]))for($x=0;$x<sizeof($_GET["TAMANIO_MASCOTA"]);$x++){ echo "&TAMANIO_MASCOTA%5B%5D=".$_GET["TAMANIO_MASCOTA"][$x];} 
                                    if(isset($_GET["SEXO_MASCOTA"]))for($x=0;$x<sizeof($_GET["SEXO_MASCOTA"]);$x++){ echo "&SEXO_MASCOTA%5B%5D=".$_GET["SEXO_MASCOTA"][$x];} 
                                    if(isset($_GET["EDAD_MASCOTA"]))for($x=0;$x<sizeof($_GET["EDAD_MASCOTA"]);$x++){ echo "&EDAD_MASCOTA%5B%5D=".$_GET["EDAD_MASCOTA"][$x];}
                                ?>">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php
                    }else{
                    ?>
                        <div class="text-center">
                            <h2 class="mt-5">Ups, no se encontraron publicaciones!</h2>
                            <img src="<?php echo constant('URL'); ?>public\media\pagina_inexistente.png" class="w-50 ps-4" alt="">
                        </div>
                    <?php
                    }
                    ?>
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
    if($this->usuario->getEstado_bloqueo()!= NULL){
        header('Location:errores?mensaje=0');
    }
    else{
        header('Location:publicaciones');
    }
}
?>