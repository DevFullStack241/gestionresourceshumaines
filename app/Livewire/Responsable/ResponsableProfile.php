<?php

namespace App\Livewire\Responsable;

use Livewire\Component;
use App\Models\Responsable;
use Illuminate\Support\Facades\Hash;

class ResponsableProfile extends Component
{
    public $tab = null;
    public $tabname = 'personal_details';
    public $name, $email, $username, $phone, $address;
    public $current_password, $new_password, $new_password_confirmation;

    protected $queryString = ['tab' => ['keep' => true]];

    protected $listeners = [
        'updateResponsableProfilePage' => '$refresh'
    ];
    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->tabname;

        //POPULATE
        $responsable = Responsable::findOrFail(auth('responsable')->id());
        $this->name = $responsable->name;
        $this->email = $responsable->email;
        $this->username = $responsable->username;
        $this->phone = $responsable->phone;
        $this->address = $responsable->address;
    }

    public function updateResponsablePersonalDetails()
    {
        //Validate the form
        $this->validate([
            'name' => 'required|min:5',
            'username' => 'nullable|min:5|unique:responsables,username,' . auth('responsable')->id(),
        ]);
        $responsable = Responsable::findOrFail(auth('responsable')->id());
        $responsable->name = $this->name;
        $responsable->username = $this->username;
        $responsable->address = $this->address;
        $responsable->phone = $this->phone;
        $update = $responsable->save();

        if ($update) {
            $this->dispatch('updateAdminResponsableHeaderInfo');
            $this->showToastr('success', 'Personal Details have been successfully updated.');
        } else {
            $this->showToastr('error', 'Something went wrong.');
        }
    }

    public function updatePassword()
    {
        $responsable = Responsable::findOrFail(auth('responsable')->id());

        //Validate the form
        $this->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($responsable) {
                    if (!Hash::check($value, $responsable->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }
            ],
            'new_password' => 'required|min:5|max:45|confirmed'
        ]);

        //Update password
        $update = $responsable->update([
            'password' => Hash::make($this->new_password)
        ]);

        if ($update) {
            //Send email notification to responsable that contains new password
            $data['responsable'] = $responsable;
            $data['new_password'] = $this->new_password;

            $mail_body = view('email-templates.responsable-reset-email-template', $data);

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $responsable->email,
                'mail_recipient_name' => $responsable->name,
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
        return view('livewire.responsable.responsable-profile', [
            'responsable' => Responsable::findOrFail(auth('responsable')->id())
        ]);
    }
}
