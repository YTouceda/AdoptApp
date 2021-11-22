<!DOCTYPE html>
<html>
    <head>
        <title>AdoptApp - Editar Publicación</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/sweetalert2/6.0.1/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant ('URL'); ?>Public/css/style-CrearPublicacion.css">
        <script type="text/javascript" src="<?php echo constant ('URL'); ?>Public/js/formvaledit.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-header-footer.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.css">
    </head>
    <body class="body-adoptapp">
        <header>
        <?php
            require 'View/header.php';
        ?>
        </header>
        <main class="container contenedor-cp">
                <div class="row">
           
                <div class="titulo-cp col-12">
                <h3 class="titulo-cp">Editar publicación</h3>
                <div class="titulo-cp"></div>
                </div>
                
            <div class="row">
                <?php //$objMascota=$this->publicacion->getMascota();?>

                <div class="col-12 col-sm-6">
                        <div class="titulo-cp col">
                        <h6 class="titulo-cp">Datos  <i class="fas fa-id-card"></i></h6>
                        </div>
                <form class="detalle-cp" action="<?php echo constant('URL'); ?>editar_publicacion/editarMascota?publicacion=<?php echo $_GET['publicacion'];?>"  enctype="multipart/form-data" id="formedit" method="post" id="formcp">
                <!-- EN SUBMIT VA ABRIR PUBLICACION CON EL GET DEL ID PUB-->
                    <div>
                    <input type="text" value="<?php echo $this->mascota->getNombre_mascota();?>" id="nombre" name="nombre" class="form-control" placeholder="Nombre de la mascota" aria-label="Mascota" maxlength="12" aria-describedby="basic-addon1">
                    </div>
                    <div id="errorNombre" class="invalid-feedback">Nombre inválido, debe contener solo letras.</div>
                    <div>
                    <input type="tel"  value="<?php echo $this->publicacion->getNum_contacto_publicacion();?>"  id="telefono" name="telefono" class="form-control" placeholder="Telefono de contacto" aria-label="Tel contacto" maxlength="12" pattern="^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$" aria-describedby="basic-addon1">
                    </div>
                    <div id="errorTelefono" class="invalid-feedback">Debe ingresar un telefono válido.</div>
                        <div>
                        <select class="form-select select-cp" aria-label="Mascota" id="select-estado" name="estado">
                            <option  value="1"<?php if($this->publicacion->getEstado()==1){ echo "selected";} ?>>En Adopción</option>
                            <option  value="2"<?php if($this->publicacion->getEstado()==2){ echo "selected";} ?>>Lo encontré</option>
                            <option  value="3"<?php if($this->publicacion->getEstado()==3){ echo "selected";} ?>>Está perdido</option>
                        </select>
                        </div>

                

                        <div id="errorEstado" class="invalid-feedback">Debe elegir un estado válido.</div>
                   
                        <div>
                        <select class="form-select select-cp" aria-label="Mascota" id="select-tipo" name="especie"> 
                            <option selected disabled>Elija el tipo de mascota</option>
                            <option value="1"<?php if($this->mascota->getEspecie_mascota()==1){ echo "selected";} ?>>Perro</option>
                            <option value="2"<?php if($this->mascota->getEspecie_mascota()==2){ echo "selected";} ?>>Gato</option>
                        </select>
                        </div>
                        <div id="errorTipo" class="invalid-feedback">Debe elegir una mascota válida.</div>
                        <div>
                        <select class="form-select select-cp" aria-label="Sexo" id="select-sexo" name="sexo"> 
                            <option selected disabled>Elija el sexo</option>
                            <option value="1"<?php if($this->mascota->getSexo_mascota()==1){ echo "selected";} ?>>Macho</option>
                            <option value="2"<?php if($this->mascota->getSexo_mascota()==2){ echo "selected";} ?>>Hembra</option>
                        </select>
                        </div>
                        <div id="errorSexo" class="invalid-feedback">Debe elegir una opción válida.</div>
                        <div>
                        <select class="form-select select-cp" aria-label="Tamaño" id="select-tam" name="tamanio"> 
                            <option selected disabled>Elija el tamaño</option>
                            <option value="1"<?php if($this->mascota->getTamanio_mascota()==1){ echo "selected";} ?>>Pequeño</option>
                            <option value="2"<?php if($this->mascota->getTamanio_mascota()==2){ echo "selected";} ?>>Mediano</option>
                            <option value="3"<?php if($this->mascota->getTamanio_mascota()==3){ echo "selected";} ?>>Grande</option>
                        </select>
                        </div>
                        <div id="errorTamaño" class="invalid-feedback">Debe elegir un tamaño válido.</div>
                        <div>
                            <select class="form-select select-cp" aria-label="Edad" id="select-edad" name="edad"> 
                                <option disabled selected>Elija la edad aproximada</option>
                                <option value="1"<?php if($this->mascota->getEdad_mascota()==1){ echo "selected";} ?>>Cachorro (Menos de 2 años)</option>
                                <option value="2"<?php if($this->mascota->getEdad_mascota()==2){ echo "selected";} ?>>Adulto (Entre 2 y 10 años)</option>
                                <option value="3"<?php if($this->mascota->getEdad_mascota()==3){ echo "selected";} ?>>Anciano (Más de 10 años)</option>
                            </select>
                            </div>
                            <div id="errorEdad" class="invalid-feedback">Debe elegir una edad válida.</div>
                            <div class="row">
                            <div class="col">
                            <textarea class="form-control cp-textarea"  maxlength="500" minlength="50" rows="10" placeholder="Ingrese una descripción lo más detallada posible. Se sugiere incluir información de importancia para el adoptante, por ejemplo : Si está castrado, si está vacunado, si puede acercar la mascota a la casa del adoptante, etc." id="text-desc"  name="descripcion" required ><?php echo $this->mascota->getDescripcion_mascota();?></textarea>
                            <div id="errorDescripcion" class="invalid-feedback">Debe escribir una descripión de no menos de 50 caracteres.</div>
                            </div>
                            </div>
                    <div class="titulo-cp col">
                        <h6 class="titulo-cp">Ubicación   <i class="fas fa-map-marker-alt"></i>  </h6> 
                        </div>
                        <div id="fil-ubicacion" class="select-cp col" >
                           
                        <select name="provincia" id="provincia" class="form form-control m-2">
                                <option disabled="true" selected="true" value="">Seleccionar una Provincia</option>
                                <option value="02" <?php if($this->publicacion->getProvincia() == "02"){ echo "selected"; }?>>Ciudad Autónoma de Buenos Aires</option>
                                <option value="06" <?php if($this->publicacion->getProvincia() == "06"){ echo "selected"; }?>>Buenos Aires</option>
                                <option value="10" <?php if($this->publicacion->getProvincia() == "10"){ echo "selected"; }?>>Catamarca</option>
                                <option value="14" <?php if($this->publicacion->getProvincia() == "14"){ echo "selected"; }?>>Cordoba</option>
                                <option value="18" <?php if($this->publicacion->getProvincia() == "18"){ echo "selected"; }?>>Corrientes</option>
                                <option value="22" <?php if($this->publicacion->getProvincia() == "22"){ echo "selected"; }?>>Chaco</option>
                                <option value="26" <?php if($this->publicacion->getProvincia() == "26"){ echo "selected"; }?>>Chubut</option>
                                <option value="30" <?php if($this->publicacion->getProvincia() == "30"){ echo "selected"; }?>>Entre Rios</option>
                                <option value="34" <?php if($this->publicacion->getProvincia() == "34"){ echo "selected"; }?>>Formosa</option>
                                <option value="38" <?php if($this->publicacion->getProvincia() == "38"){ echo "selected"; }?>>Jujuy</option>
                                <option value="42" <?php if($this->publicacion->getProvincia() == "42"){ echo "selected"; }?>>La Pampa</option>
                                <option value="46" <?php if($this->publicacion->getProvincia() == "46"){ echo "selected"; }?>>La Rioja</option>
                                <option value="50" <?php if($this->publicacion->getProvincia() == "50"){ echo "selected"; }?>>Mendoza</option>
                                <option value="54" <?php if($this->publicacion->getProvincia() == "54"){ echo "selected"; }?>>Misiones</option>
                                <option value="58" <?php if($this->publicacion->getProvincia() == "58"){ echo "selected"; }?>>Neuquen</option>
                                <option value="62" <?php if($this->publicacion->getProvincia() == "62"){ echo "selected"; }?>>Rio Negro</option>
                                <option value="66" <?php if($this->publicacion->getProvincia() == "66"){ echo "selected"; }?>>Salta</option>
                                <option value="74" <?php if($this->publicacion->getProvincia() == "74"){ echo "selected"; }?>>San Luis</option>
                                <option value="78" <?php if($this->publicacion->getProvincia() == "78"){ echo "selected"; }?>>Santa Cruz</option>
                                <option value="82" <?php if($this->publicacion->getProvincia() == "82"){ echo "selected"; }?>>Santa Fe</option>
                                <option value="86" <?php if($this->publicacion->getProvincia() == "86"){ echo "selected"; }?>>Santiago Del Estero</option>
                                <option value="94" <?php if($this->publicacion->getProvincia() == "94"){ echo "selected"; }?>>Tierra Del Fuego</option>
                            </select>
                            <div id="errorProvincia" class="invalid-feedback">Debe seleccionar una provincia.</div>
                            <select name="localidad" id="localidades" class="form form-control m-2">
                                <option disabled="true" selected="true" value="">Seleccionar una Localidad</option>
                            </select>
                            <div id="errorLocalidades" class="invalid-feedback">Debe seleccionar una localidad</div>
                            <!-- <input id="xlocalidad" type="hidden" < ?php echo "value='".$this->publicacion->getLocalidad()."'";?>> -->
                            <input id="xlocalidad" type="hidden">
                           
                        </div>

                            <input id="id_mascota" type="hidden" name="id_mascota" value="<?php echo $this->mascota->getId_mascota();?>">
            </div><!-- COL -->
          
            <div class="fotos-cp col-12 col-sm-6">   
                <div class="input-fotos">
                    <div class="titulo-cp col">
                        <h6 class="titulo-cp">Fotos  <i class="fas fa-images"></i></h6>
                        
                    </div>
                    <input  class="form-control cp mb-3 add_photo" type="file"  accept="image/*" id="input_add_photo1" name="foto">

                </div>
                <label>


                    <div class="img-seleccionada col img-agregada position-relative" id="img_grande"> <img src="<?php echo constant('URL'); ?>Public/public_media/<?php echo $this->mascota->getFotos_mascota() ?>"  class="img-fluid img-mascota edit" > <img id="edit" src="<?php echo constant('URL'); ?>Public/media/edit.svg" class="edit col mascota-edit p-50 position-absolute top-50 start-50 translate-middle"></div></label>
                    <input type="hidden" name="fotovieja" value="<?php echo $this->mascota->getFotos_mascota() ?>">

                <div id="alertaCreacionExitosa"></div>
                <button type="button" id="enviar" name="publicar" class="btn btn-success">Guardar cambios</button>
               
                </div> 
            
                </form> 

        </main>
        <footer>
            <?php
                require 'View/footer.php';
            ?>
        </footer>
    </body>
    
</html>


