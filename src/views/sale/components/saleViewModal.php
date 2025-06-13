<!-- Modal para Ver Venta -->
<div class="modal fade" id="verVentaModal" tabindex="-1" aria-labelledby="verVentaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verVentaModalLabel">Detalles de la Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí se mostrarán los detalles de la venta -->
                <p><strong>ID de Venta:</strong> <span id="verVentaId"></span></p>
                <p><strong>Cliente:</strong> <span id="verClienteVenta"></span></p>
                <p><strong>Producto:</strong> <span id="verProductoVenta"></span></p>
                <p><strong>Cantidad:</strong> <span id="verCantidadVenta"></span></p>
                <p><strong>Total:</strong> <span id="verTotalVenta"></span></p>
                <!-- Más detalles si es necesario -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div> 