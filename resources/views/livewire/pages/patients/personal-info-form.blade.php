<x-form-container>
    <x-icon name="o-user" label="Información Personal" class="font-bold" />
    <x-form wire:submit="update_personal_info">
        <x-form-group>
            <x-input label="Nombres" icon="o-bookmark" placeholder="nombres completos"
                     wire:model="infoForm.names"
                     error-field="infoForm.names"
            />
            <x-input label="Apellidos" icon="o-bookmark" placeholder="apellidos"
                     wire:model="infoForm.last_names"
                     error-field="infoForm.last_names"
            />
        </x-form-group>
        <x-form-group>
            <x-input label="Comunidad(opcional)" icon="o-home" placeholder="ingrese comunidad"
                     wire:model="infoForm.community"
                     error-field="infoForm.community"
            />
            <x-input label="Sector(opcional)" icon="o-home" placeholder="ingrese sector"
                     wire:model="infoForm.sector"
                     error-field="infoForm.sector"
            />
        </x-form-group>

        <x-input label="Religión(opcional)" icon="o-users" wire:model="infoForm.religion" />

        <x-datepicker
            label="Fecha de nacimiento" wire:model.live="infoForm.birth_date" icon="o-calendar"
            :config="['altFormat' => 'd-m-Y']"
            value="{{$infoForm?->birth_date?->format('d-m-Y')}}"
        />

        <x-input label="DPI" icon="o-identification" placeholder="ingrese dpi"
                 wire:model="infoForm.dpi"
                 error-field="infoForm.dpi"
        />
        <x-form-group>
            <x-radio label="Sexo"
                     option-label="value"
                     option-value="value"
                     class="text-xs md:text-base"
                     :options="\App\Enums\Patients\Gender::cases()"
                     wire:model.live="infoForm.gender"
                     error-field="infoForm.gender"
            />

            <x-select
                label="Etnia"
                icon="o-users"
                option-label="value"
                option-value="value"
                :options="App\Enums\Patients\Ethnicity::cases()"
                wire:model="infoForm.ethnicity"
                error-field="infoForm.ethnicity"
            />
        </x-form-group>

        <x-form-group>
            <x-select
                label="Escolaridad"
                icon="o-academic-cap"
                option-label="value"
                option-value="value"
                :options="App\Enums\Patients\AcademicLevel::cases()"
                wire:model="infoForm.academic_level"
                error-field="infoForm.academic_level"
            />

            <x-select
                label="Estado civil"
                icon="o-users"
                option-label="value"
                option-value="value"
                :options="App\Enums\Patients\MaritalStatus::cases()"
                wire:model="infoForm.marital_status"
                error-field="infoForm.marital_status"
            />
        </x-form-group>

        <x-form-group>
            <x-toggle label="¿Está trabajando?" wire:model="infoForm.is_working"
                      error-field="infoForm.is_working"/>
            <x-toggle label="¿Es inmigrante?" wire:model="infoForm.is_immigrant"
                      error-field="infoForm.is_immigrant"/>
        </x-form-group>
        <x-input
            label="Profesión"
            icon="m-wallet"
            placeholder="ingrese profesión"
            wire:model="infoForm.profession"
            error-field="infoForm.profession"
        />

        <x-select
            label="Departamento de nacimiento"
            placeholder="seleccione departamento"
            icon="o-map-pin"
            option-value="id"
            option-label="name"
            :options="$departments"
            wire:model="infoForm.birth_department"
            error-field="infoForm.birth_department"
        />

        <x-form-group>
            <x-select
                placeholder="seleccionar departamento"
                label="Departamento"
                icon="o-map-pin"
                option-label="name"
                option-value="id"
                :options="$departments"
                wire:model.live="infoForm.department_id"
                error-field="infoForm.department_id"
            />

            @if ($infoForm->department_id != null || $infoForm->department_id != 0)
                <x-select
                    label="Municipio"
                    option-label="name"
                    option-value="id"
                    :options="$towns"
                    wire:model="infoForm.town_department_id"
                    errorf-field="infoForm.town_department_id"
                />
            @endif
        </x-form-group>

        <x-button label="Actualizar" icon="o-check" class="btn-primary" type="submit"/>
    </x-form>
</x-form-container>
