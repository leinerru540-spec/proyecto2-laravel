<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Solicitud | Consultoria Legal</title>
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
                <a class="btn btn-outline-primary" href="/solicitudes">Volver a solicitudes</a>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4 p-lg-5">
                            <span class="badge text-bg-primary mb-3">Modulo de solicitudes</span>
                            <h1 class="h2 mb-3 page-title" th:text="${formTitle}">Nueva solicitud</h1>
                            <p class="text-secondary mb-4">Registra los datos del solicitante y la consultoria que desea.</p>

                            <form action="{{ isset($solicitudForm->id)
    ? route('solicitudes.update', $solicitudForm->id)
    : route('solicitudes.store') }}"
                                method="POST"
                                class="row g-4">

                                @csrf

                                @if(isset($solicitudForm->id))
                                @method('PUT')
                                @endif

                                {{-- CLIENTE --}}
                                <div class="col-12">

                                    <label class="form-label fw-semibold">
                                        Cliente
                                    </label>

                                    @if(Auth::user()->rol_id == 2)

                                    {{-- ADMIN --}}
                                    <select name="cliente_id"
                                        class="form-select"
                                        required>

                                        <option value="">
                                            Selecciona un cliente
                                        </option>

                                        @foreach($clientes as $cliente)

                                        <option value="{{ $cliente->id }}"
                                            @selected(($solicitudForm->cliente_id ?? '') == $cliente->id)>

                                            {{ $cliente->nombre }}
                                            -
                                            {{ $cliente->correo }}

                                        </option>

                                        @endforeach

                                    </select>

                                    @else

                                    {{-- CLIENTE/USUARIO NORMAL --}}
                                    <div class="form-control bg-light py-2">

                                        {{ auth()->user()->nombre }}

                                    </div>

                                    <input type="hidden"
                                        name="cliente_id"
                                        value="{{ auth()->user()->cliente->id ?? '' }}">

                                    @endif

                                </div>
                                {{-- ESTADO --}}
                                <div class="col-md-6">

                                    <label class="form-label fw-semibold">
                                        Estado
                                    </label>

                                    @if(Auth::user()->rol_id == 2)

                                    <select name="estado"
                                        class="form-select"
                                        required>

                                        <option value="">
                                            Selecciona un estado
                                        </option>

                                        @foreach($estadosSolicitud as $estado)

                                        <option value="{{ $estado }}"
                                            @selected(($solicitudForm->estado ?? '') == $estado)>

                                            {{ $estado }}

                                        </option>

                                        @endforeach

                                    </select>

                                    @else

                                    <input type="text"
                                        class="form-control"
                                        value="{{ $solicitudForm->estado ?? '' }}"
                                        readonly>

                                    <input type="hidden"
                                        name="estado"
                                        value="{{ $solicitudForm->estado ?? '' }}">

                                    @endif

                                </div>

                                {{-- FECHA --}}
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        Fecha
                                    </label>

                                    @if(Auth::user()->rol_id == 2)
                                    <input type="date"
                                        name="fecha"
                                        value="{{ $solicitudForm->fecha ?? '' }}"
                                        class="form-control"
                                        required>
                                    @else
                                    <input type="date"
                                        name="fecha"
                                        value="{{ $solicitudForm->fecha ?? '' }}"
                                        class="form-control bg-light"
                                        readonly>
                                    <input type="hidden"
                                        name="fecha"
                                        value="{{ $solicitudForm->fecha ?? '' }}">
                                    @endif
                                </div>

                                {{-- CONSULTORÍA --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Consultoría que desea
                                    </label>

                                    <select name="consultoria_id"
                                        class="form-select"
                                        required>

                                        <option value="">
                                            Selecciona una consultoría
                                        </option>

                                        @foreach($consultorias as $consultoria)
                                        <option value="{{ $consultoria->id }}"
                                            @selected(($solicitudForm->consultoria_id ?? '') == $consultoria->id)>
                                            {{ $consultoria->tipo }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>

                                {{-- DESCRIPCIÓN --}}
                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        Descripción de la solicitud
                                    </label>

                                    <textarea name="descripcion"
                                        rows="5"
                                        class="form-control"
                                        required>{{ $solicitudForm->descripcion ?? '' }}</textarea>
                                </div>

                                {{-- USUARIO --}}
                                <input type="hidden"
                                    name="usuario_id"
                                    value="{{ auth()->user()->id ?? ''}}">

                                {{-- BOTONES --}}
                                <div class="col-12 d-flex justify-content-end gap-2 pt-3">

                                    <a href="/solicitudes"
                                        class="btn btn-outline-secondary px-4">
                                        Cancelar
                                    </a>

                                    <button type="submit"
                                        class="btn btn-primary px-4">
                                        Guardar solicitud
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