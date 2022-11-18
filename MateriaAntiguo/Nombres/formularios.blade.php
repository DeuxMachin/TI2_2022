<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <title>TallerIntegracion</title>
</head>
<body>
@include('sidebar')

    <div class="container">
        <h1>FORMULARIO CON CAMPOS DINAMICOS</h1>
    </div>
    
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">NOMBRE FORMULARIO</th>
                <th scope="col">CREADOR</th>
                <th scope="col">ACCIONES</th>
            </thead>
            <tbody>
                @foreach($listado as $dato)
                <tr>
                <td scope="row">{{$dato->id_formulario}}</td>
                <td scope="row">{{$dato->nombre_formulario}}</td>
                @foreach($usuario as $dato2)
                <td scope="row">{{$dato2->nombre_usuario}} {{$dato2->apellido1_usuario}} </td>

                @endforeach
                <td>
                    <a href="/formularios/editar/{{$dato->id_formulario}}" class="btn btn-warning">Editar</a> 
                    <a href="/formularios/ver/{{$dato->id_formulario}}" class="btn btn-success">Ver</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>