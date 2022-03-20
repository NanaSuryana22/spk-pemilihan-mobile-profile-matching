<?php

namespace App\Http\Livewire;

use App\Models\JenisKriteria;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Auth;

class KriteriaIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;
    public $filter = null;

    public function render()
    {
      $datas   = Kriteria::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
      $filters = JenisKriteria::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();

      if($this->search !== null) {
        $datas = Kriteria::when($this->filter, function($query) { $query->where('jenis_kriteria_id', $this->filter);
                                                                })->search(trim($this->search))
                                                                  ->orderBy('jenis_kriteria_id', 'asc')
                                                                  ->paginate(15);
      }
      return view('livewire.kriteria-index', ['filters' => $filters,
                                              'datas' => $datas
                                             ]);
    }
}
