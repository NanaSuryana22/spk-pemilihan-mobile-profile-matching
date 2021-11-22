<?php

namespace App\Http\Livewire;

use App\Models\SubKriteria;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kriteria;

class SubKategoriDetail extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;
    public $filter = null;

    public function render($id)
    {
        return view('livewire.sub-kriteria-detail', ['filters' => Kriteria::orderBy('id', 'asc')->get(),
                                                     'datas' => SubKriteria::when($this->filter, function($query) {
                                                                                  $query->where('kriteria_id', $this->filter);
                                                                                    })->search(trim($this->search))
                                                                                      ->orderBy('created_at', 'desc')
                                                                                      ->paginate(12)
                                                    ]);
    }
}
