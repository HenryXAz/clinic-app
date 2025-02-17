<?php

namespace App\Livewire\Pages\Consultations\ClinicCards;

use App\Livewire\Forms\Consultation\ClinicCardForm;
use App\Models\ClinicCard;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Patient;
use Mary\Traits\Toast;

class Index extends Component
{
    use Toast;

    public Patient $patient;
    public ClinicCardForm $form;
    public ?ClinicCard $card;


    public $enable_edition = false;

    public function mount()
    {
        $id =  \Route::current()->parameter('id');
        $this->patient = Patient::findOrFail($id);
        $this->card = ClinicCard::where('patient_id', $this->patient->id)->first();

//        $this->fillForm();

        if ($this->card != null) {
            $this->form->setClinicCard($this->card);
        }
    }

    private function fillForm()
    {
        if ($this?->card != null) {
            $this->form->setClinicCard($this->card);
        } else {
            $this->form->reset();
        }
    }

    public function render()
    {
        return view('livewire.pages.consultations.clinic-cards.index');
    }

    public function edit()
    {
        $this->enable_edition = true;
    }
    public function save()
    {
        $this->form->validate();
        DB::beginTransaction();
        try {
            $data = $this->form->toArray();
            unset($data['id']);

            $card = ClinicCard::updateOrCreate(['id' => $this->form->id], [
                ...$data,
                'patient_id' => $this->patient->id,
            ]);

//            DB::commit();
            $this->form->setClinicCard($card);
            $this->enable_edition = false;
            $this->success('Información guardada con éxito', timeout: 3000);
        } catch (\Throwable $th) {
            DB::rollBack();
            dump($th->getMessage());
        }
    }

    public function cancel()
    {
        $this->enable_edition = false;
        $this->fillForm();
    }
}
