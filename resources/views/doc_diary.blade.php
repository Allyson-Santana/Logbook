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
      @php $docDiary = 'nav-active' @endphp
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
      <div class="row">
        <div class="document shadow-lg col-lg-9 col-sm-12 m-auto bg-light pt-4 pb-5 rounded">

          @if (Session('msg'))
            <div  class="alert alert-success lead text-center py-3"> 
                {{ Session('msg') }}
            </div>                
          @endif
          
          <form action="{{ route('diary.store') }}" method="post" id="form-diary" name="form-diary">
            @csrf

            <div class="row no-gutters">
              <div class="col-8 mx-auto">
                  <select id="Project_id" name="Project_id" class="form-select form-select-lg bg-my-secondary shadow-sm" placeholder="Nome do projeto" required autofocus>
                    @if ($projects->count() > 0 )
                    @foreach ($projects as $project)
                      <option value="{{$project->cd_project }}"> {{ $project->nm_project }} </option> 
                    @endforeach
                    @else
                        <option value=""> Crie um projeto! </option>
                    @endif
                  </select>
                  @error('Project_id')
                  <br>
                  <div  class="mt-2 alert alert-danger px-3 lead">{{ $message }}</div>
                  @enderror   

              </div>
            </div>

            <div class="dateDocument">
              <div class="mt-4 d-flex justify-content-end px-3">
                <strong class="lead"> Periodo: </strong>
                <input type="date" max="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" id="DataDiary" name="DataDiary" class="border-top-0 border-start-0 border-end-0 "/>
                <i class="far fa-calendar-alt my-auto ms-4">  </i>
              </div>  
              @error('DataDiary')
              <div  class="mt-2 justify-content-end px-3 alert alert-danger lead">
                {{ $message }}
              </div>
              @enderror   
            </div>

            <div class="row no-gutters mb-4 px-3 w-75">
                <label for="" class="px-3 mb-2" > Principais referências para o periodo: </label>
                <div id="field-url">
                  <div id='formUrl1' class="input-group mb-2 shadow-sm">
                    <input  id="SearchSource" name="SearchSource[]" class="form-control bg-my-secondary" placeholder="url, livro, pessoa, etc...">
                  </div>
                </div>

   
                <div class="d-flex justify-content-start">
                  <button type="button" class="addfiled btn btn-outline-primary px-4"> <i class="fas fa-plus"></i> </button>
                </div>
            </div>
            
            <div class="px-3">              
                <div class="mb-4 ">
                  <label for="ActivityPreview">Atividade prevista para o periodo: *</label>
                  <div class="shadow-sm">
                    <textarea class="form-control bg-secondary bg-my-secondary" placeholder="Descrição..." id="ActivityPreview" name="ActivityPreview" style="height: 100px" required >{{ Session::get('') ?? '' }}</textarea>
                  </div>   
                  @error('ActivityPreview')
                  <div  class="mt-2 alert alert-danger px-3 lead">{{ $message }}</div>
                  @enderror                    
                </div>
                  
                <div class="mb-4 ">
                  <label for="DifficultyDevelopment">Dificuldades encontradas no decorrer do desenvolvimento das atividade: *</label>
                  <div class="shadow-sm">
                    <textarea class="form-control bg-my-secondary" placeholder="Descrição..." id="DifficultyDevelopment" name="DifficultyDevelopment" style="height: 100px" required >{{ Session::get('') ?? '' }}</textarea>
                  </div>        
                  @error('DifficultyDevelopment')
                  <div  class="mt-2 alert alert-danger px-3 lead">{{ $message }}</div>
                  @enderror               
                </div>

                <div class="mb-4 ">
                  <label for="GuidelinesTeacherDuring">Orientações do professor quanto as tarefas realizadas no periodo: *</label>
                  <div class="shadow-sm">
                    <textarea class="form-control bg-my-secondary" placeholder="Descrição..." id="GuidelinesTeacherDuring" name="GuidelinesTeacherDuring" style="height: 100px" required >{{ Session::get('') ?? '' }}</textarea>
                  </div>           
                  @error('GuidelinesTeacherDuring')
                  <div  class="mt-2 alert alert-danger px-3 lead">{{ $message }}</div>
                  @enderror         
                </div>

                <div class="mb-4 ">
                  <label for="GuidelinesTeacherBe">Orientações do professor quanto as atividades a serem desenvolvida para a próximo periodo: *</label>
                  <div class="shadow-sm">
                    <textarea class="form-control bg-my-secondary" placeholder="Descrição..." id="GuidelinesTeacherBe" name="GuidelinesTeacherBe" style="height: 100px" required >{{ Session::get('') ?? '' }}</textarea>
                  </div>         
                  @error('GuidelinesTeacherBe')
                  <div id="msg" class=" mt-2 alert alert-danger px-3 lead">{{ $message }}</div>
                  @enderror                 
                </div>

                <div class="d-grid mb-4 ">        
                  <button class="btn btn-lg btn-primary" type="submit" >Enviar diário</button>
                </div>

            </div>        

          </form>
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

