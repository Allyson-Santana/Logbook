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
        <div class="row">
            <div class="shadow-lg col-lg-8 col-sm-12 m-auto bg-light pt-4 pb-5 rounded">

                <p class="text-center fs-3 bg-my-secondary shadow-sm py-3"> {{ $name_project }} </p>

                <div class="mt-4 d-flex justify-content-end px-3">
                   <strong class="me-1">Entrega:</strong> {{ $diary->dt_diary }}
                    <i class="far fa-calendar-alt my-auto ms-2">  </i>
                </div>  
                
                <div  class="px-3 my-4">
                    <p class="lead"> Principais referências para o periodo. </p>
                   <div class="card"> 
                       <div class="card-body">                             
                            @if (!empty($diary->ds_references))
                                @php
                                $references = explode(",", $diary->ds_references);
                                for ($i=0; $i < count($references) ; $i++) { 
                                    echo $references[$i] . "<br>";
                                }
                                @endphp  
                            @else
                            Nenhuma referênça cadastrada.
                            @endif                         
                        </div> 
                    </div>
                </div>
                
                <div  class="px-3 my-4">
                    <p class="lead"> Atividade prevista para o periodo. </p>
                    <div class="card"> 
                        <div class="card-body">  
                            {{ $diary->ds_activity_preview }} 
                         </div> 
                     </div>
                </div>
                
                <div  class="px-3 my-4">
                    <p class="lead"> Dificuldades encontradas no decorrer do desenvolvimento das atividade. </p>
                    <div class="card"> 
                        <div class="card-body">  
                            {{ $diary->ds_difficulty_development }} 
                         </div> 
                     </div>
                </div>
                
                <div  class="px-3 my-4">
                    <p class="lead"> Orientações do professor quanto as tarefas realizadas no periodo. </p>
                    <div class="card"> 
                        <div class="card-body">  
                            {{ $diary->ds_guidelines_teacher_during }} 
                         </div> 
                     </div>
                </div>
                
                <div  class="px-3 my-4">
                    <p class="lead">Orientações do professor quanto as atividades a serem desenvolvida para a próximo periodo. </p>
                    <div class="card"> 
                        <div class="card-body">  
                            {{ $diary->ds_guidelines_teacher_be }} 
                         </div> 
                     </div>
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

