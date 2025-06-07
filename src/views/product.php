<!doctype html>
<html lang="es">

<!-- Head -->

<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Links Estilos -->
    <?php include_once __DIR__ . '/../config/components/initComponent.php'; ?>
    <?= $varHeader ?? '' ?>
    
    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
            * Reinstate scrolling for non-JS clients
          */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>
    
    <!-- Page Title -->
    <title>Bruz Deporte | Plantilla HTML Bootstrap 5</title>
    
</head>

<body class="">

    <!-- Load Navbar -->
    <?= $navBar ?? '' ?>

    <section class="mt-0">
        <div class="container py-5">

            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fs-4 fw-bold m-0">Nuestros Productos</h3>
                    <!-- Botón que abre el modal -->
                    <button class="btn btn-sm btn-dark btn-px-2-5 py-3" data-bs-toggle="modal" data-bs-target="#modalAgregarProducto">
                        <i class="ri-add-line me-1"></i> Agregar producto
                    </button>
                </div>
                <table class="table align-middle">
                    <tbody>
                        <?php foreach ($productos as $producto): ?>
                            <tr class="border-bottom">
                                <td class="col-2">
                                    <img src="<?= BASE_URL . 'src/storage/images/products/' . ($producto['Imagen'] ?? 'Imagen.jpg') ?>" alt="<?= htmlspecialchars($producto['Nombre']) ?>" class="img-fluid border">
                                </td>
                                <td>
                                    <h6 class="mb-1"><?= htmlspecialchars($producto['Nombre']); ?></h6>
                                    <p class="text-muted mb-0"><span class="text-body">Categoría:</span> <?= htmlspecialchars($producto['IdCategoria']); ?></p>
                                    <p class="text-muted mb-0"><span class="text-body">Talla:</span> <?= htmlspecialchars($producto['Talla']); ?></p>
                                    <p class="text-muted mb-0"><span class="text-body">Stock:</span> <?= htmlspecialchars($producto['Stock']) ?></p>
                                    <p class="text-muted mb-0"><span class="text-body">Descripción:</span> <?= htmlspecialchars($producto['Descripcion']); ?></p>
                                </td>
                                <td class="text-end fw-bold">
                                    $<?= number_format($producto['Detal'], 2); ?>
                                </td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light border dropdown-toggle" type="button" id="dropdownMenu<?= $producto['id']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <button type="button"
                                                    class="dropdown-item btnVerProducto"
                                                    data-id="<?= $producto['id'] ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalVerProducto">
                                                    Ver
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button"
                                                    class="dropdown-item btnEditarProducto"
                                                    data-id="<?= $producto['id'] ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalEditarProducto">
                                                    Editar
                                                </button>
                                            </li>
                                            <li>
                                                <form action="<?= BASE_URL ?>?url=product/eliminar/<?= $producto['id'] ?>" method="POST" style="display:inline;">
                                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('¿Seguro?')">
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?= $footer ?? '' ?>
    <!-- / Footer -->

    <!-- Custom JS & Theme JS -->
    <?= $varJs ?? '' ?>

    <!-- Modal Agregar Producto -->
    <div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="<?= BASE_URL ?>?url=product/agregar" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Agregar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">

                            <!-- Nombre -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-1" id="nombreProducto" name="Nombre" placeholder="Nombre" required>
                                    <label for="nombreProducto">Nombre</label>
                                </div>
                            </div>

                            <!-- Categoría -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select rounded-1 " id="categoriaProducto" name="IdCategoria" required>
                                        <option value="1">Camiseta</option>
                                        <option value="2">Pantalón</option>
                                        <!-- Puedes agregar más categorías aquí -->
                                    </select>
                                    <label for="categoriaProducto">Categoría</label>
                                </div>
                            </div>

                            <!-- Talla -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select rounded-1 " id="tallaProducto" name="Talla" required>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                    <label for="tallaProducto">Talla</label>
                                </div>
                            </div>

                            <!-- Descripción -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control rounded-1 " id="descripcionProducto" name="Descripcion" style="height: 100px" required></textarea>
                                    <label for="descripcionProducto">Descripción</label>
                                </div>
                            </div>

                            <!-- Precio Detal -->
                            <div class="col-12">
                                <div class="input-group border-dark rounded-1">
                                    <span class="input-group-text bg-transparent  rounded-start">$</span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="number" class="form-control  rounded-0" id="precioDetalProducto" name="Detal" step="0.01" placeholder="Precio Detal" required>
                                        <label for="precioDetalProducto">Precio Detal</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Precio Mayor -->
                            <div class="col-12">
                                <div class="input-group border-dark rounded-1">
                                    <span class="input-group-text bg-transparent  rounded-start">$</span>
                                    <div class="form-floating flex-grow-1">
                                        <input type="number" class="form-control  rounded-0" id="precioMayorProducto" name="Mayor" step="0.01" placeholder="Precio Mayor">
                                        <label for="precioMayorProducto">Precio Mayor</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Stock -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control rounded-1" id="stockProducto" name="Stock" placeholder="Stock disponible" min="0" required>
                                    <label for="stockProducto">Stock disponible</label>
                                </div>
                            </div>

                            <!-- Imagen -->
                            <div class="col-12">
                                <label for="imagenProducto" class="form-label">Imagen del producto</label>
                                <input type="file" class="form-control  rounded-1" id="imagenProducto" name="Imagen">
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Ver Producto -->
    <div class="modal fade" id="modalVerProducto" tabindex="-1" aria-labelledby="modalVerProductoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content border-0 rounded-3 shadow">

                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-bold" id="modalVerProductoLabel">Detalle de Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-md-5 text-center">
                            <img id="modalProductoImagen" src="" alt="Imagen del producto" class="img-fluid mb-3" style="max-height: 250px; object-fit: contain;">
                            <h5 id="modalProductoNombre" class="fw-bold mt-2"></h5>
                        </div>
                        <div class="col-md-7">
                            <div class="mb-2">
                                <span class="fw-bold">Categoría:</span> <span id="modalProductoCategoria"></span>
                            </div>
                            <div class="mb-2">
                                <span class="fw-bold">Talla:</span> <span id="modalProductoTalla"></span>
                            </div>
                            <div class="mb-2">
                                <span class="fw-bold">Descripción:</span> <span id="modalProductoDescripcion"></span>
                            </div>
                            <div class="mb-2">
                                <span class="fw-bold">Stock disponible:</span> <span id="modalProductoStock"></span>
                            </div>
                            <div class="mb-2">
                                <span class="fw-bold">Precio:</span> <span id="modalProductoPrecio"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>
    <script>
    // Ver producto
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btnVerProducto').forEach(function(button) {
            button.addEventListener('click', async function() {
                const id = this.getAttribute('data-id');
                try {
                    const response = await fetch('<?= BASE_URL ?>?url=product/obtener/' + id);
                    const producto = await response.json();
                    if (!producto || !producto.id) {
                        alert('Producto no encontrado');
                        return;
                    }
                    document.getElementById('modalProductoNombre').textContent = producto.nombre;
                    document.getElementById('modalProductoCategoria').textContent = producto.categoria;
                    document.getElementById('modalProductoTalla').textContent = producto.talla;
                    document.getElementById('modalProductoStock').textContent = producto.cantidad;
                    document.getElementById('modalProductoDescripcion').textContent = producto.descripcion;
                    document.getElementById('modalProductoPrecio').textContent = `$${producto.precio}`;
                    // Corregir la ruta de la imagen
                    const baseUrl = '<?= BASE_URL ?>';
                    const img = producto.imgProduct1 ? producto.imgProduct1 : 'default.jpg';
                    document.getElementById('modalProductoImagen').src = baseUrl + 'src/storage/images/products/' + img;
                } catch (e) {
                    alert('Error procesando la respuesta del servidor');
                    console.error(e);
                }
            });
        });
        // Editar producto
        document.querySelectorAll('.btnEditarProducto').forEach(function(btn) {
            btn.addEventListener('click', async function() {
                const id = this.getAttribute('data-id');
                const response = await fetch('<?= BASE_URL ?>?url=product/obtener/' + id);
                const producto = await response.json();
                document.getElementById('editarProductoId').value = id;
                document.getElementById('editarNombreProducto').value = producto.nombre;
                document.getElementById('editarCategoriaProducto').value = producto.categoria;
                document.getElementById('editarTallaProducto').value = producto.talla;
                document.getElementById('editarStockProducto').value = producto.cantidad;
                document.getElementById('editarPrecioDetalProducto').value = producto.Detal;
                document.getElementById('editarPrecioMayorProducto').value = producto.Mayor;
                document.getElementById('editarDescripcionProducto').value = producto.descripcion;
                // Mostrar imagen actual
                const baseUrl = '<?= BASE_URL ?>';
                const img = producto.imgProduct1 ? producto.imgProduct1 : 'default.jpg';
                document.getElementById('editarImagenActual').src = baseUrl + 'src/storage/images/products/' + img;
            });
        });
    });
    </script>

</body>

</html>