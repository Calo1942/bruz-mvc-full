<div class="modal fade" id="verProductoModal" tabindex="-1" aria-labelledby="verProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-3 shadow">
            <!-- Header del modal con título y botón para cerrar -->
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold" id="verProductoModalLabel">Detalles del Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Cuerpo del modal que muestra la información del producto -->
            <div class="modal-body">
                <div class="row g-4">
                    <!-- Columna con la imagen del producto -->
                    <div class="col-12 col-md-6">
                        <img id="verProductoImagen" src="" alt="" class="img-fluid w-100 rounded border">
                    </div>

                    <!-- Columna con los detalles del producto -->
                    <div class="col-12 col-md-6">
                        <!-- Sticky para que la info quede fija al hacer scroll dentro del modal -->
                        <div class="sticky-top top-5">
                            <!-- Nombre del producto -->
                            <h2 class="fs-3 fw-bold" id="verNombreProducto"></h2>

                            <!-- Sección con detalles adicionales -->
                            <div class="mt-3 border-top pt-3">
                                <p class="mb-1 text-muted fw-bold">Categoría:</p>
                                <p class="mb-3" id="verCategoriaProducto"></p>

                                <p class="mb-1 text-muted fw-bold">Talla:</p>
                                <p class="mb-3" id="verTallaProducto"></p>

                                <p class="mb-1 text-muted fw-bold">Descripción:</p>
                                <p class="mb-3" id="verDescripcionProducto"></p>

                                <p class="mb-1 text-muted fw-bold">Stock disponible:</p>
                                <p class="mb-3" id="verStockProducto"></p>

                                <p class="mb-1 text-muted fw-bold">Precio Detal:</p>
                                <h4 class="fw-bold text-dark" id="verPrecioDetalProducto"></h4>

                                <p class="mb-1 text-muted fw-bold">Precio Mayor:</p>
                                <h4 class="fw-bold text-dark" id="verPrecioMayorProducto"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer del modal con botón para cerrar -->
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
