<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - EjemploSeg</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f3f4f6; color: #111827; font: 1rem/1.5 system-ui, sans-serif; }
        main { width: min(28rem, calc(100% - 2rem)); margin: 4rem auto; padding: 2rem; background: white; border-radius: .75rem; }
        h1 { margin-top: 0; }
        label { display: block; margin-top: 1rem; }
        input:not([type=checkbox]) { width: 100%; padding: .7rem; border: 1px solid #6b7280; border-radius: .3rem; font: inherit; }
        button { width: 100%; margin-top: 1.5rem; padding: .75rem; background: #1d4ed8; color: white; border: 0; border-radius: .3rem; font: inherit; cursor: pointer; }
        a { color: #1d4ed8; }
        .errors { color: #991b1b; background: #fef2f2; padding: 1rem; border-radius: .3rem; }
        .errors ul { margin: 0; padding-left: 1.25rem; }
        .status { color: #166534; }
    </style>
</head>
<body>
    <main>
        <h1>@yield('title')</h1>
        @if (session('status'))
            <p class="status" role="status">{{ session('status') }}</p>
        @endif
        @if ($errors->any())
            <div class="errors" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
