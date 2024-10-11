<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Agent;
use App\Models\Responsable;
use Illuminate\Support\Facades\Auth;

class AdminResponsableAgentHeaderProfileInfo extends Component
{

    public $admin;
    public $responsable;
    public $agent;

    public $listeners = [
        'updateAdminResponsableAgentHeaderInfo'=>'$refresh'
    ];

    public function mount(){
        if( Auth::guard('admin')->check() ){
            $this->admin = Admin::findOrFail(auth()->id());
        }
        if( Auth::guard('responsable')->check() ){
            $this->responsable = Responsable::findOrFail(auth()->id());
        }
        if( Auth::guard('agent')->check() ){
            $this->agent = Agent::findOrFail(auth()->id());
        }
    }

    public function render()
    {
        return view('livewire.admin-responsable-agent-header-profile-info');
    }
}
