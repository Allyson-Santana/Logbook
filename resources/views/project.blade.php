{{-- extendendo o layout padrão --}}
@extends('layouts.master_page')

{{-- title page --}}
@section('title', 'Home Page')



{{-- wrapper page start --}}
@section('wrapper-start')
    @parent
@stop

  {{-- sidebar page start --}}
  @section('nav-menu')
      @php $application = 'nav-active' @endphp   
      @parent
  @stop    
  {{-- sidebar page end --}}

  {{-- wrapper main page start --}}
  @section('main_content-start')           
      @parent
  @stop
      
  
    {{-- main page start --}}
    @section('content')
    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-10 mx-auto">

          @if ($projects)
            @foreach ($projects as $project)
              <div class="card mb-3">
                <div class="card-header text-center">
                  <h5 class="card-title fs-3 pt-2"> {{ $project->nm_project }} </h5>
                </div>
                <div class="card-body text-uppercase ">                 
                  <label for="texts" class="px-4 fw-bold ">Descrição </label>
                  <p id="texts" class="card-text py-1 px-4"> {{ $project->ds_project }} </p>
                    @csrf

                  <div class="row card-footer">
                    <label for="disabledTextInput" class="form-label px-3 fw-bold">Email de destinário</label>

                    <div class="col-lg-8 col-md-12">
                      <div class="mb-3 input-group  d-flex justify-content-start align-items-center">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="Text" id="disabledTextInput" value=" {{ $project->nm_email_recipient }} " class="form-control" placeholder="Email de destinário" disabled>
                      </div>
                    </div>
                    
                    <div class="mb-3 col-lg-4 col-md-12 d-flex justify-content-around align-items-center">          
                      <a href=" {{ route('project.edit',['project_id' => $project->cd_project ]) }}"> 
                        <button class="btn btn-primary">Editar  </button> 
                      </a>              
                      <a href=" {{ route('project.destroy',['id' => $project->cd_project ]) }} " class="js-del-project px-1"> 
                        <button class="btn btn-danger">Excluir  </button> 
                      </a>
                    </div>

                  </div>

                </div>
              </div>
            @endforeach
          @endif

        <div class="d-grid col-6 mx-auto my-5">
          <a href="{{ route('project.create') }}" class="btn btn-primary btn-lg" type="button">Iniciar novo projeto</a>
        </div>

        </div>        
      </div>
    </div>

    @stop
    {{-- main page end --}}

  {{-- wrapper main page end --}}
  @section('main_content-end')
    @parent
  @stop

{{-- wrapper page end --}}
@section('wrapper-end')
@parent
@stop

