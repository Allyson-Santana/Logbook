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
      @php $setting = 'nav-active' @endphp        
      @parent
  @stop    
  {{-- sidebar page end --}}

  {{-- wrapper main page start --}}
  @section('main_content-start')
      @parent
  @stop
      
  
    {{-- main page start --}}
    @section('content')

    <div class="m-4">
        <div class="card my-3 lead">
              <h4 class="card-header text-center py-3 fw-bold ">USUÁRIO</h4>  {{-- text-wrap--}}
              <div class="card-body">  

                @error('Name')
                <div id="msg" class="alert alert-danger px-3 lead">{{ $message }}</div>
                @enderror    
                  
                
                @error('Email_contact')
                <div id="msg" class="alert alert-danger px-3 lead">{{ $message }}</div>
                @enderror  

                <table class="table">
                  <tbody>
                      <tr>
                          <th scope="row" class="card-title">Nome: <span class="text-black-50"> {{ $name }} </span>  </th>
                              <td class="d-flex justify-content-end ">
                                  <a class="edit text-decoration-none" id="Name" name="{{$name}}" data-bs-toggle="modal" data-bs-target="#modalEdit" href="#"> Editar </a>
                              </td>
                      </tr>
                      <tr>
                          <th scope="row" class="card-title">Contato: <span class="text-black-50"> {{ $nm_contact_email }} </span>   </th>
                              <td class="d-flex justify-content-end ">
                                  <a class="edit text-decoration-none" id="Email_contact" name="{{$nm_contact_email}}" data-bs-toggle="modal" data-bs-target="#modalEdit" href="#"> Editar </a>
                              </td>
                      </tr>
                  </tbody>
                </table>                             
              </div>
        </div>

        <div class="card my-3 lead">
              <h4 class="card-header text-center py-3 fw-bold">LOGIN</h4>
              <div class="card-body">       
                                
                @error('Email')
                <div id="msg" class="alert alert-danger px-3 lead">{{ $message }}</div>
                @enderror  
                                
                @error('Password')
                <div id="msg" class="alert alert-danger px-3 lead">{{ $message }}</div>
                @enderror  

                <table class="table">
                  <tbody>
                      <tr>
                          <th scope="row" class="card-title">E-mail: <span class="text-black-50"> {{ $email }} </span> </th>    
                              <td class="d-flex justify-content-end ">
                                  <a class="edit text-decoration-none" id="Email" name="{{$email}}" data-bs-toggle="modal" data-bs-target="#modalEdit" href="#"> Editar </a>
                              </td>                        
                      </tr>
                      <tr>
                          <th scope="row" class="card-title">Senha: <span class="card-text text-black-50">Alterar minha chave de acesso. </span> </th>    
                              <td class="d-flex justify-content-end ">
                                  <a class="edit text-decoration-none" id="Password" name="Password" data-bs-toggle="modal" data-bs-target="#modalEdit" href="#"> Editar </a>
                              </td>
                      </tr>
                  </tbody>
                </table>

                @if (Session('msg'))
                  <div id="msg" class="alert alert-warning text-center" role="alert">
                      {{ session('msg') }}
                  </div>
                @endif
                                
              </div>
        </div>

        <div class="card lead">
              <h4 class="card-header text-center py-3 fw-bold">CONTA</h4>
              <div class="card-body">
                  <div class="card-text">
                    <span class="fs-6">  Excluir meus dados de acesso.  </span>
                      @csrf
                      <a href=" {{ route('user.destroy',['id' => Session::get('id')]) }} " class="js-del-user "> 
                        <button class="btn btn-danger float-end">Excluir
                        </button> 
                      </a>
                </div>
            </div>
        </div>

      </div>

        <div id="modalEdit" class="modal " tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                <div class="modal-header">
                  <h4 class="modal-title"> Edição </h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action=" {{ route("name.update_name",['id'=>Session::get('id')]) }} " method="POST" id="form_updateName" name="form_updateName">
                  @csrf
                  @method("PUT")
                    <div id="modal_update_name">
                      
                    </div>
                </form>

                <form action=" {{ route("email-contact.update_email_contact",['id'=>Session::get('id')]) }} " method="POST" id="form_updateEmailContact" name="form_updateEmailContact">
                  @csrf
                  @method("PUT")
                    <div id="modal_update_email_contact">
                      
                    </div>
                </form>

                <form action=" {{ route("email.update_email",['id'=>Session::get('id')]) }} " method="POST" id="form_updateEmail" name="form_updateEmail">
                  @csrf
                  @method("PUT")
                    <div id="modal_update_email">
                      
                    </div>
                </form>

                <form action=" {{ route("password.update_password",['id'=>Session::get('id')]) }} " method="POST" id="form_updatePassword" name="form_updatePassword">
                  @csrf
                  @method("PUT")
                    <div id="modal_update_password">
                      
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

