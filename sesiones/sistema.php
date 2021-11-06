<?php

// Start the session
session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Sistema de Ejemplo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Bienvenido <?php echo $_SESSION['email'] ?></h2>
        <form action="logout.php" method="POST">
            <button type="submit" class="btn btn-primary">Cerrar sesión</button>
        </form>
    </div>

</body>

</html>