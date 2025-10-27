<!-- Encabezado de la tabla con título y botón de agregar -->
<div class="d-flex align-items-center mb-3">
    <h2 class="me-2 mb-0 titulo">Categorías</h2>
    <button class="btn btn-agregar"
        data-bs-toggle="modal"
        data-bs-target="#agregarCategoriaModal">
        <i class="bi bi-plus-lg icon-center"></i>
    </button>
</div>

<!-- Contenedor de la tabla -->
<div class="container mt-4">
    <div class="table-responsive">
        <!-- Tabla con datos de categorías -->
        <table id="categoryTable" class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Los datos se cargarán dinámicamente via AJAX -->
            </tbody>
        </table>
    </div>
</div>

<!-- Incluir los modales -->
<?php 
//include 'categoryViewModal.php';
//include 'categoryEditModal.php';
//include 'categoryCreateModal.php';
?>