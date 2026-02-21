<!doctype html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devter</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f7fb; }
        .container { max-width: 860px; margin: 2rem auto; background: white; padding: 1.5rem; border-radius: 12px; }
        .btn { background: #0c7; border: 0; padding: .6rem 1rem; border-radius: 8px; color: #053; font-weight: 700; }
        input, select, textarea { width: 100%; padding: .6rem; margin: .4rem 0 .9rem; border: 1px solid #ccd; border-radius: 8px; }
    </style>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>
