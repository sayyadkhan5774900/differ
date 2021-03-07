<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithPagination;


class Faqs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.frontend.faqs',[
            'faqs' => Faq::paginate(5),
        ]);
    }
}
