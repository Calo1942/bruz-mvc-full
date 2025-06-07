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
            <!-- Aquí se cargarán las filas de productos dinámicamente si es necesario -->
            <!-- Por ahora, podemos poner algunas filas de ejemplo estáticas si lo deseas, o dejarlo vacío -->
            <tr>
                <td>
                    <!-- Imagen de ejemplo -->
                    <img src="https://via.placeholder.com/50" alt="Imagen de Producto" class="img-fluid rounded border">
                </td>
                <td>
                    <h6 class="mb-1">Nombre del Producto Ejemplo</h6>
                    <p class="text-muted mb-0">Categoría: Ejemplo</p>
                    <p class="text-muted mb-0">Talla: L</p>
                    <p class="text-muted mb-0">Stock: 10</p>
                </td>
                <td class="text-end fw-bold">
                    $19.99
                </td>
                <td class="text-end">
                    <!-- Botones de acción de ejemplo -->
                    <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verProductoModal"><i class="bi bi-eye"></i></button>
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarProductoModal"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="https://via.placeholder.com/50" alt="Imagen de Producto" class="img-fluid rounded border">
                </td>
                <td>
                    <h6 class="mb-1">Otro Producto Ejemplo</h6>
                    <p class="text-muted mb-0">Categoría: Otro Ejemplo</p>
                    <p class="text-muted mb-0">Talla: M</p>
                    <p class="text-muted mb-0">Stock: 5</p>
                </td>
                <td class="text-end fw-bold">
                    $25.50
                </td>
                <td class="text-end">
                    <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verProductoModal"><i class="bi bi-eye"></i></button>
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarProductoModal"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>