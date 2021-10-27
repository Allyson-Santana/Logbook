{{-- extendendo o layout padrão --}}
@extends('layouts.master_page')

{{-- title page --}}
@section('title', 'create Page')


{{-- wrapper page start --}}
@section('wrapper-start')
    {{--   --}}
@stop

  {{-- sidebar page start --}}
  @section('nav-menu')
      {{--   --}}
  @stop    
  {{-- sidebar page end --}}

  {{-- wrapper main page start --}}
  @section('main_content-start')
      {{--   --}}
  @stop


    @section('content')  
        <div class="container">
            <div class="row vh-100 p-1">

        <div class="col-6 m-auto">
          <img class="img-fluid rounded" src="{{ asset('assets/img/logo_diariodebordo_vetorizada.png') }}" alt="LOGO" width="300">
          <p class="lead mt-4">Documente e compartilhe atualizações do projeto com seu grupo de modo ágil com o melhor gerenciador de Diário de Bordo.  </p>
        </div>
        
        <div class="col-6 m-auto bg-light pt-4 pb-3 rounded">
            <form action="{{ route("user.store") }}" method='POST' id="form-create" name="form-create">
                @csrf
    
                <div class="form-floating mb-3">
                    <input type="text" minlength="3" maxlength="20" id="Name" name="Name" class="form-control form-control-lg" placeholder="Seu nome" value=" {{Session::get('Name') ?? '' }}" required autofocus >
                    <label for="Name">Nome:</label>                    
                </div>

                <div class="form-floating mb-3">
                    <input type="email" id="Email" name="Email" class="form-control form-control-lg" placeholder="Seu email" value="{{ Session::get('Email') ?? '' }}" required >
                    <label for="Email">E-mail:</label>
                </div>  

                <div class="row mb-4">
                    <div class="col form-floating">
                        <input type="password" id="Password" name="Password" class="form-control form-control-lg" minlength="8" maxlength="15" placeholder="Sua senha" value="{{ Session::get('Password') ?? '' }}" required >             
                        <label for="Password" class="px-4"> Senha:</label>
                    </div>
                    <div class="col form-floating">
                        <input type="password" id="ConfirmPassword" name="ConfirmPassword" class="form-control form-control-lg" minlength="8" maxlength="15" value="{{ Session::get('ConfirmPassword') ?? '' }}" placeholder="Sua confirmação da senha" required>             
                        <label for="ConfirmPassword" class="px-4">Confirmação de senha:</label>
                    </div>
                </div>
                
                @if (session('warning'))
                    <div id="msg" class="alert alert-danger " role="alert">
                        {{ session('warning') }}
                    </div>
                @endif
        
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br>
                        @endforeach
                    </div>
                @endif

                <div class="d-grid gap-2 ">            
                    <button class="btn btn-lg btn-primary" type="submit" >Criar</button>
                </div>
                
               
                <hr class="mx-5">
                <p class="mt-3 text-muted text-center">&copy; Controle de gerenciamento de projetos </p>
                <a class='btn  btn-primary fw-bold ' href=" {{ route('checkSession') }} ">Voltar</a>

            </form>
        </div>
               
            </div>
        </div>
    @stop
      



  {{-- wrapper main page end --}}
  @section('main_content-end')
    {{--   --}}
  @stop

{{-- wrapper page end --}}
@section('wrapper-end')
{{--   --}}
@stop




 
        


