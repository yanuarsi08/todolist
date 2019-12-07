<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
            <div class="card mt-4">
                <div class="card-header text-center">
                    @yield('title')
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="list-group">
                            <a href="/pengguna" class="list-group-item list-group-item-action {{ Request::is('pengguna*') ? 'active' : '' }}">Pengguna</a>
                            <a href="/tugas" class="list-group-item list-group-item-action {{ Request::is('tugas*') ? 'active' : '' }}">Tugas</a>
                            </div>
                        </div>
                        <div class="col-9">
                                
                            @yield('content')
                                
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-muted text-center">
                    @2019
                </div>
                </div>
    </div>
    
</body>
</html>