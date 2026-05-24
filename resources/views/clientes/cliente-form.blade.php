<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cliente | Consultoria Legal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/Style.css" rel="stylesheet">
</head>

<body class="form-page">
    <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold brand-link" href="/">
                <img class="brand-logo" src="/images/logo.png" alt="Logo de Consultoria Legal">
                <span>Consultoria Legal</span>
            </a>
            <div class="d-flex gap-2">
                <a class="btn btn-outline-primary" href="/clientes">Volver a clientes</a>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4 p-lg-5">
                            <span class="badge text-bg-primary mb-3">Modulo de clientes</span>
                            <h1 class="h2 mb-3 page-title" th:text="${formTitle}">Nuevo cliente</h1>
                            <p class="text-secondary mb-4">Completa los datos del cliente y guarda los cambios en el sistema.</p>

                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <form
                                action="{{ isset($cliente) ? route('clientes.update', $cliente->id) : route('clientes.store') }}"
                                method="POST"
                                class="row g-3">
                                @csrf   

                                @if (isset($cliente))
                                    @method('PUT')
                                @endif
                                <div class="col-md-6">

                                    <label for="nombre"
                                        class="form-label fw-semibold">

                                        Nombre

                                    </label>

                                    <input id="nombre"
                                        name="nombre"
                                        class="form-control"
                                        value="{{ $cliente->nombre ?? old('nombre') }}"
                                        required>
                                </div>

                                <div class="col-md-6">

                                    <label for="empresa"
                                        class="form-label fw-semibold">

                                        Empresa

                                    </label>

                                    <input id="empresa"
                                        name="empresa"
                                        class="form-control"
                                        value="{{ $cliente->empresa ?? old('empresa') }}"
                                        required>
                                </div>

                                <div class="col-md-6">

                                    <label for="telefono"
                                        class="form-label fw-semibold">

                                        Telefono

                                    </label>

                                    <input id="telefono"
                                        name="telefono"
                                        class="form-control"
                                        value="{{ $cliente->telefono ?? old('telefono') }}"
                                        required>
                                </div>

                                <div class="col-md-6">

                                    <label for="correo"
                                        class="form-label fw-semibold">

                                        Correo

                                    </label>

                                    <input id="correo"
                                        name="correo"
                                        type="email"
                                        class="form-control"
                                        value="{{ $cliente->correo ?? old('correo') }}"
                                        required>
                                </div>

                                <div class="col-12 d-flex gap-2 pt-2">

                                    <button id="submitButton"
                                        type="submit"
                                        class="btn btn-primary">

                                        Guardar cliente

                                    </button>

                                    <a href="/clientes"
                                        class="btn btn-outline-secondary">

                                        Cancelar

                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>