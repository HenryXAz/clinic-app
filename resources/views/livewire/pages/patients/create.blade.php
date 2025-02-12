<div>
    <div class="flex items-center gap-2">
        <x-button class="btn-sm" icon="o-arrow-small-left" link="{{route('patients.index')}}"/>
        <h1>Nuevo paciente</h1>
    </div>

    <x-custom-card>
        <x-steps wire:model="step">
            <x-step step="1" text="Información personal">
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
            <x-step step="2" text="Datos de contacto">
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
                                wire:model="tutor_name"
                                error-field="tutor_name"
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
            <x-step step="3" text="Confirmación">
                @if($step == 3)
                    <x-form-container>
                        <x-form wire:submit="save">
                            <div class="w-full flex gap-2 flex-col md:flex-row justify-between">
                                <x-input label="Nombres" value="{{$infoForm->names}}" readonly
                                />
                                <x-input label="Apellidos" value="{{$infoForm->last_names}}" readonly
                                />
                            </div>

                            <div class="w-full flex gap-2 flex-col md:flex-row justify-between">
                                <x-input label="Comunidad(opcional)" value="{{$infoForm->community}}" readonly
                                />
                                <x-input label="Sector(opcional)" value="{{$infoForm->sector}}" readonly
                                />
                            </div>

                            <x-input label="Fecha de nacimiento" value="{{$infoForm?->birth_date?->format('d-m-Y')}}"
                                     readonly
                            />


                            <x-input label="DPI" value="{{$infoForm->dpi}}" readonly
                            />
                            <div
                                class="w-full flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
                                <x-input label="Sexo" value="{{$infoForm?->gender?->value}}" readonly/>
                                <x-input label="Etnia" value="{{$infoForm?->ethnicity?->value}}" readonly/>
                            </div>


                            <div
                                class="w-full flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
                                <x-input label="Escolaridad" value="{{$infoForm?->academic_level?->value}}" readonly/>
                                <x-input label="Estado civil" value="{{$infoForm?->marital_status?->value}}" readonly/>
                            </div>


                            <div
                                class="w-full my-5 flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
                                <x-input label="¿Está trabajando?" value="{{$infoForm->is_working ? 'Sí' : 'No'}}"
                                         readonly/>
                                <x-input label="¿Es inmigrante?" value="{{$infoForm->is_immigrant ? 'Sí' : 'No'}}"
                                         readonly/>
                            </div>

                            <x-input
                                label="Profesión"
                                value="{{$infoForm->profession}}" readonly
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

                            <h2 class="border-b border-gray-300 dark:border-gray-500 my-5">Información de contacto</h2>

                            <div
                                class="w-full flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
                                <x-input
                                    label="Télefono fijo(opcional)" value="{{$contactForm->phone}}" readonly
                                />

                                <x-input
                                    label="Teléfono móvil" value="{{$contactForm->personal_phone}}" readonly
                                />
                            </div>

                            <div
                                class="w-ful flex gap-2 flex-col  md:flex-row items-center  md:justify-between overflow-x-auto">
                                <x-input
                                    label="Nombre encargado(opcional)" value="{{$contactForm->tutor_name}}" readonl
                                />

                                <x-input
                                    label="Parentesco con encargado(opcional)"
                                    value="{{$contactForm->tutor_relationship}}" readonly
                                />
                            </div>

                            <x-input
                                label="Correo electrónico" value="{{$contactForm->email}}" readonly
                            />

                            <x-button label="Guardar información" type="submit" class="btn-primary"/>
                        </x-form>
                    </x-form-container>
                @endif
            </x-step>
        </x-steps>


        <x-button label="Cancelar" type="button" class="btn-error mr-4"
                  @click="$wire.open_cancel_modal=true"
        />

        @if($step > 1)
            <x-button label="Anterior" wire:click="prev" class="mt-5"/>
        @endif

        @if($step < 3)
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
