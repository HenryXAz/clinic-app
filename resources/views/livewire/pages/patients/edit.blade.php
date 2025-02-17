<div>
    <x-collapse wire:model="show_personal_info"  class="bg-base-200">
        <x-slot:heading>Información Personal</x-slot:heading>
        <x-slot:content>
            @include('livewire.pages.patients.personal-info-form')
        </x-slot:content>
    </x-collapse>

    <x-collapse collapse-plus-minor wire:model="show_hereditary_background"  class="bg-base-200 mt-5">
        <x-slot:heading>Antecedentes Heredofamiliares</x-slot:heading>
        <x-slot:content>
            @include('livewire.pages.patients.hereditary-background-form')
        </x-slot:content>
    </x-collapse>

    <x-collapse collapse-plus-minor wire:model="show_no_pathology_background"  class="bg-base-200 mt-5">
        <x-slot:heading>Antecedentes no Patológicos</x-slot:heading>
        <x-slot:content>
            @include('livewire.pages.patients.no-pathology-background-form')
        </x-slot:content>
    </x-collapse>


    <x-collapse collapse-plus-minor wire:model="show_obstetrics_form"  class="bg-base-200 mt-5">
        <x-slot:heading>Antecedentes Ginecoobstétricos</x-slot:heading>
        <x-slot:content>
            @include('livewire.pages.patients.obstetrics-form')
        </x-slot:content>
    </x-collapse>

    <x-collapse collapse-plus-minor wire:model="show_personal_history_background"  class="bg-base-200 mt-5">
        <x-slot:heading>Antecedentes Personales Patológicos</x-slot:heading>
        <x-slot:content>
            @include('livewire.pages.patients.personal-history-form')
        </x-slot:content>
    </x-collapse>


    <x-collapse collapse-plus-minor wire:model="show_contact_form"  class="bg-base-200 mt-5">
        <x-slot:heading>Datos de Contacto</x-slot:heading>
        <x-slot:content>
            @include('livewire.pages.patients.contact-form')
        </x-slot:content>
    </x-collapse>

    {{-- danger zone --}}

    <h3 class="text-red-500 font-bold border-b border-red-500 mt-10 max-w-lg mx-auto">
        Acciones Sensibles
    </h3>

    <x-form-container>
        <x-button
            label="Elminiar paciente"
            icon="o-trash"
            class="btn-error"
            @click="$wire.delete_confirmation_modal=true"
        />
    </x-form-container>

    <x-modal wire:model="delete_confirmation_modal" class="backdrop-blur">
        <div class="flex justify-center">
            <x-icon name="s-exclamation-triangle" label="" class="md:w-32 w-16  text-red-600 mx-auto" />
        </div>
        <div class="mb-5 ">¿Está seguro que desea eliminar este paciente? <br>
            Tenga en cuenta que no podrá revertir el proceso
        </div>
        <div class="flex justify-center gap-2">
            <x-button label="No" @click="$wire.delete_confirmation_modal = false" class="btn-outline" />
            <x-button label="Sí" wire:click="delete" class="btn-error"/>
        </div>
    </x-modal>
</div>
