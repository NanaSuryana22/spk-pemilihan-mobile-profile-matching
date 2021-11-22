<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserIndex extends Component
{
    public $search;
    protected $queryString = ['search'];
    use WithPagination;

    public function render()
    {
        return view('livewire.user-index', ['datas' => User::where('name','like', '%' . $this->search . '%')
                                                            ->orWhere('email','like', '%' . $this->search . '%')
                                                            ->orderBy('created_at', 'desc')->paginate(15)
                                           ]);
    }
}
