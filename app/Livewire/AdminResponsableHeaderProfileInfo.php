<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Responsable;
use Illuminate\Support\Facades\Auth;

class AdminResponsableHeaderProfileInfo extends Component
{

    public $admin;
    public $responsable;

    public $listeners = [
        'updateAdminResponsableHeaderInfo'=>'$refresh'
    ];

    public function mount(){
        if( Auth::guard('admin')->check() ){
            $this->admin = Admin::findOrFail(auth()->id());
        }
        if( Auth::guard('responsable')->check() ){
            $this->responsable = Responsable::findOrFail(auth()->id());
        }
    }

    public function render()
    {
        return view('livewire.admin-responsable-header-profile-info');
    }
}
