<?php

namespace App\Http\Livewire;

use App\Models\JenisKriteria;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kriteria;

class KriteriaIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;
    public $filter = null;

    public function render()
    {
      return view('livewire.kriteria-index', ['filters' => JenisKriteria::orderBy('id', 'asc')->get(),
                                              'datas' => Kriteria::when($this->filter, function($query) {
                                                                        $query->where('jenis_kriteria_id', $this->filter);
                                                                          })->search(trim($this->search))
                                                                            ->orderBy('jenis_kriteria_id', 'asc')
                                                                            ->paginate(12)
                                             ]);
    }
}
