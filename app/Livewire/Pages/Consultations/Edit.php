<?php

namespace App\Livewire\Pages\Consultations;

use App\Livewire\Forms\Consultation\ConsultationForm;
use App\Livewire\Forms\Consultation\DetailForm;
use App\Livewire\Forms\Consultation\MedicationForm;
use App\Models\CurrentMedication;
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
    public MedicationForm $medication_form;
    public CurrentMedication $current_medication;

    public $modal_detail = false;

    public $confirm_completion_modal = false;
    public $cancel_modal = false;
    public $medication_modal = false;
    public $medication_delete_modal = false;
    public $detail_delete_modal = false;

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

            $medications = CurrentMedication::query()
            ->where('patient_id', $this->patient->id)
            ->where('consultation_id', $this->consultation->id)
            ->paginate(10);

        return view('livewire.pages.consultations.edit', compact('details'), compact('medications'));
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
            ]);

            DB::commit();
            $this->success('Actualización realizada con éxito', timeout: 3000);
        }catch (\Throwable $exception) {
            DB::rollBack();
            $this->error('No se pudo completar la actualización', timeout: 3000);
        }
    }

    public function delete() : void
    {

    }

    public function add_new_detail()
    {
        $this->detail_form->validate();

        DB::beginTransaction();

        try {
            $data = $this->detail_form->toArray();
            unset($data['id']);
            $detail = MedicalConsultationDetail::updateOrCreate(['id' => $this->detail_form->id],
                [
                    ...$data,
                    'medical_consultation_id' => $this->consultation->id,
                ],
            );

           DB::commit();
            $this->success('Descripción registrada con éxito', timeout: 3000);
            $this->detail_form->reset();
        } catch (\Throwable $th) {
            dump($th->getMessage());
            DB::rollBack();
            $this->error('No se pudo registrar la descripción', timeout: 3000);
        } finally {
            $this->modal_detail = false;
        }
    }

    public function update_or_create_medicine() : void
    {
        $this->medication_form->validate();
        DB::beginTransaction();

        try {
            $data = $this->medication_form->toArray();
            unset($data['id']);

            CurrentMedication::updateOrCreate(['id' => $this->medication_form?->id],
                [
                    ...$data,
                    'patient_id' => $this->patient->id,
                    'consultation_id' => $this->consultation->id,
                ]
            );

            $this->success('Medicamento registrado correctamente', timeout: 3000);
            DB::commit();
            $this->medication_form->reset();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo registrar/actualizar el medicamento', timeout: 3000);
        }
    }

    public function open_and_fill_medication_form(mixed $id) : void
    {
        $medicine = CurrentMedication::find($id);
        $this->medication_form->set_values($medicine);
        $this->medication_modal = true;
    }


    public function open_medication_delete_form(mixed $id) : void
    {
        $medicine = CurrentMedication::find($id);
        $this->medication_form->set_values($medicine);
        $this->medication_delete_modal = true;
    }
    public function open_and_fill_detail_form(mixed $id) : void
    {
        $detail = MedicalConsultationDetail::find($id);
        $this->detail_form->set_values($detail);
        $this->modal_detail = true;
    }

    public function open_and_reset_detail_form() : void
    {
        $this->detail_form->reset();
        $this->modal_detail = true;
    }

    public function open_and_reset_medication_form() : void
    {
        $this->medication_form->reset();
        $this->medication_modal = true;
    }

    public function open_detail_delete_form(mixed $id) : void
    {
        $detail = MedicalConsultationDetail::find($id);
        $this->detail_form->set_values($detail);
        $this->detail_delete_modal = true;
    }

    public function delete_detail() : void
    {
        DB::beginTransaction();

        try {
            $detail = MedicalConsultationDetail::find($this->detail_form->id);
            $detail->delete();
            $this->detail_delete_modal = false;
            $this->success('Comentario eliminado correctamente', timeout: 3000);
        } catch ( \Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo eliminar el comentario', timeout: 3000);
        }
    }

    public function delete_medication() : void
    {
        DB::beginTransaction();

        try {
            $medicine = CurrentMedication::find($this->medication_form->id);
            $medicine->delete();
            DB::commit();
            $this->success('Medicamento eliminado correctamente', timeout: 3000);
            $this->medication_delete_modal = false;
            $this->medication_form->reset();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo eliminar el medicamento', timeout: 3000);
        }
    }

    public function cancel() : void
    {
        $this->redirect(route('consultations.index', [
            'id' => $this->patient->id,
            'consultation_id' => $this->consultation->id,
        ]), navigate: true);
    }
}
