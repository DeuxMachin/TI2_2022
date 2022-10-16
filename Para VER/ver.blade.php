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
        <h1>VER FORMULARIO</h1>
    </div>
    <div class="container">
        <a href="/formularios" class="btn btn-primary">Ver Formularios</a>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-dark">
                
                <th scope="col">Nombre del campo</th>
                
                
            </thead>
            <tbody>
                @foreach($listado as $dato)
                <tr>
                <td scope="row">{{$dato->nombre_campo_form}}</td>
                <td><input type="text"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-row mt-2 mb-2">
                        <div class="col-md-12">
                            <button class="btn btn-success" id="Guardar_Contacto">Guardar</button>
                        </div> 
        </div>
    </div>

    
    
</body>
</html>