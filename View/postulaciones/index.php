<!DOCTYPE html>
<html>

<body id="body-postulantes">
    <main class="container">
        <?php
        if(!empty($this->postulaciones)){
        ?>
            <?php
            $aceptado = false;
            $hay_postulaciones_activas = false;
            foreach($this->postulaciones as $row){
                if($row['ESTADO_POSTULACION'] == 4){
                    $aceptado = true;
                }
                if($row['ESTADO_POSTULACION'] == 1){
                    $hay_postulaciones_activas = true;
                }
            }
            if($aceptado == false){
                if($hay_postulaciones_activas = true){
                    $id_div=0;
                ?>
            
                    <div id="titulo">
                        <h1>Postulaciones</h1>
                    </div>
                    <form id="form_postulados" class="formulario_postulantes" method="POST"> 
                <?php 
                    foreach($this->postulaciones as $row){
                        if($row['ESTADO_POSTULACION'] != 2){
                            $postulacion = $row;
                            //die(var_dump($postulacion));
                ?>
                            <div class="card card_postulacion mb-3">
                                <div class="row g-0">
                                    <div class="col-md-2 text-center">
                                        <img src="<?php echo $postulacion['USUARIO_POSTULADO']->getFoto()?>" class="img-fluid rounded-start card-imagen-post" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title my-3"><?php echo $postulacion['USUARIO_POSTULADO']->getNombre()?></h5>
                                            <p class="card-text my-3"><b>Email:</b> <?php echo $postulacion['USUARIO_POSTULADO']->getEmail()?></p>
                                            <p class="card-text my-3"><b>Numero de contacto:</b> <?php echo $postulacion['USUARIO_POSTULADO']->getNumero()?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div id="div_botones_<?php echo $id_div;?>" class="card-body mx-0 px-auto px-xl-5 my-3 row">
                                            <button class="btn_eliminar btn btn-danger w-100 my-2 col-6 col-md-12">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <button class="btn_aceptar btn btn-success w-100 my-2 col-6 col-md-12">
                                                <i class="fas fa-check"></i>
                                            </button>
                                            <input type="hidden" name="id_postulacion" value="<?php echo $postulacion['POSTULACION'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
            <?php
                            $id_div++;
                            
                        }
                        
                    }
            ?>
                    </form>
            <?php
                }else{
            ?>
                        <div class="text-center mb-0">
                            <h2 class="py-5">Ups aun no tiene postulantes.</h2>
                        </div>
                    <?php
                }
            }else{?>
                <div id="titulo">
                    <h1>Dueño</h1>
                </div>
            <?php
                foreach($this->postulaciones as $row){
                    if($row['ESTADO_POSTULACION'] == 4){
                        $postulacion = $row;?>
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
        <?php
                    }
                }
            }   
        }else{
        ?>
            <div class="text-center mb-0">
                <h2 class="py-5">Ups aun no tiene postulantes.</h2>
            </div>
        <?php
        }
        ?>
        </div>
    </main>
</body>