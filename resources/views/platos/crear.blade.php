<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Plato - Retro UNAB</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { background-color: #fde2e4; color: #333; font-family: 'Outfit', sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; padding: 20px; }
        .container { background: #fff0f3; border: 4px solid #ffb3c6; box-shadow: 8px 8px 0px #ffe5ec, 16px 16px 0px #ffb3c6; border-radius: 20px; padding: 40px; max-width: 500px; width: 100%; }
        h2 { font-family: 'Dancing Script', cursive; font-size: 3rem; color: #d62828; text-shadow: 2px 2px 0px #f9c74f; text-align: center; margin-top: 0; }
        label { font-weight: 600; color: #5c0d2e; display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"], textarea, input[type="file"] { width: 100%; padding: 12px; border: 2px solid #f9c74f; background-color: #fff9db; border-radius: 12px; box-sizing: border-box; font-family: 'Outfit', sans-serif; font-size: 1rem; margin-bottom: 5px; outline: none; }
        .preview-container { text-align: center; margin-top: 10px; display: none; }
        .preview-img { width: 130px; height: 130px; object-fit: cover; border-radius: 15px; border: 3px solid #ffb3c6; box-shadow: 4px 4px 0px #f9c74f; }
        .btn-submit { width: 100%; background-color: #f9c74f; color: #5c0d2e; font-weight: 800; font-size: 1.2rem; padding: 14px; border: 3px solid #5c0d2e; border-radius: 12px; cursor: pointer; box-shadow: 4px 4px 0px #5c0d2e; transition: all 0.2s ease; margin-top: 15px; }
        .btn-submit:hover { transform: translate(-2px, -2px); box-shadow: 6px 6px 0px #5c0d2e; background-color: #ffe5ec; }
        .error { color: #d62828; font-size: 0.85rem; font-weight: 600; }
        .exito { background: #ffe5ec; color: #5c0d2e; padding: 10px; border-radius: 8px; border: 2px solid #ffb3c6; text-align: center; font-weight: bold; }
        a.back-link { display: block; text-align: center; margin-top: 20px; color: #5c0d2e; font-weight: 600; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>★ Registrar Plato ★</h2>

        @if(session('exito'))
            <p class="exito">{{ session('exito') }}</p>
        @endif

        <form action="{{ route('platos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label>Nombre del Platillo:</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Pizza Retro">
                @error('nombre') <span class="error">{{ $message }}</span> @enderror
            </div><br>

            <div>
                <label>Precio ($):</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" placeholder="Ej: 15000">
                @error('precio') <span class="error">{{ $message }}</span> @enderror
            </div><br>

            <div>
                <label>Descripción:</label>
                <textarea name="descripcion" rows="3" placeholder="Sabor ochentero inigualable...">{{ old('descripcion') }}</textarea>
                @error('descripcion') <span class="error">{{ $message }}</span> @enderror
            </div><br>

            <div>
                <label>Foto del Plato:</label>
                <input type="file" name="imagen" accept="image/*" onchange="previewImage(event)">
                @error('imagen') <span class="error">{{ $message }}</span> @enderror

                <div class="preview-container" id="previewWrapper">
                    <label style="margin-top: 10px;">Vista Previa:</label>
                    <img id="imagePreview" class="preview-img" src="#" alt="Vista previa">
                </div>
            </div>

            <button type="submit" class="btn-submit">¡GUARDAR PLATO!</button>
        </form>

        <a href="{{ route('platos.index') }}" class="back-link">← Volver al Menú de Administración</a>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const previewWrapper = document.getElementById('previewWrapper');
            const imagePreview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    previewWrapper.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                previewWrapper.style.display = 'none';
            }
        }
    </script>
</body>
</html>