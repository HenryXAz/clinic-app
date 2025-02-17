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

class Edit extends Component
{
    use Toast;

    public Patient $patient;

    public PatientInfoForm $infoForm;
    public HereditaryBackgroundForm $hereditaryForm;
    public NoPathologyBackgroundForm $noPathologyBackgroundForm;
    public ObstetricsForm $obstetricsForm;
    public PersonalHistoryForm $personalHistoryForm;
    public PatientContactForm $contactForm;

    public $departments;
    public $departmentId = '';
    public $town = null;

    public $towns = [];

    public $delete_confirmation_modal = false;

    public $show_personal_info = false;
    public $show_hereditary_background = false;
    public $show_no_pathology_background = false;
    public $show_obstetrics_background = false;
    public $show_personal_history_background = false;
    public $show_contact_info = false;

    private function selectTownForDepartment() : void
    {
        if ($this->infoForm->department_id != null && $this->infoForm->department_id != 0) {
            $this->towns = CountryTown::where('country_department_id', $this->infoForm->department_id)->get();
        } else {
            $this->towns = [];
        }
    }

    public function mount(Patient $patient)
    {
        $this->departments = CountryDepartment::all();

        $this->patient = $patient;
        $this->infoForm->set_values($this->patient);
        $this->hereditaryForm->set_values($this->patient);
        $this->noPathologyBackgroundForm->set_values($this->patient);
        $this->obstetricsForm->set_values($this->patient);
        $this->personalHistoryForm->set_values($this->patient);
        $this->contactForm->set_values($this->patient);

        $this->selectTownForDepartment();
    }

    public function render()
    {


        return view('livewire.pages.patients.edit');
    }

    public function update_personal_info() : void
    {
        $this->infoForm->validate();

        DB::beginTransaction();
        try {
            $data = $this->infoForm->toArray();
            $this->patient->update($data);

            DB::commit();
            $this->success('Se actualizó la información personal', timeout: 3000);
        } catch (\Throwable $th) {
            DB::rollBack();

        }
    }

    public function update_hereditary_background() : void
    {
        $this->hereditaryForm->validate();
        DB::beginTransaction();

        try {
            $data = $this->hereditaryForm->toArray();
            $this->patient->update($data);
            DB::commit();

            $this->success('Se actualizó antencedentes heredofamiliares', timeout: 3000);
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo actualizar la información', timeout: 3000);
        }
    }

    public function update_no_pathology_background() : void
    {
        $this->noPathologyBackgroundForm->validate();
        DB::beginTransaction();

        try {
            $data = $this->noPathologyBackgroundForm->toArray();
            $this->patient->update($data);
            DB::commit();
            $this->success('Se actualizó antecedentes personales no patológicos');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo actualizar la información', timeout: 3000);
        }
    }

    public function update_obstetric_info() : void
    {
        $this->infoForm->validate();
        DB::beginTransaction();

        try {
            $data = $this->obstetricsForm->toArray();
            $this->patient->update($data);
            DB::commit();

            $this->success('Se actualizó antecedentes ginecoobstétricos', timeout: 3000);
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo actualizar la información', timeout: 3000);
        }
    }

    public function update_personal_history() : void
    {
        $this->infoForm->validate();
        DB::beginTransaction();
        try {
            $data = $this->personalHistoryForm->toArray();
            $this->patient->update($data);

            DB::commit();
            $this->success('Se actualizaron antecedentes personales patológicos', timeout: 3000);
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo actualizar la información', timeout: 3000);
        }
    }

    public function update_contact() : void
    {
        $this->contactForm->validate();
        DB::beginTransaction();
        try {
            $data = $this->contactForm->toArray();
            $this->patient->update($data);
            DB::commit();
            $this->success('Se actualizó la información de contacto', timeout: 3000);
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('No se pudo actualizar la información', timeout: 3000);
        }
    }

    public function delete() : void
    {
        DB::beginTransaction();
        $this->patient->delete();
        DB::commit();

        $this->redirectRoute('patients.index', navigate: true);
    }
}
