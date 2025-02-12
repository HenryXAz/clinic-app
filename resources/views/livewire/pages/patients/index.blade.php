@php
    $headers = [
        ['key' => 'full_name', 'label' => 'Nombre'],
        ['key' => 'birth_date', 'label' => 'Edad',
            'format' => fn($row, $field) => $field->diff(\Carbon\Carbon::now())->format('%y años'),
        ],
        ['key' => 'gender', 'label' => 'Sexo'],
        ['key' => 'personal_phone', 'label' => 'Teléfono móvil'],
    ];

@endphp

<div>
    <h1>Pacientes</h1>

    <div class="flex justify-end">
        <x-button class="btn-outline" label="nuevo paciente" link="{{route('patients.create')}}"/>
    </div>

    {{$search}}

    <x-custom-card class="mb-10">
        <x-input label="Buscar" icon="o-magnifying-glass"
                 wire:model.live.debounce.500ms="search"
        />
    </x-custom-card>


    <x-table
        :headers="$headers"
        :rows="$patients"
        with-pagination
    >
        <x-slot:empty>

            <div class="flex items-center gap-2 flex-col">
                <x-icon name="o-cube" label="No se encontraron pacientes"/>
                <x-button class="bg-transparent" icon="o-plus" label="Agregar" link="{{route('patients.create')}}"/>
            </div>
        </x-slot:empty>

        @scope('actions', $patient)
        <div class="flex justify-center gap-2 items-center p-2">
            <x-button label="Editar" icon="o-pencil" class=" btn-warning"/>
            <x-button label="Historial" icon="o-clock" class=" btn-primary"/>
        </div>
        @endscope
    </x-table>

</div>
