<?php

namespace App\Livewire\Forms\Patient;

use App\Models\Patient;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ObstetricsForm extends Form
{
    public ?int $menarche_year = null;
    public bool $regular_cycles = true;
    public ?string $menstrual_rhythm = null;
    public ?\Carbon\Carbon $last_menstruation_date = null;
    public bool $polymenorrhea = false;
    public bool $hypermenorrhea = false;
    public bool $dysmenorrhea = false;
    public ?int $ivsa_year = null;
    public bool $incapacitante = false;
    public ?int $sexual_partners_number = null;
    public ?string $g = null;
    public ?string $p = null;
    public ?string $a = null;
    public ?string $c = null;
    public ?\Carbon\Carbon $last_cytology_date = null;
    public ?string $citology_result = null;
    public ?string $current_contraceptive_method = null;

    public function set_values(Patient $patient)
    {
        $this->fill([
            'menarche_year' => $patient->menarche_year,
            'regular_cycles' => $patient->regular_cycles,
            'menstrual_rhythm' => $patient->menstrual_rhythm,
            'last_menstruation_date' => $patient->last_menstruation_date,
            'polymenorrhea' => $patient->polymenorrhea,
            'hypermenorrhea' => $patient->hypermenorrhea,
            'dysmenorrhea' => $patient->dysmenorrhea,
            'ivsa_year' => $patient->ivsa_year,
            'incapacitante' => $patient->incapacitante,
            'sexual_partners_number' => $patient->sexual_partners_number,
            'g' => $patient->g,
            'p' => $patient->p,
            'a' => $patient->a,
            'c' => $patient->c,
            'last_cytology_date' => $patient->last_cytology_date,
            'citology_result' => $patient->citology_result,
            'current_contraceptive_method' => $patient->current_contraceptive_method,
        ]);
    }

    public function rules() : array
    {
        return [
            'menarche_year' => ['nullable', 'regex:/^[0-9]+$/'],
            'regular_cycles' => ['nullable', 'boolean'],
            'menstrual_rhythm' => ['nullable', 'string'],
            'last_menstruation_date' => ['nullable', 'date'],
            'polymenorrhea' => ['nullable', 'boolean'],
            'hypermenorrhea' => ['nullable', 'boolean'],
            'dysmenorrhea' => ['nullable', 'boolean'],
            'ivsa_year' => ['nullable', 'numeric'],
            'incapacitante' => ['nullable', 'boolean'],
            'sexual_partners_number' => ['nullable', 'numeric'],
            'g' => ['nullable', 'string'],
            'p' => ['nullable', 'string'],
            'a' => ['nullable', 'string'],
            'c' => ['nullable', 'string'],
            'last_cytology_date' => ['nullable', 'date'],
            'citology_result' => ['nullable', 'string'],
            'current_contraceptive_method' => ['nullable', 'string'],
        ];
    }

    protected $messages = [
        'menarche_year.regex' => 'El año de menarquia debe ser un número entero.',
        'regular_cycles.boolean' => 'El campo ciclos regulares debe ser verdadero o falso.',
        'menstrual_rhythm.string' => 'El ritmo menstrual debe ser un texto.',
        'last_menstruation_date.date' => 'La fecha de la última menstruación debe ser una fecha válida.',
        'polymenorrhea.boolean' => 'El campo polimenorrea debe ser verdadero o falso.',
        'hypermenorrhea.boolean' => 'El campo hipermenorrea debe ser verdadero o falso.',
        'dysmenorrhea.boolean' => 'El campo dismenorrea debe ser verdadero o falso.',
        'ivsa_year.numeric' => 'El año de inicio de vida sexual activa debe ser un número.',
        'incapacitante.boolean' => 'El campo incapacitante debe ser verdadero o falso.',
        'sexual_partners_number.numeric' => 'El número de parejas sexuales debe ser un número.',
        'g.string' => 'El campo G debe ser un texto.',
        'p.string' => 'El campo P debe ser un texto.',
        'a.string' => 'El campo A debe ser un texto.',
        'c.string' => 'El campo C debe ser un texto.',
        'last_cytology_date.date' => 'La fecha de la última citología debe ser una fecha válida.',
        'citology_result.string' => 'El resultado de la citología debe ser un texto.',
        'current_contraceptive_method.string' => 'El método anticonceptivo actual debe ser un texto.',
    ];
}
