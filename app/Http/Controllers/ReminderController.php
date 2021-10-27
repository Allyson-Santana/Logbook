<?php

namespace App\Http\Controllers;

use App\Models\ReminderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReminderController extends Controller
{
    private $objReminder;

    public function __construct()
    {
        $this->objReminder = new ReminderModel();
    }

    public function store(Request $request)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

       if(isset($request->reminder) && !empty($request->reminder)){
           $storeReminder = $this->objReminder->create([
                'ds_reminder' => $request->reminder,
                'cd_user' => Session::get('id')
            ]);
            return response()->json([
                'success' => true,
                'reminder_id' => $storeReminder->cd_reminder,
                'reminder' => $request->reminder
            ]);
       }
        return response()->json([
            'success' => false
        ]);
    }

    public function destroy($id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }
        
        $delReminder = $this->objReminder->destroy($id);
        if($delReminder){
            return response()->json([
                'success' => true
            ]);
        }
    }

}
