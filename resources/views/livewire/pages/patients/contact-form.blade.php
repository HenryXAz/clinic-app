<x-form-container>
    <x-form wire:submit="update_contact">
        <x-icon name="o-user" label="Información de contacto" class="font-bold" />
        <x-form-group>
            <x-input
                label="Télefono fijo(opcional)"
                icon="o-phone"
                placeholder="número de teléfono"
                wire:model="contactForm.phone"
                error-field="contactForm.phone"
            />

            <x-input
                label="Teléfono móvil"
                icon="o-device-phone-mobile"
                placeholder="número de teléfono"
                wire:model="contactForm.personal_phone"
                error-field="contactForm.personal_phone"
            />
        </x-form-group>

        <x-form-group>
            <x-input
                label="Nombre encargado(opcional)"
                icon="o-users"
                placeholder="nombre de encargado"
                wire:model="contactForm.tutor_name"
                error-field="contactForm.tutor_name"
            />

            <x-input
                label="Parentesco con encargado(opcional)"
                icon="o-users"
                placeholder="relación de parentesco"
                wire:model="contactForm.tutor_relationship"
                error-field="contactForm.tutor_relationship"
            />
        </x-form-group>
        <x-input
            label="Correo electrónico(opcional)"
            icon="o-envelope"
            placeholder="dirección de correo"
            wire:model="contactForm.email"
            error-field="contactForm.email"
        />

        <x-button
            label="Actualizar contacto"
            icon="o-check"
            class="btn-primary"
            type="submit"
        />
    </x-form>
</x-form-container>
