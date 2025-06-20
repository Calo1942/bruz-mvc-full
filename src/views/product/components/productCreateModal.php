<div class="modal fade" id="agregarProductoModal" tabindex="-1" aria-labelledby="agregarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Formulario para agregar un nuevo producto -->
            <form action="?url=product/create" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarProductoModalLabel">Agregar Producto</h5>
                    <!-- Botón para cerrar el modal -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Campo para nombre del producto -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control rounded-1" id="nombreProducto" name="Nombre" placeholder="Nombre" required>
                                <label for="nombreProducto">Nombre</label>
                            </div>
                        </div>

                        <!-- Selector para categoría del producto -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select rounded-1" id="categoriaProducto" name="IdCategoria" required>
                                    <option value="">Seleccione una categoría</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= htmlspecialchars($category['IdCategoria']) ?>">
                                            <?= htmlspecialchars($category['Nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="categoriaProducto">Categoría</label>
                            </div>
                        </div>

                        <!-- Selector para talla del producto -->
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select rounded-1" id="tallaProducto" name="Talla" required>
                                    <option value="">Seleccione una talla</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <label for="tallaProducto">Talla</label>
                            </div>
                        </div>

                        <!-- Campo para descripción del producto -->
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control rounded-1" id="descripcionProducto" name="Descripcion" style="height: 100px" required></textarea>
                                <label for="descripcionProducto">Descripción</label>
                            </div>
                        </div>

                        <!-- Campo para precio de venta al detalle -->
                        <div class="col-12">
                            <div class="input-group border-dark rounded-1 w-75 mx-auto">
                                <span class="input-group-text bg-transparent rounded-start">$</span>
                                <div class="form-floating flex-grow-1">
                                    <input type="number" class="form-control rounded-0" id="editarDetalProducto" name="Detal" step="0.01" min="0" placeholder="Precio Detal" required>
                                    <label for="editarDetalProducto">Precio Detal</label>
                                </div>
                            </div>
                        </div>

                        <!-- Campo para precio de venta al por mayor -->
                        <div class="col-12">
                            <div class="input-group border-dark rounded-1 w-75 mx-auto">
                                <span class="input-group-text bg-transparent rounded-start">$</span>
                                <div class="form-floating flex-grow-1">
                                    <input type="number" class="form-control rounded-0" id="editarMayorProducto" name="Mayor" step="0.01" min="0" placeholder="Precio Mayor" required>
                                    <label for="editarMayorProducto">Precio al por mayor</label>
                                </div>
                            </div>
                        </div>

                        <!-- Campo para stock disponible -->
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="number" class="form-control rounded-1" id="stockProducto" name="Stock" placeholder="Stock disponible" min="0" required>
                                <label for="stockProducto">Stock disponible</label>
                            </div>
                        </div>

                        <!-- Campo para subir imagen del producto -->
                        <div class="col-12">
                            <label for="imagenProducto" class="form-label">Imagen del producto</label>
                            <input type="file" class="form-control rounded-1" id="imagenProducto" name="Imagen" accept="image/*" required>
                            <small class="text-muted">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- Botón para cancelar y cerrar modal -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Botón para enviar formulario y guardar producto -->
                    <button type="submit" name="store" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
