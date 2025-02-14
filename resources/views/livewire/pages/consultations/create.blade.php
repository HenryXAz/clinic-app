<div>
    <div class="flex items-center gap-2">
        <x-button class="btn-sm" icon="o-arrow-small-left" link="{{route('consultations.index', $patient)}}"/>
        <h1>Nueva consulta</h1>
    </div>

    <x-custom-card>
        <x-datepicker  label="Fecha de consulta" icon="o-calendar" wire:model="form.start_date"
            :config="[
                'altFormat' => 'd-m-Y H:i',
                'enableTime' => true,
            ]"
                       error-field="form.start_date"
        />

        <div class="flex gap-2 w-full flex-col md:flex-row">

            <x-form-container class="flex-1 w-full">
                <x-form>
                    <x-icon name="o-plus" label="Diagnóstico" />
                    <x-textarea rows="5" wire:model="form.diagnosis" error-field="form.diagnosis" />
                </x-form>
            </x-form-container>

            <x-form-container class="flex-1 w-full">
                <x-form>
                    <x-icon name="s-heart" label="Tratamiento" wire:model="form.treatment" error-field="form.treatment" />
                    <x-textarea  rows="5" />
                </x-form>
            </x-form-container>
        </div>

        <div class="flex gap-2 mt-5">
            <x-button
                label="Atender"
                class="btn-primary"
                icon="o-check"
                wire:click="serve"
            />

            <x-button
                label="Agendar"
                icon="o-newspaper"
                class="btn-outline"
                wire:click="schedule"
            />

            <x-button
                label="Cancelar"
                icon="o-x-mark"
                class="btn-error"
                @click="$wire.open_cancel_modal=true"
            />
        </div>
    </x-custom-card>

    <x-modal wire:model="open_cancel_modal" class="backdrop-blur">
        <div class="mb-5">¿Está seguro que desea cancelar el registro? </div>
        <div class="flex justify-center gap-2">
            <x-button label="No" @click="$wire.open_cancel_modal = false" class="btn-primary" />
            <x-button label="Sí" wire:click="cancel" class="btn-error"/>
        </div>
    </x-modal>
</div>
