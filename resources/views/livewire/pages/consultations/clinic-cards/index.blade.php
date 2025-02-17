<div>
    <x-custom-card>
        <div class="flex items-center gap-2">
            <x-button class="btn-sm" icon="o-arrow-small-left" link="{{route('consultations.index', [
                'id' => $patient->id,
            ])}}"/>
            <h1>Ficha clinica <span class="font-bold">{{$patient->names}} {{$patient->last_names}}</span></h1>
        </div>
        @if (!$enable_edition)
            <div class="flex justify-end">
                <x-button
                    icon="o-pencil"
                    label="Editar"
                    class="btn-warning"
                    wire:click="edit"
                />
            </div>
        @endif

        <x-form-container>
            <x-form>
                <x-form-group>
                    <x-input label="Tensión Arterial (TA)" icon="o-user" placeholder="__/__ mmHg" wire:model="form.blood_pressure"
                             :readonly="!$enable_edition"
                    />
                    <x-input label="FC/Pulso " icon="o-user" placeholder="pulsaciones por minuto" wire:model="form.heart_rate"
                             :readonly="!$enable_edition"
                    />
                </x-form-group>


                <x-form-group>
                    <x-input label="Temperatura" icon="o-user" placeholder="°C" wire:model="form.temperature"
                             :readonly="!$enable_edition"
                    />
                    <x-input label="FR" icon="o-user" placeholder="por minuto" wire:model="form.rheumatoid_factor"
                             :readonly="!$enable_edition"
                    />
                </x-form-group>

                <x-form-group>
                    <x-input label="Peso (KG)" icon="o-user" placeholder="Kg" wire:model="form.weight"
                             :readonly="!$enable_edition"
                    />
                    <x-input label="Talla (mts)" icon="o-user" placeholder="mts" wire:model="form.height"
                             :readonly="!$enable_edition"
                    />
                </x-form-group>

                <x-textarea label="Habitus exterior" placeholder="Descripción" wire:model="form.exterior_habitus"
                            :readonly="!$enable_edition"
                />

                <x-textarea label="Piel y anexos" placeholder="Descripción" wire:model="form.skin_and_appendages"
                            :readonly="!$enable_edition"
                />

                <x-textarea label="Cabeza y cuello" placeholder="Descripción" wire:model="form.head_and_neck"
                            :readonly="!$enable_edition"
                />

                <x-textarea label="Toráx" placeholder="Descripción" wire:model="form.chest"
                            :readonly="!$enable_edition"
                />

                <x-textarea label="Abdomen" placeholder="Descripción" wire:model="form.abdomen"
                            :readonly="!$enable_edition"
                />

                <x-textarea label="Genitales" placeholder="Descripción" wire:model="form.genitals"
                            :readonly="!$enable_edition"
                />

                <x-textarea label="Extremidades" placeholder="Descripción" wire:model="form.limbs"
                            :readonly="!$enable_edition"
                />

                <x-textarea label="Sistema Nervioso" placeholder="Descripción" wire:model="form.nervous_system"
                            :readonly="!$enable_edition"
                />

                @if ($enable_edition)

                    <x-button
                        wire:click="save"
                        class="btn-primary"
                        label="Guardar"
                        icon="o-check"
                    />

                    <x-button
                        label="Cancelar"
                        class="btn-error"
                        wire:click="cancel"
                    />
                    @endif
            </x-form>
        </x-form-container>
    </x-custom-card>
</div>
