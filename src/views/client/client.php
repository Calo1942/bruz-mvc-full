<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body>

    <!-- Barra lateral -->
    <div class="p-0 bg-dark sidebar">
        <?php require_once __DIR__ . '/../components/sidebar.php'; ?>
    </div>

    <!-- Contenedor principal -->
    <div class="flex-grow-1 d-flex flex-column">

        <!-- Contenido del navbar -->
        <?php require_once __DIR__ . '/../components/navbar.php'; ?>

        <!-- Contenido principal -->
        <main class="flex-grow-1 p-4 bg-light">
            <?php
            // para cargar la tabla de clientes
            require_once 'components/clientDataTable.php';
            ?>
        </main>

        <!-- Scripts Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- para javascript <script src="../../assets/js/script.js"> </script> -->

        <!-- Modales -->
        <?php require_once 'components/clientEditModal.php'; ?>
        <?php require_once 'components/clientCreateModal.php'; ?>
        <?php require_once 'components/clientViewModal.php'; ?>

</body>

</html>