<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Tabla de Categorías</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarCategoriaModal">
        <i class="bi bi-plus-lg me-2"></i> Agregar Categoría
    </button>
</div>

<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Electrónicos</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verCategoriaModal"><i class="bi bi-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarCategoriaModal"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Ropa</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verCategoriaModal"><i class="bi bi-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarCategoriaModal"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Hogar</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verCategoriaModal"><i class="bi bi-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarCategoriaModal"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>