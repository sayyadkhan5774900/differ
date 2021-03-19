<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Noticeboard as Notices;


class Noticeboard extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $noticeboards = Notices::with(['media'])->Paginate(1);

        return view('livewire.frontend.noticeboard', compact('noticeboards'));
    }
}
