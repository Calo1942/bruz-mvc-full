<?php

    $varHeader = '
        <!-- Custom Google Fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
            rel="stylesheet">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="./src/assets/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./src/assets/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./src/assets/images/favicon/favicon-16x16.png">
        <link rel="mask-icon" href="./src/assets/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="./src/assets/css/libs.bundle.css" />
        <!-- Main CSS -->
        <link rel="stylesheet" href="./src/assets/css/theme.bundle.css" />
    ';

    $varJs = '
        <!-- Vendor JS -->
        <script src="./src/assets/js/vendor.bundle.js"></script>
        <!-- Theme JS -->
        <script src="./src/assets/js/theme.bundle.js"></script>
    ';

    $navBar = '
        <nav class="navbar navbar-expand-lg navbar-light bg-white flex-column border-0  ">
            <div class="container-fluid">
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">

                        <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0 order-0" href="#">
                            <div class="d-flex align-items-center">
                                <svg class="f-w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.53 72.26">
                                    <path d="M10.43,54.2h0L0,36.13,10.43,18.06,20.86,0H41.72L10.43,54.2Zm67.1-7.83L73,54.2,68.49,62,45,48.47,31.29,72.26H20.86l-5.22-9L52.15,0H62.58l5.21,9L54.06,32.82,77.53,46.37Z"
                                        fill="currentColor" fill-rule="evenodd" />
                                </svg>
                            </div>
                        </a>

                        <ul class="list-unstyled mb-0 d-flex align-items-center order-1 order-lg-2 nav-sidelinks">

                            <li class="d-lg-none">
                                <span class="nav-link text-body d-flex align-items-center cursor-pointer" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                    aria-label="Toggle navigation"><i class="ri-menu-line ri-lg me-1"></i> Menú</span>
                            </li>
                            <li class="d-none d-sm-block">
                                <span class="nav-link text-body search-trigger cursor-pointer">Buscar</span>

                                <div class="navbar-search d-none">
                                    <div class="input-group mb-3 h-100">
                                        <span class="input-group-text px-4 bg-transparent border-0"><i
                                                class="ri-search-line ri-lg"></i></span>
                                        <input type="text" class="form-control text-body bg-transparent border-0"
                                            placeholder="Introduce tus términos de búsqueda...">
                                        <span
                                            class="input-group-text px-4 cursor-pointer disable-child-pointer close-search bg-transparent border-0"><i
                                                class="ri-close-circle-line ri-lg"></i></span>
                                    </div>
                                </div>
                                <div class="search-overlay"></div>
                                </li>
                            <li class="ms-1 d-none d-lg-inline-block">
                                <a class="nav-link text-body" href="#">
                                    Cuenta
                                </a>
                            </li>
                            <li class="ms-1 d-inline-block position-relative dropdown-cart">
                                <button class="nav-link me-0 disable-child-pointer border-0 p-0 bg-transparent text-body"
                                    type="button">
                                    Carrito (2)
                                </button>
                                <div class="cart-dropdown dropdown-menu">

                                    <div class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-4">
                                        <h6 class="fw-bolder m-0">Resumen del Carrito (2 artículos)</h6>
                                        <i class="ri-close-circle-line text-muted ri-lg cursor-pointer btn-close-cart"></i>
                                    </div>
                                    <div>

                                        <div class="row mx-0 py-4 g-0 border-bottom">
                                            <div class="col-2 position-relative">
                                                <picture class="d-block ">
                                                    <img class="img-fluid" src="./src/assets/images/products/product-cart-1.jpg"
                                                        alt="Plantilla HTML Bootstrap por Pixel Rocket">
                                                </picture>
                                            </div>
                                            <div class="col-9 offset-1">
                                                <div>
                                                    <h6 class="justify-content-between d-flex align-items-start mb-2">
                                                        Nike Air VaporMax 2021
                                                        <i class="ri-close-line ms-3"></i>
                                                    </h6>
                                                    <span class="d-block text-muted fw-bolder text-uppercase fs-9">Talla: 9 / Cantidad: 1</span>
                                                </div>
                                                <p class="fw-bolder text-end text-muted m-0">$85.00</p>
                                            </div>
                                        </div>
                                        <div class="row mx-0 py-4 g-0 border-bottom">
                                            <div class="col-2 position-relative">
                                                <picture class="d-block ">
                                                    <img class="img-fluid" src="./src/assets/images/products/product-cart-2.jpg"
                                                        alt="Plantilla HTML Bootstrap por Pixel Rocket">
                                                </picture>
                                            </div>
                                            <div class="col-9 offset-1">
                                                <div>
                                                    <h6 class="justify-content-between d-flex align-items-start mb-2">
                                                        Nike ZoomX Vaporfly
                                                        <i class="ri-close-line ms-3"></i>
                                                    </h6>
                                                    <span class="d-block text-muted fw-bolder text-uppercase fs-9">Talla: 11 / Cantidad: 1</span>
                                                </div>
                                                <p class="fw-bolder text-end text-muted m-0">$125.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="pt-3">
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-start mb-4 mb-md-2">
                                                <div>
                                                    <p class="m-0 fw-bold fs-5">Total General</p>
                                                    <span class="text-muted small">Incluye $45.89 impuestos</span>
                                                </div>
                                                <p class="m-0 fs-5 fw-bold">$422.99</p>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-outline-dark w-100 text-center mt-4" role="button">Ver Carrito</a>
                                        <a href="#" class="btn btn-dark w-100 text-center mt-2" role="button">Proceder al Pago</a>
                                    </div>
                                    </div>
                                </li>
                            </ul>
                        <div class="flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1"
                            id="navbarNavDropdown">

                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" role="button">
                                        Oferta
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Páginas
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Página de inicio</a></li>
                                        <li><a class="dropdown-item" href="#">Categoría</a></li>
                                        <li><a class="dropdown-item" href="#">Producto</a></li>
                                        <li><a class="dropdown-item" href="#">Carrito</a></li>
                                        <li><a class="dropdown-item" href="#">Pago</a></li>
                                        <li><a class="dropdown-item" href="#">Iniciar sesión</a></li>
                                        <li><a class="dropdown-item" href="#">Registrarse</a></li>
                                        <li><a class="dropdown-item" href="#">Contraseña olvidada</a></li>
                                    </ul>
                                </li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    ';

    $footer = '
            <footer class="border-top py-5 mt-4  ">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center flex-column flex-lg-row">
                        <div>
                            <ul class="list-unstyled">
                                <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                                        href="#"><i class="ri-instagram-fill"></i></a></li>
                                <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                                        href="#"><i class="ri-facebook-fill"></i></a></li>
                                <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                                        href="#"><i class="ri-twitter-fill"></i></a></li>
                                <li class="d-inline-block me-1"><a class="text-decoration-none text-dark-hover transition-all"
                                        href="#"><i class="ri-snapchat-fill"></i></a></li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center justify-content-end flex-column flex-lg-row">
                            <p class="small m-0 text-center text-lg-start">&copy; 2025 Bruz Deportes Todos los derechos reservados</p>
                            <ul class="list-unstyled mb-0 ms-lg-4 mt-3 mt-lg-0 d-flex justify-content-end align-items-center">
                                <li class="bg-light p-2 d-flex align-items-center justify-content-center me-2">
                                    <i class="pi pi-sm pi-paypal"></i>
                                </li>
                                <li class="bg-light p-2 d-flex align-items-center justify-content-center me-2">
                                    <i class="pi pi-sm pi-mastercard"></i>
                                </li>
                                <li class="bg-light p-2 d-flex align-items-center justify-content-center me-2">
                                    <i class="pi pi-sm pi-american-express"></i>
                                </li>
                                <li class="bg-light p-2 d-flex align-items-center justify-content-center"><i class="pi pi-sm pi-visa"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>    
    ';
