<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Selisih;
use Illuminate\Support\Facades\Auth;

class SelisihIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        $datas   = Selisih::where('user_id', Auth::user()->id)->orderBy('bobot', 'desc')->paginate(15);
        $user_id = Auth::user()->id;

        if($this->search !== null) {
          $datas = Selisih::where('nilai','like', '%' . $this->search . '%')->where('user_id', $user_id)
                            ->orWhere('bobot','like', '%' . $this->search . '%')->where('user_id', $user_id)
                            ->orWhere('keterangan','like', '%' . $this->search . '%')->where('user_id', $user_id)
                            ->orderBy('bobot', 'desc')->paginate(15);
        }
        return view('livewire.selisih-index', ['datas' => $datas]);
    }
}
