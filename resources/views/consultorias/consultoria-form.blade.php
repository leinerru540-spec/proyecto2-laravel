<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Consultoria | Consultoria Legal</title>
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
                <a class="btn btn-outline-primary" href="/consultorias">Volver a consultorias</a>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4 p-lg-5">
                            <span class="badge text-bg-primary mb-3">Modulo de consultorias</span>
                            <h1 class="h2 mb-3 page-title" th:text="${formTitle}">Nueva consultoria</h1>
                            <p class="text-secondary mb-4">Registra el servicio que ofrece la empresa.</p>

                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <form action="{{ isset($consultoria)
    ? route('consultorias.update', $consultoria->id)
    : route('consultorias.store') }}"
                                method="POST">

                                @csrf

                                @if(isset($consultoria))
                                @method('PUT')
                                @endif

                                <div class="mb-3">
                                    <label>Tipo</label>

                                    <input id="tipo"
                                        name="tipo"
                                        class="form-control"
                                        value="{{ $consultoria->tipo ?? old('tipo') }}">
                                </div>

                                <div class="mb-3">
                                    <label>Descripción</label>

                                    <textarea name="descripcion"
                                        class="form-control">{{ $consultoria->descripcion ?? '' }}</textarea>
                                </div>

                                {{-- BOTONES --}}
                                <div class="col-12 d-flex justify-content-end gap-2 pt-3">

                                    <a href="/consultorias"
                                        class="btn btn-outline-secondary px-4">
                                        Cancelar
                                    </a>

                                    <button type="submit"
                                        class="btn btn-primary px-4">
                                        Guardar consultoria
                                    </button>

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