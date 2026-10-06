<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración - Retro UNAB</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fde2e4;
            color: #333;
            font-family: 'Outfit', sans-serif;
            padding: 40px;
        }
        .main-card {
            background: #fff0f3;
            border: 4px solid #ffb3c6;
            box-shadow: 10px 10px 0px #ffb3c6;
            border-radius: 20px;
            padding: 30px;
            max-width: 900px;
            margin: 0 auto;
        }
        h2 {
            font-family: 'Dancing Script', cursive;
            font-size: 3.5rem;
            color: #d62828;
            text-shadow: 2px 2px 0px #f9c74f;
            margin-top: 0;
            text-align: center;
        }
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn-add {
            background-color: #f9c74f;
            color: #5c0d2e;
            padding: 10px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 800;
            border: 3px solid #5c0d2e;
            box-shadow: 4px 4px 0px #5c0d2e;
            transition: all 0.2s;
        }
        .btn-add:hover {
            transform: translate(-2px, -2px);
            box-shadow: 6px 6px 0px #5c0d2e;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        th {
            background-color: #ffb3c6;
            color: #5c0d2e;
            padding: 12px;
            font-weight: 800;
            text-transform: uppercase;
        }
        td {
            background-color: #fff9db;
            border-top: 2px solid #f9c74f;
            border-bottom: 2px solid #f9c74f;
            padding: 12px;
            text-align: center;
            vertical-align: middle;
            font-weight: 600;
        }
        td:first-child { border-left: 2px solid #f9c74f; border-radius: 10px 0 0 10px; }
        td:last-child { border-right: 2px solid #f9c74f; border-radius: 0 10px 10px 0; }
        img.thumb {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ffb3c6;
        }
        .action-link { color: #d62828; text-decoration: none; font-weight: bold; margin-right: 10px; }
        .btn-del {
            background: #ffb3c6;
            border: 2px solid #d62828;
            color: #d62828;
            padding: 6px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-del:hover { background: #d62828; color: #fff; }
    </style>
</head>
<body>
    <div class="main-card">
        <h2>Panel de Administración</h2>

        @if(session('exito'))
            <div style="background: #ffe5ec; color: #5c0d2e; padding: 10px; border-radius: 8px; border: 2px solid #ffb3c6; text-align: center; font-weight: bold; margin-bottom: 20px;">
                {{ session('exito') }}
            </div>
        @endif

        <div class="header-actions">
            <a href="{{ route('platos.create') }}" class="btn-add">+ NUEVO PLATO</a>
            <a href="{{ route('menu.index') }}" style="color: #5c0d2e; font-weight: 800; text-decoration: none;">Ver Carta Pública →</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($platos as $plato)
                <tr>
                    <td>{{ $plato->id }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $plato->imagen) }}" class="thumb" alt="{{ $plato->nombre }}">
                    </td>
                    <td>{{ $plato->nombre }}</td>
                    <td>${{ number_format($plato->precio, 2) }}</td>
                    <td>
                        <a href="{{ route('platos.edit', $plato->id) }}" class="action-link">Editar</a>
                        <form action="{{ route('platos.destroy', $plato->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Borrar este platillo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-del">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>