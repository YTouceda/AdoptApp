<?php
$postulaciones = $this->postulaciones;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style-header-footer.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style-modal.css">
        <script type="text/javascript" src="<?php echo constant('URL'); ?>public/js/mis_publicaciones.js" defer></script>
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/ppropia.css">
        <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css">
        <title>AdoptApp - Mi Publicacion</title>
    </head>
  <body class="body-adoptapp">
    <header>
        <?php
            require 'View/header.php';
        ?>
    </header>
    <main>
      <div class="container text-center cuerpo">
        <div id="mi_publicacion">
          <div id="titulo">
            <h1 class="pt-3">Mi Publicacion</h1>
          </div>
          <div class="card mb-3" id="container-publicacion">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo constant('URL')."public/public_media/".$this->mascota->fotos_mascota;?>" class="img-fluid rounded-start my-4">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $this->mascota->nombre_mascota;?></h5>
                  <p class="card-text"><?php echo $this->mascota->descripcion_mascota;?></p>
                  <p class="card-text"><small class="text-muted"><?php echo $this->mascota->fecha_publicado;?></small></p>
                  <div id="tipo-mascota">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Nombre:</th>
                          <td><?php echo $this->mascota->nombre_mascota;?></td>
                          <td><i class="far fa-id-card" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                          <th scope="row">Tipo de mascota:</th>
                          <td><?php echo $this->mascota->tipo_mascota;?></td>
                          <?php if($this->mascota->tipo_mascota == "Perro"){
                            echo '<td><i class="fas fa-dog" aria-hidden="true"></i></td>';
                          }else{
                            echo '<td><i class="fas fa-cat" aria-hidden="true"></i></td>';
                          }?>
                        </tr>
                        <tr>
                            <th scope="row">Numero de contacto:</th>
                            <td><?php echo $this->mascota->num_contacto_mascota;?></td>
                            <td><i class="fas fa-phone" aria-hidden="true"></i></td>
                        </tr> 
                        <tr>
                            <th scope="row">Sexo:</th>
                            <td><?php echo $this->mascota->sexo_mascota;?></td>
                            <td><i class="fas fa-mars" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Tamaño:</th>
                            <td><?php echo $this->mascota->tamanio_mascota;?></td>
                            <td><i class="fab fa-medium-m" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Provincia:</th>
                            <td><?php echo $this->mascota->provincia_mascota;?></td>
                            <td><i class="fas fa-map-marker-alt" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">Localidad:</th>
                            <td><?php echo $this->mascota->localidad_mascota;?></td>
                            <td><i class="fas fa-city" aria-hidden="true"></i></td>
                        </tr> 
                        <tr>
                            <th scope="row">Estado:</th>
                            <td><?php echo $this->mascota->estado_mascota;?></td>
                            <td><i class="far fa-smile-beam" aria-hidden="true"></i></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button id="boton" class="btn btn-danger m-2 ">Eliminar Publicacion</button>
          <a href="<?php echo constant('URL'); ?>editar_publicacion?mascota=<?php echo $this->mascota->id_mascota;?>"><button id="boton" class="btn btn-secondary m-2">Editar Publicacion</button></a>
          <div id="pills-Postulantes">
            <?php
              require 'View/postulaciones/index.php';
            ?>
          </div>
        </div>
      </div>
    </main>
    <footer id="footer">
      <?php
        require 'View/footer.php';
      ?>
    </footer> 
  </body>
</html>