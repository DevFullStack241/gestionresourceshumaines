<?php

namespace App\Http\Controllers\Responsable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Responsable;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\DB;
use constGuards;
use constDefaults;
use Illuminate\Support\Facades\File;
use SawaStacks\Utils\Library\Kropify;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $data = [
            'pageTitle' => 'Responsable Login'
        ];
        return view('backend.pages.responsable.auth.login', $data);
    } //End Method

    public function register(Request $request)
    {
        $data = [
            'pageTitle' => 'Create Responsables Account'
        ];
        return view('backend.pages.responsable.auth.register', $data);
    } //End Method

    public function home(Request $request)
    {
        $data = [
            'pageTitle' => 'Responsable Dashboard'
        ];
        return view('backend.pages.responsable.home', $data);
    } //End Method

    public function createResponsable(Request $request)
    {
        //Validate Responsable Registration Form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:responsables',
            'password' => 'min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5'
        ]);

        $responsable = new Responsable();
        $responsable->name = $request->name;
        $responsable->email = $request->email;
        $responsable->password = Hash::make($request->password);
        $saved = $responsable->save();

        if ($saved) {
            //Generate token
            $token = base64_encode(Str::random(64));

            VerificationToken::create([
                'user_type' => 'responsable',
                'email' => $request->email,
                'token' => $token
            ]);

            $actionLink = route('responsable.verify', ['token' => $token]);
            $data['action_link'] = $actionLink;
            $data['responsable_name'] = $request->name;
            $data['responsable_email'] = $request->email;

            //Send Activation link to this responsable email
            $mail_body = view('email-templates.responsable-verify-template', $data)->render();

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $request->email,
                'mail_recipient_name' => $request->name,
                'mail_subject' => 'Verify Responsable Account',
                'mail_body' => $mail_body
            );

            if (sendEmail($mailConfig)) {
                return redirect()->route('responsable.register-success');
            } else {
                return redirect()->route('responsable.register')->with('fail', 'Une erreur s\'est produite lors de l\'envoi du lien de vérification.');
            }
        } else {
            return redirect()->route('responsable.register')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    } //End Method

    public function verifyAccount(Request $requet, $token)
    {
        $verifyToken = VerificationToken::where('token', $token)->first();

        if (!is_null($verifyToken)) {
            $responsable = Responsable::where('email', $verifyToken->email)->first();

            if (!$responsable->verified) {
                $responsable->verified = 1;
                $responsable->email_verified_at = Carbon::now();
                $responsable->save();

                return redirect()->route('responsable.login')->with('success', 'Bien ! Votre e-mail est vérifié. Connectez-vous avec vos identifiants et finalisez la configuration de votre compte responsable.');
            } else {
                return redirect()->route('responsable.login')->with('info', 'Votre adresse e-mail est déjà vérifiée. Vous pouvez maintenant vous connecter.');
            }
        } else {
            return redirect()->route('responsable.register')->with('fail', 'Jeton non valide.');
        }
    } //End Method

    public function registerSuccess(Request $request)
    {
        return view('backend.pages.responsable.register-success');
    } //End Method

    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:responsables,email',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'L\'e-mail ou le nom d\'utilisateur est requis.',
                'login_id.email' => 'Adresse email invalide.',
                'login_id.exists' => 'L\'e-mail n\'existe pas dans le système.',
                'password.required' => 'Le mot de passe est requis'
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:responsables,username',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'L\'e-mail ou le nom d\'utilisateur est requis.',
                'login_id.exists' => 'L\'e-mail n\'existe pas dans le système.',
                'password.required' => 'Le mot de passe est requis'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if (Auth::guard('responsable')->attempt($creds)) {
            // return redirect()->route('responsable.home');
            if (!auth('responsable')->user()->verified) {
                auth('responsable')->logout();
                return redirect()->route('responsable.login')->with('fail', 'Votre compte n\'est pas vérifié. Vérifiez votre email et cliquez sur le lien que nous vous avons envoyé afin de vérifier votre email pour le compte responsable.');
            } else {
                return redirect()->route('responsable.home');
            }
        } else {
            return redirect()->route('responsable.login')->withInput()->with('fail', 'Mot de passe incorrect.');
        }
    } //End Method

    public function logoutHandler(Request $request)
    {
        Auth::guard('responsable')->logout();
        return redirect()->route('responsable.login')->with('fail', 'Vous êtes déconnecté !');
    } //End Method

    public function forgotPassword(Request $request)
    {
        $data = [
            'pageTitle' => 'Forgot Password'
        ];
        return view('backend.pages.responsable.auth.forgot', $data);
    } //End Method

    public function sendPasswordResetLink(Request $request)
    {
        //Validate the form
        $request->validate([
            'email' => 'required|email|exists:responsables,email'
        ], [
            'email.required' => 'L\'attribut est obligatoire',
            'email.email' => 'Adresse email invalide',
            'email.exists' => 'L\'attribut n\'existe pas dans notre système'
        ]);

        //Get Responsable details
        $responsable = Responsable::where('email', $request->email)->first();

        //Generate token
        $token = base64_encode(Str::random(64));

        //Check if there is an existing reset password token for this responsable
        $oldToken = DB::table('password_reset_tokens')
            ->where(['email' => $responsable->email, 'guard' => constGuards::RESPONSABLE])
            ->first();

        if ($oldToken) {
            //UPDATE EXISTING TOKEN
            DB::table('password_reset_tokens')
                ->where(['email' => $responsable->email, 'guard' => constGuards::RESPONSABLE])
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            //INSERT NEW RESET PASSWORD TOKEN
            DB::table('password_reset_tokens')
                ->insert([
                    'email' => $responsable->email,
                    'guard' => constGuards::RESPONSABLE,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        }

        $actionLink = route('responsable.reset-password', ['token' => $token, 'email' => urlencode($responsable->email)]);

        $data['actionLink'] = $actionLink;
        $data['responsable'] = $responsable;
        $mail_body = view('email-templates.responsable-forgot-email-template', $data)->render();

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $responsable->email,
            'mail_recipient_name' => $responsable->name,
            'mail_subject' => 'Reset Password',
            'mail_body' => $mail_body
        );

        if (sendEmail($mailConfig)) {
            return redirect()->route('responsable.forgot-password')->with('success', 'Nous vous avons envoyé par e-mail un lien de réinitialisation de votre mot de passe.');
        } else {
            return redirect()->route('responsable.forgot-password')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    } //End Method

    public function showResetForm(Request $request, $token = null)
    {
        //Check if token exists
        $get_token = DB::table('password_reset_tokens')
            ->where(['token' => $token, 'guard' => constGuards::RESPONSABLE])
            ->first();

        if ($get_token) {
            //Check if this token is not expired
            $diffMins = Carbon::createFromFormat('Y-m-d H:i:s', $get_token->created_at)->diffInMinutes(Carbon::now());

            if ($diffMins > constDefaults::tokenExpiredMinutes) {
                //When token is older that 15 minutes
                return redirect()->route('responsable.forgot-password', ['token' => $token])->with('fail', 'Jeton expiré! Demandez un autre lien de réinitialisation du mot de passe.');
            } else {
                return view('backend.pages.responsable.auth.reset')->with(['token' => $token]);
            }
        } else {
            return redirect()->route('responsable.forgot-password', ['token' => $token])->with('fail', 'Jeton non valide! Demandez un autre lien de réinitialisation de mot de passe.');
        }
    } //End Method

    public function resetPasswordHandler(Request $request)
    {
        //Validate the form
        $request->validate([
            'new_password' => 'required|min:5|max:45|required_with:confirm_new_password|same:confirm_new_password',
            'confirm_new_password' => 'required'
        ]);

        $token = DB::table('password_reset_tokens')
            ->where(['token' => $request->token, 'guard' => constGuards::RESPONSABLE])
            ->first();

        //Get responsable details
        $responsable = Responsable::where('email', $token->email)->first();

        //Update responsable password
        Responsable::where('email', $responsable->email)->update([
            'password' => Hash::make($request->new_password)
        ]);

        //Delete token record
        DB::table('password_reset_tokens')->where([
            'email' => $responsable->email,
            'token' => $request->token,
            'guard' => constGuards::RESPONSABLE
        ])->delete();

        //Send email to notify responsable for new password
        $data['responsable'] = $responsable;
        $data['new_password'] = $request->new_password;

        $mail_body = view('email-templates.responsable-reset-email-template', $data);

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $responsable->email,
            'mail_recipient_name' => $responsable->name,
            'mail_subject' => 'Password Changed',
            'mail_body' => $mail_body
        );

        sendEmail($mailConfig);
        return redirect()->route('responsable.login')->with('success', 'C\'est fait ! Votre mot de passe a été modifié. Utilisez un nouveau mot de passe pour vous connecter au système.');
    } //End Method

    public function profileView(Request $request)
    {
        $data = [
            'pageTitle' => 'Profile'
        ];
        return view('backend.pages.responsable.profile', $data);
    }

    public function changeProfilePicture(Request $request)
    {
        $responsable = Responsable::findOrFail(auth('responsable')->id());
        $path = 'images/users/responsables/';
        $file = $request->file('responsableProfilePictureFile');
        $old_picture = $responsable->getAttributes()['picture'];
        $filename = 'RESPONSABLE_IMG_' . $responsable->id . '.jpg';

        $upload = Kropify::getFile($file, $filename)->maxWoH(325)->save($path);
        $infos = $upload->getInfo();

        if ($upload) {
            if ($old_picture != null && File::exists(public_path($path . $old_picture))) {
                File::delete(public_path($path . $old_picture));
            }
            $responsable->update(['picture' => $infos->getName]);

            return response()->json(['status' => 1, 'msg' => 'Votre photo de profil a été mise à jour avec succès.']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Quelque chose s\'est mal passé.']);
        }
    }
}
