<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alternatif;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AlternatifIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        $datas = Alternatif::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(20);

        if($this->search !== null) {
            $datas = Alternatif::where('nama','like', '%' . $this->search . '%')
                                 ->where('user_id', Auth::user()->id)
                                 ->orWhere('desc', 'like', '%' . $this->search . '%')
                                 ->where('user_id', Auth::user()->id)
                                 ->paginate(20);
        }

        return view('livewire.alternatif-index', ['datas' => $datas]);
    }
}
