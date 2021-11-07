<?php
	include("conexion.php");
	$con=conectar();

    
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
        <script type="text/javascript" src="scriptjs.js" defer></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style-header-footer.css">
        <script type="text/javascript" src="script.js" defer></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <title>AdoptApp - Adopciones</title>
    </head>
    <body class="body-adoptapp">
        <header class="header-adoptapp row header-grupo">
            <div id="cont-logo" class="col-12 col-sm-6 col-xxl-3">
                <div id="header-logo" class="header-line logo-grupo p-2 m-0">
                    <a href="index.html"><img src="media/Logo.png" id="header_logo" alt=""></a>
                </div>
            </div>
            <div id="header-sec" class="col-12 col-sm-6">
                <div class="header-line secciones-grupo my-4">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <div id="adopciones" class="seccion link-adopciones">
                                <a href="index.html"><label for="adopciones" id="lbl-adopciones" class="lbl-seccion seccion-active">Quiero Adoptar</label></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div id="perdidos" class="seccion link-perdidos">
                                <a href="perdidos.html"><label for="perdidos" id="lbl-perdidos" class="lbl-seccion">Perdidos / Encontrados</label></a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div id="crear" class="seccion link-crear">
                                <label for="crear" id="lbl-crear-publicacion" class="lbl-seccion" data-bs-toggle="modal" data-bs-target="#modal_crear_publicacion">Crear Publicacion</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="seccion_iniciar_sesion" class="col-12 col-sm-6 col-xxl-3">
                <div id="header-user" class="header-line user-grupo row my-4">
                    <div class="nav-user col-8 col-xxl-12 position-relative">
                        <div id="btns_usuario" class="position-absolute end-0">
                            <div id="btn_iniciar_container">
                                <button id="btn-iniciarSesion" type="button" class="btn btn-primary"><span><i class="fab fa-facebook"></i></span> INICIAR SESIÓN</button>
                            </div>
                        </div>
                    </div>
                    <div id='menu-secciones-cont' class='nav-user text-center col-4'>
                        <div class='dropdown justify-content-md-center'>
                            <label id='dropdown-menu-secciones' class='lbl-seccion nav-icon-menu-secciones' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-bars'></i>
                            </label>
                            <ul class='dropdown-menu dropdown-menu-lg-end' aria-labelledby='dropdown-menu-secciones'>
                                <li>
                                    <a href='index.html' class='text-decoration-none'><label for='adopciones' id='lbl-adopciones' class='lbl-seccion dropdown-item'>Adopciones</label></a>
                                </li>
                                <li><hr class='dropdown-divider'></li>
                                <li>
                                    <a href='perdidos.html' class='text-decoration-none'><label for='perdidos' class='lbl-seccion dropdown-item'>Perdidos</label></a>
                                </li>
                                <li><hr class='dropdown-divider'></li>
                                <li>
                                    <label for='crear' class='text-decoration-none dropdown-item' data-bs-toggle='modal' data-bs-target='#modal_crear_publicacion'>Crear Publicacion</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal_crear_publicacion" class="modal fade modal-style" tabindex="-1" aria-labelledby="titulo_modal_crear_publicacion" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titulo_modal_crear_publicacion">Crear Publicación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="moda-opciones-crear-publicacion">
                                <ul class="nav nav-pills nav-fill">
                                    <li class="nav-item">
                                        <div id="adopcion" class="seccion link-adopciones">
                                            <a href="Crear_publicacion.html"><label for="adopcion" id="lbl-adopcion" class="lbl-seccion">Quiero dar en adopción una mascota</label></a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div id="perdidos" class="seccion link-perdidos">
                                            <a href="Crear_publicacion.html"><label for="perdido" id="lbl-perdido" class="lbl-seccion">Perdí mi mascota</label></a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div id="crear" class="seccion link-crear">
                                            <a href="Crear_publicacion.html"><label for="encontrado" id="lbl-encontrado" class="lbl-seccion">Encontré la mascota de alguien más</label></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="main container">
            <div id="main-adopciones" class="row">
                <div id="formulario-filtros" class="col-12">
                    <form id="form-filtro" class="form formulario row justify-content-md-center">
                        <div class="col">
                            <label class="col-form-label label-checkbox">Ubicación:</label>
                            <select  id="provincia" class="form form-control m-2">
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
                            <select id="localidades" class="form form-control m-2">
                                <option disabled="true" selected="true" value="">Seleccionar una Localidad</option>
                            </select>
                            <input id="xlocalidad" type="hidden">
                        </div>
                        <div class="col">
                            <label for="tipo" class="col-form-label label-checkbox">Tipo de mascota:</label>
                            <div name="tipo" class="form-check form-check-inline checkbox">
                                <input type="checkbox" id="perro" name="tipo-mascota" value="Perro" class="form-check-input">
                                <label for="perro" class="form-check-label"><i class="fas fa-dog"></i>- Perro/a</label><br>
                                <input type="checkbox" id="gato" name="tipo-mascota" value="Gato" class="form-check-input">
                                <label for="gato" class="form-check-label"><i class="fas fa-cat"></i>- Gato/a</label><br>
                            </div>
                        </div>
                        <div class="col">
                            <label for="tamanio" class="col-form-label label-checkbox">Tamaño de mascota:</label>
                            <div id="tamanio" name="tamanio" class="form-check form-check-inline checkbox">
                                <input type="checkbox" id="chico" name="tamaño-mascota" value="Chico" class="form-check-input">
                                <label for="chico" class="form-check-label">Chico/a</label><br>
                                <input type="checkbox" id="mediano" name="tamaño-mascota" value="Mediano" class="form-check-input">
                                <label for="mediano" class="form-check-label">Mediano/a</label><br>
                                <input type="checkbox" id="grande" name="tamaño-mascota" value="Grande" class="form-check-input">
                                <label for="grande" class="form-check-label">Grande</label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="sexo" class="col-form-label label-checkbox">Sexo de la mascota:</label>
                            <div name="sexo" class="form-check form-check-inline checkbox">
                                <input type="checkbox" id="hembra" name="sexo-mascota" value="Hembra" class="form-check-input">
                                <label for="hembra" class="form-check-label">Hembra</label><br>
                                <input type="checkbox" id="macho" name="sexo-mascota" value="Macho" class="form-check-input">
                                <label for="macho" class="form-check-label">Macho</label><br>
                            </div>
                        </div>
                        <div class="col">
                            <label for="edad" class="col-form-label label-checkbox">Edad de mascota:</label>
                            <div name="edad" class="form-check form-check-inline checkbox">
                                <input type="checkbox" id="cachorro" name="edad-mascota" value="Cachorro" class="form-check-input">
                                <label for="cachorro" class="form-check-label">Cachorro/a</label><br>
                                <input type="checkbox" id="adulto" name="edad-mascota" value="Adulto" class="form-check-input">
                                <label for="adulto" class="form-check-label">Adulto/a</label><br>
                                <input type="checkbox" id="anciano" name="edad-mascota" value="Anciano" class="form-check-input">
                                <label for="anciano" class="form-check-label">Anciano/a</label>
                            </div>
                        </div>
                        <div class="col col-1 position-relative">
                            <input type="button" id="boton" value="Filtrar" class="btn btn-success btn-filtrar position-absolute top-50 start-50 translate-middle">
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
                                            <form id="form-filtro-modal" class="form row g-3 formulario">
                                                <div class="row justify-content-md-center">
                                                    <div class="col col-12">
                                                        <label class="col-form-label label-checkbox">Ubicación:</label>
                                                        <select id="provincia_modal" class="form form-control m-2">
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
                                                        <select id="localidades_modal" class="form form-control m-2">
                                                            <option disabled="true" selected="true" value="">Seleccionar una Localidad</option>
                                                        </select>
                                                        <input id="xlocalidad_modal" type="hidden">
                                                    </div>
                                                    <div class="col  col-12">
                                                        <label for="tipo" class="col-12 col-form-label label-checkbox">Tipo de mascota:</label>
                                                        <div name="tipo" class="form-check form-check-inline checkbox">
                                                            <input type="checkbox" id="mdl-perro" name="tipo-mascota" value="Perro" class="form-check-input">
                                                            <label for="mdl-perro" class="form-check-label"><i class="fas fa-dog"></i>- Perro/a</label>
                                                            <input type="checkbox" id="mdl-gato" name="tipo-mascota" value="Gato" class="form-check-input">
                                                            <label for="mdl-gato" class="form-check-label"><i class="fas fa-cat"></i>- Gato/a</label>
                                                        </div>
                                                    </div>
                                                    <div class="col  col-12">
                                                        <label for="tamanio" class="col-12 col-form-label label-checkbox">Tamaño de mascota:</label>
                                                        <div name="tamanio" class="form-check form-check-inline checkbox">
                                                            <input type="checkbox" id="mdl-chico" name="tamaño-mascota" value="Chico" class="form-check-input">
                                                            <label for="mdl-chico" class="form-check-label">Chico/a</label>
                                                            <input type="checkbox" id="mdl-mediano" name="tamaño-mascota" value="Mediano" class="form-check-input">
                                                            <label for="mdl-mediano" class="form-check-label">Mediano/a</label>
                                                            <input type="checkbox" id="mdl-grande" name="tamaño-mascota" value="Grande" class="form-check-input">
                                                            <label for="mdl-grande" class="form-check-label">Grande</label>
                                                        </div>
                                                    </div>
                                                    <div class="col  col-12">
                                                        <label for="sexo" class="col-12 col-form-label label-checkbox">Sexo de la mascota:</label>
                                                        <div name="sexo" class="form-check form-check-inline checkbox">
                                                            <input type="checkbox" id="mdl-hembra" name="sexo-mascota" value="Hembra" class="form-check-input">
                                                            <label for="mdl-hembra" class="form-check-label">Hembra</label>
                                                            <input type="checkbox" id="mdl-macho" name="sexo-mascota" value="Macho" class="form-check-input">
                                                            <label for="mdl-macho" class="form-check-label">Macho</label>
                                                        </div>
                                                    </div>
                                                    <div class="col  col-12">
                                                        <label for="edad" class="col-12 col-form-label label-checkbox">Edad de mascota:</label>
                                                        <div name="edad" class="form-check form-check-inline checkbox">
                                                            <input type="checkbox" id="mdl-cachorro" name="edad-mascota" value="Cachorro" class="form-check-input">
                                                            <label for="mdl-cachorro" class="form-check-label">Cachorro/a</label>
                                                            <input type="checkbox" id="mdl-adulto" name="edad-mascota" value="Adulto" class="form-check-input">
                                                            <label for="mdl-adulto" class="form-check-label">Adulto/a</label>
                                                            <input type="checkbox" id="mdl-anciano" name="edad-mascota" value="Anciano" class="form-check-input">
                                                            <label for="mdl-anciano" class="form-check-label">Anciano/a</label>
                                                        </div>
                                                    </div>
                                                    <div class="col col-12 position-relative">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btn-cancelar-filtrar-modal" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" id="btn-filtrar-modal" class="btn btn-primary btn-filtrar">Filtrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="publicaciones_adopcion" class="col-12 publicaciones">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card m-2">
                                <a href="Crear_publicacion.html">
                                    <img src="media/logoOld.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card m-2">
                                <a href="abrir_publicacion.html">
                                    <img src="media/logoOld.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card m-2">
                                <a href="abrir_publicacion.html">
                                    <img src="media/logoOld.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card m-2">
                                <a href="abrir_publicacion.html">
                                    <img src="media/logoOld.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card m-2">
                                <a href="abrir_publicacion.html">
                                    <img src="media/logoOld.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card m-2">
                                <a href="abrir_publicacion.html">
                                    <img src="media/logoOld.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="nav-paginas" class="m-2">
                        <nav aria-label="Page navigation example">
                            <ul id="navegacion-entre-paginas" class="pagination justify-content-center">
                                <li class="page-item disabled">
                                <a class="page-link">Anterior</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                                </li>
                            </ul>
                            </nav>
                    </div>
                </div>
            </div>
        </main>
        <footer id="footer">
            <div id="content-footer" class="position-relative">
                <label id="lbl-footer" class="position-absolute top-50 start-50 translate-middle">Todos los derechos Reservados © 2021</label>
            </div>
        </footer>
    </body>
</html>