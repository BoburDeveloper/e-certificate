<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My App' }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900">
    <div class="container mx-auto px-4 py-6">
        {{ $slot }}
    </div>

<script type="text/javascript" src="{{asset('js/site.js')}}"></script>
</body>
</html>
