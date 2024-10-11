<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\DB;
use constGuards;
use constDefaults;
use Illuminate\Support\Facades\File;
use SawaStacks\Utils\Library\Kropify;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $data = [
            'pageTitle' => 'Agent Login'
        ];
        return view('backend.pages.agent.auth.login', $data);
    } //End Method

    public function register(Request $request)
    {
        $data = [
            'pageTitle' => 'Create Agents Account'
        ];
        return view('backend.pages.agent.auth.register', $data);
    } //End Method

    public function home(Request $request)
    {
        $data = [
            'pageTitle' => 'Agent Dashboard'
        ];
        return view('backend.pages.agent.home', $data);
    } //End Method

    public function createAgent(Request $request)
    {
        //Validate Agent Registration Form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:agents',
            'password' => 'min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5'
        ]);

        $agent = new Agent();
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->password = Hash::make($request->password);
        $saved = $agent->save();

        if ($saved) {
            //Generate token
            $token = base64_encode(Str::random(64));

            VerificationToken::create([
                'user_type' => 'agent',
                'email' => $request->email,
                'token' => $token
            ]);

            $actionLink = route('agent.verify', ['token' => $token]);
            $data['action_link'] = $actionLink;
            $data['agent_name'] = $request->name;
            $data['agent_email'] = $request->email;

            //Send Activation link to this agent email
            $mail_body = view('email-templates.agent-verify-template', $data)->render();

            $mailConfig = array(
                'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                'mail_from_name' => env('EMAIL_FROM_NAME'),
                'mail_recipient_email' => $request->email,
                'mail_recipient_name' => $request->name,
                'mail_subject' => 'Verify Agent Account',
                'mail_body' => $mail_body
            );

            if (sendEmail($mailConfig)) {
                return redirect()->route('agent.register-success');
            } else {
                return redirect()->route('agent.register')->with('fail', 'Une erreur s\'est produite lors de l\'envoi du lien de vérification.');
            }
        } else {
            return redirect()->route('agent.register')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    } //End Method

    public function verifyAccount(Request $requet, $token)
    {
        $verifyToken = VerificationToken::where('token', $token)->first();

        if (!is_null($verifyToken)) {
            $agent = Agent::where('email', $verifyToken->email)->first();

            if (!$agent->verified) {
                $agent->verified = 1;
                $agent->email_verified_at = Carbon::now();
                $agent->save();

                return redirect()->route('agent.login')->with('success', 'Bien ! Votre e-mail est vérifié. Connectez-vous avec vos identifiants et finalisez la configuration de votre compte agent.');
            } else {
                return redirect()->route('agent.login')->with('info', 'Votre adresse e-mail est déjà vérifiée. Vous pouvez maintenant vous connecter.');
            }
        } else {
            return redirect()->route('agent.register')->with('fail', 'Jeton non valide.');
        }
    } //End Method

    public function registerSuccess(Request $request)
    {
        return view('backend.pages.agent.register-success');
    } //End Method

    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:agents,email',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'L\'e-mail ou le nom d\'utilisateur est requis.',
                'login_id.email' => 'Adresse email invalide.',
                'login_id.exists' => 'L\'e-mail n\'existe pas dans le système.',
                'password.required' => 'Le mot de passe est requis'
            ]);
        } else {
            $request->validate([
                'login_id' => 'required|exists:agents,username',
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

        if (Auth::guard('agent')->attempt($creds)) {
            // return redirect()->route('agent.home');
            if (!auth('agent')->user()->verified) {
                auth('agent')->logout();
                return redirect()->route('agent.login')->with('fail', 'Votre compte n\'est pas vérifié. Vérifiez votre email et cliquez sur le lien que nous vous avons envoyé afin de vérifier votre email pour le compte agent.');
            } else {
                return redirect()->route('agent.home');
            }
        } else {
            return redirect()->route('agent.login')->withInput()->with('fail', 'Mot de passe incorrect.');
        }
    } //End Method

    public function logoutHandler(Request $request)
    {
        Auth::guard('agent')->logout();
        return redirect()->route('agent.login')->with('fail', 'Vous êtes déconnecté !');
    } //End Method

    public function forgotPassword(Request $request)
    {
        $data = [
            'pageTitle' => 'Forgot Password'
        ];
        return view('backend.pages.agent.auth.forgot', $data);
    } //End Method

    public function sendPasswordResetLink(Request $request)
    {
        //Validate the form
        $request->validate([
            'email' => 'required|email|exists:agents,email'
        ], [
            'email.required' => 'L\'attribut est obligatoire',
            'email.email' => 'Adresse email invalide',
            'email.exists' => 'L\'attribut n\'existe pas dans notre système'
        ]);

        //Get Agent details
        $agent = Agent::where('email', $request->email)->first();

        //Generate token
        $token = base64_encode(Str::random(64));

        //Check if there is an existing reset password token for this agent
        $oldToken = DB::table('password_reset_tokens')
            ->where(['email' => $agent->email, 'guard' => constGuards::AGENT])
            ->first();

        if ($oldToken) {
            //UPDATE EXISTING TOKEN
            DB::table('password_reset_tokens')
                ->where(['email' => $agent->email, 'guard' => constGuards::AGENT])
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            //INSERT NEW RESET PASSWORD TOKEN
            DB::table('password_reset_tokens')
                ->insert([
                    'email' => $agent->email,
                    'guard' => constGuards::AGENT,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        }

        $actionLink = route('agent.reset-password', ['token' => $token, 'email' => urlencode($agent->email)]);

        $data['actionLink'] = $actionLink;
        $data['agent'] = $agent;
        $mail_body = view('email-templates.agent-forgot-email-template', $data)->render();

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $agent->email,
            'mail_recipient_name' => $agent->name,
            'mail_subject' => 'Reset Password',
            'mail_body' => $mail_body
        );

        if (sendEmail($mailConfig)) {
            return redirect()->route('agent.forgot-password')->with('success', 'Nous vous avons envoyé par e-mail un lien de réinitialisation de votre mot de passe.');
        } else {
            return redirect()->route('agent.forgot-password')->with('fail', 'Quelque chose s\'est mal passé.');
        }
    } //End Method

    public function showResetForm(Request $request, $token = null)
    {
        //Check if token exists
        $get_token = DB::table('password_reset_tokens')
            ->where(['token' => $token, 'guard' => constGuards::AGENT])
            ->first();

        if ($get_token) {
            //Check if this token is not expired
            $diffMins = Carbon::createFromFormat('Y-m-d H:i:s', $get_token->created_at)->diffInMinutes(Carbon::now());

            if ($diffMins > constDefaults::tokenExpiredMinutes) {
                //When token is older that 15 minutes
                return redirect()->route('agent.forgot-password', ['token' => $token])->with('fail', 'Jeton expiré! Demandez un autre lien de réinitialisation du mot de passe.');
            } else {
                return view('backend.pages.agent.auth.reset')->with(['token' => $token]);
            }
        } else {
            return redirect()->route('agent.forgot-password', ['token' => $token])->with('fail', 'Jeton non valide! Demandez un autre lien de réinitialisation de mot de passe.');
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
            ->where(['token' => $request->token, 'guard' => constGuards::AGENT])
            ->first();

        //Get agent details
        $agent = Agent::where('email', $token->email)->first();

        //Update agent password
        Agent::where('email', $agent->email)->update([
            'password' => Hash::make($request->new_password)
        ]);

        //Delete token record
        DB::table('password_reset_tokens')->where([
            'email' => $agent->email,
            'token' => $request->token,
            'guard' => constGuards::AGENT
        ])->delete();

        //Send email to notify agent for new password
        $data['agent'] = $agent;
        $data['new_password'] = $request->new_password;

        $mail_body = view('email-templates.agent-reset-email-template', $data);

        $mailConfig = array(
            'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
            'mail_from_name' => env('EMAIL_FROM_NAME'),
            'mail_recipient_email' => $agent->email,
            'mail_recipient_name' => $agent->name,
            'mail_subject' => 'Password Changed',
            'mail_body' => $mail_body
        );

        sendEmail($mailConfig);
        return redirect()->route('agent.login')->with('success', 'C\'est fait ! Votre mot de passe a été modifié. Utilisez un nouveau mot de passe pour vous connecter au système.');
    } //End Method

    public function profileView(Request $request)
    {
        $data = [
            'pageTitle' => 'Profile'
        ];
        return view('backend.pages.agent.profile', $data);
    }

    public function changeProfilePicture(Request $request)
    {
        $agent = Agent::findOrFail(auth('agent')->id());
        $path = 'images/users/agents/';
        $file = $request->file('agentProfilePictureFile');
        $old_picture = $agent->getAttributes()['picture'];
        $filename = 'AGENT_IMG_' . $agent->id . '.jpg';

        $upload = Kropify::getFile($file, $filename)->maxWoH(325)->save($path);
        $infos = $upload->getInfo();

        if ($upload) {
            if ($old_picture != null && File::exists(public_path($path . $old_picture))) {
                File::delete(public_path($path . $old_picture));
            }
            $agent->update(['picture' => $infos->getName]);

            return response()->json(['status' => 1, 'msg' => 'Votre photo de profil a été mise à jour avec succès.']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Quelque chose s\'est mal passé.']);
        }
    }
}
