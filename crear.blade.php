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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>TallerIntegracion</title>
</head>
<body>
@include('sidebar')
    <style>
        .puntero{
            cursor: pointer;
        }
        .ocultar{
            display: none;
        }
    </style>

    <div class="container">
        <h1>CREAR FORMULARIO</h1>
    </div>
   

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">

            <form method="POST" id="form_formulario">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">Nombre Formulario</label>
                            <input type="text" class="form-control" name="nombre_formulario" require>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-secondary" id="agregar" >Agregar campo +</button>
                        </div>
                    </div>
                    <div class="form-row mt-2" hidden>
                        <div class="form-row clonar mt-2" id = "clonar">
                                <div class="row border rounded">
                                    <div class="col mt-2 mb-2">
                                        <select class="form-select data1" aria-label="Default select example" name="tablas[]" id="tablas" >
                                            <option value="" selected disabled hidden>Seleccionar Tabla</option>
                                            @foreach($listado as $dato)
                                            <option value="{{$dato->name}}">{{$dato->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col mt-2 mb-2">
                                        <select class="form-select data2" aria-label="Default select example" name="campos[]" id="campos" >
                                            <option value="" selected disabled hidden>Seleccionar Campo</option>
                                        </select>
                                    </div>
                                    <div class="col mt-2 mb-2">
                                        <select class="form-select data3" aria-label="Default select example" name="visibilidad[]" id="visibilidad" >
                                            <option value="" selected disabled hidden>Seleccionar Visibilidad</option>
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="col mt-2 mb-2 text-center">
                                        <button type="button" class="btn btn-danger puntero ocultar">Eliminar</button>
                                    </div>
                                    
                                </div>
                        </div>
                    </div>
                    <div id="contenedor"> 
                        
                    </div>

                    <div class="form-row mt-2 mb-2">
                        <div class="col-md-12">
                            <button class="btn btn-success" id="enviar_contacto">Guardar</button>
                        </div> 
                    </div>
            </form>
            
        </div>
    </div>
    </div>

        <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}" type="text/javascript" ></script> 
    
    <script type="text/javascript">
        $(document).ready(function () {
            /* Listening for a click event on the `contenido` element. */
            contenedor.addEventListener('click', e =>{            
                e.preventDefault();          
                /* Checking if the element clicked has the class `data1` */
                if(e.target.classList.contains('data1')){
                        /* Selecting the first element with the class `data1` */
                        var DA= e.target.parentNode.parentNode;
                        var CallTables = DA.querySelector('.data1');
                        var CallCamps = DA.querySelector('.data2');  
                        // console.log(CallTables)
                        
                        /* The above code is listening for a change in the CallTables dropdown. */
                        $(CallTables).off('click').on('click', function () {                           
                            /* Getting the value of the selected option in the dropdown. */
                            var id_usuario = this.value;
                            // console.log(id_usuario); 
                            $(CallCamps).html('');               
                            $.ajax({                                
                                /* Calling the route `getStates` and passing the value of the variable
                                `id_usuario` as a parameter. */
                                url: '{{ route('getStates') }}?id_usuario='+id_usuario,
                                /* Sending a GET request to the server. */
                                type: 'get',  
                                
                                success: function (res) {
                                    console.log(res);                                  
                                    $.each(res, function (key, value) {         
                                        $(CallCamps).append('<option value="' + value.COLUMN_NAME + '">' + value.COLUMN_NAME + '</option>');       
                                    });
                                }
                            });
                            
                        });
                    }
            });

  
        });

    
    </script>
    <script src="{{ asset('js/formulario.js') }}" ></script>
   

</body>
</html>
