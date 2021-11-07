<!DOCTYPE html>
<html>
    <head>
        <title>AdoptApp - Crear Publicación</title>
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
        <main class="container contenedor-cp">
                <div class="row">
           
                <div class="titulo-cp col-12">
                <h3 class="titulo-cp">Crear Publicación</h3>
                <div class="titulo-cp"></div>
                </div>
                
            <div class="row">
                

                <div class="col-12 col-sm-6">
                        <div class="titulo-cp col">
                        <h6 class="titulo-cp">Datos  <i class="fas fa-id-card"></i></h6>
                        </div>
                <form class="detalle-cp" action="<?php echo constant('URL'); ?>crear_publicacion/registrarMascota" enctype="multipart/form-data" method="post" id="formcp">
                    <div>
                    <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Nombre de la mascota" aria-label="Mascota" maxlength="12" aria-describedby="basic-addon1">
                    </div>
                    <div id="errorNombre" class="invalid-feedback">Nombre inválido, debe contener solo letras.</div>
                    <div>
                    <input type="tel"  id="telefono" name="telefono" class="form-control" placeholder="Telefono de contacto" aria-label="Tel contacto" maxlength="12" pattern="^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$" aria-describedby="basic-addon1">
                    </div>
                    <div id="errorTelefono" class="invalid-feedback">Debe ingresar un telefono válido.</div>
                        <div>
                        <select class="form-select select-cp" aria-label="Mascota" id="select-estado" name="estado">
                            <option <?php if(($_GET['estado'])==0){ echo "selected";} ?> value="0">En Adopción</option>
                            <option <?php if(($_GET['estado'])==1){ echo "selected";} ?> value="1">Lo encontré</option>
                            <option <?php if(($_GET['estado'])==2){ echo "selected";} ?> value="2">Está perdido</option>

                            <?php if($_GET['estado']==0)?>
                        </select>
                        </div>
                        <div id="errorEstado" class="invalid-feedback">Debe elegir un estado válido.</div>
                   
                        <div>
                        <select class="form-select select-cp" aria-label="Mascota" id="select-tipo" name="especie"> 
                            <option selected disabled>Elija el tipo de mascota</option>
                            <option value="0">Perro</option>
                            <option value="1">Gato</option>
                        </select>
                        </div>
                        <div id="errorTipo" class="invalid-feedback">Debe elegir una mascota válida.</div>
                        <div>
                        <select class="form-select select-cp" aria-label="Sexo" id="select-sexo" name="sexo"> 
                            <option selected disabled>Elija el sexo</option>
                            <option value="0">Hembra</option>
                            <option value="1">Macho</option>
                        </select>
                        </div>
                        <div id="errorSexo" class="invalid-feedback">Debe elegir una opción válida.</div>
                        <div>
                        <select class="form-select select-cp" aria-label="Tamaño" id="select-tam" name="tamanio"> 
                            <option selected disabled>Elija el tamaño</option>
                            <option value="0">Pequeño</option>
                            <option value="1">Mediano</option>
                            <option value="2">Grande</option>
                        </select>
                        </div>
                        <div id="errorTamaño" class="invalid-feedback">Debe elegir un tamaño válido.</div>
                        <div>
                            <select class="form-select select-cp" aria-label="Edad" id="select-edad" name="edad"> 
                                <option disabled selected>Elija la edad aproximada</option>
                                <option value="0">Cachorro (Menos de 2 años)</option>
                                <option value="1">Adulto (Entre 2 y 10 años)</option>
                                <option value="2">Anciano (Más de 10 años)</option>
                            </select>
                            </div>
                            <div id="errorEdad" class="invalid-feedback">Debe elegir una edad válida.</div>
                            <div class="row">
                            <div class="col">
                            <textarea class="form-control cp-textarea" maxlength="500" minlength="50" rows="10" placeholder="Ingrese una descripción lo más detallada posible. Se sugiere incluir información de importancia para el adoptante, por ejemplo : Si está castrado, si está vacunado, si puede acercar la mascota a la casa del adoptante, etc." id="text-desc"  name="descripcion" required ></textarea>
                            <div id="errorDescripcion" class="invalid-feedback">Debe escribir una descripión de no menos de 50 caracteres.</div>
                            </div>
                            </div>
                    <div class="titulo-cp col">
                        <h6 class="titulo-cp">Ubicación   <i class="fas fa-map-marker-alt"></i>  </h6> 
                        </div>
                        <div id="fil-ubicacion" class="select-cp col" >
                           
                            <select name="provincia" id="provincia" class="form form-control">
                                <option value="">Seleccionar una Provincia</option>
                                <option value="06">Buenos Aires</option>
                                <option value="10">Catamarca</option>
                                <option value="22">Chaco</option>
                                <option value="26">Chubut</option>
                                <option value="02">Ciudad Autónoma de Buenos Aires</option>
                                <option value="14">Cordoba</option>
                                <option value="18">Corrientes</option>
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
                            <div id="errorProvincia" class="invalid-feedback">Debe seleccionar una provincia.</div>
                            <select id="localidades" class="form-control ciudad-cp col" name="localidad">
                                <option value="" >Seleccionar una Localidad</option>
                            </select>
                            <div id="errorLocalidades" class="invalid-feedback">Debe seleccionar una localidad</div>
                            <input id="xlocalidad" type="hidden">
                        </div>

                       


                
            </div><!-- COL -->
          
            <div class="fotos-cp col-12 col-sm-6">   
                <div class="input-fotos">
                    <div class="titulo-cp col">
                        <h6 class="titulo-cp">Fotos  <i class="fas fa-images"></i></h6>
                        
                    </div>
                    <input required class="form-control cp mb-3 add_photo" type="file" accept="image/*" id="input_add_photo1" name="foto">
                    <!-- <input required class="form-control cp mb-3 add_photo" type="file" accept="image/*" id="input_add_photo2">
                    <input required class="form-control cp mb-3 add_photo" type="file" accept="image/*" id="input_add_photo3">
                    <input required class="form-control cp mb-3 add_photo" type="file" accept="image/*" id="input_add_photo4">
                    <input required class="form-control cp mb-3 add_photo" type="file" accept="image/*" id="input_add_photo5"> -->

                </div>

                <label for="input_add_photo1">
                <div class="img-seleccionada col " id="img_grande"> <img src="Public/media/agregar-foto.png"  class="img-fluid fotos-mascota" ></div></label>
            
                <div class="row">
                    <!-- <label for="input_add_photo2" class="img-chiq col col-3">
                    <div class="img-chiq col col-3" id="img_chiq1"><img src="Public/media/agregar-foto.png" class="img-fluid fotos-mascota" > </div></label>
                    
                    <label for="input_add_photo3" class="img-chiq col col-3">
                    <div class="img-chiq col col-3" id="img_chiq2"><img src="Public/media/agregar-foto.png" class="img-fluid fotos-mascota" > </div></label>
                    
                    <label for="input_add_photo4" class="img-chiq col col-3">
                    <div class="img-chiq col col-3" id="img_chiq3"><img src="Public/media/agregar-foto.png" class="img-fluid fotos-mascota" > </div></label>
                    
                    <label for="input_add_photo5" class="img-chiq col col-3">
                    <div class="img-chiq col col-3" id="img_chiq4"><img src="Public/media/agregar-foto.png" class="img-fluid fotos-mascota" > </div></label> -->
                    
                    
                    <div id="errorFotos" class="invalid-feedback">Debe subir al menos una foto</div>
                </div>

                <div id="alertaCreacionExitosa"></div>
                <button type="submit" id="publicar" name="publicar" class="btn btn-success">Publicar</button>
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





