<?php
if("user" == "rescatista"){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script type="text/javascript" src="../public/js/script.js" defer></script>
        <script src="../public/js/modalimg.js"></script>
        <script src="../public/js/functionsimg.js"></script>
        <script src="../public/js/scriptsimg.js"></script>
        <link rel="stylesheet" type="text/css" href="../public/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../public/css/style-perfil.css">
        <link rel="stylesheet" type="text/css" href="../public/css/style.css">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <title>AdoptApp - Perfil</title>
    </head>
    <body>
        <header>
            <?php
                require 'header.php';
            ?>
        </header>
        <main class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs  justify-content-center mt-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="perfil_usuario.php" class="text-decoration-none"><button class="nav-link active" id="home-tab" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Perfil</button></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="mis_publicaciones.php" class="text-decoration-none"><button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button></a>
                        </li>
                        <li class="nav-item" role="presentation">
                                <a href="rescatista.php" class="text-decoration-none"><button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button></a>
                        </li>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                    </div>
                </div>
            </div>
        </main>
        <?php 
            require 'footer.php';
            ?>
	</body>
</html>
<?php
}else{
?>
    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script type="text/javascript" src="../public/js/script.js" defer></script>
        <script src="../public/js/modalimg.js"></script>
        <script src="../public/js/functionsimg.js"></script>
        <script src="../public/js/scriptsimg.js"></script>
        <link rel="stylesheet" type="text/css" href="../public/css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../public/css/style-perfil.css">
        <link rel="stylesheet" type="text/css" href="../public/css/style.css">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anónimo"></script>
        <title>AdoptApp - Perfil</title>
    </head>
    <body>
        <header>
            <?php
                require 'header.php';
            ?>
        </header>
        <main class="container">
            <?php echo "No tienes los permisos para ver esta pagina.";?>
        </main>
        <?php 
            require 'footer.php';
            ?>
	</body>
</html>
<?php
}
?>    