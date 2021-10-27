<style> 
    *{ font-family: Arial, Helvetica, sans-serif; background-color: azure }
    
    .nameProject{
        text-align: center;
        padding-bottom: 3px;
        text-transform: uppercase; 
    }
    .date{
        font-size: 17px;
        text-align: right;
        padding: 5px;
    }
    .field{
         word-wrap: normal;
         text-justify: newspaper;
         padding-top: 8px;
         margin-bottom: 3px;
    }
    .field-title{
        font-size: 20px;
        text-transform: uppercase;         
    }
    .card{
        font-size: 18px;
        opacity: 0.8;    
        padding-left: 5px;     
    }

  </style>  

@component('mail::message')

    <h2> Laravel Allyson - Diario de projeto. </h2> 

    @if ($diary)
        @foreach ($diary as $diary)

            <h2 class="nameProject"> {{ $diary->nm_project }} </h2>

            <hr>

            <div class="date">
                <strong>Entrega:</strong> {{$diary->dt_diary }}
            </div>

            <div  class="field">
                <p class="field-title"> Principais referências para o periodo. </p>
            <div class="card">                                             
                        @if (!empty($diary->ds_references))
                            @php
                            $references = explode(",",$diary->ds_references);
                            for ($i=0; $i < count($references) ; $i++) { 
                                echo $references[$i] . "<br>";
                            }
                            @endphp  
                        @else
                        Nenhuma referênça cadastrada.
                        @endif  
                </div>
            </div>

            <div  class="field">
                <p class="field-title"> Atividade prevista para o periodo. </p>
                <div class="card"> 
                    
                        {{$diary->ds_activity_preview }} 
                </div> 
            </div>

            <div  class="field">
                <p class="field-title"> Dificuldades encontradas no decorrer do desenvolvimento das atividade. </p>
                <div class="card"> 
                    
                        {{$diary->ds_difficulty_development }} 
                </div> 
            </div>

            <div  class="field">
                <p class="field-title"> Orientações do professor quanto as tarefas realizadas no periodo. </p>
                <div class="card">              
                    {{$diary->ds_guidelines_teacher_during }} 
                </div>
            </div>

            <div  class="field">
                <p class="field-title">Orientações do professor quanto as atividades a serem desenvolvida para a próximo periodo. </p>
                <div class="card"> 
                    {{$diary->ds_guidelines_teacher_be }} 
                </div>
            </div>  
            
        @endforeach        
    @endif

@endcomponent