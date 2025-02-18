<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historia Clínica</title>
</head>
<body>
<style>
    * {
        font-family: Arial, sans-serif;
    }

    @page {
        size: 21.59cm 27.94cm;
        margin: 2cm 0.5cm 0 0.5cm;
    }

    .header {
        position: fixed;
        top: -2cm;
        left: -20px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        /*background-color: #03a9f4;*/
        color: #444;
        text-align: center;
        line-height: 35px;
    }

    .page-break {
        page-break-after: always;
    }

    .container {
        display: inline-block;
    }

    .element {
        display: inline-block
    }

    .logo {
        width: 120px;
        margin-top: 1.5em;
    }

    .container_elements {
        /*margin-top: 4em;*/
        max-width: 900px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .title {
        font-weight: 700;
    }

    .title_document {
        font-size: 1.2em;
    }

    .subtitle_document {
        font-size: 1em;
        background-color: #92cddc;
    }

    .bold_text {
        font-weight: 700;
    }

    .normal_text {
        font-weight: 400;
    }

    .center_text {
        text-align: center;
    }

    .right_text {
        text-align: right;
    }

    .right_margin {
        margin-right: 240px;
    }

    table {
       max-width: 900px;
        width: 100%;
    }

    table tbody tr > td {
        max-width: 50%;
        width: 50%;
    }

</style>
    <div class="header">
        <div class="container">
            <img class="logo" src="{{public_path('images/document-logo.png')}}"/>
        </div>
        <p class="element">
            <span class="title">{{$system->company_name}}</span>
            <span style="display: block;">3ra. Avenida 0-14, San Martín Zapotitlán</span>
        </p>
    </div>

    <div class="container_elements">
        <p>
            Nombre del profesional de saludo que presenta:
            {{$user->names}} {{$user->last_names}}
        </p>

        <h1 class="center_text title_document">HISTORIA CLÍNICA</h1>

        <p class="right_text">Fecha valoración
            <span>{{ $consultation?->date?->format('d/m/Y')}}</span>
        </p>

        <div >
           <h2 class="bold_text subtitle_document">I. DATOS DE IDENTIFICACIÓN DEL PACIENTE</h2>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Documento de identificación
                            <span class="normal_text">
                                {{ $patient->dpi }}
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">Fecha de nacimiento

                            <span class="normal_text">
                                {{$patient->birth_date->format('d/m/Y')}}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text right_text">
                            Edad
                            <span class="normal_text">
                                {{$patient->birth_date->diff(\Carbon\Carbon::now())->format('%y años')}}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Departamento de nacimiento

                            <span class="normal_text">
                            {{ $patient->birth_date_department->name }}
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                           Estado Civil
                            <span class="normal_text">
                                {{ $patient->marital_status }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                           Escolaridad

                            <span class="normal_text">
                                {{ $patient->academic_level }}
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Ocupación

                            <span class="normal_text">
                                {{ $patient->profession }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Religión

                            <span class="normal_text">
                                {{ $patient->religion }}
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Etnia

                            <span class="normal_text">
                                {{ $patient->ethnicity }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tr>
                    <td>
                        <p class="bold_text right_text">
                            Caso nuevo o seguimiento

                            <span class="normal_text">
                                {{$first_admission ? 'Sí' : 'No'}}
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Sexo:
                            <span class="normal_text">
                                {{$patient->gender}}
                            </span>
                        </p>
                    </td>
                </tr>
            </table>

        </div>

        <div>
            <h2 class="bold_text subtitle_document">II. Antecedentes Heredofamiliares</h2>

            <table>
                <tbody>
                    <tr>
                        <td>
                            <p class="bold_text">
                                Diabetes ¿Quién?
                                <span class="normal_text">
                                    {{ $patient->diabetes }}
                                </span>
                            </p>
                        </td>
                        <td>
                            <p class="bold_text">
                                Nefropatas ¿Quién?
                                <span class="normal_text">
                                    {{ $patient->nephropathy }}
                                </span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="bold_text">
                                Hipertensión Arterial ¿Quién?
                                <span class="normal_text">
                                    {{ $patient->high_blood_pressure }}
                                </span>
                            </p>
                        </td>
                        <td>
                            <p class="bold_text">
                                Malformaciones
                                <span class="normal_text">
                                    {{ $patient->malformations }}
                                </span>
                            </p>
                        </td>
                    </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Cáncer
                            <span class="normal_text">
                                {{ $patient->cancer }}
                            </span>
                        </p>

                    </td>
                    <td>
                        <p class="bold_text">
                            Tipo Malformación
                            <span class="normal_text">
                            {{ $patient->malformations_type }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Tipo de cáncer

                            <span class="normal_text">
                                {{ $patient->cancer_type }}
                            </span>
                        </p>
                    </td>
                </tr>
                    <tr>
                        <td>
                            <p class="bold_text">
                                Cardiopatas ¿Quién?
                                <span class="normal_text">
                                    {{ $patient->heart_disease }}
                                </span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    {{--        No pathology background --}}
        <div class="page-break"></div>
        <div>
            <h2 class="bold_text subtitle_document">III. Antecedentes Personales no Patológicos</h2>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Tabaquismo
                            @include('documents.toggle-document', ['value' => $patient->smoking])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            ¿Cuántos?
                            <span class="normal_text">
                                {{ $patient->how_many_smoke_per_day }}
                            </span>
                            x día
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Años de consumo o exposición
                            <span class="normal_text">
                                {{ $patient->years_of_smoking_or_exposition }}
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Exfumador
                            @include('documents.toggle-document', ['value' => $patient->ex_smoker])
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Fumador pasivo
                            @include('documents.toggle-document', ['value' => $patient->passive_smoker])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Alcohol
                            @include('documents.toggle-document', ['value' => $patient->alcoholic])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            mLs x semana
                            <span class="normal_text">
                                {{ $patient->ml_per_week }}
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Años de consumo

                            <span class="normal_text">
                                {{ $patient->alcohol_years_of_consumption }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                    <tr>
                        <td>
                            <p class="bold_text">
                                Ex-alcoholico y/o ocasional
                                @include('documents.toggle-document', ['value' => $patient->ex_alcoholic_or_ocasional])
                            </p>
                        </td>
                        <td>
                            <p class="bold_text">
                                Alergías
                                @include('documents.toggle-document', ['value' => $patient->allergies])
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Especificar alergías

                            <span class="normal_text">
                                {{ $patient->allergies_description }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                    <tr>
                        <td>
                            <p class="bold_text">
                                Tipo sanguíneo

                                <span class="normal_text">
                                {{ $patient->blood_type ?? 'Desconocido' }}
                            </span>
                            </p>
                        </td>
                        <td>
                            <p class="bold_text">
                                Vivienda con servicios básicos
                                @include('documents.toggle-document', ['value' => $patient->basic_home_services])
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Farmacodependencia
                            @include('documents.toggle-document', ['value' => $patient->drug_dependency])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Años de consumo
                            <span class="normal_text">
                                {{ $patient->drug_dependency_years }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Descripción farmacodependencia
                            <span class="normal_text">
                            {{ $patient->drug_dependency_description }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Otros
                            <span class="normal_text">
                                {{ $patient->others_no_pathology_background }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>


        @if($patient->gender == \App\Enums\Patients\Gender::F)
       <div class="page-break"></div>

        <div>
            <h2 class="bold_text subtitle_document">IV. Antecedentes Ginecoobstétricos</h2>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Menarca edad:

                            <span class="normal_text">
                                {{ $patient->menarche_year }} años
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Ciclos regulares
                            @include('documents.toggle-document', ['value' => $patient->regular_cycles])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Ritmo
                            <span class="normal_text">
                                {{ $patient->menstrual_rhythm }}
                            </span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="bold_text">
                            Polinemenorrea
                            @include('documents.toggle-document', ['value' => $patient->polymenorrhea])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Hipermenorrea
                            @include('documents.toggle-document', ['value' => $patient->hypermenorrhea])
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>



            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Dismenorrea
                            @include('documents.toggle-document', ['value' => $patient->dymenorrhea])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Incapacitante
                            @include('documents.toggle-document', ['value' => $patient->incapacitante ])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            IVSA
                            <span class="normal_text">
                                {{ $patient->ivsa_year }} años
                            </span>
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            No. parejas sexuales
                            <span class="normal_text">
                                {{ $patient->sexual_partners_number }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>


            <table>
               <tbody>

               <tr>
                   <td>
                       <p class="bold_text">
                           G
                           <span class="normal_text">
                               {{ $patient->g }}
                           </span>
                       </p>
                   </td>
                   <td>
                       <p class="bold_text">
                           P
                           <span class="normal_text">
                               {{ $patient->p }}
                           </span>
                       </p>
                   </td>
                   <td>
                       <p class="bold_text">
                           A
                           <span class="normal_text">
                               {{ $patient->a }}
                           </span>
                       </p>
                   </td>
               </tr>
               </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            C
                            <span class="normal_text">
                                {{ $patient->c }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Fecha última menstruación
                            <span class="normal_text">
                                {{ $patient?->last_menstruation_date?->format('d-m-Y') }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Fecha última citología
                            <span class="normal_text">
                                {{ $patient?->last_cytology_date?->format('d/m/Y') }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Resultado citología

                            <span class="normal_text">
                                {{ $patient->citology_result }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td >
                        <p class="bold_text">
                            Método de planificación actual
                            <span class="normal_text">
                                {{ $patient->current_contraceptive_method }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        @endif

        <div class="page-break"></div>

        <div>
            <h2 class="bold_text subtitle_document">V. Antecedentes personales patológicos</h2>

            <table>
                <tbody>

                <tr>
                    <td>
                        <p class="bold_text">
                            Enfermedades de la infancia
                            <span class="normal_text">
                                {{ $patient->childhood_diseases }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Secuelas
                            <span class="normal_text">
                                {{ $patient->diseases_sequel }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Hospitalizaciones previas
                            @include('documents.toggle-document', ['value' => $patient->previous_hospitalizations])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Especificar
                            <span class="normal_text">
                                {{ $patient->previous_hospitalizations_description }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Antecedentes quirúrgicos
                            @include('documents.toggle-document', ['value' => $patient->surgical_history])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Especificar
                            <span class="normal_text">
                                {{ $patient->surgical_history_description }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Transfusiones previas
                            @include('documents.toggle-document', ['value' => $patient->previous_transfusions])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Especificar
                            <span class="normal_text">
                                {{ $patient->previous_transfusions_description }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                <td>
                    <p class="bold_text">
                        Fracturas
                        @include('documents.toggle-document', ['value' => $patient->fractures])
                    </p>
                </td>
                <td>
                    <p class="bold_text">
                        Especificar
                        <span class="normal_text">
                            {{ $patient->fractures_description }}
                        </span>
                    </p>
                </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Traumatismo
                            @include('documents.toggle-document', ['value' => $patient->traumas ])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Especificar
                            <span class="normal_text">
                                {{ $patient->traumas_description }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Otra enfermedad
                            @include('documents.toggle-document', ['value' => $patient->other_disiases])
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Especificar
                            <span class="normal_text">
                                {{ $patient->other_disiases_description }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>



        <div class="page-break"></div>

        <div>
            <h2 class="bold_text subtitle_document">VI. Motivo de Ingreso</h2>

            <p class="normal_text">
                {{ $consultation->reason }}
            </p>
        </div>

        <div>
            <h2 class="bold_text subtitle_document">VII. Principio y evolución del padecimiento actual</h2>
            <p class="normal_text">
                {{ $consultation->beginning_and_evolution_of_current_condition }}
            </p>
        </div>


        <div>
            <h2 class="bold_text subtitle_document">VIII. Interrogatorio por aparatos y Sistemas</h2>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Respiratorio/cardiovascular
                            <span class="normal_text">
                                {{ $consultation->respiratory_or_cardiovascular }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Digestivo
                            <span class="normal_text">
                                {{ $consultation->digestive }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Endocrino
                            <span class="normal_text">
                                {{ $consultation->endocrine }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Musculo-Esquelético
                            <span class="normal_text">
                                {{ $consultation->muscle_skeletal }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Genito-Urinario
                            <span class="normal_text">
                                {{ $consultation->genitourinary }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Hematopoyético - Linfático
                            <span class="normal_text">
                                {{ $consultation->hematopoietic_lymphatic }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Piel y Anexos
                            <span class="normal_text">
                                {{ $consultation->skin_and_appendages }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Neurológico y Psiquiátrico
                            <span class="normal_text">
                                {{ $consultation->neurological_psychiatric }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>

            </table>
        </div>

        <div class="page-break"></div>
        <div>
            <p class="bold_text">
                Medicamentos actuales
                @include('documents.toggle-document', ['value' => $current_medications])
            </p>

            @if ($current_medications)
            <table>
                <thead>
                    <tr>
                        <th>Nombre comercial</th>
                        <th>Principio activo</th>
                        <th>Presentación (mg,UI)</th>
                        <th>Dosis(mg)</th>
                        <th>Via</th>
                        <th>Frecuencia</th>
                        <th>Fecha última administración</th>
                        <th>Hora última administración</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultation->current_medications as $medication)
                        <tr>
                            <td>
                                <p class="normal_text">
                                    {{ $medication->trade_name }}
                                </p>
                            </td>
                            <td>
                                <p class="normal_text">
                                    {{ $medication->active_ingredient }}
                                </p>
                            </td>
                            <td>
                                <p class="normal_text">
                                    {{ $medication->presentation_mg }}
                                </p>
                            </td>
                            <td>
                                <p class="normal_text">
                                    {{ $medication->dosage_mg }}
                                </p>
                            </td>
                            <td>
                                <p class="normal_text">
                                    {{ $medication->via }}
                                </p>
                            </td>
                            <td>
                                <p class="normal_text">
                                    {{ $medication->frequency }}
                                </p>
                            </td>
                            <td>
                                <p class="normal_text">
                                    {{ $medication->last_administration_date->format('d/m/Y') }}
                                </p>
                            </td>
                            <td>
                                <p class="normal_text">
                                    {{ $medication->last_administration_date->format('H:i') }}
                                </p>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            @endif


        </div>

{{--        <div class="page-break"></div>--}}
        <div>
            <h2 class="bold_text subtitle_document">IX. Estudio de Imagen/Exámenes previos a su ingreso</h2>
            <p class="normal_text">
                {{ $consultation->previous_admission_laboratory_exams }}
            </p>
        </div>

        <div>
            <h2 class="bold_text subtitle_document">X. Análisis, Integración y terapéutica</h2>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Probables diagnósticos
                            <span class="normal_text">
                                {{ $consultation->possible_diagnoses }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Plan de estudio
                            <span class="normal_text">
                                {{ $consultation->study_plan }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Terapéutica inicial
                            <span class="normal_text">
                                {{ $consultation->initial_therapeutic }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Condición

                            <span class="normal_text">
                                {{ $consultation->condition }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="bold_text">
                            Pronóstico

                            <span class="normal_text">
                                {{ $consultation->prognosis }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="page-brak"></div>
        <div>
            <h2 class="bold_text subtitle_document">XI. Ficha Clínica</h2>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            TA
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->blood_pressure }}
                            </span>
                            mmHg
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            FC/Pulso
                                <span class="normal_text">
                                    {{ $patient?->clinic_card?->heart_rate }}
                                </span>
                            x min
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            FR
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->rheumatoid_factor }}
                            </span>
                            x min
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Temp
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->temperature }}
                            </span>
                            °C
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Peso
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->weight }}
                            </span>
                            Kg
                        </p>
                    </td>
                    <td>
                        <p class="bold_text">
                            Talla
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->height }}
                            </span>
                            mts
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table>
                <tbody>
                <tr>
                    <td>
                        <p class="bold_text">
                            Habitus exterior
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->exterior_habitus }}
                            </span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="bold_text">
                            Piel y anexos
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->skin_and_appendages }}
                            </span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="bold_text">
                            Cabeza y cuello
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->head_and_neck }}
                            </span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="bold_text">
                            Tórax
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->chest }}
                            </span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="bold_text">
                            Abdomen
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->abdomen }}
                            </span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="bold_text">
                            Genitales
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->genitals }}
                            </span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="bold_text">
                            Extremidades
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->limbs }}
                            </span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="bold_text">
                            Sistema nervioso
                            <span class="normal_text">
                                {{ $patient?->clinic_card?->nervous_system }}
                            </span>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div>
            <h2 class="bold_text subtitle_document">XII. Observaciones y/o Comentarios Finales</h2>

            <table>
                <tbody>
                @foreach($consultation->details as $detail)
                    <tr >
                        <td>
                            <p class="normal_text">
                                {{ $detail->description }}
                            </p>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
