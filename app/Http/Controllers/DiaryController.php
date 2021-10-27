<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiaryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\DiaryModel;
use App\Models\ProjetctModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\DiaryMail;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\PDF;

class DiaryController extends Controller
{

    private $objDiary;
    private $objUser;
    private $objProject;

    public function __construct()
    {
        $this->objDiary = new DiaryModel();
        $this->objUser = new UserModel();
        $this->objProject = new ProjetctModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $user = $this->objUser->find(Session::get('id'));

        $projects = $user->projects()->orderBy('cd_project','desc')->get();

        return view('doc_diary', compact('projects'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaryRequest $request)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $request->SearchSource = implode(",", $request->SearchSource);

        $storeDiary = $this->objDiary->create([
            'dt_diary' => $request->DataDiary,
            'ds_references' => $request->SearchSource,
            'ds_activity_preview' => $request->ActivityPreview,
            'ds_difficulty_development' => $request->DifficultyDevelopment,
            'ds_guidelines_teacher_during' => $request->GuidelinesTeacherDuring,
            'ds_guidelines_teacher_be' => $request->GuidelinesTeacherBe,
            'cd_project' => $request->Project_id
        ]);

        $diaryQuerys = DB::table('tb_diary')
        ->join('tb_project', 'tb_project.cd_project', '=', 'tb_diary.cd_project')
        ->select('tb_diary.*','tb_project.nm_project')
        ->where('tb_diary.cd_diary', '=', $storeDiary->cd_diary)
        ->get();
        
        $project = $this->objProject->find($request->Project_id);
        $email = $project->nm_email_recipient;

        if($storeDiary){          
            Mail::to($email)->send(new DiaryMail($diaryQuerys));
            return redirect(route('diary.create'))->with('msg', 'Diario de bordo enviado com sucesso!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($diary_id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $diary = $this->objDiary->find($diary_id);
        $project = $this->objProject->find($diary->cd_project);
        $name_project = $project->nm_project;
        return view('diary', compact('diary','name_project'));
    }

    public function historicDiary($id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }
        
        $dataQuerys = DB::table('tb_user_project')
        ->join('tb_user', 'tb_user.cd_user', '=', 'tb_user_project.cd_user')
        ->join('tb_project', 'tb_project.cd_project', '=', 'tb_user_project.cd_project')
        ->join('tb_diary', 'tb_diary.cd_project', '=', 'tb_project.cd_project')
        ->select('tb_project.nm_project','tb_project.nm_email_recipient', 'tb_diary.dt_diary', 'tb_diary.cd_diary')
        ->where('tb_user.cd_user', '=', $id)
        ->orderBy('tb_diary.cd_diary', 'desc')
        ->get();

        return view('historic_diary', compact('dataQuerys'));
    }

    public function generationPDF($diary_id)
    {
        if(!Session::has('login')){ return redirect( route('checkSession') ); }

        $dataQuerys = DB::table('tb_user_project')
        ->join('tb_user', 'tb_user.cd_user', '=', 'tb_user_project.cd_user')
        ->join('tb_project', 'tb_project.cd_project', '=', 'tb_user_project.cd_project')
        ->join('tb_diary', 'tb_diary.cd_project', '=', 'tb_project.cd_project')
        ->select('tb_project.cd_project','tb_user.cd_user', 'tb_diary.cd_diary')
        ->where('tb_user.cd_user', '=', Session::get('id'))
        ->orWhere('tb_diary.cd_diary', '=', $diary_id)
        ->get();

        if(!$dataQuerys){
            return redirect( route('historic_diary.historicDiary',['id' => Session::get('id')])); 
        }

        $dataDiaryQuerys = DB::table('tb_diary')
        ->join('tb_project', 'tb_project.cd_project', '=', 'tb_diary.cd_project')
        ->select('tb_diary.*','tb_project.nm_project')
        ->where('tb_diary.cd_diary', '=', $diary_id)
        ->get();

        $pdf = PDF::loadView('pdf', compact('dataDiaryQuerys'));
        
        foreach($dataDiaryQuerys as $query){
          $name = $query->nm_project;
          $date= $query->dt_diary;
        }

        return $pdf->setPaper('A4')->download($name."-".$date);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
