<div class="modal fade" id="editarCategoriaModal" tabindex="-1" aria-labelledby="editarCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarCategoriaModalLabel">Editar Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarCategoria" action="" method="POST"> <input type="hidden" id="editarCategoriaId" name="IdCategoria"> <div class="mb-3">
                        <label for="editarNombreCategoria" class="form-label">Nombre de la Categoría</label>
                        <input type="text" class="form-control" id="editarNombreCategoria" name="Nombre" required> </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="update" class="btn btn-primary">Guardar Cambios</button> </div>
                </form>
            </div>
        </div>
    </div>
</div>