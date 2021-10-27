{{-- extendendo o layout padrão --}}
@extends('layouts.master_page')

{{-- title page --}}
@section('title', 'Login Page')


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

        <div class="col-6 m-auto bg-light pt-4 pb-3 rounded ">
        
          @if (session('msg'))
            <div id="msg" class="alert alert-success fs-5" role="alert">
              {{ session('msg') }}
            </div>
          @endif

          <form id="form-login" name="form-login">
              @csrf
             
              <div class="form-floating mb-3">
                <input type="email" id="Email" name="Email" class="form-control form-control-lg" placeholder="Seu email" 
                  value="{{ session('CacheEmail') ?? '' }}" required autofocus>
                  <label for="Email">E-mail:</label>
              </div>
              
              <div class="form-floating mb-3">
                <input type="password" id="Password" name="Password" class="form-control form-control-lg" placeholder="Sua senha" required>             
                <label for="Password">Senha:</label>
              </div>
              
              <div class="checkbox my-3 m-1">
                <label>
                  <input type="checkbox" id="Checkbox" name="Checkbox" value="remember-me"> Lembra-me
                </label>
                <a class="float-md-end fw-bold text-decoration-none fs-5" href=" {{ route('user.create') }} " id="add-Address"> Criar nova conta. </a>
              </div>

              
              <div id="ErrorLogin" class="alert alert-danger d-none" role="alert">  </div>

              <div class="d-grid gap-2">            
                  <button class="btn btn-lg btn-primary" type="submit" >Entrar</button>
              </div>

              <p class="text-center lead my-3"> <a href=" {{ route('recoverPassword.recover_password') }} " class="text-decoration-none"> Esqueci minha senha. </a> </p>
              <hr class="mx-5">
              <p class=" text-muted text-center">&copy; Controle de gerenciamento de projetos </p>

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


{{-- wrapper ajax start --}}
 @section('scripts-ajax')
  <script>
    $("#form-login").bind('submit',function(event){
      event.preventDefault();
      $.ajax({
          url: "{{ route('login.loading') }}"  ,
          type: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function(response){
              if(response.success === true){
                  window.location.href = "{{ route('home.index') }}"; // Route Mizéra | coloca no arquivo js
              }else{                
                  $("#ErrorLogin").removeClass('d-none').html(response.msg);
              }            
          },
          error: function(response){
              console.log("Erro na conexão \n");
              console.log(response);
          }
      });
    });
  </script>
 @stop
{{-- wrapper ajax end --}}
 
