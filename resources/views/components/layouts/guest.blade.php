@php
    $system = \App\Models\System::query()->select(['company_name'])->first();
@endphp

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}
{{--    <title>{{config('app.name')}}</title>--}}
    <title>{{$system->company_name}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="flex mt-5 mx-auto justify-end max-w-screen-lg">
        <x-theme-toggle darkTheme="dark" lightTheme="pastel" />
    </div>
    <main>
        {{$slot}}
    </main>

    <x-toast />
</body>
</html>
