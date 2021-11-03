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
        <script type="text/javascript" src="script/abrirpub.js" defer></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>Public/css/style-header-footer.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
    </head>
    <body>
      <header>
            <?php
                require 'View/header.php';
            ?>
      </header>
      <main>
        <div class="container cuerpo">
            
            <div class="row">

            <div class="fotos-ap col-12 col-sm-6">   
            <?php 
                         

                          ?>
                <div class="text-center h-100 w-100">
                  <img src="<?php echo constant('URL')."Public/public_media/".$this->mascota->fotos_mascota;?>" class="card-imagen img-fluid rounded-start  h-100 w-75 p-5">
                </div>
                <div class="row">
                    <!-- <div class="img-chiq col col-3"><img src="Public/img/logoOld.png"class="img-fluid" > </div>
                    <div class="img-chiq col col-3"><img src="Public/img/logoOld.png"class="img-fluid" > </div>
                    <div class="img-chiq col col-3"><img src="Public/img/logoOld.png"class="img-fluid" > </div>
                    <div class="img-chiq col col-3"><img src="Public/img/logoOld.png"class="img-fluid" > </div> -->
                </div>
                </div>
                
                <div class="detalle-ap col-12 col-sm-6 p-5"> 
                    <table class="table">
                    
                        <tbody>
                          
                          <tr>
                            <th class="nombre" scope="row"><h1><?php echo $this->mascota->nombre_mascota;?></h1></th>
                            <td><i class="far fa-id-card nombre"></i></td>
                          </tr>
                          <tr>
                            <th scope="row"><?php echo $this->mascota->tipo_mascota;?></th>
                            <td><i class="fas fa-cat"></i></td>
                          </tr>
                          <tr>
                            <th scope="row"><?php echo $this->mascota->sexo_mascota;?></th>
                            <td><i class="fas fa-mars"></i></td>
                          </tr>
                          <tr>
                            <th scope="row"><?php echo $this->mascota->tamanio_mascota; ?></th>
                            <td><i class="fab fa-medium-m"></i></td>
                          </tr>
                          <tr>
                            <th scope="row"><?php echo $this->mascota->localidad_mascota; ?></th>
                            <td><i class="fas fa-map-marker-alt"></i></td>
                          </tr>
                          <tr>
                            <th scope="row"><?php echo $this->mascota->provincia_mascota; ?></th>
                            <td><i class="fas fa-map-marker-alt"></i></td>
                          </tr>
                          <th scope="row"><?php echo $this->mascota->num_contacto_mascota; ?></th>
                            <td><i class="fas fa-phone"></i></td>
                          </tr>
                            <th scope="row"><?php echo $this->mascota->fecha_publicado; ?></th>
                            <td><i class="fas fa-table"></i></td>
                            </tr>


                            

                        </tbody>
                      </table>

                <div class="descripcion-ap col col-12"><p  class="ap"><?php echo $this->mascota->descripcion_mascota; ?></p></div>
                <!-- Boton modal -->

                <div class="row">
                    <!-- <div class="col-12 col-sm-6">
                    <button type="button" class="btn btn-danger boton-ap" data-bs-toggle="modal" data-bs-target="#denuncia-Modal">
                        Denunciar publicación
                    </button>
                </div> -->
                    <div class="col-12 col-sm-6">
                    <button type="button" class="btn btn-success boton-ap">Postularse para adoptar</button>
                </div>
                </div> <!-- botones -->
                
                    
                    <!-- Modal denuncia -->
                    <div class="modal fade" id="denuncia-Modal" tabindex="-1" aria-labelledby="denuncia-ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="denuncia-ModalLabel">Denunciar publicación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form>
                              <div>
                                <select class="form-select select-cp" aria-label="Denuncia" id="select-denuncia"> 
                                    <option selected disabled>Estado de la mascota</option>
                                    <option value="spam">Spam</option>
                                    <option value="inapropiado">Inapropiado</option>
                                    <option value="seccion">Sección incorrecta</option>
                                    <option value="otro">Otro motivo...</option>
                                </select>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control denuncia" id="tx-denuncia" placeholder="Describa el motivo de su denuncia" id="floatingTextarea" required></textarea>

                                    <label class="denuncia" for="floatingTextarea">Motivo de la denuncia</label>
                                  </div>
                                  <div class="error invalid-feedback" id="errorDenuncia">Debe escribir al menos 10 caracteres.</div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <div class="row">
                                <div class="col"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button></div>
                                <div class="col"><button type="submit" class="btn btn-primary">Enviar denuncia</button></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
            </div> <!-- detalle -->

                
                
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





