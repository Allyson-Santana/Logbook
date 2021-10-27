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
        <div class="col-8 m-auto bg-light pt-4 pb-3 rounded">
          <h1 class="lead text-center mb-4"> @if (isset($project)) Editar meu projeto @else Criar novo projeto  @endif </h1>
          @if (isset($project))
          <form action="{{ route("project.update",['id' => $project->cd_project]) }}" method='POST' id="form-project" name="form-project">
            @method('put')
          @else
          <form action="{{ route("project.store") }}" method='POST' id="form-project" name="form-project">
          @endif
              @csrf
  
              <div class="form-floating mb-3">
                  <input type="text" minlength="3" maxlength="45" id="Name" name="Name" class="form-control form-control-lg" placeholder="Nome do projeto" value="{{ $project->nm_project ?? '' }}"  required autofocus >
                  <label for="Name">Nome do projeto:</label>                    
              </div>

              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Descrição do projeto" id="Description" name="Description" style="height: 100px" required > {{ $project->ds_project ?? '' }} </textarea>
                <label for="Description">Descrição do projeto:</label>
              </div>
    

              <div class="form-floating mb-3">
                <input type="email" id="Email_recipient" name="Email_recipient" class="form-control form-control-lg" placeholder="Recipient email" value="{{ $project->nm_email_recipient ?? '' }}"  required >
                <label for="Email_recipient">E-mail:</label>
              </div>  

              @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
              @endif

              <div class="d-grid gap-2 ">            
                <button class="btn btn-lg btn-primary" type="submit" > @if(isset($project)) Editar projeto @else Criar projeto @endif </button>
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

