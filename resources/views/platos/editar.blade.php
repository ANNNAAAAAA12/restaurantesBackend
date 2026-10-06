<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Plato - Retro UNAB</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fde2e4;
            color: #333;
            font-family: 'Outfit', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #fff0f3;
            border: 4px solid #ffb3c6;
            box-shadow: 8px 8px 0px #ffe5ec, 16px 16px 0px #ffb3c6;
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
        }
        h2 {
            font-family: 'Dancing Script', cursive;
            font-size: 3rem;
            color: #d62828;
            text-shadow: 2px 2px 0px #f9c74f;
            text-align: center;
            margin-top: 0;
        }
        label { font-weight: 600; color: #5c0d2e; display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"], textarea, input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #f9c74f;
            background-color: #fff9db;
            border-radius: 12px;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 5px;
        }
        .btn-submit {
            width: 100%;
            background-color: #f9c74f;
            color: #5c0d2e;
            font-weight: 800;
            font-size: 1.2rem;
            padding: 14px;
            border: 3px solid #5c0d2e;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 4px 4px 0px #5c0d2e;
            margin-top: 15px;
        }
        .preview-img { width: 100px; height: 100px; object-fit: cover; border-radius: 15px; border: 3px solid #f9c74f; }
        .error { color: #d62828; font-size: 0.85rem; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Platillo</h2>

        <form action="{{ route('platos.update', $plato->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre', $plato->nombre) }}">
                @error('nombre') <span class="error">{{ $message }}</span> @enderror
            </div><br>

            <div>
                <label>Precio ($):</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio', $plato->precio) }}">
                @error('precio') <span class="error">{{ $message }}</span> @enderror
            </div><br>

            <div>
                <label>Descripción:</label>
                <textarea name="descripcion" rows="3">{{ old('descripcion', $plato->descripcion) }}</textarea>
                @error('descripcion') <span class="error">{{ $message }}</span> @enderror
            </div><br>

            <div>
                <label>Imagen Actual:</label><br>
                <img src="{{ asset('storage/' . $plato->imagen) }}" class="preview-img" alt="Vista previa"><br><br>
                <label>Cambiar Imagen (Opcional):</label>
                <input type="file" name="imagen" accept="image/*">
                @error('imagen') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-submit">ACTUALIZAR PLATO</button>
        </form>

        <a href="{{ route('platos.index') }}" style="display:block; text-align:center; margin-top:15px; color:#5c0d2e; font-weight:bold; text-decoration:none;">Cancelar</a>
    </div>
</body>
</html>