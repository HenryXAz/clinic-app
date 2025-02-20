<x-form-container>
    <x-form wire:submit="update_no_pathology_background">
        <x-icon name="o-user" label="Antecedentes No Patológicos" class="font-bold" />


        <x-icon name="o-users" label="Tabaquismo" class="my-5 border-b border-gray-300 dark:border-gray-600" />

        <x-form-group>
            <x-toggle label="No/Sí" wire:model="noPathologyBackgroundForm.smoking" />
            <x-input type="number" label="¿Cuántos por día?" wire:model="noPathologyBackgroundForm.how_many_smoke_per_day" />
        </x-form-group>

        <x-input type="number" label="Años de consumo o exposición" wire:model="noPathologyBackgroundForm.years_of_smoking_or_exposition" />

        <x-form-group>
            <x-toggle label="Exfumador" wire:model="noPathologyBackgroundForm.ex_smoker" />
            <x-toggle label="fumador pasivo" wire:model="noPathologyBackgroundForm.passive_smoker"/>
        </x-form-group>

        <x-icon name="o-users" label="Alcoholismo" class="my-5 border-b border-gray-300 dark:border-gray-600" />
        <x-form-group>
            <x-toggle label="No/Sí" wire:model="noPathologyBackgroundForm.alcoholic" />
            <x-input type="number" label="ML por semana" wire:model="noPathologyBackgroundForm.ml_per_week"  />
        </x-form-group>


        <x-form-group>
            <x-input type="number" label="Años de consumo" wire:model="noPathologyBackgroundForm.alcohol_years_of_consumption" />
            <x-toggle label="Exalcoholico y/o Ocasional" wire:model="noPathologyBackgroundForm.ex_alcoholic_or_ocasional"  />
        </x-form-group>

        <x-icon name="o-users" label="Alergías" class="my-5 border-b border-gray-300 dark:border-gray-600" />

        <x-form-group>
            <x-toggle label="No/Sí" wire:model="noPathologyBackgroundForm.allergies"/>
            <x-input label="Especificar" wire:model="noPathologyBackgroundForm.allergies_description" />
        </x-form-group>

        <x-icon name="o-users" label="Datos sanguíneos" class="my-5 border-b border-gray-300 dark:border-gray-600" />
        <x-input label="Tipo Sanguíneo" wire:model="noPathologyBackgroundForm.blood_type" />

        <x-icon name="o-users" label="Otros datos" class="my-5 border-b border-gray-300 dark:border-gray-600" />

        <x-toggle label="Vivienda con servicios básicos" wire:model="noPathologyBackgroundForm.basic_home_services"/>

        <x-form-group>
            <x-toggle label="Farmacodependencia" wire:model="noPathologyBackgroundForm.drug_dependency"/>
            <x-input type="number" label="Años de consumo" wire:model="noPathologyBackgroundForm.drug_dependency_years" />
        </x-form-group>

        <x-input label="Descripción Farmacodepencencia" icon="o-user" wire:model="noPathologyBackgroundForm.drug_dependency_description" />

        <x-textarea label="Otros datos" rows="5"  wire:model="noPathologyBackgroundForm.others_no_pathology_background" />

        <x-button
            label="Actualizar"
            icon="o-check"
            type="submit"
            class="btn-primary"
        />
    </x-form>
</x-form-container>
