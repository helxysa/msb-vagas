<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste Alpine.js</title>
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background: #f9f9f9; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        button { padding: 0.75rem 1.5rem; font-size: 1rem; border-radius: 0.375rem; border: none; background: #f53003; color: #fff; cursor: pointer; transition: background 0.2s; }
        button:hover { background: #c41e00; }
        .msg { margin-top: 1.5rem; font-size: 1.1rem; color: #222; }
    </style>
</head>
<body>
    <div x-data="{ aberto: false }" class="text-center">
        <button @click="aberto = !aberto">
            <span x-text="aberto ? 'Ocultar mensagem' : 'Mostrar mensagem'"></span>
        </button>
        <div x-show="aberto" x-transition class="msg">
            Olá! Este é um teste com Alpine.js funcionando corretamente.
        </div>
    </div>
</body>
</html>
