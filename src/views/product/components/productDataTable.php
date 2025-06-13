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
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Talla</th>
                    <th>Detal</th>
                    <th>Mayor</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <?php
                        // Buscar el nombre de la categoría correspondiente al producto
                        $nombreCategoria = '';
                        if (!empty($categories) && is_array($categories)) {
                            foreach ($categories as $cat) {
                                if ($cat['IdCategoria'] == $product['IdCategoria']) {
                                    $nombreCategoria = $cat['Nombre'];
                                    break;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['IdProducto']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($product['Imagen']); ?>"
                                    alt="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                    class="img-thumbnail" style="width: 50px; height: 50px;">
                            </td>
                            <td><?php echo htmlspecialchars($product['Nombre']); ?></td>
                            <td><?php echo htmlspecialchars($nombreCategoria); ?></td>
                            <td><?php echo htmlspecialchars($product['Talla']); ?></td>
                            <td>$<?php echo htmlspecialchars($product['Detal']); ?></td>
                            <td>$<?php echo htmlspecialchars($product['Mayor']); ?></td>
                            <td><?php echo htmlspecialchars($product['Stock']); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary me-1 view-product-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#verProductoModal"
                                    data-id="<?php echo htmlspecialchars($product['IdProducto']); ?>"
                                    data-name="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                    data-descripcion="<?php echo htmlspecialchars($product['Descripcion']); ?>"
                                    data-detal="<?php echo htmlspecialchars($product['Detal']); ?>"
                                    data-mayor="<?php echo htmlspecialchars($product['Mayor']); ?>"
                                    data-stock="<?php echo htmlspecialchars($product['Stock']); ?>"
                                    data-categoria="<?php echo htmlspecialchars($nombreCategoria); ?>"
                                    data-talla="<?php echo htmlspecialchars($product['Talla']); ?>"
                                    data-imagen="<?php echo htmlspecialchars($product['Imagen']); ?>">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary me-1 edit-product-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editarProductoModal"
                                    data-id="<?php echo htmlspecialchars($product['IdProducto']); ?>"
                                    data-name="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                    data-descripcion="<?php echo htmlspecialchars($product['Descripcion']); ?>"
                                    data-detal="<?php echo htmlspecialchars($product['Detal']); ?>"
                                    data-mayor="<?php echo htmlspecialchars($product['Mayor']); ?>"
                                    data-stock="<?php echo htmlspecialchars($product['Stock']); ?>"
                                    data-categoria="<?php echo htmlspecialchars($product['IdCategoria']); ?>"
                                    data-talla="<?php echo htmlspecialchars($product['Talla']); ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

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
                    <tr>
                        <td colspan="9" class="text-center">No hay productos disponibles.</td>
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
            // Se eliminó 'verProductoId' ya que no está presente en el HTML del modal que proporcionaste.
            var nombre = button.getAttribute('data-name');
            var descripcion = button.getAttribute('data-descripcion');
            var detal = button.getAttribute('data-detal'); // Corregido a 'detal' para que coincida con el atributo data
            var mayor = button.getAttribute('data-mayor'); // Obtiene el precio al por mayor
            var stock = button.getAttribute('data-stock');
            var categoria = button.getAttribute('data-categoria');
            var talla = button.getAttribute('data-talla');
            var imagen = button.getAttribute('data-imagen');

            document.getElementById('verNombreProducto').textContent = nombre;
            document.getElementById('verDescripcionProducto').textContent = descripcion;
            document.getElementById('verPrecioDetalProducto').textContent = '$' + detal; // Establece el precio Detal
            document.getElementById('verPrecioMayorProducto').textContent = '$' + mayor; // Establece el precio Mayor
            document.getElementById('verStockProducto').textContent = stock;
            document.getElementById('verCategoriaProducto').textContent = categoria;
            document.getElementById('verTallaProducto').textContent = talla;
            document.getElementById('verProductoImagen').src = imagen; // Ruta de imagen ajustada
        });

        // Modal de Editar
        var editProductModal = document.getElementById('editarProductoModal');
        editProductModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-name');
            var descripcion = button.getAttribute('data-descripcion');
            var detal = button.getAttribute('data-detal'); // Corregido a 'detal'
            var mayor = button.getAttribute('data-mayor'); // Obtiene el precio al por mayor para el modal de edición
            var stock = button.getAttribute('data-stock');
            var categoria = button.getAttribute('data-categoria'); // Esto ahora será IdCategoria
            var talla = button.getAttribute('data-talla');

            document.getElementById('editarProductoId').value = id;
            document.getElementById('editarNombreProducto').value = nombre;
            document.getElementById('editarDescripcionProducto').value = descripcion;
            document.getElementById('editarDetalProducto').value = detal;
            document.getElementById('editarMayorProducto').value = mayor; // Establece el precio al por mayor para el modal de edición
            document.getElementById('editarStockProducto').value = stock;
            document.getElementById('editarCategoriaProducto').value = categoria; // Asigna el IdCategoria al select
            document.getElementById('editarTallaProducto').value = talla;
            // Rellenamos los campos del formulario
            document.getElementById('editarProductoId').value = id;
            document.getElementById('editarNombreProducto').value = nombre;
            document.getElementById('editarDescripcionProducto').value = descripcion;
            document.getElementById('editarDetalProducto').value = detal;
            document.getElementById('editarMayorProducto').value = mayor;
            document.getElementById('editarStockProducto').value = stock;
            document.getElementById('editarCategoriaProducto').value = categoria;
            document.getElementById('editarTallaProducto').value = talla;
        });
    });
</script>