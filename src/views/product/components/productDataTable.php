<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Tabla de Productos</h2>
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregarProductoModal">
        <i class="bi bi-plus-lg me-2"></i> Agregar Producto
    </button>
</div>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Detalles del producto</th>
                <th scope="col" class="text-end">Precio</th>
                <th scope="col" class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td><img src="<?= htmlspecialchars($producto['Imagen']) ?>" alt="Imagen del producto" class="img-fluid rounded border" width="50"></td>
                <td>
                    <h6 class="mb-1"><?= htmlspecialchars($producto['Nombre']) ?></h6>
                    <p class="text-muted mb-0">Categoría: <?= htmlspecialchars($producto['IdCategoria']) ?></p>
                    <p class="text-muted mb-0">Talla: <?= htmlspecialchars($producto['Talla']) ?></p>
                    <p class="text-muted mb-0">Stock: <?= htmlspecialchars($producto['Stock']) ?></p>
                </td>
                <td class="text-end fw-bold">
                    <?= htmlspecialchars($producto['Detal']) ?>
                </td>
                <td>
                    <button class="btn btn-sm btn-info view-btn" data-bs-toggle="modal" data-bs-target="#viewModal" data-id="<?= $producto['IdProducto'] ?>"><i class="bi bi-eye"></i></button>
                    <button class="btn btn-sm btn-warning edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $producto['IdProducto'] ?>"><i class="bi bi-pencil"></i></button>
                    <form method="POST" action="ProductController.php" style="display:inline;">
                        <input type="hidden" name="delete" value="<?= $producto['IdProducto'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar este producto?');"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>