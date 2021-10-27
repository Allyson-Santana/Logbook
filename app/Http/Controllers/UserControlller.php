<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\Update_nameUserRequest;
use App\Http\Requests\Update_emailUserRequest;
use App\Http\Requests\Update_email_contactUserRequest;
use App\Http\Requests\Update_passwordUserRequest;

class UserControlller extends Controller
{
    private $objUser;
    public function __construct()
    {
        $this->objUser = new UserModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $user = $this->objUser->find(Session::get('id'));       
        $reminders = $user->reminders()->get();
        
        return view('home', compact('user', 'reminders'));     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('create.user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(StoreUserRequest $request)
    {
        // Session::flash('Name', $request->Name);
        // Session::flash('Email', $request->Email);
        // Session::flash('Password', $request->Password,);
        // Session::flash('ConfirmPassword',$request->ConfirmPassword);
        // Session::flash('Description', $request->Description);
        $storeUser = $this->objUser->create([
            'nm_user' => $request->Name,
            'nm_email' => $request->Email,
            'nm_contact_email' => $request->Email,
            'nm_password' => Hash::make($request->Password),
        ]);
        if($storeUser){   
            if($storeUser){   
                return redirect( Route('checkSession') )->with('msg', 'Conta criada com sucesso!')
                                                        ->with('CacheEmail', $request->Email);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $dataUser = $this->objUser->find($id);
        $name = $dataUser->nm_user;
        $email = $dataUser->nm_email;
        $nm_contact_email = $dataUser->nm_contact_email;
        $description = $dataUser->ds_user;

        return view('settings', compact(['name','email','nm_contact_email','description']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_name(Update_nameUserRequest $request, $id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $dataUpdate = $this->objUser->where('cd_user', $id)->update([
        'nm_user'=> $request->Name
        ]);
        
        if($dataUpdate){
            return redirect( route('settings.show',['id'=>$id]));
        }
    }

    public function update_email_contact(Update_email_contactUserRequest $request, $id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $dataUpdate = $this->objUser->where('cd_user', $id)->update([
        'nm_contact_email'=> $request->Email_contact // <--- request de email de contato
        ]);
        
        if($dataUpdate){
            return redirect( route('settings.show',['id'=>$id]));
        }
    }

    public function update_email(Update_emailUserRequest $request, $id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $dataUpdate = $this->objUser->where('cd_user', $id)->update([
        'nm_email'=> $request->Email
        ]);
        
        if($dataUpdate){
            return redirect( route('settings.show',['id'=>$id]));
        }
    }

    public function update_password(Update_passwordUserRequest $request, $id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $checkPassword = $this->objUser->find($id);
        if( $checkPassword ) {
            if(Hash::check($request->outPassword, $checkPassword->nm_password)){     

                $dataUpdate = $this->objUser->where('cd_user', $id)->update([
                'nm_password' => Hash::make($request->newPassword)
                ]);  
                if($dataUpdate){
                    Session::flash('msg', 'Senha alterada com sucesso!');
                    return redirect( route('settings.show',['id'=>$id]));
                }
            }else{
                Session::flash('msg','Senha atual incorreta!');
                return redirect( route('settings.show',['id'=>$id]) );
            }
        }       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }
        
        $this->objUser->destroy($id);        
    }

}

