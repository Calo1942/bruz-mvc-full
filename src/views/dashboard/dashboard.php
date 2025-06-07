<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body>

    <!-- Barra lateral -->
    <div class="p-0 bg-dark sidebar">
        <?php require_once 'components/sidebar.php'; ?>
    </div>

    <!-- Contenedor principal -->
    <div class="flex-grow-1 d-flex flex-column">

        <!-- Contenido del navbar -->
        <?php require_once 'components/navbar.php'; ?>

        <!-- Contenido principal -->
        <main class="flex-grow-1 p-4 bg-light">
            <?php
                // Obtener el valor del parámetro 'page' de la URL
                $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // 'dashboard' será la página por defecto

                // Incluir el archivo correspondiente basado en el parámetro 'page'
                switch ($page) {
                    case 'clients':
                        require_once 'client/clientDataTable.php';
                        break;
                    case 'sales':
                        require_once 'sale/saleDataTable.php'; // Cargar tabla de ventas
                        break;
                    case 'inventory':
                         // require_once 'inventory/inventoryDataTable.php'; // No creamos este archivo, el menú padre Inventario es para colapsar/expandir
                         // echo '<h2>Contenido de Inventario</h2>'; // Placeholder anterior
                         break; // No hacemos nada aquí, la carga es por submenú (Productos/Categoría)
                    case 'products':
                        require_once 'product/productDataTable.php'; // Cargar tabla de productos
                        break;
                    case 'category':
                        require_once 'category/categoryDataTable.php'; // Cargar tabla de categorías
                         break;
                    case 'catalog':
                        require_once 'catalog/catalogDataTable.php'; // Cargar tabla de catálogo
                        break;
                    case 'dashboard':
                    default:
                        // Contenido por defecto del dashboard (las tarjetas, gráficos, etc.)
                        echo '<h2>Contenido Principal del Dashboard</h2>';
                        // Aquí irán las inclusiones de las tarjetas, gráficos, etc.
                        break;
                }
            ?>
        </main>

        <!-- Scripts Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/script.js"></script>

        <!-- Modales -->
        <?php require_once 'client/clientEditModal.php'; ?>
        <?php require_once 'client/clientCreateModal.php'; ?>
        <?php require_once 'client/clientViewModal.php'; ?>
        <?php require_once 'category/categoryCreateModal.php'; ?>
        <?php require_once 'category/categoryEditModal.php'; ?>
        <?php require_once 'category/categoryViewModal.php'; ?>
        <?php require_once 'sale/saleCreateModal.php'; ?>
        <?php require_once 'sale/saleEditModal.php'; ?>
        <?php require_once 'sale/saleViewModal.php'; ?>
        <?php require_once 'product/productCreateModal.php'; ?>
        <?php require_once 'product/productEditModal.php'; ?>
        <?php require_once 'product/productViewModal.php'; ?>
        <?php require_once 'catalog/catalogCreateModal.php'; ?>
        <?php require_once 'catalog/catalogEditModal.php'; ?>
        <?php require_once 'catalog/catalogViewModal.php'; ?>

</body>

</html>