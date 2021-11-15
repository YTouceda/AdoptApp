<div id="header_adoptapp" class="header-adoptapp row header-grupo">
    <div id="cont-logo" class="col-12 col-md-6 col-xxl-3">
        <div id="header-logo" class="text-center logo-grupo p-2 m-0">
            <a href="<?php echo constant('URL'); ?>"><img src="<?php echo constant('URL'); ?>Public/media/Logo.png" id="header_logo" class="h-50 w-75" alt=""></a>
        </div>
    </div>
    <div id="header-sec" class="col-12 col-sm-6 d-none d-xxl-block">
        <div class="text-center secciones-grupo my-4">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <div id="adopciones" class="seccion link-adopciones my-2 py-2">
                        <a href="<?php echo constant('URL').'publicaciones'; ?>?seccion=En adopción"><label for="adopciones" id="lbl-adopciones" class="lbl-seccion">Quiero Adoptar</label></a>
                    </div>
                </li>
                <li class="nav-item">
                    <div id="perdidos" class="seccion link-perdidos my-2 py-2">
                        <a href="<?php echo constant('URL').'publicaciones'; ?>?seccion=Perdido"><label for="perdidos" id="lbl-perdidos" class="lbl-seccion">Perdidos / Encontrados</label></a>
                    </div>
                </li>
                <li class="nav-item">
                    <div id="crear" class="seccion link-crear my-2 py-2">
                        <label for="crear" id="lbl-crear-publicacion" class="lbl-seccion" data-bs-toggle="modal" data-bs-target="#modal_crear_publicacion">Crear Publicacion</label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <?php
    if(!(isset($_SESSION['id']))){
    ?>
        <div id="seccion_iniciar_sesion" class="col-12 col-md-6 col-xxl-3">
            <div class="row h-100">
                <div id='menu-secciones-cont' class='text-center col-6 px-0 mx-0 ps-5 d-lg-block d-xxl-none my-auto'>
                    <div class='dropdown justify-content-md-center'>
                        <label id='dropdown-menu-secciones' class='lbl-seccion nav-icon-menu-secciones' data-bs-toggle='dropdown' aria-expanded='false'>
                            <i class='fas fa-bars'></i>
                        </label>
                        <ul class='dropdown-menu dropdown-menu-lg-end' aria-labelledby='dropdown-menu-secciones'>
                            <li>
                                <a href='<?php echo constant('URL').'publicaciones'; ?>?seccion=En adopción' class='text-decoration-none'><label for='adopciones' id='lbl-adopciones' class='lbl-seccion dropdown-item'>Adopciones</label></a>
                            </li>
                            <li><hr class='dropdown-divider'></li>
                            <li>
                                <a href='<?php echo constant('URL').'publicaciones'; ?>?seccion=Perdido' class='text-decoration-none'><label for='perdidos' class='lbl-seccion dropdown-item'>Perdidos</label></a>
                            </li>
                            <li><hr class='dropdown-divider'></li>
                            <li>
                                <label for='crear' class='text-decoration-none dropdown-item' data-bs-toggle='modal' data-bs-target='#modal_crear_publicacion'>Crear Publicacion</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="text-center col-6 px-0 mx-0 ms-xxl-5 my-2 my-md-auto">
                    <div id="btns_usuario" class="">
                        <button id="btn-iniciarSesion" type="button" class="btn btn-primary"><span><i class="fab fa-facebook"></i></span> INICIAR SESIÓN</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }else{
    ?>
        <div class="col-12 col-md-6 col-xxl-3">
            <div class='row  h-100'>
                <div id='menu-secciones-cont' class='text-center col col-xxl-2 px-0 mx-0 d-lg-block d-xxl-none my-auto'>
                    <div class='dropdown justify-content-md-center'>
                        <label id='dropdown-menu-secciones' class='lbl-seccion nav-icon-menu-secciones' data-bs-toggle='dropdown' aria-expanded='false'>
                            <i class='fas fa-bars'></i>
                        </label>
                        <ul class='dropdown-menu dropdown-menu-lg-end' aria-labelledby='dropdown-menu-secciones'>
                            <li>
                                <a href='<?php echo constant('URL').'publicaciones'; ?>?seccion=En adopción' class='text-decoration-none'><label for='adopciones' id='lbl-adopciones' class='lbl-seccion dropdown-item'>Adopciones</label></a>
                            </li>
                            <li><hr class='dropdown-divider'></li>
                            <li>
                                <a href='<?php echo constant('URL').'publicaciones'; ?>?seccion=Perdido' class='text-decoration-none'><label for='perdidos' class='lbl-seccion dropdown-item'>Perdidos</label></a>
                            </li>
                            <li><hr class='dropdown-divider'></li>
                            <li>
                                <label for='crear' class='text-decoration-none dropdown-item' data-bs-toggle='modal' data-bs-target='#modal_crear_publicacion'>Crear Publicacion</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php if(!isset($_GET['url']) || $_GET['url'] != "ver_notificaciones"){?>
                <div class='col col-xxl-2 text-center px-0 mx-0 my-2 my-md-auto'>
                    <div id="drop_notis" class='dropdown'>
                        <label id='dropdown-notificaciones' class='lbl-seccion nav-icon-notificaciones' data-bs-auto-close="false" data-bs-toggle='dropdown' aria-expanded='false'>
                            <div class=''>
                                <i class='fas fa-bell campana-notificaciones'>
                                    <span id="alerta_sin_leer" class='position-absolute alerta-notificacion-sin-leer translate-middle badge border border-light rounded-circle bg-danger p-1'>
                                    <span class='visually-hidden'>unread messages</span>
                                    </span>
                                </i>
                            </div>
                        </label>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby='dropdown-notificaciones'>
                            <div id='notificacion_list'>

                            </div>
                            <div class="text-center my-2">
                                <a href="ver_notificaciones"><h5>Ver todas las notificaciones</h5></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class='col col-xxl-2 text-center px-0 mx-0 my-2 my-md-auto'>
                    <a href='<?php echo constant('URL'); ?>perfil'><label id='icon-perfil' class='lbl-seccion nav-icon-perfil'><i class='fas fa-user'></i></label></a>
                </div>
                <div class='col col-xxl-2 text-center px-0 mx-0 my-2 my-md-auto'>
                    <a href="<?php echo constant('URL'); ?>logout" id='cerrar_sesion' class='lbl-seccion nav-icon-logout'><i class='fas fa-sign-in-alt'></i></a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div id="modal_crear_publicacion" class="modal fade modal-style" tabindex="-1" aria-labelledby="titulo_modal_crear_publicacion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo_modal_crear_publicacion">Crear Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php
                if(isset($_SESSION['id'])){
                ?>
                    <div id="moda-opciones-crear-publicacion">
                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item">
                                <div id="adopcion" class="seccion">
                                    <a href="<?php echo constant('URL'); ?>crear_publicacion?estado=0"><label for="adopcion" id="lbl-adopcion" class="lbl-seccion lbl-seccion-crear">Quiero dar en adopción una mascota</label></a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div id="perdidos" class="seccion">
                                    <a href="<?php echo constant('URL'); ?>crear_publicacion?estado=1"><label for="perdido" id="lbl-perdido" class="lbl-seccion lbl-seccion-crear">Perdí mi mascota</label></a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div id="crear" class="seccion">
                                    <a href="<?php echo constant('URL'); ?>crear_publicacion?estado=2"><label for="encontrado" id="lbl-encontrado" class="lbl-seccion lbl-seccion-crear">Encontré la mascota de alguien más</label></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php
                }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        Inicie Sesión para crear una nueva publicación!
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="btn_iniciar_container" class="m-0" action="login" method="POST">
    <input type="hidden" name="login_email" id="login_email">
    <input type="hidden" name="login_nombre" id="login_nombre">
    <input type="hidden" name="login_id" id="login_id">
    <input type="hidden" name="login_foto" id="login_foto">
    <input type="hidden" name="login_numero" id="login_numero">
</form>