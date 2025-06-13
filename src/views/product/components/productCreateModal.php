<!-- Modal para Agregar Producto -->
<div class="modal fade" id="agregarProductoModal" tabindex="-1" aria-labelledby="agregarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="?url=product/create" method="POST" enctype="multipart/form-data">
                <!-- Encabezado del modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarProductoModalLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Nombre -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-1" id="nombreProducto" name="nombre" placeholder="Nombre" required>
                                <label for="nombreProducto">Nombre</label>
                            </div>
                        </div>

                        <!-- Categoría -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select rounded-1" id="categoriaProducto" name="categoria" required>
                                    <option value="">Seleccione una categoría</option>
                                    <option value="Camiseta">Camiseta</option>
                                    <option value="Pantalón">Pantalón</option>
                                </select>
                                <label for="categoriaProducto">Categoría</label>
                            </div>
                        </div>

                        <!-- Talla -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select rounded-1" id="tallaProducto" name="talla" required>
                                    <option value="">Seleccione una talla</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                </select>
                                <label for="tallaProducto">Talla</label>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control rounded-1" id="descripcionProducto" name="descripcion" style="height: 100px" required></textarea>
                                <label for="descripcionProducto">Descripción</label>
                            </div>
                        </div>

                        <!-- Precio -->
                        <div class="col-12">
                            <div class="input-group border-dark rounded-1">
                                <span class="input-group-text bg-transparent rounded-start">$</span>
                                <div class="form-floating flex-grow-1">
                                    <input type="number" class="form-control rounded-0" id="precioProducto" name="precio" step="0.01" min="0" placeholder="Precio" required>
                                    <label for="precioProducto">Precio</label>
                                </div>
                            </div>
                        </div>

                        <!-- Stock -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="number" class="form-control rounded-1" id="stockProducto" name="cantidad" placeholder="Stock disponible" min="0" required>
                                <label for="stockProducto">Stock disponible</label>
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="col-12">
                            <label for="imagenProducto" class="form-label">Imagen del producto</label>
                            <input type="file" class="form-control rounded-1" id="imagenProducto" name="imgProduct1" accept="image/*" required>
                            <small class="text-muted">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</small>
                        </div>
                    </div>
                </div>

                <!-- Pie del modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div> 