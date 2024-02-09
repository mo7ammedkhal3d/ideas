<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    {{-- Links --}}

<<<<<<< HEAD
    <link href="https://bootswatch.com/5/litera/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
=======
    <link href="https://bootswatch.com/5/spacelab/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
>>>>>>> 972154434dbe7c10b7e90918656fb1953e481a7b
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    @include('layouts.nav')
    {{-- Page content goes here --}}
    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>
