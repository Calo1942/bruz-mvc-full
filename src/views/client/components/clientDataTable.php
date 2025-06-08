<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Tabla de Clientes</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarClienteModal">
        <i class="bi bi-plus-lg me-2"></i> Agregar Cliente
    </button>
</div>
<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123456789</td>
                    <td>Juan</td>
                    <td>Pérez</td>
                    <td>juan@example.com</td>
                    <td>555-1234</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verClienteModal"><i class="bi bi-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarClienteModal"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>987654321</td>
                    <td>María</td>
                    <td>Gómez</td>
                    <td>maria@example.com</td>
                    <td>555-5678</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verClienteModal"><i class="bi bi-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarClienteModal"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>