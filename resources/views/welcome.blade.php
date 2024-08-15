<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center text-blue-600">Gerenciador de Tarefas</h1>
        @livewire('task-manager')
    </div>
    @livewireScripts
</body>
</html>
