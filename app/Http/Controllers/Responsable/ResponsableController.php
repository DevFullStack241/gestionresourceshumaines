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
use Mberecall\Kropify\Kropify;
use App\Models\Shop;

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

            //Send Activation link to this seller email
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
                return redirect()->route('responsable.register')->with('fail', 'Something went wrong while sending verification link.');
            }
        } else {
            return redirect()->route('responsable.register')->with('fail', 'Something went wrong.');
        }
    } //End Method

    public function verifyAccount(Request $requet, $token){
        $verifyToken = VerificationToken::where('token',$token)->first();

        if( !is_null($verifyToken) ){
            $responsable = Responsable::where('email',$verifyToken->email)->first();

            if( !$responsable->verified ){
                $responsable->verified = 1;
                $responsable->email_verified_at = Carbon::now();
                $responsable->save();

                return redirect()->route('responsable.login')->with('success','Good!, Your e-mail is verified. Login with your credentials and complete setup your seller account.');
            }else{
                return redirect()->route('responsable.login')->with('info','Your e-mail is already verified. You can now login.');
            }
        }else{
            return redirect()->route('responsable.register')->with('fail','Invalid Token.');
        }
    } //End Method

    public function registerSuccess(Request $request)
    {
        return view('backend.pages.responsable.register-success');
    } //End Method

    public function loginHandler(Request $request){
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if( $fieldType == 'email' ){
            $request->validate([
                'login_id'=>'required|email|exists:responsables,email',
                'password'=>'required|min:5|max:45'
            ],[
                'login_id.required'=>'Email or Username is required.',
                'login_id.email'=>'Invalid email address.',
                'login_id.exists'=>'Email is not exists in system.',
                'password.required'=>'Password is required'
            ]);
        }else{
            $request->validate([
                'login_id'=>'required|exists:responsables,username',
                'password'=>'required|min:5|max:45'
            ],[
                'login_id.required'=>'Email or Username is required.',
                'login_id.exists'=>'Username is not exists in system.',
                'password.required'=>'Password is required'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if( Auth::guard('responsable')->attempt($creds) ){
            // return redirect()->route('seller.home');
            if( !auth('responsable')->user()->verified ){
                auth('responsable')->logout();
                return redirect()->route('responsable.login')->with('fail','Your account is not verified. Check in your email and click on the link we had sent in order to verify your email for seller account.');
            }else{
                return redirect()->route('responsable.home');
            }
        }else{
            return redirect()->route('responsable.login')->withInput()->with('fail','Incorrect password.');
        }
    } //End Method
}
