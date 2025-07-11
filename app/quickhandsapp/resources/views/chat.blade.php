@extends('layouts.app')

@section('content')
    <head>
        <script>
            var csrf_token =  '<?php echo csrf_token(); ?>';
            window.csrfToken = '<?php echo csrf_token(); ?>';
        </script>
    </head>
    <div class="container">
        <div id="main" data-user="{{ json_encode($user) }}"></div>
    </div>
    
@endsection