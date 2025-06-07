<!-- Modal para Editar Producto -->
<div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarProducto">
                    <input type="hidden" id="editarProductoId"> <!-- Campo oculto para el ID del producto -->
                    <div class="mb-3">
                        <label for="editarNombreProducto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="editarNombreProducto" value="Nombre Actual" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarDescripcionProducto" class="form-label">Descripción</label>
                        <textarea class="form-control" id="editarDescripcionProducto" rows="3">Descripción actual del producto.</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editarPrecioProducto" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="editarPrecioProducto" step="0.01" value="0.00" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarStockProducto" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="editarStockProducto" value="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarCategoriaProducto" class="form-label">Categoría</label>
                        <select class="form-select" id="editarCategoriaProducto" required>
                            <option selected disabled value="">Seleccionar Categoría</option>
                            <option>Electrónicos</option>
                            <option>Ropa</option>
                            <option>Hogar</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div> 