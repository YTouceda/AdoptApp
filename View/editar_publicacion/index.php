<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style-CrearPublicacion.css">
        <link rel="stylesheet" type="text/css" href="css/style-header-footer.css">
        <link rel="stylesheet" type="text/css" href="css/style-modal.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="script.js" defer></script>
        <script type="text/javascript" src="../RESPOformval.js" defer></script>
        <script type="text/javascript" src="scriptjs.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <title>AdoptApp - Editar Publicación</title>
    </head>
    <body>
       
        <main class="container contenedor-cp">
                <div class="row">
           
                <div class="titulo-cp col-12">
                <h3 class="titulo-cp">Editar Publicacion</h3>
                </div>
                
            <div class="row">
                

                <div class="col-12 col-sm-6">
                        <div class="titulo-cp col">
                        <h6 class="titulo-cp">Datos  <i class="fas fa-id-card"></i></h6>
                        </div>
                <form class="detalle-cp" action="publicar_mascota.php" method="post" id="formcp">
                    <div>
                    <input type="text"  id="nombre" name="nombre" class="form-control" placeholder="Nombre de la mascota" aria-label="Mascota" maxlength="12" pattern="[A-Za-z]" aria-describedby="basic-addon1">
                    </div>
                    <div id="errorNombre" class="invalid-feedback">Nombre inválido, debe contener solo letras.</div>
                    <div>
                    <input type="tel"  id="telefono" name="telefono" class="form-control" placeholder="Telefono de contacto" aria-label="Tel contacto" maxlength="12" pattern="^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$" aria-describedby="basic-addon1">
                    </div>
                    <div id="errorTelefono" class="invalid-feedback">Debe ingresar un telefono válido.</div>
                        <div>
                        <select class="form-select select-cp" aria-label="Mascota" id="select-estado" name="estado">
                            <option selected disabled>Estado de la mascota</option>
                            <option value="0">En Adopción</option>
                            <option value="1">Lo encontré</option>
                            <option value="2">Está perdido</option>
                        </select>
                        </div>
                        <div id="errorEstado" class="invalid-feedback">Debe elegir un estado válido.</div>
                   
                        <div>
                        <select class="form-select select-cp" aria-label="Mascota" id="select-tipo" name="tipo"> 
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
                        <select class="form-select select-cp" aria-label="Tamaño" id="select-tam" name="tam"> 
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
                            <textarea class="form-control cp-textarea" maxlength="500" minlength="50" rows="10" placeholder="Ingrese una descripción lo más detallada posible. Se sugiere incluir información de importancia para el adoptante, por ejemplo : Si está castrado, si está vacunado, si puede acercar la mascota a la casa del adoptante, etc." id="text-desc"  name="text-desc" required ></textarea>
                            <div id="errorDescripcion" class="invalid-feedback">Debe escribir una descripión de no menos de 50 caracteres.</div>
                            </div>
                            </div>
                    <div class="titulo-cp col">
                        <h6 class="titulo-cp">Ubicación   <i class="fas fa-map-marker-alt"></i>  </h6> 
                        </div>
                        <div id="fil-ubicacion" class="select-cp col" >
                           
                            <select name="provincia" id="provincia" class="form form-control">
                                <option disabled="true" selected="true" value="">Seleccionar una Provincia</option>
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
                            <select id="localidades" class="form-control ciudad-cp col" name="localidades">
                                <option disabled="true" selected="true" value="">Seleccionar una Localidad</option>
                            </select>
                            <div id="errorLocalidades" class="invalid-feedback">Debe seleccionar una localidad</div>
                            <input id="xlocalidad" type="hidden">
                        </div>

                       


                </form> 
            </div><!-- COL -->
          
            <div class="fotos-cp col-12 col-sm-6">   
                <div class="input-fotos">
                    <div class="titulo-cp col">
                        <h6 class="titulo-cp">Fotos  <i class="fas fa-images"></i></h6>
                    </div>
                    <input required class="form-control cp mb-3" type="file" accept="image/*" id="formFileMultiple" name="inputfotos" multiple>
                </div>

                <div class="img-seleccionada col"> <img src="media/logoOld.png"  class="img-fluid" ></div>
                <div class="row">
                    <div class="img-chiq col col-3"><img src="media/logoOld.png"class="img-fluid" > </div>
                    <div class="img-chiq col col-3"><img src="media/logoOld.png"class="img-fluid" > </div>
                    <div class="img-chiq col col-3"><img src="media/logoOld.png"class="img-fluid" > </div>
                    <div class="img-chiq col col-3"><img src="media/logoOld.png"class="img-fluid" > </div>
                </div>

                <button type="submit" id="publicar" name="publicar" class="btn btn-success">Publicar</button>
            </div> 
            
        </main>
    </body>
    
</html>





