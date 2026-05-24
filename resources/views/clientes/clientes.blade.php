<!DOCTYPE html>
<html lang="es" xmlns:th="http://www.thymeleaf.org">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorar Clientes | Consultoria Legal</title>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#clientesNav" aria-controls="clientesNav" aria-expanded="false" aria-label="Abrir navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="clientesNav">
                <ul class="navbar-nav ms-auto gap-lg-2">
                    <li class="nav-item"><a class="nav-link active" href="/clientes">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/consultorias">Consultorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="/solicitudes">Solicitudes</a></li>
                    <li class="nav-item"><a class="nav-link" href="/usuarios">Usuarios</a></li> 
                    <li class="nav-item"><a class="btn btn-outline-primary" href="/admin">Panel Admin</a></li>
                    <li class="nav-item"><a class="btn btn-outline-danger" href="/login">Cerrar sesion</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="page-hero py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge text-bg-primary mb-3">Modulo de clientes</span>
                    <h1 class="display-6 fw-bold mb-3">Administra los clientes desde una sola vista.</h1>
                    <p class="lead text-secondary mb-0">
                        Esta pantalla usa el flujo MVC del proyecto para listar, crear,
                        editar y eliminar clientes desde el servidor.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="quick-panel">
                        <div class="card-body p-4">
                            <h2 class="h5 mb-3">Acciones rapidas</h2>
                            <div class="d-grid gap-2">
                                <a href="/clientes/create" class="btn btn-primary">Nuevo cliente</a>
                                <a href="/consultorias" class="btn btn-outline-secondary">Ver consultorias</a>
                            </div>
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
                            <h2 class="h4 mb-1 section-title">Listado de clientes</h2>
                            <p class="text-secondary mb-0">Consulta y administra la informacion comercial de cada cliente.</p>
                        </div>
                        <a class="btn btn-primary" href="/clientes/create">Nuevo cliente</a>
                    </div>

                    <div th:if="${successMessage}" class="alert alert-success" th:text="${successMessage}"></div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Empresa</th>
                                    <th class="text-center">Telefono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($clientes->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">No hay clientes registrados todavía.</td>
                                </tr>
                                @endif

                                @foreach($clientes as $cliente)
                                <tr>
                                    <td class="text-center">{{ $cliente->id }}</td>
                                    <td class="text-center">{{ $cliente->nombre }}</td>
                                    <td class="text-center">{{ $cliente->empresa ?? '-' }}</td>
                                    <td class="text-center">{{ $cliente->telefono }}</td>
                                    <td class="text-center">{{ $cliente->correo }}</td>
                                    <td class="text-center d-flex gap-2 justify-content-center">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?');">Eliminar</button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
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