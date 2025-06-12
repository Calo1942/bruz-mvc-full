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
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($category['IdCategoria']); ?></td>
                            <td><?php echo htmlspecialchars($category['Nombre']); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary me-1 view-category-btn"
                                        data-bs-toggle="modal" data-bs-target="#verCategoriaModal"
                                        data-id="<?php echo htmlspecialchars($category['IdCategoria']); ?>"
                                        data-name="<?php echo htmlspecialchars($category['Nombre']); ?>">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary me-1 edit-category-btn"
                                        data-bs-toggle="modal" data-bs-target="#editarCategoriaModal"
                                        data-id="<?php echo htmlspecialchars($category['IdCategoria']); ?>"
                                        data-name="<?php echo htmlspecialchars($category['Nombre']); ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <form action="" method="POST" class="d-inline">
                                    <button type="submit" name="delete" value="<?php echo htmlspecialchars($category['IdCategoria']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoría?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">No hay categorías disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle View Modal
        var viewCategoryModal = document.getElementById('verCategoriaModal');
        viewCategoryModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');

            var modalIdSpan = viewCategoryModal.querySelector('#verCategoriaId');
            var modalNameSpan = viewCategoryModal.querySelector('#verNombreCategoria');

            modalIdSpan.textContent = id;
            modalNameSpan.textContent = name;
        });

        // Handle Edit Modal
        var editCategoryModal = document.getElementById('editarCategoriaModal');
        editCategoryModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var name = button.getAttribute('data-name');

            var modalIdInput = editCategoryModal.querySelector('#editarCategoriaId');
            var modalNameInput = editCategoryModal.querySelector('#editarNombreCategoria');

            modalIdInput.value = id;
            modalNameInput.value = name;
        });
    });
</script>