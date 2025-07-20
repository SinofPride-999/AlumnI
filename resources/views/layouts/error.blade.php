<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Error - Alumni Connect' }}</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    @isset($additionalCSS)
        @foreach($additionalCSS as $css)
        <link rel="stylesheet" href="{{ asset('assets/css/' . $css) }}">
        @endforeach
    @endisset
</head>
<body>
    @yield('content')

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/index.js') }}"></script>
</body>
</html>