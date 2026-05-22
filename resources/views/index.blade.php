<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.title') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/index.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold brand-link brand-link-home" href="/">
                <img class="brand-logo" src="/images/logo.png" alt="Logo de Consultoria Legal">
                <span> {{ __('messages.span_consulting') }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Abrir navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link" href="#mision">{{ __('messages.link_mision') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">{{ __('messages.link_services') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#acceso">{{ __('messages.link_access') }}</a></li>
                    <li class="nav-item"><a class="btn btn-outline-primary" href="/registro">{{ __('messages.link_createAccount') }}</a></li>
                    <li class="nav-item"><a class="btn btn-primary px-4" href="/login">{{ __('messages.link_login') }}</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container py-5">
            <div class="hero-copy">
                <span class="badge text-bg-light mb-3">{{ __('messages.profesional_management_consulting') }}</span>
                <h1 class="display-4 fw-bold mb-3">{{ __('messages.span_consulting') }}</h1>
                <p class="lead mb-4">
                    {{ __('messages.legal_consulting_desc') }}
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3">
                    <a href="/login" class="btn btn-primary btn-lg px-4">{{ __('messages.link_login') }}</a>
                    <a href="/registro" class="btn btn-light btn-lg px-4">{{ __('messages.link_createClientAccount') }}</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="stat-band">
            <div class="container">
                <div class="info-panel">
                    <div class="row g-0 text-center">
                        <div class="col-md-4 stat-item p-4">
                            <div class="h3 fw-bold text-primary mb-1">3</div>
                            <p class="text-secondary mb-0">Areas de consultoria</p>
                        </div>
                        <div class="col-md-4 stat-item p-4">
                            <div class="h3 fw-bold text-primary mb-1">24/7</div>
                            <p class="text-secondary mb-0">Registro de solicitudes</p>
                        </div>
                        <div class="col-md-4 stat-item p-4">
                            <div class="h3 fw-bold text-primary mb-1">1</div>
                            <p class="text-secondary mb-0">Panel para cada rol</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="mision" class="py-5">
            <div class="container py-lg-4">
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-6">
                        <article class="info-panel h-100 p-4 p-lg-5">
                            <span class="section-kicker"> {{ __('messages.link_mision') }}</span>
                            <h2 class="h3 mt-2 mb-3">{{ __('messages.mision') }}</h2>
                            <p class="text-secondary mb-0">
                                {{ __('messages.mision_desc') }}
                            </p>
                        </article>
                    </div>
                    <div class="col-lg-6">
                        <article class="info-panel h-100 p-4 p-lg-5">
                            <span class="section-kicker"> {{ __('messages.link_vision') }}</span>
                            <h2 class="h3 mt-2 mb-3">{{ __('messages.vision') }}</h2>
                            <p class="text-secondary mb-0">
                                {{ __('messages.vision_desc') }}
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section id="servicios" class="py-5 bg-white border-top border-bottom">
            <div class="container">
                <div class="row align-items-end g-4 mb-4">
                    <div class="col-lg-7">
                        <span class="section-kicker">{{ __('messages.link_services') }}</span>
                        <h2 class="h3 mt-2 mb-0">{{ __('messages.services') }}</h2>
                    </div>
                    <div class="col-lg-5">
                        <p class="text-secondary mb-0">
                            {{ __('messages.services_desc') }}
                        </p>
                    </div>
                </div>

                <div id="servicesCarousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Consultoria legal"></button>
                        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="1" aria-label="Consultoria ambiental"></button>
                        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="2" aria-label="Consultoria industrial"></button>
                    </div>
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img src="/images/consultoria-legal.jpg" class="d-block w-100" alt="Documentos legales sobre una mesa de trabajo">
                            <div class="carousel-caption">
                                <h3 class="h2 fw-bold">{{ __('messages.legal_consulting') }}</h3>
                                <p class="mb-0">{{ __('messages.legal_consulting_descs') }}</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/images/consultoria-ambiental.jpg" class="d-block w-100" alt="Paisaje natural asociado a gestion ambiental">
                            <div class="carousel-caption">
                                <h3 class="h2 fw-bold">{{ __('messages.environmental_consulting') }}</h3>
                                <p class="mb-0">{{ __('messages.environmental_consulting_descs') }}</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/images/consultoria-industrial.jpg" class="d-block w-100" alt="Instalacion industrial con estructura metalica">
                            <div class="carousel-caption">
                                <h3 class="h2 fw-bold">{{ __('messages.industrial_consulting') }}</h3>
                                <p class="mb-0">{{ __('messages.industrial_consulting_descs') }}</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>

                <div class="row g-4 mt-2">
                    <div class="col-md-4">
                        <article class="service-card p-4">
                            <h3 class="h5">{{ __('messages.online_applications') }}</h3>
                            <p class="text-secondary mb-0">{{ __('messages.online_applications_desc') }}</p>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="service-card p-4">
                            <h3 class="h5">{{ __('messages.administration_panel') }}</h3>
                            <p class="text-secondary mb-0">{{ __('messages.administration_panel_desc') }}</p>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="service-card p-4">
                            <h3 class="h5">{{ __('messages.centralized_tracking') }}</h3>
                            <p class="text-secondary mb-0">{{ __('messages.centralized_tracking_desc') }}</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section id="acceso" class="access-band py-5">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="badge text-bg-light mb-3">{{ __('messages.access_by_role') }}</span>
                        <h2 class="h3 mb-3">{{ __('messages.access_by_role') }}</h2>
                        <p class="mb-0">
                            {{ __('messages.access_by_role_desc') }}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-grid gap-2">
                            <a href="/login" class="btn btn-light btn-lg">{{ __('messages.link_login') }}</a>
                            <a href="/registro" class="btn btn-outline-light btn-lg">{{ __('messages.link_createClientAccount') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-4 bg-white border-top">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <p class="mb-0 text-secondary">{{ __('messages.footer_desc') }}</p>
            <div class="d-flex gap-3">
                <a class="text-decoration-none text-secondary" href="/login">{{ __('messages.link_login') }}</a>
                <a class="text-decoration-none text-secondary" href="/registro">{{ __('messages.link_createClientAccount') }}</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>