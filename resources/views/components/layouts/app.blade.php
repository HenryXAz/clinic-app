@php
$system = \App\Models\System::query()->select(['logo', 'company_name'])->first();

@endphp

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$system->company_name}}</title>

    {{-- Flatpickr  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

{{-- The navbar with `sticky` and `full-width` --}}
<x-nav sticky full-width>

    <x-slot:brand>
        {{-- Drawer toggle for "main-drawer" --}}
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer" />
        </label>

        {{-- Brand --}}
        <div class="flex gap-2 items-center">
            <img src="{{asset($system->logo)}}" alt="logo"
                class="object-scale-down max-w-12"
            />

           {{$system->company_name}}
        </div>
    </x-slot:brand>

    {{-- Right side actions --}}
    <x-slot:actions>
        <x-theme-toggle darkTheme="dark" lightTheme="pastel" />
        {{--            <x-theme-toggle class="btn" />--}}
    </x-slot:actions>
</x-nav>

{{-- The main content with `full-width` --}}
<x-main with-nav full-width>

    {{-- This is a sidebar that works also as a drawer on small screens --}}
    {{-- Notice the `main-drawer` reference here --}}
    <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200" collapse-text="Minimizar">

        {{-- User --}}
        @if($user = auth()->user())
            <x-menu>
                <x-menu-sub title="{{Auth::user()->identifier}}" icon="m-user-plus">
                    <x-menu-item title="Perfil" icon="o-user" link="####" />

                    <form action="{{route('logout')}}" method="POST" class="flex justify-start">
                        @csrf
                        <x-button label="Cerrar Sesión" icon="o-power" class="w-full btn-ghost" tooltip-left="logoff" no-wire-navigate type="submit" />
                    </form>
                </x-menu-sub>
            </x-menu>
        @endif

        {{-- Activates the menu item when a route matches the `link` property --}}
        <x-menu activate-by-route>
            <x-menu-item title="Panel" icon="o-square-3-stack-3d" link="{{route('dashboard')}}" />
            <x-menu-item title="Pacientes" icon="o-users" link="{{route('patients.index')}}"/>

            <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                <x-menu-item title="Wifi" icon="o-wifi" link="####" />
                <x-menu-item title="Archives" icon="o-archive-box" link="####" />
            </x-menu-sub>
        </x-menu>
    </x-slot:sidebar>

    {{-- The `$slot` goes here --}}
    <x-slot:content>
        {{ $slot }}
    </x-slot:content>
</x-main>

{{--  TOAST area --}}
<x-toast />
</body>

</html>
