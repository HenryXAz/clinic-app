<div>
    <div class="flex items-center gap-2">
        <x-button class="btn-sm" icon="o-arrow-small-left" link="{{route('consultations.index', $patient)}}"/>
        <h1>Administrar consulta</h1>
    </div>

    <x-custom-card>
        <x-datepicker  label="Fecha de consulta" icon="o-calendar" wire:model="consultation_form.start_date"
                       :config="[
                'altFormat' => 'd-m-Y H:i',
                'enableTime' => true,
            ]"
                       error-field="consultation_form.start_date"
        />

        <div class="flex gap-2 w-full flex-col md:flex-row">

            <x-form-container class="flex-1 w-full">
                <x-form>
                    <x-icon name="o-plus" label="Diagnóstico" />
                    <x-textarea rows="5" wire:model="consultation_form.diagnosis" error-field="consultation_form.diagnosis" />
                </x-form>
            </x-form-container>

            <x-form-container class="flex-1 w-full">
                <x-form>
                    <x-icon name="s-heart" label="Tratamiento" />
                    <x-textarea  rows="5" wire:model="consultation_form.treatment" error-field="consultation_form.treatment"  />
                </x-form>
            </x-form-container>
        </div>
        @if(!$consultation->has_been_completed)

            <div class="flex gap-2 mt-5">
                <x-button
                    label="Completar"
                    class="btn-success"
                    icon="o-check"
                    @click="$wire.confirm_completion_modal=true"
                />

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

    <x-modal wire:model="open_cancel_modal" class="backdrop-blur">
        <div class="mb-5">¿Está seguro que desea cancelar el registro? </div>
        <div class="flex justify-center gap-2">
            <x-button label="No" @click="$wire.open_cancel_modal = false" class="btn-primary" />
            <x-button label="Sí" wire:click="cancel" class="btn-error"/>
        </div>
    </x-modal>

        <h2 class="border-b border-gray-600 mt-10 mb-4">
            Detalles de consulta (síntomas, notas, observaciones)
        </h2>

        @if(!$consultation->has_been_completed)
        <x-custom-card class="my-10">
            <div class="flex justify-end">
                <x-button
                    label="Agregar"
                    icon="s-plus-circle"
                    class="btn-primary"
                    @click="$wire.modal_detail=true"
                />
            </div>
        </x-custom-card>
       @endif

        @forelse($details as $detail)
        <x-custom-card class="mb-5">
            <div class="dark:bg-base-300 rounded-md bg-base-200 border border-gray-200 dark:border-none shadow-md dark:shadow-none p-2 max-w-screen-sm mx-auto">
                {{$detail->description}}
            </div>
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
</div>
