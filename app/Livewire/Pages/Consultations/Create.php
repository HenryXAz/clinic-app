<?php

namespace App\Livewire\Pages\Consultations;

use App\Livewire\Forms\Consultation\ConsultationForm;
use App\Models\MedicalConsultation;
use App\Models\Patient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    public Patient $patient;
    public $details;
    public ConsultationForm $form;

    public $modal_detail = false;
    public $modal_date = false;
    public $open_cancel_modal = false;


    public Collection $items;

    public function mount() : void
    {
        $id = \Route::current()->parameter('id');
        $this->patient = Patient::findOrFail($id);
        $this->details = 0;
        $this->items = new Collection();
    }

    public function render()
    {
        return view('livewire.pages.consultations.create');
    }

    public function schedule() : void
    {
        $consultation = $this->save(has_been_scheduled: true);
        $this->redirect(route('consultations.index', $this->patient->id), navigate: true);
    }

    public function serve() : void
    {
        $consultation = $this->save(has_been_scheduled: false);
        $this->save(has_been_scheduled: false);
        $this->redirect(route('consultations.edit', [
            'id' => $this->patient->id,
            'consultation_id' => $consultation->id,
        ]), navigate: true);
    }

    private function save(bool $has_been_scheduled) : MedicalConsultation
    {
        $this->form->validate();

        DB::beginTransaction();

        try {
            $data = [
                ...$this->form->toArray(),
                'end_date' => $this->form->start_date,
                'has_been_scheduled' => $has_been_scheduled,
                'has_been_completed' => false,
                'doctor_id' => Auth::user()->id,
                'patient_id' => $this->patient->id,
            ];

            $consultation = MedicalConsultation::create($data);
            DB::commit();
            $this->success('Consulta registrada con éxito', timeout: 3000);
            return $consultation;
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo registrar la consulta', timeout: 3000);
            dump($th->getMessage());
        }

    }

    public function increment_details()
    {
        $this->details++;
        $this->items->unshift(['id' => $this->details,'description' => 'some desc']);
    }

    public function cancel()
    {
        $this->redirect(route('consultations.index', $this->patient->id), navigate: true);
    }
}
