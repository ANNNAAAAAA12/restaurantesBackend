<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $plato->nombre }} - Retro UNAB</title>
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
        .card-detail {
            background: #fff0f3;
            border: 4px solid #ffb3c6;
            box-shadow: 10px 10px 0px #f9c74f;
            border-radius: 20px;
            padding: 30px;
            max-width: 450px;
            width: 100%;
            text-align: center;
        }
        h2 {
            font-family: 'Dancing Script', cursive;
            font-size: 3.5rem;
            color: #d62828;
            margin-top: 0;
            margin-bottom: 10px;
        }
        img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 15px;
            border: 4px solid #f9c74f;
            margin-bottom: 15px;
        }
        .price {
            font-size: 1.5rem;
            font-weight: 800;
            color: #5c0d2e;
            background-color: #f9c74f;
            padding: 8px 15px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 15px;
        }
        p.desc {
            font-size: 1.1rem;
            color: #4a4a4a;
            background-color: #fff9db;
            padding: 15px;
            border-radius: 12px;
            border: 2px dashed #ffb3c6;
        }
        a.back {
            display: inline-block;
            margin-top: 20px;
            color: #5c0d2e;
            font-weight: 800;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="card-detail">
        <h2>{{ $plato->nombre }}</h2>
        <img src="{{ asset('storage/' . $plato->imagen) }}" alt="{{ $plato->nombre }}">
        <div class="price">${{ number_format($plato->precio, 2) }}</div>
        <p class="desc">{{ $plato->descripcion }}</p>

        <a href="{{ route('menu.index') }}" class="back">← Volver al Menú</a>
    </div>
</body>
</html>