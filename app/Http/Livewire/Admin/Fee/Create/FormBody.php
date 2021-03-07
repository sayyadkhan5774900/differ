<?php

namespace App\Http\Livewire\Admin\Fee\Create;

use App\Models\FeeType;
use App\Models\Student;
use Livewire\Component;

class FormBody extends Component
{
    public $students;
    public $feeTypes;
    public $feeType;
    public $title;
    public $fee;
    public $type;
    public $no_of_months;

    public function mount()
    {
        $this->students = Student::all();
        $this->feeTypes = FeeType::all();
    }

    public function updatedFeeType($value)
    {
        if ($value) {
            $feeType = FeeType::find($value);
            $this->title = $feeType->title;
            $this->fee = $feeType->fee;
            $this->type = $feeType->type;
            $this->no_of_months = $feeType->no_of_months;
        } else {
            $this->title = null;
            $this->fee = null;
            $this->type = null;
            $this->no_of_months = null;
        }
    }

    public function render()
    {
        return view('livewire.admin.fee.create.form-body');
    }
}
