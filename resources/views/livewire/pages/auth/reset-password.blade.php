<div>
    <h1>Cambiar conntraseña</h2>

    <x-custom-card>
        <x-form-container>
            <x-form wire:submit="reset_password">
                <x-input label="Contraseña Actual" icon="s-lock-closed" type="password" placeholder="******" 
                    wire:model="current_password" 
                />
                <x-input label="Nueva Contraseña" icon="s-lock-closed" type="password" placeholder="******" 
                    wire:model="new_password" 
                />

                <x-button label="Confirmar" type="submit" icon="o-check" class="btn-primary" />
            </x-form>
        </x-form-container>
    </x-custom-card>
</div>