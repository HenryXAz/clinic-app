<div>
    <div class="flex items-center gap-2">
        <x-button class="btn-sm" icon="o-arrow-small-left" link="{{route('patients.index')}}"/>
        <h1>Nuevo paciente</h1>
    </div>

    <x-custom-card>
        <x-steps wire:model="step">
            <x-step step="1" text="">
                <h2>Datos personales</h2>
                <x-form-container>
                    <x-form>
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
                                     wire:model="infoForm.gender"
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
                    </x-form>
                </x-form-container>


            </x-step>
            <x-step step="2" text="">
                <h2>Antecedentes Heredofamiliares</h2>
                <x-form-container>
                    <x-form>
                        <x-form-group>
                            <x-input label="Diabetes ¿Quién?" icon="o-user" wire:model="hereditaryBackgroundForm.diabetes" />
                            <x-input label="Nefropatas ¿Quién?" icon="o-user" wire:model="hereditaryBackgroundForm.nephropathy"/>
                        </x-form-group>

                        <x-form-group>
                            <x-input label="Hipertensión Arterial ¿Quién?" icon="o-user" wire:model="hereditaryBackgroundForm.high_blood_pressure" />
                        </x-form-group>

                        <x-form-group>
                            <x-input label="Malformaciones"  icon="o-user" wire:model="hereditaryBackgroundForm.malformations" />
                            <x-input label="Tipo de malformación" icon="o-user" wire:model="hereditaryBackgroundForm.malformations_type"/>
                        </x-form-group>

                        <x-form-group>
                            <x-input label="Cáncer ¿Quién?" icon="o-user" wire:model="hereditaryBackgroundForm.cancer"/>
                            <x-input label="Tipo de cáncer" icon="o-user" wire:model="hereditaryBackgroundForm.cancer_type"/>
                        </x-form-group>

                        <x-form-group>
                            <x-input label="Cardiopatas ¿Quién?" icon="o-user" wire:model="hereditaryBackgroundForm.heart_disease" />
                        </x-form-group>

                        <x-textarea rows="5" label="Otros" icon="o-user" wire:model="hereditaryBackgroundForm.others_hereditary_background"/>
                    </x-form>
                </x-form-container>
            </x-step>

            <x-step step="3" text="">
                <h2>Antecedentes Personales No Patológicos</h2>

                <x-form-container>
                    <x-form>
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

                    </x-form>
                </x-form-container>
            </x-step>

            <x-step step="4" text="">
            @if($infoForm->gender == \App\Enums\Patients\Gender::F && $step < 5)
                    <h3>Antecedentes Ginecoobstétricos</h3>

                    <x-form-container>
                        <x-form>
                            <x-input type="number" icon="o-users" label="Menarca edad" wire:model="obstetricsForm.menarche_year" />

                            <x-form-group>
                                <x-toggle label="Ciclos Regulares" wire:model="obstetricsForm.regular_cycles" />
                                <x-input label="Ritmo __x__" icon="o-user" wire:model="obstetricsForm.menstrual_rhythm"/>
                            </x-form-group>

                            <x-datepicker
                                icon="o-calendar"
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

                        </x-form>
                    </x-form-container>

            @else
                <div class="mt-5 font-bold font-base md:font-lg text-center">
                    Sección solo para pacientes femeninos, puedo continuar con el registro
                </div>
            @endif
            </x-step>

            <x-step step="5" text="">
                <h3>Antecedentes Personales Patológicos</h3>
                <x-form-container>
                    <x-form>
                        <x-input label="Enfermedades de la infancia" icon="o-user" wire:model="personalHistoryForm.childhood_diseases"/>
                        <x-input label="Secuelas" icon="o-user" wire:model="personalHistoryForm.diseases_sequel"/>

                            <x-icon name="o-user" label="Hospitalizaciones previas" />
                            <x-toggle label="No/Si" wire:model="personalHistoryForm.previous_hospitalizations" />
                            <x-textarea label="Especificar" placeholder="Agreguar especificación" wire:model="personalHistoryForm.previous_hospitalizations_description"/>

                        <x-icon name="o-user" label="Antecedentes quirúrgicos" class="mt-5" />
                        <x-toggle label="No/Sí" wire:model="personalHistoryForm.surgical_history" />
                        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.surgical_history_description"/>

                        <x-icon name="o-user" label="Transfusiones previas" class="mt-5" />
                        <x-toggle label="No/Sí" wire:model="personalHistoryForm.previous_transfusions" />
                        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.previous_transfusions_description" />

                        <x-icon name="o-user" label="Fracturas" class="mt-5" />
                        <x-toggle label="No/Sí" wire:model="personalHistoryForm.fractures" />
                        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.fractures_description" />


                        <x-icon name="o-user" label="Traumatismo" class="mt-5" />
                        <x-toggle label="No/Sí" wire:model="personalHistoryForm.traumas"/>
                        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.traumas_description"/>

                        <x-icon name="o-user" label="Otra enfermedad" class="mt-5" />
                        <x-toggle label="No/Sí" wire:model="personalHistoryForm.other_disiases" />
                        <x-textarea label="Especificar" rows="5" wire:model="personalHistoryForm.other_disiases_description"/>


                    </x-form>
                </x-form-container>
            </x-step>

            <x-step step="6" text="">
                <x-form-container>
                    <x-form>
                        <x-form-group>
                            <x-input
                                label="Télefono fijo(opcional)"
                                icon="o-phone"
                                placeholder="número de teléfono"
                                wire:model="contactForm.phone"
                                error-field="contactForm.phone"
                            />

                            <x-input
                                label="Teléfono móvil"
                                icon="o-device-phone-mobile"
                                placeholder="número de teléfono"
                                wire:model="contactForm.personal_phone"
                                error-field="contactForm.personal_phone"
                            />
                        </x-form-group>

                        <x-form-group>
                            <x-input
                                label="Nombre encargado(opcional)"
                                icon="o-users"
                                placeholder="nombre de encargado"
                                wire:model="contactForm.tutor_name"
                                error-field="contactForm.tutor_name"
                            />

                            <x-input
                                label="Parentesco con encargado(opcional)"
                                icon="o-users"
                                placeholder="relación de parentesco"
                                wire:model="contactForm.tutor_relationship"
                                error-field="contactForm.tutor_relationship"
                            />
                        </x-form-group>
                        <x-input
                            label="Correo electrónico(opcional)"
                            icon="o-envelope"
                            placeholder="dirección de correo"
                            wire:model="contactForm.email"
                            error-field="contactForm.email"
                        />
                    </x-form>
                </x-form-container>
            </x-step>
            <x-step step="7" text="Confirmación">
                @if($step == 7)
                    @include('livewire.pages.patients.confirmation-values-card')
                @endif
            </x-step>
        </x-steps>


        <x-button label="Cancelar" type="button" class="btn-error mr-4"
                  @click="$wire.open_cancel_modal=true"
        />

        @if($step > 1)
            <x-button label="Anterior" wire:click="prev" class="mt-5"/>
        @endif

        @if($step < 7)
            <x-button label="Siguiente" wire:click="next" class="mt-5"/>
        @endif

    </x-custom-card>

    <x-modal wire:model="open_cancel_modal" class="backdrop-blur">
        <div class="mb-5">¿Está seguro que desea cancelar el registro? </div>
        <div class="flex justify-center gap-2">
            <x-button label="No" @click="$wire.open_cancel_modal = false" class="btn-primary" />
            <x-button label="Sí" wire:click="cancel" class="btn-error"/>
        </div>
    </x-modal>
</div>
