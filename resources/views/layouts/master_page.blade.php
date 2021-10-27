<!DOCTYPE html>
<html lang="en" style="width: 100%; height: 100%;">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href=" {{ url(mix('assets/css/style.css')) }} ">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<title> @yield('title') </title>
    
</head>
<body class="bg-brackground">

@section('wrapper-start')
    <div  class="wrapper p-0 d-flex position-relative">
@show

    @section('nav-menu')
        <aside>
            <nav class="sidebar py-4 position-fixed bg-my-primary vh-100 rounded-1">
                
                <div class="text-center mb-5">
                    <img class="img-fluid rounded " src="{{ asset('assets/img/logo_diariodebordo_vetorizada.png') }}" alt="LOGO" width="180">
                </div>
                <ul class="list-inline ps-0" >
                    <li class="@php echo $home ?? '' @endphp">
                        <a class=" d-block text-white text-decoration-none" href="{{ route('home.index') }}">
                            <i class="pe-3 fas fa-home fa-lg"></i>Home
                        </a>
                    </li>
                    <li class="@php echo $docDiary ?? '' @endphp ">
                        <a class=" d-block text-white text-decoration-none" href=" {{ route('diary.create') }} ">                    
                            <i class="pe-3 fas fa-user fa-lg"></i>Documentar no diário
                        </a>
                    </li>
                    <li class="@php echo $application ??  '' @endphp">
                        <a class=" d-block text-white text-decoration-none" href=" {{ route('project.show', ['id'=>Session::get('id') ?? "id"]) }} ">
                            <i class="pe-3 fas fa-address-card fa-lg"></i>Projetos
                        </a>
                    </li>
                    <li class="@php echo $hisDiary ?? '' @endphp">
                        <a class=" d-block text-white text-decoration-none" href="{{ route('historic_diary.historicDiary', ['id' => Session::get('id') ?? "id"]) }}">
                            <i class="pe-3 fas fa-address-book fa-lg"></i>Histórico de diário
                        </a>
                    </li>
                    <li class="@php echo $setting  ?? '' @endphp">
                        <a class=" d-block text-white text-decoration-none" href=" {{ route('settings.show', ['id'=>Session::get('id') ?? "id" ]) }} ">
                            <i class="pe-3 fas fa-project-diagram fa-lg"></i>Configurações
                        </a>
                    </li>
                    <li>
                        <a class=" d-block text-white text-decoration-none" href=" {{ route('logout.logout') }} ">
                            <i class="pe-3 fas fa-door-open fa-lg"></i>Sair
                        </a>
                    </li>
                </ul> 
            </nav>
        </aside>
    @show

    @section('main_content-start')
        <div class="main_content">
            <div class="info">
    @show
       
        @yield('content') 

    @section('main_content-end')
            </div>
        </div>
    @show

@section('wrapper-end')
    </div>
@show


<script type="text/javascript" src=" {{ url(mix('assets/js/jquery.js')) }} "></script>
<script type="text/javascript" src=" {{ url(mix('assets/js/bootstrap.js')) }} "></script>	
<script type="text/javascript" src=" {{ url(mix('assets/js/script.js')) }} ">  </script>

@yield('scripts-ajax')    

</body>
</html>