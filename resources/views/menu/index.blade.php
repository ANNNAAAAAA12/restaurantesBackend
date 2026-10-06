<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuestra Carta - Retro UNAB</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fde2e4;
            color: #333;
            font-family: 'Outfit', sans-serif;
            padding: 40px;
        }
        h1 {
            font-family: 'Dancing Script', cursive;
            font-size: 4rem;
            color: #d62828;
            text-shadow: 3px 3px 0px #f9c74f;
            text-align: center;
            margin-bottom: 30px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .card {
            background: #fff0f3;
            border: 3px solid #f9c74f;
            box-shadow: 6px 6px 0px #ffb3c6;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s;
        }
        .card:hover { transform: translateY(-5px); }
        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 15px;
            border: 3px solid #ffb3c6;
        }
        .card h3 {
            font-family: 'Dancing Script', cursive;
            font-size: 2.2rem;
            color: #5c0d2e;
            margin: 10px 0 5px 0;
        }
        .price {
            background-color: #f9c74f;
            color: #5c0d2e;
            font-weight: 800;
            padding: 5px 12px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 15px;
        }
        .btn-view {
            display: block;
            background-color: #ffb3c6;
            color: #5c0d2e;
            text-decoration: none;
            font-weight: 800;
            padding: 10px;
            border-radius: 12px;
            border: 2px solid #5c0d2e;
        }
    </style>
</head>
<body>
    <h1>★ Menu Especial ★</h1>

    <div class="grid">
        @foreach($platos as $plato)
            <div class="card">
                <img src="{{ asset('storage/' . $plato->imagen) }}" alt="{{ $plato->nombre }}">
                <h3>{{ $plato->nombre }}</h3>
                <div class="price">${{ number_format($plato->precio, 2) }}</div>
                <a href="{{ route('menu.show', $plato->id) }}" class="btn-view">Ver Detalles</a>
            </div>
        @endforeach
    </div>

    <div style="text-align: center; margin-top: 40px;">
        <a href="{{ route('platos.index') }}" style="color: #5c0d2e; font-weight: 800; text-decoration: none;">⚙️ Ir a Administración</a>
    </div>
</body>
</html>