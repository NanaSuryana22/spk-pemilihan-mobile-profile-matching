<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alternatif;
use Livewire\WithPagination;


class AlternatifIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        return view('livewire.alternatif-index', ['datas' => Alternatif::where('nama','like', '%' . $this->search . '%')
                                                                        ->orWhere('desc', 'like', '%' . $this->search . '%')
                                                                        ->paginate(15)
                                                 ]);
    }
}
