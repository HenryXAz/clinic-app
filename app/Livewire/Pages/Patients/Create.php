<?php

namespace App\Livewire\Pages\Patients;

use App\Livewire\Forms\Patient\HereditaryBackgroundForm;
use App\Livewire\Forms\Patient\NoPathologyBackgroundForm;
use App\Livewire\Forms\Patient\ObstetricsForm;
use App\Livewire\Forms\Patient\PatientContactForm;
use App\Livewire\Forms\Patient\PatientInfoForm;
use App\Livewire\Forms\Patient\PersonalHistoryForm;
use App\Models\CountryDepartment;
use App\Models\CountryTown;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mary\Traits\Toast;

class Create extends Component
{
    use Toast;

    public $step = 1;
    public bool $open_cancel_modal = false;
    public $departments;
    public $departmentId = '';
    public $town = null;

    public $towns = [];

    public PatientInfoForm $infoForm;
    public PatientContactForm $contactForm;
    public HereditaryBackgroundForm $hereditaryBackgroundForm;
    public NoPathologyBackgroundForm $noPathologyBackgroundForm;
    public ObstetricsForm $obstetricsForm;
    public PersonalHistoryForm $personalHistoryForm;

    private function selectTownForDepartment() : void
    {
        if ($this->infoForm->department_id != null && $this->infoForm->department_id != 0) {
            $this->towns = CountryTown::where('country_department_id', $this->infoForm->department_id)->get();
        } else {
            $this->towns = [];
        }
    }

    public function mount()
    {
        $this->departments = CountryDepartment::all();
        $this->selectTownForDepartment();
    }

    public function updatedInfoFormDepartmentId($value)
    {
        $this->selectTownForDepartment();
    }

    public function render()
    {
        return view('livewire.pages.patients.create');
    }

    public function next() : void
    {
//        $this->step++;
        if (($this->step + 1) == 2 && $this->infoForm->validate()) {
            $this->step = 2;
            return;
        }

        if (($this->step + 1) == 3 && $this->hereditaryBackgroundForm->validate()) {
            $this->step++;
            return;
        }

        if (($this->step + 1) == 4  && $this->noPathologyBackgroundForm->validate()) {
            $this->step++;
            return;
        }

        if (($this->step + 1) == 5 && $this->obstetricsForm->validate()) {
            $this->step++;
            return;
        }

        if (($this->step + 1) == 6  && $this->personalHistoryForm->validate()) {
            $this->step++;
            return;
        }

        if (($this->step + 1) == 7 && $this->contactForm->validate()) {
            $this->step++;
            return;
        }
    }

    public function prev() : void
    {
        $this->step--;

        if ($this->step == 1) {
            $this->infoForm->clearValidation();
            $this->contactForm->clearValidation();
        }
    }

    public function save()
    {
        DB::beginTransaction();
        try {
            $data = [
                ...$this->infoForm->toArray(),
                ...$this->contactForm->toArray(),
                ...$this->hereditaryBackgroundForm->toArray(),
                ...$this->noPathologyBackgroundForm->toArray(),
                ...$this->obstetricsForm->toArray(),
                ...$this->personalHistoryForm->toArray(),
            ];

            $newPatientId = Patient::create($data);
            DB::commit();
            $this->success('información guardada con éxito', timeout: 3000);
            $this->redirect(route("consultations.clinic_card.index", $newPatientId));
        } catch (\Throwable $th) {
            DB::rollBack();
            dump('Error: ' . $th->getMessage());
            $this->error('No se pudo guardar la información');
        }
    }

    public function cancel()
    {
        $this->redirect(route('patients.index'), navigate: true);
    }

}
