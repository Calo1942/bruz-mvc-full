<!-- Modal para Ver Producto -->
<div class="modal fade" id="verProductoModal" tabindex="-1" aria-labelledby="verProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verProductoModalLabel">Detalles del Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí se mostrarán los detalles del producto -->
                <p><strong>ID de Producto:</strong> <span id="verProductoId"></span></p>
                <p><strong>Nombre:</strong> <span id="verNombreProducto"></span></p>
                <p><strong>Descripción:</strong> <span id="verDescripcionProducto"></span></p>
                <p><strong>Precio:</strong> <span id="verPrecioProducto"></span></p>
                <p><strong>Stock:</strong> <span id="verStockProducto"></span></p>
                <p><strong>Categoría:</strong> <span id="verCategoriaProducto"></span></p>
                <!-- Más detalles si es necesario -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div> 