{{-- extendendo o layout padrão --}}
@extends('layouts.master_page')

{{-- title page --}}
@section('title', 'Home')


{{-- wrapper page start --}}
@section('wrapper-start')
    @parent
@stop

{{-- sidebar page start --}}
    @section('nav-menu')
        @php $home = 'nav-active' @endphp        
        @parent
    @stop    
{{-- sidebar page end --}}

    {{-- wrapper main page start --}}
    @section('main_content-start')
        @parent
    @stop
    
        
       {{-- main page start --}}
    @section('content')
    <div class="container-fluid ">
        <div class="row mt-2">
            <h2 class="text-end text-50 mb-4 px-4"> Oii {{ $user->nm_user }}, Sejá Bem Vindo!   </h2> 
            <div class="col-lg-9 col-md-12">
                <div class="card mb-3">
                    <div class="card-header py-3">Meus lembretes.. </div>
                    <div id="reminders" class="card-body">
                       @csrf
                       @if ($reminders)
                        @foreach ($reminders as $reminder)
                            <div id="reminder{{$reminder->cd_reminder}}" class='p-1 m-0'>                                
                                - {{ $reminder->ds_reminder }} 
                                <button id="{{$reminder->cd_reminder}}" type="submit" onclick="delReminder(this.id)" class='ps-1 text-decoration-none border-0 rounded'> Excluir </button>
                            </div>
                        @endforeach       
                       @endif 
                    </div>
                    <div class="card-footer">
                       <form id="form-reminder" name="form-reminder">
                        @csrf
                            <div class="input-group">
                                <input type="text" class="form form-control p-2" name="reminder" id="reminder" placeholder="Adicionar Lembrete...">
                                <button class="btn btn-primary" type="submit"> salvar </button>
                            </div>
                       </form>
                       <div id="errorReminder" class="alert alert-danger d-none mt-3" role="alert">  </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header py-3"> Novidades.. </div>
                    <div class="card-body">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt rerum pariatur expedita asperiores ratione itaque. Necessitatibus officiis odit deserunt ratione iure incidunt maxime voluptates repudiandae sunt? Laudantium voluptatibus ipsum veniam?
                    </div>
                </div>
            </div>
        </div>
    </div>    
        
        <footer class="text-center text-lg-start bg-light text-muted p-0 m-0">

            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->
            
                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->
        
            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->
            
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                        Products
                        </h6>
                        <p>
                        <a href="#!" class="text-reset">Laravel</a>
                        </p>
                        <p>
                        <a href="#!" class="text-reset">Bootstrap</a>
                        </p>
                        <p>
                        <a href="#!" class="text-reset">Jquery</a>
                        </p>
                        <p>
                        <a href="#!" class="text-reset">sass</a>
                        </p>
                    </div>
                    <!-- Grid column -->
            
                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                        Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                        <i class="fas fa-envelope me-3"></i>
                        info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->
        
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
    
        </footer>

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


{{-- wrapper ajax start --}}
@section('scripts-ajax')
<script>

  $("#form-reminder").bind('submit',function(event){
    event.preventDefault();
    $.ajax({
        url: "{{ route('reminder.store') }}"  ,
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(response){
            if(response.success === true){
                $('#reminders').append(
                    "<div id='reminder"+response.reminder_id+"' class='p-1 m-0'>" +
                        "- " + response.reminder +
                        "<button id="+response.reminder_id+" type='submit' onclick='delReminder(this.id)' class='del-reminder ps-1 text-decoration-none border-0 rounded'> Excluir </button>" +
                    "</div>"  
                );
                $("#reminder").val('');
            }else{                
                $('#errorReminder').removeClass('d-none').html('Ops: cientifique-se se informou um lembrete');
                setTimeout(() => {
                    $('#errorReminder').empty()
                    $('#errorReminder').addClass('d-none');
                }, 3000);
            }            
        },
        error: function(response){
            console.log("Erro na conexão \n");
            console.log(response);
        }
    });
  });

function delReminder(id){
    let token = document.getElementsByName("_token")[0].value;
    var route = "{{ route('reminder.destroy', ['id' => ':id' ]) }}";
    route = route.replace(":id", id);
    if(confirm('Deseja delete esse lembrete')){
        $.ajax({
            url: route,
            type:'delete',
            data:{
                _token : token
            },
            success: function(response){
                if(response.success === true){
                    $("#reminder"+id).remove();
                }
            },
            error:function(response){
                console.log("Erro na conexão \n");
                console.log(response);
            }
        })
    }
}

</script>
@stop
{{-- wrapper ajax end --}}

