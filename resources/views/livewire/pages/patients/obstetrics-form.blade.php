@if($infoForm->gender == \App\Enums\Patients\Gender::F)
    <x-form-container>
        <x-icon name="o-user" label="Antecedentes Ginecoobstétricos" class="font-bold"/>
        <x-form wire:submit="update_obstetric_info">
            <x-input type="number" icon="o-users" label="Menarca edad" wire:model="obstetricsForm.menarche_year" />

            <x-form-group>
                <x-toggle label="Ciclos Regulares" wire:model="obstetricsForm.regular_cycles" />
                <x-input label="Ritmo __x__" icon="o-user" wire:model="obstetricsForm.menstrual_rhythm"/>
            </x-form-group>

            <x-datepicker
                icon="o-calendar"
                :config="['altFormat' => 'd-m-Y']"
                label="Fecha Última Mestruación"
                wire:model="obstetricsForm.last_menstruation_date"
            />

            <x-form-group>
                <x-toggle label="Polimenorrea" wire:model="obstetricsForm.polymenorrhea" />
                <x-toggle label="Hipermenorrea" wire:model="obstetricsForm.hypermenorrhea"/>
                <x-toggle label="Dismenorrea" wire:model="obstetricsForm.dysmenorrhea"/>
            </x-form-group>

            <x-toggle label="Incapacitante" wire:model="obstetricsForm.incapacitante" />

            <x-form-group>
                <x-input type="number" label="IVSA años" icon="o-user" wire:model="obstetricsForm.ivsa_year" />
                <x-input type="number" label="No. Parejas sexuales" icon="o-user" wire:model="obstetricsForm.sexual_partners_number"/>
            </x-form-group>

            <x-form-group>
                <x-input label="G" icon="o-user" wire:model="obstetricsForm.g" />
                <x-input label="P" icon="o-user" wire:model="obstetricsForm.p"/>
            </x-form-group>

            <x-form-group>
                <x-input label="A" icon="o-user" wire:model="obstetricsForm.a" />
                <x-input label="C" icon="o-user" wire:model="obstetricsForm.c"/>
            </x-form-group>

            <x-datepicker label="Fecha Última Citología" icon="o-calendar" wire:model="obstetricsForm.last_cytology_date"/>

            <x-textarea label="Resultado" rows="5" placeholder="Resultado de la citología" wire:model="obstetricsForm.citology_result"/>

            <x-input label="Planificación actual" icon="o-user" wire:model="obstetricsForm.current_contraceptive_method"/>

            <x-button
                label="Actualizar"
                x-icon="o-check"
                class="btn-primary"
                type="submit"
            />
        </x-form>
    </x-form-container>

@endif
