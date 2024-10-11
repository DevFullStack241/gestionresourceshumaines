<?php

namespace App\Livewire\Agent;

use Livewire\Component;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;

class AgentProfile extends Component
{
    public $tab = null;
    public $tabname = 'personal_details';
    public $name, $email, $username, $phone, $address;
    public $current_password, $new_password, $new_password_confirmation;

    protected $queryString = ['tab' => ['keep' => true]];

    protected $listeners = [
        'updateAgentProfilePage' => '$refresh'
    ];
    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->tabname;

        //POPULATE
        $agent = Agent::findOrFail(auth('agent')->id());
        $this->name = $agent->name;
        $this->email = $agent->email;
        $this->username = $agent->username;
        $this->phone = $agent->phone;
        $this->address = $agent->address;
    }

    public function updateAgentPersonalDetails()
    {
        //Validate the form
        $this->validate([
            'name' => 'required|min:5',
            'username' => 'nullable|min:5|unique:agents,username,' . auth('agent')->id(),
        ]);
        $agent = Agent::findOrFail(auth('agent')->id());
        $agent->name = $this->name;
        $agent->username = $this->username;
        $agent->address = $this->address;
        $agent->phone = $this->phone;
        $update = $agent->save();

        if ($update) {
            $this->dispatch('updateAdminResponsableAgentHeaderInfo');
            $this->showToastr('success', 'Personal Details have been successfully updated.');
        } else {
            $this->showToastr('error', 'Something went wrong.');
        }
    }

    public function updatePassword()
    {
        $agent = Agent::findOrFail(auth('agent')->id());

        //Validate the form
        $this->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($agent) {
                    if (!Hash::check($value, $agent->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }
            ],
            'new_password' => 'required|min:5|max:45|confirmed'
        ]);

        //Update password
        $update = $agent->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($update) {
            //Send email notification to agent that contains new password
            $data['agent'] = $agent;
            $data['new_password'] = $this->new_password;

            $mail_body = view('email-templates.agent-reset-email-template', $data);

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $agent->email,
                'mail_recipient_name' => $agent->name,
                'mail_subject' => 'Password changed',
                'mail_body' => $mail_body
            );

            sendEmail($mailConfig);
            $this->current_password = null;
            $this->new_password = null;
            $this->new_password_confirmation = null;
            $this->showToastr('success', 'Password successfully updated.');
        } else {
            $this->showToastr('error', 'Something went wrong.');
        }
    }

    public function showToastr($type, $message)
    {
        return $this->dispatch('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.agent.agent-profile', [
            'agent' => Agent::findOrFail(auth('agent')->id())
        ]);
    }
}
