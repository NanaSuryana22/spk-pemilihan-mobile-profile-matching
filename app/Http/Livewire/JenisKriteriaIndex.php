<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JenisKriteria;

class JenisKriteriaIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        return view('livewire.jenis-kriteria-index', ['datas' => JenisKriteria::where('nama','like', '%' . $this->search . '%')
                                                                  ->orWhere('nilai','like', '%' . $this->search . '%')
                                                                  ->orderBy('created_at', 'desc')->paginate(15)
                                                     ]);
    }
}
