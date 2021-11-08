<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/ppropia.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Postulantes</title>
</head>
<body id="body-postulantes">
    <main class="container">
        <?php
        if(!empty($this->postulaciones)){
        ?>
            <div id="titulo">
              <h1>Postulaciones</h1>
            </div>
            <form class="formulario_postulantes" action="<?php echo constant('URL')?>mi_publicacion/elegir_postulante" method="POST">
            <?php
            foreach($this->postulaciones as $row){
                $postulacion = $row;
            ?>
            <div class="form-check">
                <input class="form-check-input invisible" type="checkbox" name="postulante" id="<?php echo $postulacion['USUARIO_POSTULADO']->getId()?>" required value="<?php echo $postulacion['POSTULACION']?>">
                <label class="form-check-label lbl_check_postulante w-100  me-3 mb-3" for="<?php echo $postulacion['USUARIO_POSTULADO']->getId()?>">
                    <div class="card card_mis_publicaciones">
                        <div class="row g-0">
                            <div class="col-sm-6 col-md-2">
                                <img src="<?php echo $postulacion['USUARIO_POSTULADO']->getFoto()?>" class="img-fluid rounded-start card-imagen-mp h-100 w-100" alt="...">
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <div class="card-body px-5 my-3">
                                    <h5 class="card-title my-3"><?php echo $postulacion['USUARIO_POSTULADO']->getNombre()?></h5>
                                    <p class="card-text my-3"><b>Email:</b> <?php echo $postulacion['USUARIO_POSTULADO']->getEmail()?></p>
                                    <p class="card-text my-3"><b>Numero de contacto:</b> <?php echo $postulacion['USUARIO_POSTULADO']->getNumero()?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
        <?php
            }
        ?>
            <div class="text-center">
                <button id="btn_aceptar_postulante" type="submit" class="btn btn-primary m-2">Aceptar postulante</button>
            </div>
            </form>
        <?php
            
        }else{
        ?>
            <div class="text-center">
                <h2 class="py-5">Ups aun no tiene postulantes.</h2>
            </div>
        <?php
        }
        ?>
        </div>
    </main>
</body>