<h2 class="mb-4">Tabla de Ventas</h2>

<button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregarVentaModal">
    <i class="bi bi-plus-lg me-2"></i> Agregar Venta
</button>

<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID Venta</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Juan Pérez</td>
                    <td>Laptop Gamer</td>
                    <td>1</td>
                    <td>$1200.00</td>
                    <td>2023-01-15</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verVentaModal"><i class="bi bi-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarVentaModal"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>María López</td>
                    <td>Teclado Mecánico</td>
                    <td>2</td>
                    <td>$150.00</td>
                    <td>2023-01-16</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verVentaModal"><i class="bi bi-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarVentaModal"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Pedro Gómez</td>
                    <td>Mouse Ergonómico</td>
                    <td>1</td>
                    <td>$50.00</td>
                    <td>2023-01-17</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#verVentaModal"><i class="bi bi-eye"></i></button>
                        <button type="button" class="btn btn-sm btn-secondary me-1" data-bs-toggle="modal" data-bs-target="#editarVentaModal"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div> 