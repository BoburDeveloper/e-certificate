<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024">
    <title>{{ $title ?? 'My App' }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap">

    @vite('resources/css/app.css')
    
    <link rel="stylesheet" href="{{env('APP_URL').'/resources/css/app.css'}}" />
</head>
<body class="bg-gray-50 text-gray-900">
    <div class="container mx-auto">
        {{ $slot }}
    </div>

<script type="text/javascript" src="{{asset('js/site.js')}}"></script>
</body>
</html>
