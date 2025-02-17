<x-form-container>
    <x-form wire:submit="update_personal_history">
        <x-icon name="o-user" label="Antecedentes Personales Patológicos" class="font-bold" />
        <x-input label="Enfermedades de la infancia" icon="o-user" wire:model="personalHistoryForm.childhood_diseases"/>
        <x-input label="Secuelas" icon="o-user" wire:model="personalHistoryForm.diseases_sequel"/>

        <x-icon name="o-user" label="Hospitalizaciones previas" />
        <x-toggle label="No/Si" wire:model="personalHistoryForm.previous_hospitalizations" />
        <x-textarea label="Especificar" placeholder="Agreguar especificación" wire:model="personalHistoryForm.hospitalizacions_description"/>

        <x-icon name="o-user" label="Antecedentes quirúrgicos" class="mt-5" />
        <x-toggle label="No/Sí" wire:model="personalHistoryForm.surgical_history" />
        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.surgical_history_description"/>

        <x-icon name="o-user" label="Transfusiones previas" class="mt-5" />
        <x-toggle label="No/Sí" wire:model="personalHistoryForm.previous_transfusions" />
        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.previous_transfusions_description" />

        <x-icon name="o-user" label="Fracturas" class="mt-5" />
        <x-toggle label="No/Sí" wire:model="personalHistoryForm.fractures" />
        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.fractures_description" />


        <x-icon name="o-user" label="Traumatismo" class="mt-5" />
        <x-toggle label="No/Sí" wire:model="personalHistoryForm.traumas"/>
        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.traumas_description"/>

        <x-icon name="o-user" label="Otra enfermedad" class="mt-5" />
        <x-toggle label="No/Sí" wire:model="personalHistoryForm.other_disiases" />
        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.other_disiases_description"/>

        <x-button
            label="Actualizar"
            icon="o-check"
            type="submit"
            class="btn-primary"
        />
    </x-form>
</x-form-container>
