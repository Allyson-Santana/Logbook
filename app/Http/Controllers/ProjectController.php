<?php

namespace App\Http\Controllers;

use App\Models\ProjetctModel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Models\UserModel;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    private $objProject;
    private $objUser;

    public function __construct()
    {
        $this->objProject = new ProjetctModel();
        $this->objUser = new UserModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        return view('create.project');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $project = $this->objProject->create([
            'nm_project' => $request->Name,
            'ds_project' => $request->Description,
            'nm_email_recipient' => $request->Email_recipient
        ]);

        $user = $this->objUser->find(Session::get('id'));

        $user->projects()->syncWithoutDetaching([ $project->cd_project ]);  

        if($project){
            return redirect( route('project.show', ['id' => Session::get(('id'))]) );
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

        $user = $this->objUser->find($id);
        
        $projects = $user->projects()->orderBy('cd_project','desc')->get();

        return view('project', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $project = $this->objProject->find($project_id);
        if($project){
            return view('create.project', compact('project'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjectRequest $request, $id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $updateProject = $this->objProject->where('cd_project',$id)->update([
            'nm_project' => $request->Name,
            'ds_project' => $request->Description,
            'nm_email_recipient' => $request->Email_recipient
        ]);
        if($updateProject){
            return redirect()->route('project.show',['id' => Session::get('id')]);
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
        
        $this->objProject->destroy($id);  
    }
}
