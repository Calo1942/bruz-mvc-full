<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Catálogo de productos personalizados</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarCatalogoModal">
        <i class="bi bi-plus-lg me-2"></i> Agregar Producto
    </button>
</div>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Descripción</th>
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
                    <p class="text-muted mb-0">descripcon del producto Ejemplo 1 </p>
                </td>
                 <td class="text-end fw-bold">
                    $19.99
                </td>
                <td class="text-end">
                    <!-- Botones de acción de ejemplo -->
                    <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verCatalogoModal"><i class="bi bi-eye"></i></button>
                    <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarCatalogoModal"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>