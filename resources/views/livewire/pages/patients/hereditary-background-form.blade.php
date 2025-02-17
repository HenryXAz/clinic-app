<x-form-container>
    <x-form wire:submit="update_hereditary_background">
        <x-icon name="o-user" label="Antecedentes Heredofamiliares" class="font-bold" />
        <x-form-group>
            <x-input label="Diabetes ¿Quién?" icon="o-user" wire:model="hereditaryForm.diabetes" />
            <x-input label="Nefropatas ¿Quién?" icon="o-user" wire:model="hereditaryForm.nephropathy"/>
        </x-form-group>

        <x-form-group>
            <x-input label="Hipertensión Arterial ¿Quién?" icon="o-user" wire:model="hereditaryForm.high_blood_pressure" />
        </x-form-group>

        <x-form-group>
            <x-input label="Malformaciones"  icon="o-user" wire:model="hereditaryForm.malformations" />
            <x-input label="Tipo de malformación" icon="o-user" wire:model="hereditaryForm.malformations_type"/>
        </x-form-group>

        <x-form-group>
            <x-input label="Cáncer ¿Quién?" icon="o-user" wire:model="hereditaryForm.cancer"/>
            <x-input label="Tipo de cáncer" icon="o-user" wire:model="hereditaryForm.cancer_type"/>
        </x-form-group>

        <x-form-group>
            <x-input label="Cardiopatas ¿Quién?" icon="o-user" wire:model="hereditaryForm.heart_disease" />
        </x-form-group>

        <x-textarea rows="5" label="Otros" icon="o-user" wire:model="hereditaryForm.others_hereditary_background"/>

        <x-button
            label="Actualizar"
            icon="o-user"
            class="btn-primary"
            type="submit"
        />
    </x-form>
</x-form-container>
