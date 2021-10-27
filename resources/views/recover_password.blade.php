{{-- extendendo o layout padrão --}}
@extends('layouts.master_page')

{{-- title page --}}
@section('title', 'Recuperar senha')



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
      
  
    {{-- main page start --}}

    @section('content')  
    <div class="container">
        <div class="row vh-100 p-1">
  
          <div class="col-6 m-auto">
            <img class="img-fluid rounded" src="{{ asset('assets/img/logo_diariodebordo_vetorizada.png') }}" alt="LOGO" width="300">
            <p class="lead mt-4">Documente e compartilhe atualizações do projeto com seu grupo de modo ágil com o melhor gerenciador de Diário de Bordo.  </p>
          </div>
  
          <div class="col-6 m-auto bg-light pt-4 pb-3 rounded ">

                <form action=" {{ route("recoverCode.generate_recover_password") }} " method="post" id="form-recoverPassword" name="form-recoverPassword">
                    @csrf
                   
                    <div class="form-floating mt-3 mb-2">
                      <input type="email" id="email_contact" name="email_contact" class="form-control form-control-lg pt-5 pb-3" placeholder="Seu email" required autofocus>
                        <label for="Email" >Informe seu E-mail de contato:</label>
                    </div>
                    
                    <strong class="ms-2 ">Atenção: </strong> 
                    <label for="formFile" class="form-label text-start fst-italic">O Email solicitado é o de contato.</label>    
                    
                    @if ($errors->any())
                        <div id="msg" class="alert alert-danger px-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session('msg'))
                      <div id="msg" class="alert alert-success">
                          {{ Session('msg') }}
                      </div>
                    @endif

                    <div class="d-grid gap-2 ">            
                      <button class="btn btn-lg btn-primary mt-3" type="submit" >Envia</button>
                    </div>

                  <hr class="mx-5">
                  <p class=" text-muted text-center">&copy; Controle de gerenciamento de projetos </p>
                  <a class='btn  btn-primary fw-bold ' href=" {{ route('checkSession') }} ">Voltar</a>

                </form>
          </div>
  
      </div>
    </div>
  @stop
  
    {{-- main page end --}}

  
  {{-- wrapper main page end --}}
  @section('main_content-end')
    {{--   --}}
  @stop

{{-- wrapper page end --}}
@section('wrapper-end')
{{--   --}}
@stop


