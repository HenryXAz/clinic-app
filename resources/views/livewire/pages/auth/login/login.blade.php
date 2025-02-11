<div class="max-w-screen-lg mx-auto my-5">

    <div class="flex justify-center">
        <img src="{{asset($logo->logo)}}" alt="logo"
            class="object-scale-down max-w-48 "
        >
    </div>

    <h1 class="text-center text-base md:text-lg lg:text-3xl">Iniciar Sesión</h1>

    <div class="max-w-xl mx-auto mt-5 p-4 shadow-lg dark:shadow-noone rounded-md border border-gray-300 dark:border-gray-700">
        <x-form wire:submit="login">
            <x-input label="Usuario" icon="o-user" placeholder="ingrese usuario"
                wire:model="form.identifier"
                     error-field="form.identifier"
            />

            <x-input type="password" label="Contraseña" icon="o-lock-closed" placeholder="******"
                wire:model="form.password"
                     error-field="form.password"
            />

            <x-button
                label="Ingresar"
                class="btn-primary"
                type="submit"
                spinner="login"
            />
        </x-form>
    </div>

</div>
