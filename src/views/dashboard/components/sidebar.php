<?php
    // Obtener el valor del parámetro 'page' de la URL
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // 'dashboard' será la página por defecto
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <!-- Icono de Dashboard si tienes uno, o un div para el color rojo -->
        <span class="brand-title ms-2">BRUZTEXTIL</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="?page=dashboard" class="nav-link text-white <?php echo ($currentPage == 'dashboard') ? 'active' : ''; ?>" aria-current="page">
                <i class="bi bi-house me-2"></i> <!-- Icono para Dashboard -->
                Dashboard
            </a>
        </li>
        <li>
            <a href="?page=sales" class="nav-link text-white <?php echo ($currentPage == 'sales') ? 'active' : ''; ?>">
                <i class="bi bi-bag-check me-2"></i> <!-- Icono para Ventas (bolsa de compra) -->
                Ventas
            </a>
        </li>
        <li>
            <a href="?page=clients" class="nav-link text-white <?php echo ($currentPage == 'clients') ? 'active' : ''; ?>">
                <i class="bi bi-person-lines-fill me-2"></i> <!-- Icono para Clientes -->
                Clientes
            </a>
        </li>
        <li class="nav-item">
            <a href="#inventario-submenu" data-bs-toggle="collapse" aria-expanded="false" class="nav-link text-white <?php echo ($currentPage == 'inventory' || $currentPage == 'products' || $currentPage == 'category') ? 'active' : ''; ?>">
                <i class="bi bi-boxes me-2"></i> <!-- Icono para Inventario -->
                Inventario
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse nav flex-column ms-3 <?php echo ($currentPage == 'products' || $currentPage == 'category') ? 'show' : ''; ?>" id="inventario-submenu">
                <li class="nav-item">
                    <a href="?page=products" class="nav-link text-white <?php echo ($currentPage == 'products') ? 'active' : ''; ?>">
                        <i class="bi bi-box me-2"></i> <!-- Icono para Productos -->
                        Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=category" class="nav-link text-white <?php echo ($currentPage == 'category') ? 'active' : ''; ?>">
                        <i class="bi bi-tags me-2"></i> <!-- Icono para Categoría -->
                        Categoria
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="?page=catalog" class="nav-link text-white <?php echo ($currentPage == 'catalog') ? 'active' : ''; ?>">
                <i class="bi bi-journal-richtext me-2"></i> <!-- Icono para Catálogo -->
                Catalogo
            </a>
        </li>
    </ul>
    <hr>
    <!-- Podríamos añadir un área de usuario aquí si fuera necesario -->
</div>
