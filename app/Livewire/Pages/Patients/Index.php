<?php

namespace App\Livewire\Pages\Patients;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Patient;

class Index extends Component
{
    use withPagination;

    public $search = '';
    public $itemsPerPage;

    public function boot()
    {
        $this->itemsPerPage = env('PAGINATION_ITEMS_PER_PAGE', 10);
    }

    public function render()
    {
        $patients = null;
        if ($this->search != '') {
            $this->resetPage();
            $patients = Patient::where('names', 'ilike', '%' . $this->search . '%')
                ->orWhere('last_names', 'ilike', '%' . $this->search . '%')
                ->orWhere('dpi', 'ilike', '%' . $this->search . '%')
                ->paginate($this->itemsPerPage);
        }  else {
            $patients = Patient::paginate($this->itemsPerPage);
        }

        return view('livewire.pages.patients.index', [
            'patients' => $patients
        ]);
    }
}
