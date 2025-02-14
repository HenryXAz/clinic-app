<?php

namespace App\Livewire\Pages\Consultations;

use App\Models\MedicalConsultation;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public Patient $patient;
    public $search = null;

    public function mount()
    {
        $id = \Route::current()->parameter('id');
        $this->patient = Patient::with('department')->with('town')->findOrFail($id);
    }

    public function render()
    {
        $consultations = null;

        if ($this->search != null) {
            $consultations = MedicalConsultation::query()
                ->whereDate('start_date', '=', $this->search)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $consultations = MedicalConsultation::query()
                ->where('patient_id', $this->patient->id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('livewire.pages.consultations.index',
        [
            'consultations' => $consultations,
        ]);
    }
}
