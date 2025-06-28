<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Tabla de Productos</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarProductoModal">
        <i class="bi bi-plus-lg me-2"></i> Agregar Producto
    </button>
</div>

<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    
                    <!-- Encabezados de la tabla -->
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio al Detal</th>
                    <th>Precio al Mayor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <!-- Recorremos el arreglo de productos si no está vacío -->
                    <?php foreach ($products as $product): ?>
                        <?php
                        // Buscar el nombre de la categoría correspondiente al producto
                        $nombreCategoria = '';
                        if (!empty($categories) && is_array($categories)) {
                            foreach ($categories as $cat) {
                                // Comparamos el IdCategoria para obtener el nombre de la categoría
                                if ($cat['IdCategoria'] == $product['IdCategoria']) {
                                    $nombreCategoria = $cat['Nombre'];
                                    break;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <!-- Datos de cada producto -->
                            <td><?php echo htmlspecialchars($product['IdProducto']); ?></td>
                            <td>
                                <!-- Imagen en miniatura -->
                                <img src="<?php echo htmlspecialchars($product['Imagen']); ?>"
                                    alt="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                    class="img-thumbnail" style="width: 50px; height: 50px;">
                            </td>
                            <td><?php echo htmlspecialchars($product['Nombre']); ?></td>
                            <td><?php echo htmlspecialchars($nombreCategoria); ?></td>
                            <td>$<?php echo htmlspecialchars($product['Detal']); ?></td>
                            <td>$<?php echo htmlspecialchars($product['Mayor']); ?></td>
                            <td>
                                <!-- Botón para ver detalles del producto (abre modal) -->
                                <button type="button" class="btn btn-sm btn-primary me-1 view-product-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#verProductoModal"
                                    data-id="<?php echo htmlspecialchars($product['IdProducto']); ?>"
                                    data-name="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                    data-descripcion="<?php echo htmlspecialchars($product['Descripcion']); ?>"
                                    data-detal="<?php echo htmlspecialchars($product['Detal']); ?>"
                                    data-mayor="<?php echo htmlspecialchars($product['Mayor']); ?>"
                                    data-categoria="<?php echo htmlspecialchars($nombreCategoria); ?>"
                                    data-imagen="<?php echo htmlspecialchars($product['Imagen']); ?>">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <!-- Botón para editar producto (abre modal) -->
                                <button type="button" class="btn btn-sm btn-secondary me-1 edit-product-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editarProductoModal"
                                    data-id="<?php echo htmlspecialchars($product['IdProducto']); ?>"
                                    data-name="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                    data-descripcion="<?php echo htmlspecialchars($product['Descripcion']); ?>"
                                    data-detal="<?php echo htmlspecialchars($product['Detal']); ?>"
                                    data-mayor="<?php echo htmlspecialchars($product['Mayor']); ?>"
                                    data-categoria="<?php echo htmlspecialchars($product['IdCategoria']); ?>"
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <!-- Formulario para eliminar producto -->
                                <form action="" method="POST" class="d-inline">
                                    <button type="submit" name="delete" value="<?php echo htmlspecialchars($product['IdProducto']); ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Mensaje cuando no hay productos -->
                    <tr>
                        <td colspan="7" class="text-center">No hay productos disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal de Ver
        var viewProductModal = document.getElementById('verProductoModal');
        viewProductModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var nombre = button.getAttribute('data-name');
            var descripcion = button.getAttribute('data-descripcion');
            var detal = button.getAttribute('data-detal');
            var mayor = button.getAttribute('data-mayor');
            var categoria = button.getAttribute('data-categoria');
            var imagen = button.getAttribute('data-imagen');

            document.getElementById('verNombreProducto').textContent = nombre;
            document.getElementById('verDescripcionProducto').textContent = descripcion;
            document.getElementById('verPrecioDetalProducto').textContent = '$' + detal;
            document.getElementById('verPrecioMayorProducto').textContent = '$' + mayor;
            document.getElementById('verCategoriaProducto').textContent = categoria;
            document.getElementById('verProductoImagen').src = imagen;
        });

        // Modal de Editar
        var editProductModal = document.getElementById('editarProductoModal');
        editProductModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-name');
            var descripcion = button.getAttribute('data-descripcion');
            var detal = button.getAttribute('data-detal');
            var mayor = button.getAttribute('data-mayor');
            var categoria = button.getAttribute('data-categoria');
           
            // Rellenamos los campos del formulario
            document.getElementById('editarProductoId').value = id;
            document.getElementById('editarNombreProducto').value = nombre;
            document.getElementById('editarDescripcionProducto').value = descripcion;
            document.getElementById('editarDetalProducto').value = detal;
            document.getElementById('editarMayorProducto').value = mayor;
            document.getElementById('editarCategoriaProducto').value = categoria;
        });
    });
</script>