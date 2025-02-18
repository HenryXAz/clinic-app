@php
    $medications_headers = [
        [ 'key' => 'trade_name', 'label' => 'Nombre comercial' ],
        ['key' => 'active_ingredient', 'label' => 'Principio Activo'],
        ['key' => 'dosage_mg', 'label' => 'Dosis mg'],
        ['key' => 'frequency', 'label' => 'Frec.'],
    ];

@endphp

<div>
    <div class="flex items-center gap-2">
        <x-button class="btn-sm" icon="o-arrow-small-left" link="{{route('consultations.index', $patient)}}"/>
        <h1>Administrar Ingreso</h1>
    </div>

{{--    <div class="flex mb-5 mt-4 justify-end">--}}
{{--        <x-button--}}
{{--            label="Eliminar este ingreso"--}}
{{--            icon="o-trash"--}}
{{--            class="btn-error"--}}
{{--        />--}}
{{--    </div>--}}

    <x-custom-card>
        <x-datepicker  label="Fecha de ingreso" icon="o-calendar" wire:model="consultation_form.date"
                       :config="[
                'altFormat' => 'd-m-Y H:i',
                'enableTime' => true,
            ]"
        />

        <x-form-container class="flex-1 w-full max-w-3xl">
            <x-form>
                <x-input label="Motivo de Ingreso" icon="o-user" wire:model="consultation_form.reason" />
                <x-textarea label="Principio y Evolución del padecimiento actual" placeholder="descripción"
                            wire:model="consultation_form.beginning_and_evolution_of_current_condition"
                />

                <x-icon name="o-user" label="Interrogatorio por Aparatos y Sistemas"/>

                <x-textarea label="Respiratorio/Cardiovascular (opcional)" placeholder="descripción"
                            wire:model="consultation_form.respiratory_or_cardiovascular"
                />
                <x-textarea label="Digestivo (opcional)" placeholder="descripción"
                            wire:model="consultation_form.digestive"
                />
                <x-textarea label="Endocrino (opcional)" placeholder="descripción"
                            wire:model="consultation_form.endocrine"
                />
                <x-textarea label="Musculo-Esquelético (opcional)" placeholder="descripción"
                            wire:model="consultation_form.muscle_skeletal"
                />
                <x-textarea label="Genito-Urinario (opcional)" placeholder="descripción"
                            wire:model="consultation_form.genitourinary"
                />
                <x-textarea label="Hematopoyético-Linfático (opcional)" placeholder="descripción"
                            wire:model="consultation_form.hematopoietic_lymphatic"
                />
                <x-textarea label="Piel y Anexo (opcional)" placeholder="descripción"
                            wire:model="consultation_form.skin_and_appendages"
                />
                <x-textarea label="Neurológico y Psiquiátrico (opcional)" placeholder="descripción"
                            wire:model="consultation_form.neurological_psychiatric"
                />

                <x-textarea label="Estudios de Imagen / Exámenes previos a su ingreso (opcional)"
                            wire:model="consultation_form.previous_admission_laboratory_exams"
                />

                <x-icon name="o-user" label="Análisis, Integración y Terapéutica" />

                <x-textarea label="Probables Diagnósticos (opcional)" placeholder="descripción"
                            wire:model="consultation_form.possible_diagnoses"
                />
                <x-textarea label="Plan de Estudio (opcional)" placeholder="descripción"
                            wire:model="consultation_form.study_plan"
                />
                <x-textarea label="Terapéutica Inicial (opcional)" placeholder="descripción"
                            wire:model="consultation_form.initial_therapeutic"
                />
                <x-textarea label="Condición (opcional)" placeholder="descripción"
                            wire:model="consultation_form.condition"
                />
                <x-textarea label="Pronóstico (opcional)" placeholder="descripción"
                            wire:model="consultation_form.prognosis"
                />
            </x-form>
        </x-form-container>


        @if(!$consultation->has_been_completed)

            <div class="flex gap-2 mt-5">
{{--                <x-button--}}
{{--                    label="Completar"--}}
{{--                    class="btn-success"--}}
{{--                    icon="o-check"--}}
{{--                    @click="$wire.confirm_completion_modal=true"--}}
{{--                />--}}

                <x-button
                    label="Guardar cambios"
                    class="btn-primary"
                    icon="o-check"
                    wire:click="save_changes"
                />

                <x-button
                    label="Cancelar"
                    icon="o-x-mark"
                    class="btn-error"
                    @click="$wire.cancel_modal=true"
                />
            </div>
            @endif
    </x-custom-card>


    <x-icon name="o-user" label="Medicamentos actuales" class="font-bold mt-10 mb-5" />

    <x-custom-card>
        <x-button
            label="Agregar medicamento"
            icon="o-plus"
            class="btn-outline"
            wire:click="open_and_reset_medication_form"
        />
    </x-custom-card>

    <x-table
        :headers="$medications_headers"
        :rows="$medications"
        with-pagination
    >
        <x-slot:empty>

            <div class="flex items-center gap-2 flex-col">
                <x-icon name="o-cube" label="Esta consulta no tiene medicamentos"/>
            </div>
        </x-slot:empty>

        @scope('actions', $medication)
        <div class="flex justify-center gap-2 items-center p-2">
            <x-button label="Editar" icon="o-pencil" class=" btn-warning"
                      wire:click="open_and_fill_medication_form({{$medication->id}})"
            />
            <x-button label="Elminar" icon="o-trash" class=" btn-error"
                      wire:click="open_medication_delete_form({{$medication->id}})"
            />
        </div>
        @endscope
    </x-table>


    <x-modal wire:model="open_cancel_modal" class="backdrop-blur">
        <div class="mb-5">¿Está seguro que desea cancelar el registro? </div>
        <div class="flex justify-center gap-2">
            <x-button label="No" @click="$wire.open_cancel_modal = false" class="btn-primary" />
            <x-button label="Sí" wire:click="cancel" class="btn-error"/>
        </div>
    </x-modal>

        <h2 class="border-b border-gray-600 mt-10 mb-4">
            Observaciones y/o Comentarios Finales
        </h2>

        @if(!$consultation->has_been_completed)
        <x-custom-card class="my-10">
            <div class="flex justify-end">
                <x-button
                    label="Agregar"
                    icon="s-plus-circle"
                    class="btn-primary"
                    wire:click="open_and_reset_detail_form"
{{--                    @click="$wire.modal_detail=true"--}}
                />
            </div>
        </x-custom-card>
       @endif

        @forelse($details as $detail)
        <x-custom-card class="mb-5">
            <x-form-container>
                <div class="dark:bg-base-300 rounded-md bg-base-200 border border-gray-200 dark:border-none shadow-md dark:shadow-none p-2 max-w-screen-sm mx-auto text-justify">
                    {{$detail->description}}
                </div>
                <div class="flex justify-end mt-5 gap-2">
                    <x-button
                        label="Editar"
                        icon="o-pencil"
                        class="btn-warning"
                        wire:click="open_and_fill_detail_form({{$detail->id}})"
                    />

                    <x-button
                        label="Eliminar"
                        icon="o-trash"
                        class="btn-error"
                        wire:click="open_detail_delete_form({{$detail->id}})"
                    />
                </div>
            </x-form-container>


        </x-custom-card>

        @empty

        <div class="flex items-center gap-2 flex-col">
            <x-icon name="o-cube" label="Esta consulta no tiene detalles"/>
        </div>
        @endforelse

        <x-modal wire:model="modal_detail" class="backdrop-blur">
                        <x-form-container class="m-2" >
                            <x-form wire:submit="add_new_detail">
                                <x-icon name="o-pencil" label="Descripción" rows="3" />
                                <x-textarea placeholder="Agregue la descripción" wire:model="detail_form.description"
                                    field-errors="detail_form.description"
                                />

                                <div class="flex justify-center gap-2">
                                    <x-button label="Cancelar" @click="$wire.modal_detail=false" class="btn-error" type="button" />
                                    <x-button label="Agregar"
                                              type="submit"
                                              class="btn-outline"/>
                                </div>
                            </x-form>
                        </x-form-container>
        </x-modal>

        <x-modal wire:model="confirm_completion_modal" class="backdrop-blur">
            <div class="mb-5">¿Está seguro que desea finalizar esta consulta? </div>
            <div class="flex justify-center gap-2">
                <x-button label="No" @click="$wire.confirm_completion_modal=false" class="btn-error" />
                <x-button label="Sí" wire:click="save_and_archive" class="btn-outline"/>
            </div>
        </x-modal>


        <x-modal wire:model="cancel_modal" class="backdrop-blur">
            <div class="mb-5">¿Está seguro que desea cancelar la operación? </div>
            <div class="flex justify-center gap-2">
                <x-button label="No" @click="$wire.cancel_modal=false" class="btn-primary" />
                <x-button label="Sí"
                          wire:click="cancel"
                          class="btn-error"/>
            </div>
        </x-modal>

    <x-modal wire:model="medication_modal" class="backdrop-blur" box-class="max-w-2xl">
        <x-form-container>
            <x-form wire:submit="update_or_create_medicine">
                <x-input
                    label="Nombre Comercial"
                    icon="o-pencil-square"
                    wire:model="medication_form.trade_name"
                />

                <x-input
                    label="Principio Activo"
                    icon="o-pencil-square"
                    wire:model="medication_form.active_ingredient"
                />

                <x-input
                    label="Presentación en mg"
                    icon="o-pencil-square"
                    wire:model="medication_form.presentation_mg"
                />

                <x-input
                    label="Dosis en mg"
                    icon="o-pencil-square"
                    wire:model="medication_form.dosage_mg"
                />

                <x-input
                    label="Vía"
                    icon="o-pencil-square"
                    wire:model="medication_form.via"
                />

                <x-input
                    label="Frecuencia"
                    icon="o-pencil-square"
                    wire:model="medication_form.frequency"
                />

                <x-datepicker
                    :config="['enableTime' => true, 'altFormat' => 'd-m-Y H:i']"
                    label="Fecha de Última Administración"
                    icon="o-calendar"
                    wire:model="medication_form.last_administration_date"
                />

                <x-button
                    label="{{$medication_form->id ? 'Actualizar' : 'Registrar'}}"
                    icon="o-check"
                    class="btn-primary"
{{--                    wire:click="update_or_create_medicine"--}}
                    type="submit"
                />
            </x-form>
        </x-form-container>
    </x-modal>

    <x-modal wire:model="medication_delete_modal" class="backdrop-blur">
        <div class="flex justify-center">
            <x-icon name="o-exclamation-triangle" class="text-red-500 w-16 md:w-36"/>
        </div>
        <div class="mb-5">¿Está seguro que desea eliminar el medicamento?</div>
        <div class="flex justify-center gap-2">
            <x-button label="No" @click="$wire.medication_delete_modal=false" class="btn-primary" />
            <x-button label="Sí"
                      wire:click="delete_medication"
                      class="btn-error"/>
        </div>
    </x-modal>

    <x-modal wire:model="detail_delete_modal" class="backdrop-blur">
        <div class="flex justify-center">
            <x-icon name="o-exclamation-triangle" class="text-red-500 w-16 md:w-36"/>
        </div>
        <div class="mb-5">¿Está seguro que desea eliminar este comentario?</div>
        <div class="flex justify-center gap-2">
            <x-button label="No" @click="$wire.detail_delete_modal=false" class="btn-primary" />
            <x-button label="Sí"
                      wire:click="delete_detail"
                      class="btn-error"/>
        </div>
    </x-modal>
</div>
