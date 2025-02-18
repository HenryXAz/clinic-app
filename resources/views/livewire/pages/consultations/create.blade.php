<div>
    <div class="flex items-center gap-2">
        <x-button class="btn-sm" icon="o-arrow-small-left" link="{{route('consultations.index', $patient)}}"/>
        <h1>Nuevo Ingreso</h1>
    </div>

    <x-custom-card>
        <x-datepicker  label="Fecha de ingreso" icon="o-calendar" wire:model="form.date"
            :config="[
                'altFormat' => 'd-m-Y H:i',
                'enableTime' => true,
            ]"
        />

        <div class="flex gap-2 w-full flex-col md:flex-row">

            <x-form-container class="flex-1 w-full max-w-3xl">
                <x-form>
                    <x-input label="Motivo de Ingreso" icon="o-user" wire:model="form.reason" />
                    <x-textarea label="Principio y Evolución del padecimiento actual" placeholder="descripción"
                        wire:model="form.beginning_and_evolution_of_current_condition"
                    />

                    <x-icon name="o-user" label="Interrogatorio por Aparatos y Sistemas"/>

                    <x-textarea label="Respiratorio/Cardiovascular (opcional)" placeholder="descripción"
                        wire:model="form.respiratory_or_cardiovascular"
                    />
                    <x-textarea label="Digestivo (opcional)" placeholder="descripción"
                        wire:model="form.digestive"
                    />
                    <x-textarea label="Endocrino (opcional)" placeholder="descripción"
                        wire:model="form.endocrine"
                    />
                    <x-textarea label="Musculo-Esquelético (opcional)" placeholder="descripción"
                        wire:model="form.muscle_skeletal"
                    />
                    <x-textarea label="Genito-Urinario (opcional)" placeholder="descripción"
                        wire:model="form.genitourinary"
                    />
                    <x-textarea label="Hematopoyético-Linfático (opcional)" placeholder="descripción"
                        wire:model="form.hematopoietic_lymphatic"
                    />
                    <x-textarea label="Piel y Anexo (opcional)" placeholder="descripción"
                        wire:model="form.skin_and_appendages"
                    />
                    <x-textarea label="Neurológico y Psiquiátrico (opcional)" placeholder="descripción"
                        wire:model="form.neurological_psychiatric"
                    />

                    <x-textarea label="Estudios de Imagen / Exámenes previos a su ingreso (opcional)"
                        wire:model="form.previous_admission_laboratory_exams"
                    />

                    <x-icon name="o-user" label="Análisis, Integración y Terapéutica" />

                    <x-textarea label="Probables Diagnósticos (opcional)" placeholder="descripción"
                        wire:model="form.possible_diagnoses"
                    />
                    <x-textarea label="Plan de Estudio (opcional)" placeholder="descripción"
                        wire:model="form.study_plan"
                    />
                    <x-textarea label="Terapéutica Inicial (opcional)" placeholder="descripción"
                        wire:model="form.initial_therapeutic"
                    />
                    <x-textarea label="Condición (opcional)" placeholder="descripción"
                        wire:model="form.condition"
                    />
                    <x-textarea label="Pronóstico (opcional)" placeholder="descripción"
                        wire:model="form.prognosis"
                    />
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
