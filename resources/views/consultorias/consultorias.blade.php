<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorias | Consultoria Legal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/Style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold brand-link" href="/">
                <img class="brand-logo" src="/images/logo.png" alt="Logo de Consultoria Legal">
                <span>Consultoria Legal</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#consultoriasNav" aria-controls="consultoriasNav" aria-expanded="false" aria-label="Abrir navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="consultoriasNav">
                <ul class="navbar-nav ms-auto gap-lg-2">
                    @if (Auth::user()->rol_id != 2)
                    <li class="align-items-center d-flex">¡Hola, {{ Auth::user()->nombre }}!</li>
                    @endif

                    @if(Auth::user()->rol_id == 2)
                    <li class="nav-item"><a class="nav-link" href="/clientes">Clientes</a></li>
                    @endif


                    <li class="nav-item"><a class="nav-link active" href="/consultorias">Consultorias</a></li>

                    <li class="nav-item"><a class="nav-link" href="/solicitudes">{{ Auth::user()->rol_id == 2 ? 'Solicitudes' : 'Mis Solicitudes' }}</a></li>

                    @if (Auth::user()->rol_id == 2)
                    <li class="nav-item"><a class="nav-link" href="/usuarios">Usuarios</a></li>
                    <li class="nav-item"><a class="btn btn-outline-primary" href="/admin">Panel Admin</a></li>
                    @endif
                    <li class="nav-item"><a class="btn btn-outline-danger" href="/login">Cerrar sesion</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <header class="page-hero py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge text-bg-primary mb-3">Modulo de consultorias</span>
                    <h1 class="display-6 fw-bold mb-3">Gestiona el catalogo de servicios de consultoria.</h1>
                    <p class="lead text-secondary mb-0">
                        Organiza los servicios legales, ambientales e industriales que los clientes pueden solicitar.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="quick-panel">
                        <div class="card-body p-4">
                            @if(Auth::user()->rol_id == 2)
                            <h2 class="h5 mb-3">Acciones rapidas</h2>
                            <div class="d-grid gap-2">
                                <a href="/consultorias/create" class="btn btn-primary">Nueva consultoria</a>
                                <a href="/clientes" class="btn btn-outline-secondary">Explorar clientes</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="py-5">
        <div class="container">
            <section class="section-panel">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                        <div>
                            <h2 class="h4 mb-1 section-title">Listado de consultorias</h2>
                            <p class="text-secondary mb-0">Mantiene actualizado el catalogo de servicios visibles para los clientes.</p>
                        </div>
                        @if(Auth::user()->rol_id == 2)
                        <a class="btn btn-primary" href="/consultorias/create">Nueva consultoria</a>
                        @endif
                    </div>

                    <div th:if="${successMessage}" class="alert alert-success" th:text="${successMessage}"></div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Descripcion</th>
                                    @if(Auth::user()->rol_id == 2)
                                    <th class="text-center">Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($consultorias as $consultoria)

                                <tr>
                                    <td class="text-center">{{ $consultoria->id }}</td>
                                    <td class="text-center">{{ $consultoria->tipo }}</td>
                                    <td class="text-center">{{ $consultoria->descripcion ?? 'Sin descripcion' }}</td>
                                    @if(Auth::user()->rol_id == 2)
                                    <td class="text-center d-flex gap-2 justify-content-center">
                                        <a href="{{ route('consultorias.edit', $consultoria->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                        <form action="{{ route('consultorias.destroy', $consultoria->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta consultoria?');">Eliminar</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>


                                @empty

                                <tr>
                                    <td colspan="4" class="text-center text-secondary py-4">
                                        No hay consultorias registradas todavia.
                                    </td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>