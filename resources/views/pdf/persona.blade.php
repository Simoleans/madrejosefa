<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Persona</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #e81cd7;
            color: white;
            text-align: center;
            line-height: 30px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container mx-auto p-12 ">
            {{ strtoupper(nombreFundacion()) }}
        </div>
    </header>
    <main>
        <div class="container mx-auto py-24 px-16 bg-red-500">
            <p class="font-bold text-2xl text-center mb-4">Datos personales</p>
            <div class="flex items-center gap-6">
                <div class="flex-1">
                    <h2>Documento: <p class="text-md font-bold">{{ $persona->tipo_documento }} - {{ $persona->nro_documento ?? 'N/T' }}</p></h2>
                    <h2>Nombres: <p class="text-md font-bold">{{ $persona->nombres }}</p></h2>
                    <h2>Apellido Materno: <p class="text-md font-bold">{{ $persona->apelido_materno ?? 'N/T' }}</p></h2>
                    <h2>Dirección: <p class="text-md font-bold">{{ $persona->direccion ?? 'N/T' }}</p></h2>
                    <h2>Estatus: <p class="text-md font-bold">{{ $persona->status == 1 ? 'Habilitado' : 'Inhabilitado' }}</p></h2>
                </div>
                <div class="flex-1">
                    <h2>País de origen: <p class="text-md font-bold">{{ $persona->pais_origen }}</p></h2>
                    <h2>Estado civil: <p class="text-md font-bold">{{ $persona->estado_civil }}</p></h2>
                    <h2>Fecha de nacimiento: <p class="text-md font-bold">{{ $persona->fecha_nac }} ({{ \Carbon\Carbon::parse($persona->fecha_nac)->age }})</p></h2>
                    <h2>Nivel de instrucción: <p class="text-md font-bold">{{ $persona->nivel_instruccion ?? 'N/T' }}</p></h2>
                    <h2>Observaciones: <p class="text-md font-bold">{{ $persona->observaciones ?? 'N/T' }}</p></h2>
                </div>
            </div>
            <p class="font-bold text-2xl text-center mb-4 mt-4">Parentescos</p>
            <div class="grid grid-cols-3 gap-4">
                @forelse($persona->parentescos as $pa)
                <div>
                    <p class="font-medium text-lg mb-4 underline ">{{ $pa->parentesco }}</p>
                    <p class="text-md font-bold">{{ $pa->user->nombres }} | {{ $pa->user->nro_documento ?? 'N/T' }}</p>
                </div>
                @empty
                    <h2>N/T</h2>
                @endforelse
            </div>
            <p class="font-bold text-2xl text-center mb-4">Situaciones</p>
            <div class="flex gap-6 justify-center">
                <div class="flex-1">
                    <p class="font-medium text-lg mb-4">Situación Morbida</p>
                    @forelse($persona->s_morbida as $s)
                        <p class="text-md font-bold">{{ $s->situacion->nombre }}</p>
                    @empty
                        <h2>N/T</h2>
                    @endforelse
                    <h2>Observaciones: <p class="text-md font-bold">{{ $persona->ob_situacion_m ?? 'N/T' }}</p></h2>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-lg mb-4">Situación Profesional</p>
                    @forelse($persona->s_profesional as $s)
                        <p class="text-md font-bold">{{ $s->situacion->nombre }}</p>
                    @empty
                        <h2>N/T</h2>
                    @endforelse
                    <h2>Observaciones: <p class="text-md font-bold">{{ $persona->ob_situacion_p ?? 'N/T' }}</p></h2>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-lg mb-4">Situación Social</p>
                    @forelse($persona->s_social as $s)
                        <p class="text-md font-bold">{{ $s->situacion->nombre }}</p>
                    @empty
                        <h2>N/T</h2>
                    @endforelse
                    <h2>Observaciones: <p class="text-md font-bold">{{ $persona->ob_situacion_s ?? 'N/T' }}</p></h2>
                </div>
            </div>
            <p class="font-bold text-2xl text-center mb-4 mt-2">Anexos</p>
            <div class="grid grid-cols-3 gap-4">
                @forelse($persona->anexos as $a)
                <div>
                    <img class="h-32 w-32" src="{{ asset('storage/'.$a->foto) }}">
                    <h2>Nombre: <p class="text-md font-bold">{{ $persona->nombre ?? 'N/T' }}</p></h2>
                    <h2>Fecha de experación: <p class="text-md font-bold">{{ $persona->fecha_exp ?? 'N/T' }}</p></h2>
                    <h2>Descripción: <p class="text-md font-bold">{{ $persona->descripcion ?? 'N/T' }}</p></h2>
                </div>
                @empty
                    <h2>N/T</h2>
                @endforelse
            </div>
        </div>
    </main>
    <script type="text/javascript">
        function PrintWindow() {                    
           window.print();            
           CheckWindowState();
        }
    
        function CheckWindowState()    {  
                
            if(document.readyState=="complete") {
                alert(document.readyState)    
                window.close(); 
            } else {           
                setTimeout("CheckWindowState()", 2000)
            }
        }
        PrintWindow();
    </script> 
</body>

</html>