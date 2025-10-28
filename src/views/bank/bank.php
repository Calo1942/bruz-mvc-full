<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banco</title>
    <!-- Bootstrap CSS -->
    <?php
    // Incluye el archivo que contiene la variable con los links
    include 'src/views/commons/linksFront.php';
    // Imprime la variable dentro de la etiqueta <head>
    echo $css_links;
    ?>
</head>

<body>

    <!-- Barra lateral -->
    <div class="p-0 bg-dark sidebar">
        <?php require_once __DIR__ . '/../commons/sidebar.php'; ?>
    </div>

    <!-- Contenedor principal -->
    <div class="flex-grow-1 d-flex flex-column">

        <!-- Contenido del navbar -->
        <?php require_once __DIR__ . '/../commons/navbar.php'; ?>

        <!-- Contenido principal -->
        <main class="flex-grow-1 p-4 bg-light">
            <?php
            // para cargar la tabla de categorías
            require_once 'components/bankDataTable.php';
            ?>
        </main>

        <?php include 'src/views/commons/linksFront.php';
        echo $scripts_links;
        ?>

        <script src="src\assets\js\bank\bankConfigDatable.js"></script>
        
        <script src="src\assets\js\commons\templateDatables.js"></script>
        
        <!-- Modales -->
        <?php require_once 'components/bankCreateModal.php'; ?>
        <?php require_once 'components/bankEditModal.php'; ?>
        <?php require_once 'components/bankViewModal.php'; ?>

</body>

</html>