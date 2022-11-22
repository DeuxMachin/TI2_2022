<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles Bootstrap -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bar.css') }}" >
    <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <title>Formularios</title>
</head>
<body id="body">
    <header>    
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i> 
        </div>
    </header>

<!-- SIDEBAR -->
    <div class="menu__side" id="menu_side">

            <div class="name__page">
                <i class="fa-solid fa-table-list"></i>
                <h4>Campos Dinamicos</h4>
            </div>


        <div class="options__menu">	
            <a href="{{('/')}}" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4><a href="{{('/')}}">Home</a></h4>
                </div>
            </a>

            <a href="{{('/formularios')}}">
                <div class="option">
                    <i class="fa-solid fa-list" title="Formularios"></i>
                    <h4><a href="{{('/formularios')}}">View Forms</a></h4>
                </div>
            </a>

            <a href="{{('/formularios/crear')}}">
                <div class="option">
                    <i class="fa-solid fa-list" title="Formularios"></i>
                    <h4><a href="{{('/formularios/crear')}}">Make Forms</a></h4>
                </div>
            </a>

            <a href="{{('/papelera')}}">
                <div class="option">
                    <i class="fa-solid fa-list" title="Formularios"></i>
                    <h4><a href="{{('/papelera')}}">Reset Forms</a></h4>
                </div>
            </a>

        </div>

    </div>
<!-- SIDEBAR -->
@yield('content')

    <script src="{{ asset('js/SideBar.js') }}" type="text/javascript"></script>

</body>
</html>