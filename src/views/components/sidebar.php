<?php
$currentFile = basename($_SERVER['PHP_SELF']);
$isInventory = ($currentFile == 'product.php' || $currentFile == 'category.php');
?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <!-- Icono de Dashboard si tienes uno, o un div para el color rojo -->
        <span class="brand-title ms-2">BRUZTEXTIL</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="?url=dashboard" class="nav-link text-white <?php if($currentFile == 'dashboard.php') echo 'active'; ?>" aria-current="page">
                <i class="bi bi-house me-2"></i> <!-- Icono para Dashboard -->
                Dashboard
            </a>
        </li>
        <li>
            <a href="?url=sale" class="nav-link text-white <?php if($currentFile == 'sale.php') echo 'active'; ?>">
                <i class="bi bi-bag-check me-2"></i> <!-- Icono para Ventas (bolsa de compra) -->
                Ventas
            </a>
        </li>
        <li>
            <a href="?url=client" class="nav-link text-white <?php if($currentFile == 'client.php') echo 'active'; ?>">
                <i class="bi bi-person-lines-fill me-2"></i> <!-- Icono para Clientes -->
                Clientes
            </a>
        </li>
        <li class="nav-item">
            <a href="#inventario-submenu"
               data-bs-toggle="collapse"
               aria-expanded="<?php echo $isInventory ? 'true' : 'false'; ?>"
               class="nav-link text-white <?php if($isInventory) echo 'active'; ?>">
                <i class="bi bi-boxes me-2"></i>
                Inventario
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse nav flex-column ms-3 <?php if($isInventory) echo 'show'; ?>" id="inventario-submenu">
                <li class="nav-item">
                    <a href="?url=product" class="nav-link text-white <?php if($currentFile == 'product.php') echo 'active'; ?>">
                        <i class="bi bi-box me-2"></i>
                        Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?url=category" class="nav-link text-white <?php if($currentFile == 'category.php') echo 'active'; ?>">
                        <i class="bi bi-tags me-2"></i>
                        Categoria
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="?url=custom" class="nav-link text-white <?php if($currentFile == 'custom.php') echo 'active'; ?>">
                <i class="bi bi-journal-richtext me-2"></i> <!-- Icono para Catálogo -->
                Personalizados
            </a>
        </li>
    </ul>
    <hr>
    <!-- Podríamos añadir un área de usuario aquí si fuera necesario -->
</div>
