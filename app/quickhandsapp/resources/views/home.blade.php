@extends('layouts.app')

@section('content')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Фриланс Биржа</title>
        <link rel="stylesheet" href="styles.css">
        <!-- Используем современный шрифт -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    </head>
    <script>
        let balance= '{{ $balance }}'
    </script>
    <div id="main-home" balance='{{$balance}}'></div>
    
@endsection