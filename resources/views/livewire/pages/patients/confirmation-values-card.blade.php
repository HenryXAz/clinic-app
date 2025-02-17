<x-form-container class="max-w-7xl">
    <x-form wire:submit="save">
        <x-icon name="o-user" label="Datos personales" class="font-bold" />

        <div class="w-full flex gap-2 flex-col md:flex-row justify-between">
            <x-input label="Nombres" wire:model="infoForm.names" readonly
            />
            <x-input label="Apellidos" readonly wire:model="infoForm.last_names"
            />
        </div>

        <div class="w-full flex gap-2 flex-col md:flex-row justify-between">
            <x-input label="Comunidad(opcional)"  readonly wire:model="infoForm.community"
            />
            <x-input label="Sector(opcional)"  readonly wire:model="infoForm.sector"
            />
        </div>

        <x-datepicker
            label="Fecha de nacimiento"
            icon="o-calendar"
            :config="[
                'altFormat' => 'd-m-Y'
            ]"
            wire:model="infoForm.birth_date"
            readonly
        />

        <x-input label="DPI" readonly wire:model="infoForm.dpi"
        />
        <div
            class="w-full flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
            <x-input label="Sexo"  readonly wire:model="infoForm.gender"/>
            <x-input label="Etnia"  readonly wire:model="infoForm.ethnicity"/>
        </div>


        <div
            class="w-full flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
            <x-input label="Escolaridad"  readonly wire:model="infoForm.academic_level"/>
            <x-input label="Estado civil"  readonly wire:model="infoForm.marital_status"/>
        </div>


        <div
            class="w-full my-5 flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
            <x-toggle-confirmation label="¿Está trabajando?" :active="$infoForm?->is_working"/>
            <x-toggle-confirmation label="¿Es inmigrante?" :active="$infoForm->is_immigrant"/>
        </div>

        <x-input
            label="Profesión"
             readonly
            wire:model="infoForm.profession"
        />

        <x-input label="Departamento de nacimiento"
                 value="{{\App\Models\CountryDepartment::query()
                                 ->select('name')
                                 ->where('id', $infoForm->birth_department)
                                 ->first()->name}}"
                 readonly
        />

        <div
            class="w-full my-5 flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">

            <x-input label="Departamento"
                     value="{{\App\Models\CountryDepartment::query()
                                     ->select('name')->where('id', $infoForm->department_id)
                                     ->first()->name}}"
                     readonly
            />

            @if ($infoForm->department_id != null || $infoForm->department_id != 0)
                <x-input label="Departamento"
                         value="{{\App\Models\CountryTown::query()
                                         ->select('name')
                                         ->where('country_department_id', $infoForm->department_id)
                                         ->where('id', $infoForm->town_department_id)->first()->name}}"
                         readonly
                />
            @endif
        </div>

        {{-- Hereditary background H--}}
        <x-icon name="o-user" label="Antecedentes Heredofamiliares" class="font-bold"/>

        <x-form-group>
            <x-input label="Diabetes ¿Quién?" wire:model="hereditaryBackgroundForm.diabetes" readonly/>
            <x-input label="Nefropatas ¿Quién?" wire:model="hereditaryBackgroundForm.nephropathy" readonly/>
            <x-input label="Hipertensión Arterial ¿Quién?" wire:model="hereditaryBackgroundForm.high_blood_pressure" />
        </x-form-group>

        <x-form-group>
            <x-input label="Cardiopatas ¿Quién?" wire:model="hereditaryBackgroundForm.heart_disease" readonly />
            <x-input label="Cáncer ¿Quién?" wire:model="hereditaryBackgroundForm.cancer" readonly/>
            <x-input label="Tipo de cáncer" wire:model="hereditaryBackgroundForm.cancer_type" readonly />
        </x-form-group>

        <x-form-group>
            <x-input label="Malformaciones ¿Quién?" wire:model="hereditaryBackgroundForm.malformations" readonly />
            <x-input label="Tipo de malformaciones" wire:model="hereditaryBackgroundForm.malformations_type" readonly/>
            <x-input label="Otros" wire:model="hereditaryBackgroundForm.others_hereditary_background" readonly/>
        </x-form-group>

        {{-- no pathology background --}}
        <x-icon name="o-user" label="Antecedentes Personales no Patológicos" class="font-bold" />

        <x-form-group>
            <x-toggle-confirmation label="Fumador" :active="$noPathologyBackgroundForm->smoking" />
            <x-toggle-confirmation label="ExFumador" :active="$noPathologyBackgroundForm->ex_smoker" />
        </x-form-group>

        <x-form-group>
            <x-toggle-confirmation label="Fumador Pasivo" :active="$noPathologyBackgroundForm->passive_smoker" />
            <x-toggle-confirmation label="Alcoholico" :active="$noPathologyBackgroundForm->alcoholic"/>
        </x-form-group>

        <x-form-group>
            <x-toggle-confirmation label="ExAlcoholico o Ocasional" :active="$noPathologyBackgroundForm->ex_alcoholic_or_ocasional" />
            <x-toggle-confirmation label="Alergías" :active="$noPathologyBackgroundForm->allergies" />
        </x-form-group>

        <x-form-group>
            <x-toggle-confirmation label="Vivienda con Servicios Básicos" :active="$noPathologyBackgroundForm->basic_home_services" />
            <x-toggle-confirmation label="Farmacodependencia" :active="$noPathologyBackgroundForm->drug_dependency" />
        </x-form-group>

        <x-form-group>
            <x-input label="Fumador ¿Cuántos por día?" wire:model="noPathologyBackgroundForm.how_many_smoke_per_day" readonly />
            <x-input label="Años de exposición a tabaco" wire:model="noPathologyBackgroundForm.years_of_smoking_or_exposition" readonly />
        </x-form-group>

        <x-form-group>
            <x-input label="ML de alcohol por semana" wire:model="noPathologyBackgroundForm.ml_per_week" readonly/>
            <x-input label="Años de consumo de alcohol" wire:model="noPathologyBackgroundForm.alcohol_years_of_consumption" readonly/>
        </x-form-group>

        <x-form-group>
            <x-input label="Especificación de alergías" wire:model="noPathologyBackgroundForm.allergies_description" readonly />
            <x-input label="Tipo sanguíneo" wire:model="noPathologyBackgroundForm.blood_type" readonly />
        </x-form-group>

        <x-form-group>
            <x-input label="Especifiación farmacodependencia" wire:model="noPathologyBackgroundForm.drug_dependency_description" readonly />
            <x-input label="Años farmacodependencia" wire:model="noPathologyBackgroundForm.drug_dependency_years" readonly />
        </x-form-group>

        <x-textarea label="Otros datos" rows="2" wire:model="noPathologyBackgroundForm.others_no_pathology_background" readonly />

        {{--  obstetric form       --}}
        @if($infoForm->gender == \App\Enums\Patients\Gender::F)
        <x-icon  name="o-user" label="Antecedentes Ginecoobstétricos"  class="font-bold" readonly />

        <x-form-group>
            <x-input label="Año Menarca" wire:model="obstetricsForm.menarche_year" readonly />
            <x-input label="Ritmo Menstrual" wire:model="obstetricsForm.menstrual_rhythm" readonly/>
            <x-input label="IVSA edad" wire:model="obstetricsForm.ivsa_year" readonly />
        </x-form-group>


            <x-datepicker label="Fecha Última Menstruación"
                 :config="['altFormat' => 'd-m-Y']"
                 wire:model="obstetricsForm.last_menstruation_date"
                 readonly
        />

        <x-form-group>
            <x-toggle-confirmation label="Ciclos Regulares" :active="$obstetricsForm->regular_cycles"/>
            <x-toggle-confirmation label="Polimenorrea" :active="$obstetricsForm->polymenorrhea" />
            <x-toggle-confirmation label="Hipermenorrea" :active="$obstetricsForm->hypermenorrhea" />
        </x-form-group>

        <x-form-group>
            <x-toggle-confirmation label="Dismenorrea" :active="$obstetricsForm->dysmenorrhea" />
            <x-toggle-confirmation label="Incapacitante" :active="$obstetricsForm->incapacitante"/>
        </x-form-group>

        <x-form-group>
            <x-input label="G" wire:model="obstetricsForm.g" readonly />
            <x-input label="P" wire:model="obstetricsForm.p" readonly />
        </x-form-group>

        <x-form-group>
            <x-input label="a" wire:model="obstetricsForm.a" readonly />
            <x-input label="c" wire:model="obstetricsForm.c" readonly />
        </x-form-group>

        <x-form-group>
            <x-datepicker label="Fecha Última Citologíá"
                          :config="['altFormat' => 'd-m-Y']"
                          wire:model="obstetricsForm.last_cytology_date"
                          readonly
            />
            <x-input label="Método de planificación actual" wire:model="obstetricsForm.current_contraceptive_method" readonly/>
        </x-form-group>

            <x-input label="No. Parejas Sexuales" wire:model="obstetricsForm.sexual_partners_number" readonly/>
            <x-textarea class="w-full" label="Resultado Última Citología" wire:model="obstetricsForm.citology_result" readonly />
        @endif

        {{--  Personal history form      --}}
        <x-icon name="o-user" label="Antecedentes Personales Patológicos" class="font-bold" />

        <x-form-group>
            <x-input label="Enfermedades de la Infancia" wire:model="personalHistoryForm.childhood_diseases" readonly />
            <x-input label="Secuelas" wire:model="personalHistoryForm.diseases_sequel" readonly/>
        </x-form-group>

        <x-form-group>
            <x-toggle-confirmation label="Hospitalizaciones previas" :active="$personalHistoryForm->previous_hospitalizations"  />
            <x-toggle-confirmation label="Antecedentes Quirúrgicos" :active="$personalHistoryForm->surgical_history" />
        </x-form-group>

        <x-form-group>
            <x-toggle-confirmation label="Transfusiones Previas" :active="$personalHistoryForm->previous_transfusions"/>
            <x-toggle-confirmation label="Fracturas" :active="$personalHistoryForm->fractures"/>
        </x-form-group>

        <x-form-group>
            <x-toggle-confirmation label="Traumatismo" :active="$personalHistoryForm->traumas"/>
            <x-toggle-confirmation label="Otra Enfermedad" :active="$personalHistoryForm->other_disiases"/>
        </x-form-group>

        <x-textarea label="Hospitalizaciones previas" wire:model="personalHistoryForm.previous_hospitalizations_description" readonly />
        <x-textarea label="Antecedentes Quirúrgicos" wire:model="personalHistoryForm.surgical_history_description" readonly />
        <x-textarea label="Transfusiones previas" wire:model="personalHistoryForm.previous_transfusions_description" readonly />
        <x-textarea label="Fracturas" wire:model="personalHistoryForm.fractures_description" readonly />
        <x-textarea label="Traumatismo" wire:model="personalHistoryForm.traumas_description" readonly />
        <x-textarea label="Otras Enfermedades" wire:model="personalHistoryForm.other_disiases_description" readonly/>

        {{--   Contact form     --}}
        <x-icon name="c-book-open" label="Información de contacto" class="font-bold"  />
        <div
            class="w-full flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
            <x-input
                label="Télefono fijo(opcional)"  readonly wire:model="contactForm.phone"
            />

            <x-input
                label="Teléfono móvil"  readonly wire:model="contactForm.personal_phone"
            />
        </div>

        <div
            class="w-ful flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
            <x-input
                label="Nombre encargado(opcional)"  readonly wire:model="contactForm.tutor_name"
            />

            <x-input
                label="Parentesco con encargado(opcional)"
                readonly wire:model="contactForm.tutor_relationship"
            />
        </div>

        <x-input
            label="Correo electrónico" readonly wire:model="contactForm.email"
        />

        <x-button label="Guardar información" type="submit" class="btn-primary"/>
    </x-form>
</x-form-container>
