@php
    $headers = [
    ['key' => 'date', 'label' => 'Fecha',
        'format' => fn($row, $field) => $field->format('d-m-Y h:i A'),
    ],
    ['key' => 'has_been_scheduled', 'label' => 'Pendiente',
        'format' => fn($row, $field) => ($field) ? 'Sí' : 'No',
    ],
    [
        'key' => 'reason_abbreviation', 'label' => 'Motivo Ingreso',
    ],
    ];
@endphp
<div>
    <x-custom-card class="bg-base-200 shadow-md dark:shadow-none p-4 rounded-md">
        <div class="flex flex-col md:flex-row justify-center">
            <div class="flex-1 flex items-center flex-col">
                <x-icon
                    name="o-user-circle"
                    class="w-48"
                />

                <h2>{{$patient->full_name}}</h2>
                <p>
                    {{$patient->birth_date->diff(\Carbon\Carbon::now())->format('%y años')}}
                </p>

                <p class="mt-5 font-bold">
                    {{$patient->town->name}}, {{$patient->department->name}}
                </p>
            </div>

            <div class="flex-1 flex flex-col justify-center mt-10 md:mt-0">
                <p class="mb-3">
                    DPI: <span class="font-bold">{{$patient->dpi}}</span>
                </p>

                <p class="mb-3">
                    Sexo: <span class="font-bold">{{$patient->gender}}</span>
                </p>

                <p class="mb-3">
                    Estado civil: <span class="font-bold">{{$patient->marital_status}}</span>
                </p>

                <p class="mb-3">
                    Escolaridad: <span class="font-bold">{{$patient->academic_level}}</span>
                </p>

                <p class="mb-3">
                    Etnia: <span class="font-bold">{{$patient->ethnicity}}</span>
                </p>

                <p class="mb-3">
                    Profesión: <span class="font-bold">{{$patient->profession}}</span>
                </p>
            </div>


            <div class="flex-1 flex flex-col justify-center  ">
                <p class="mb-3">
                    Teléfono móvil: <span class="font-bold">{{$patient->personal_phone}}</span>
                </p>

                <p class="mb-3">
                    Teléfono fijo: <span class="font-bold">{{($patient->phone ?? 'No registrado')}}</span>
                </p>

                <p class="mb-3">
                    Correo: <span class="font-bold">{{($patient->email ?? 'No registrado')}}</span>
                </p>

                <p class="mb-3">
                    Tutor: <span class="font-bold">{{($patient->tutor_name ?? 'No registrado')}}</span>
                </p>

                <p class="mb-3">
                    Parentesco tutor: <span class="font-bold">{{($patient->tutor_relationship ?? 'No registrado')}}</span>
                </p>


                <x-button label="Revisar ficha clínica" class="btn-primary mt-5"
                    link="{{route('consultations.clinic_card.index', ['id' => $patient->id])}}"
                />
            </div>

        </div>

    </x-custom-card>

    <div class="flex justify-end my-5" >
        <x-button class="btn-outline" label="Nuevo Ingreso" link="{{route('consultations.create', [
            'id' => $patient->id,
        ])}}"/>
    </div>

    <x-custom-card class="mb-10">
        <x-datepicker
            label="Filtrar por fecha"
            icon="o-calendar"
            wire:model.live.debounce.500ms="search"
            :config="[
                'altFormat' => 'Y-m-d',
            ]"
        />
    </x-custom-card>

    <x-table
        class="my-10"
        :headers="$headers"
        :rows="$consultations"
    >
        <x-slot:empty>
            <div class="flex items-center gap-2 flex-col">
                <x-icon name="o-cube" label="No se han registrado ingresos para este paciente aún"/>
                <x-button class="bg-transparent" icon="o-plus" label="Agregar" link="{{route('consultations.create', $patient->id)}}"/>
            </div>
        </x-slot:empty>

        @scope('actions', $consultation, $patient)
        <div class="flex justify-center gap-2 items-center p-2">
            <x-button label="Revisar" icon="o-document" class=" btn-primary"
                      link="{{route('consultations.edit', [
                            'id' => $patient->id,
                            'consultation_id' => $consultation->id
                      ])}}"
            />
        </div>
        @endscope
    </x-table>

</div>
