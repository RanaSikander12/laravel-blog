<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="bg-info shadow-sm pt-2 pb-2">
        <nav class="navbar navbar-expand-lg container">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('dashboard.index')}}">
                    <strong class="text-white">Dashboard</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <div class="w-100">
                        <a href="{{route('dashboard.logout')}}" class="btn btn-sm btn-success float-end">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    
    @if(!session('user')){
    <script>
       window.location.href = "{{route('login.index')}}";
    </script>
    }
    @endif