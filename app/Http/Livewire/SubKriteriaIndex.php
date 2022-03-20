<?php

namespace App\Http\Livewire;

use App\Models\SubKriteria;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Auth;

class SubKriteriaIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;
    public $filter = null;

    public function render()
    {
      $datas   = SubKriteria::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);
      $filters = Kriteria::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->get();  
      
      if($this->search !== null) {
        $datas = SubKriteria::when($this->filter, function($query) { $query->where('kriteria_id', $this->filter);
                                                                   })->search(trim($this->search))
                                                                     ->orderBy('created_at', 'desc')
                                                                     ->paginate(15);
      }
      return view('livewire.sub-kriteria-index', ['filters' => $filters,
                                                  'datas' => $datas
                                                 ]);
    }
}
