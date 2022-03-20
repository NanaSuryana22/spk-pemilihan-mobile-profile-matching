<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JenisKriteria;
use Illuminate\Support\Facades\Auth;

class JenisKriteriaIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        $datas = JenisKriteria::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(15);

        if($this->search !== null) {
            $datas = JenisKriteria::where('nama','like', '%' . $this->search . '%')
                                    ->where('user_id', Auth::user()->id)
                                    ->orWhere('nilai','like', '%' . $this->search . '%')
                                    ->where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')->paginate(15);
        }

        return view('livewire.jenis-kriteria-index', ['datas' => $datas]);
    }
}