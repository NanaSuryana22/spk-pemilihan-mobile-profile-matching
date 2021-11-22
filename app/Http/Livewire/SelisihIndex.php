<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Selisih;

class SelisihIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        return view('livewire.selisih-index', ['datas' => Selisih::where('bobot','like', '%' . $this->search . '%')
                                                                  ->orWhere('nilai','like', '%' . $this->search . '%')
                                                                  ->orWhere('keterangan','like', '%' . $this->search . '%')
                                                                  ->orderBy('created_at', 'desc')->paginate(15)
                                              ]);
    }
}
