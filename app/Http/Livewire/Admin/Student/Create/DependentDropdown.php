<?php

namespace App\Http\Livewire\Admin\Student\Create;

use App\Models\Batch;
use App\Models\Degree;
use Livewire\Component;

class DependentDropdown extends Component
{
    public $degrees;
    public $batches;

    public $degree;
    public $batch;

    public function mount($student = null)
    {
        if (isset($student)) {
            $this->degrees = Degree::all();
            $this->batches = Batch::where('degree_id', $student->degree->id)->active()->get();
            $this->degree = $student->degree->id;
            $this->batch = $student->batch->id;
        } else {
            $this->degrees = Degree::all();
            $this->batches = collect();
        }
    }

    public function updatedDegree($value)
    {
        $this->batches = Batch::where('degree_id', $value)->active()->get();
        $this->batch = '';
    }

    public function render()
    {
        return view('livewire.admin.student.create.dependent-dropdown');
    }
}
