<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Recover_code_PasswordUserRequest;
use App\Classes\PasswordGeneratorRand;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecoverPasswordMail;

class LoginController extends Controller
{

    private $objUser;

    public function __construct()
    {
        $this->objUser = new UserModel();
    }

    public function loading(Request $request)
    {
        $dataUser = $this->objUser->firstWhere(['nm_email'=>$request->Email]);
        if( $dataUser ) {
            if(Hash::check($request->Password, $dataUser->nm_password)){
                Session::put([
                    'login' => 'ativo',
                    'id' => $dataUser->cd_user
                ]);
                return response()->json([
                    "success" => true,
                ]);
            }
        }        
       // Session::flash('msg', 'E-mail ou senha incorreto');
        return response()->json([
            "success" => false,
            "msg" => 'E-mail ou senha incorreto'
        ]);
    }

    public function logout()
    {
        Session::flush();
        return redirect( route('checkSession') );
    }

    public function checkSession()
    {
        if(Session::has('login')){
            return redirect( route('home.index') );
        }else{
            return view('index');
        }
    }

    public function recover_password()
    {
        return view('recover_password');
    }
    
    public function generate_recover_password(Recover_code_PasswordUserRequest $request)
    {
        $passwordRand = PasswordGeneratorRand::generatePassword();
        Mail::to($request->email_contact )->send(new RecoverPasswordMail($passwordRand) );

        // $dataUser = $this->objUser->firstWhere(['nm_contact_email' => $request->email_contact]);
        // $dataUser->nm_password = Hash::make($passwordRand);
        // $dataUser->save();    
        return redirect( route('recoverPassword.recover_password') )->with('msg','Código enviado.');           
        
        
    }
    
}
