<!DOCTYPE html>
<html>
    <head>
        <title>AdoptApp - Abrir Publicación</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant ('URL'); ?>Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant ('URL'); ?>Public/css/style-abrirPublicacion.css">
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/abrirpub.js" defer></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-header-footer.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.css">
        <script type="text/javascript" src="<?php echo constant('URL'); ?>Public/js/notificaciones.js" defer></script>
    </head>
    <body  class="body-adoptapp">
        <header>
            <?php
                require 'View/header.php';
            ?>
        </header>
        <main>
            <div class="container cuerpo">
                <div class="row">
                    <div class="fotos-ap col-12 col-xl-6">
                        <div class="text-center  py-5">
                            <img src="<?php echo constant('URL')."Public/public_media/".$this->mascota->getFotos_mascota();?>" class="card-imagen-publicacion img-fluid rounded-start">
                        </div>
                    </div>                       
                    <div class="detalle-ap col-12 col-xl-6 p-5 mx-auto"> 
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="nombre" scope="row"><h1><?php echo $this->mascota->getNombre_mascota();?></h1>
                                    <?php echo $this->publicacion->getEstado();?></th>
                                    <td><i class="far fa-id-card nombre mt-4"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $this->mascota->getEspecie_mascota();?></th>
                                    <td><i class="fas fa-cat"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $this->mascota->getSexo_mascota();?></th>
                                    <td><i class="fas fa-mars"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $this->mascota->getTamanio_mascota(); ?></th>
                                    <td><i class="fab fa-medium-m"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $this->publicacion->getLocalidad(); ?></th>
                                    <td><i class="fas fa-map-marker-alt"></i></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $this->publicacion->getProvincia(); ?></th>
                                    <td><i class="fas fa-map-marker-alt"></i></td>
                                </tr>
                                <th scope="row"><?php echo $this->publicacion->getNum_contacto_publicacion(); ?></th>
                                <td><i class="fas fa-phone"></i></td>
                                <tr>
                                    <th scope="row"><?php echo $this->publicacion->getFecha_alta_publicacion(); ?></th>
                                    <td><i class="fas fa-table"></i></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="descripcion-ap col col-12"><p  class="ap"><?php echo $this->mascota->getDescripcion_mascota(); ?></p></div>
                        <!-- Boton modal -->
                        <div class="row">
                            <?php
                            if(!($this->publicacion->getEstado() == 'Adoptado' || $this->publicacion->getEstado() == 'Devuelto')){
                                if($_SESSION['id']!=$this->publicacion->getId_usuario()){ 
                                    if($this->estado_denuncia){
                                        ?>
                                        <div class="col-12 col-sm-6">
                                            <button type="button" class="btn btn-danger boton-ap" data-bs-toggle="modal" data-bs-target="#denuncia-Modal">
                                                Denunciar publicación
                                            </button>
                                            <!-- Modal denuncia -->
                                            <div class="modal fade" id="denuncia-Modal" tabindex="-1" aria-labelledby="denuncia-ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="denuncia-ModalLabel">Denunciar publicación</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo constant('URL'); ?>abrir_publicacion/denunciar" method="post" id="formdenuncia">
                                                                <div>
                                                                    <select class="form-select select-cp" aria-label="Denuncia" id="select-denuncia" name="ID_TIPO_DENUNCIA"> 
                                                                        <option value ="" selected disabled>Tipo de denuncia</option>
                                                                        <option value="0">Spam</option>
                                                                        <option value="1">Inapropiado</option>
                                                                        <option value="2">Sección incorrecta</option>
                                                                        <option value="3">Otro motivo...</option>
                                                                    </select>
                                                                    <input type="hidden" name="ID_PUBLICACION" value="<?php echo $_GET['publicacion']?>">
                                                                    <div class="error invalid-feedback" id="errorSelectDenuncia">
                                                                        Debe elegir una opcion valida.
                                                                    </div>
                                                                    <div class="form-floating">
                                                                        <textarea class="form-control denuncia" id="tx-denuncia" id="floatingTextarea" name="DESCRIPCION"></textarea>
                                                                        <label class="denuncia" for="floatingTextarea">Motivo de la denuncia</label>
                                                                        <div class="error invalid-feedback" id="errorDenuncia">
                                                                            Debe escribir al menos 10 caracteres.
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                            </div>
                                                                            <div class="col">
                                                                                <button type="button" id="enviar" class="btn btn-primary">Enviar denuncia</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                    }
                                } 
                                ?>
                                <?php
                                if ($_SESSION['id']!=$this->publicacion->getId_usuario()){
                                    if($this->estado_post){
                                        ?>
                                        <div class="col-12 col-sm-6">
                                            <a href='<?php echo constant('URL'); ?>abrir_publicacion/postularse?publicacion=<?php echo  $this->publicacion->getId_publicacion();?>'><button name="postularse" type="button" class="btn btn-success boton-ap"><?php echo $this->estado_boton; ?></button></a>
                                        </div>
                                        <?php
                                    
                                    }else{
                                        ?>
                                        <div class="col-12 col-sm-6">
                                            <a href='<?php echo constant('URL'); ?>abrir_publicacion/cancelarPostulacion'><button name="postularse" type="button" class="btn btn-warning boton-ap">Cancelar postulacion</button></a>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                                ?>
                            <?php 
                            if($_SESSION['id']==$this->publicacion->getId_usuario()){ 
                                ?>
                                <div class="col-12 col-sm-6">
                                    <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#eliminarModal">Eliminar publicación</button>
                                    <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminar" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="eliminar">Eliminar publicación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro que deseas eliminar la publicación?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button id="fakeEliminar" class="btn btn-danger m-2">Eliminar Publicacion</button>
                                                    <a href="<?php echo constant('URL'); ?>abrir_publicacion/eliminar?publicacion=<?php echo $this->publicacion->getId_publicacion();?>"><button id="botonEliminar" class="btn btn-danger m-2">Eliminar Publicacion</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            }
                            if ($_SESSION['id']==$this->publicacion->getId_usuario()){
                                ?>
                                <div class="col-12 col-sm-6">
                                    <a href='<?php echo constant('URL'); ?>editar_publicacion?publicacion=<?php echo  $this->publicacion->getId_publicacion();?>'><button id='boton' class='btn btn-secondary'>Editar Publicacion</button></a>
                                </div>
                                <?php
                            }
                            ?>
                        </div><!--   ROW  -->
                    </div> <!-- botones -->
                </div> <!-- detalle -->
                <?php 
                if ($_SESSION['id']==$this->publicacion->getId_usuario()){
                    require 'View/postulaciones/index.php';   
                }?>
            </div>
        </main>
        <footer>
            <?php
                require 'View/footer.php';
            ?>
        </footer>
    </body>
</html>