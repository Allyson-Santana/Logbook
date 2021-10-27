<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PDF, @foreach($dataDiaryQuerys as $dataDiary) @endforeach {{ $dataDiary->nm_project }} </title>
  </head>
  <style> 
    *{ font-family: Arial, Helvetica, sans-serif; }
    .nameProject{
        text-align: center;
        padding-bottom: 3px;
    }
    .date{
        font-size: 18px;
        text-align: right;
        padding: 10px;
    }
    .field{
         text-decoration-line: underline;
         word-wrap: normal;
         text-justify: autopadding-top: 8px;
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
  <body>
    
    @if ($dataDiaryQuerys)
    @foreach ($dataDiaryQuerys as $dataDiary)

        <h1 class="nameProject"> {{ $dataDiary->nm_project }} </h1>

        <hr>

        <div class="date">
            <strong>Entrega:</strong> {{$dataDiary->dt_diary }}
        </div>

        <div  class="field">
            <p class="field-title"> Principais referências para o periodo. </p>
           <div class="card">                                             
                    @if (!empty($dataDiary->ds_references))
                        @php
                        $references = explode(",",$dataDiary->ds_references);
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
                  
                    {{$dataDiary->ds_activity_preview }} 
            </div> 
        </div>

        <div  class="field">
            <p class="field-title"> Dificuldades encontradas no decorrer do desenvolvimento das atividade. </p>
            <div class="card"> 
                  
                    {{$dataDiary->ds_difficulty_development }} 
            </div> 
        </div>

        <div  class="field">
            <p class="field-title"> Orientações do professor quanto as tarefas realizadas no periodo. </p>
            <div class="card">              
                {{$dataDiary->ds_guidelines_teacher_during }} 
            </div>
        </div>

        <div  class="field">
            <p class="field-title">Orientações do professor quanto as atividades a serem desenvolvida para a próximo periodo. </p>
            <div class="card"> 
                   {{$dataDiary->ds_guidelines_teacher_be }} 
            </div>
        </div>  
        
    @endforeach        
    @endif
    
  </body>
</html>