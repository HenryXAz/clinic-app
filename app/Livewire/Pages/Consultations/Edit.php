<?php

namespace App\Livewire\Pages\Consultations;

use App\Livewire\Forms\Consultation\ConsultationForm;
use App\Livewire\Forms\Consultation\DetailForm;
use App\Models\MedicalConsultationDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use App\Models\MedicalConsultation;
use App\Models\Patient;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast;
    use WithPagination;

    public MedicalConsultation $consultation;
    public ConsultationForm $consultation_form;
    public Patient $patient;
    public DetailForm $detail_form;

    public $modal_detail = false;

    public $confirm_completion_modal = false;
    public $cancel_modal = false;

    public function mount()
    {
        $id = \Route::current()->parameter('id');
        $consultation_id = \Route::current()->parameter('consultation_id');
        $this->patient = Patient::findOrFail($id);
        $this->consultation = MedicalConsultation::findOrFail($consultation_id);
        $this->consultation_form->setConsultation($this->consultation);
    }

    public function render()
    {
        $details = MedicalConsultationDetail::query()
            ->where('medical_consultation_id', $this->consultation->id)
            ->orderBy('created_at', 'desc')->paginate(20);
        return view('livewire.pages.consultations.edit', compact('details'));
    }

    public function save_and_archive()
    {
        $this->confirm_completion_modal = false;
        $this->consultation_form->validate();
        $this->save(has_been_completed: true);
    }

    public function save_changes()
    {
        $this->consultation_form->validate();
        $this->save();
    }

    private function save(bool $has_been_completed = false)
    {
        DB::beginTransaction();
        try {

            $this->consultation->update([
                ...$this->consultation_form->toArray(),
                'has_been_completed' => $has_been_completed,
                'has_been_scheduled' => !$has_been_completed,
                'end_date' => $this->consultation_form->start_date,
            ]);

            DB::commit();
            $this->success('Actualización realizada con éxito', timeout: 3000);
        }catch (\Throwable $exception) {
            DB::rollBack();
            $this->error('No se pudo completar la actualización', timeout: 3000);
        }
    }

    public function add_new_detail()
    {
        $this->detail_form->validate();

        DB::beginTransaction();

        try {
            $detail = new MedicalConsultationDetail();
            $detail->description  = $this->detail_form->description;
            $detail->consultation()->associate($this->consultation);
            $detail->save();

            DB::commit();
            $this->success('Descripción registrada con éxito', timeout: 3000);
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo registrar la descripción', timeout: 3000);
        } finally {
            $this->modal_detail = false;
        }
    }

    public function cancel()
    {
        $this->redirect(route('consultations.index', [
            'id' => $this->patient->id,
            'consultation_id' => $this->consultation->id,
        ]), navigate: true);
    }
}
